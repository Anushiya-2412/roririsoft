<?php
include("C:\\xampp\\htdocs\\ERP\\db\\dbConnection.php");
session_start();
include('../../phpqrcode/qrlib.php'); // Include the QR code library
include("../../url.php");  

header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];

// Add Employee
if (isset($_POST['hdnAction']) && $_POST['hdnAction'] == 'addEmployee') {
    
      // Ensure all required fields are filled
      $requiredFields = ['fname', 'lname', 'phone', 'pemail', 'cemail', 'dob', 'address', 'jDate', 'role', 'ms', 'payrole', 'gender'];
      foreach ($requiredFields as $field) {
          if (!isset($_POST[$field]) || empty($_POST[$field])) {
              $response['message'] = "Please fill all required fields.";
              echo json_encode($response);
              exit();
          }
      }

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $name = $fname . ' ' . $lname;
    $mobile = $_POST['phone'];
    $pemail = $_POST['pemail'];
    $cemail = $_POST['cemail'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $jDate = $_POST['jDate'];
    $role = $_POST['role'];
    $married_status = $_POST['ms'];
    $payrole = $_POST['payrole'];
    $gender = $_POST['gender'];
    $username = $fname . $lname;
    

    

    function usernameExists($username) {
        global $conn;
        $sql = "SELECT COUNT(*) as count FROM admin_tbl WHERE username='$username';";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row['count'] > 0;
    }

    function generateUniqueUsername($username) {
        $base_username = $username;
        while (usernameExists($username)) {
            $username = $base_username . mt_rand(100, 999);
        }
        return $username;
    }
    //Create an employee Id 
    function generateNextEmployeeId() {
        global $conn;
        $sql = "SELECT MAX(employee_id) as max_id FROM employee_tbl";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $last_id = $row['max_id'];
        if ($last_id === null) {
            return 180001; // Starting ID
        } else {
            return $last_id + 1;
        }
    }

    $username = generateUniqueUsername($username);
    $password = generateRandomNumber($username); // Assuming this function generates a password

    $empuser_sql = "INSERT INTO admin_tbl(name, username, pass, role) VALUES ('$name', '$username', '$password', '$role')";

    if ($conn->query($empuser_sql) === TRUE) {
        $last_insert_id = $conn->insert_id;
        // // Generate QR code
        // $qr_content = "Employee ID: $last_insert_id\nName: $name\nRole: $role";
        // $qr_filename = $username . 'qr.png';
        // $qr_file_path = $target_dir . $qr_filename;
        // QRcode::png($qr_content, $qr_file_path);
        //Create an employee Id
        $next_employee_id = generateNextEmployeeId();

        $emp_sql = "INSERT INTO employee_tbl (employee_id,entity_id, emp_first_name, emp_last_name, emp_gender, emp_user_id,emp_role, emp_married_status) VALUES ('$next_employee_id',1, '$fname', '$lname', '$gender', '$last_insert_id', '$role', '$married_status')";

        if ($conn->query($emp_sql) === TRUE) {
            $last_parent_id = $conn->insert_id;

            $emp_add_sql = "INSERT INTO emp_additional_tbl (emp_id, emp_personal_email, emp_company_email, emp_dob, emp_pay_role, emp_joining_date,  emp_mobile, emp_address) VALUES ('$last_parent_id', '$pemail', '$cemail', '$dob', '$payrole', '$jDate', '$mobile', '$address')";

            if ($conn->query($emp_add_sql) === TRUE) {
                $response['success'] = true;
                $response['message'] = "Employee details added successfully!";
            } else {
                $response['message'] = "Unexpected error in adding Employee details! " . $conn->error;
            }
        } else {
            $response['message'] = "Error: " . $conn->error;
        }
    } else {
        $response['message'] = "Error: " . $conn->error;
    }

    echo json_encode($response);
    exit();
}



function generateRandomNumber($username) {
    $num = mt_rand(100, 999);
    return $num;
}

// Function to fetch emp_user_id from the employee table based on employee ID
function getEmpUserIdFromEmployee($empId) {
    global $conn;
    $query = "SELECT emp_user_id FROM employee_tbl WHERE emp_id = '$empId'";
    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['emp_user_id'];
    }
    return null;
}

// Function to fetch user_id from the admin table based on emp_user_id
function getUserIdFromAdmin($empUserId) {
    global $conn;
    $query = "SELECT username FROM admin_tbl WHERE user_id = '$empUserId'";
    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['username'];
    }
    return null;
}

// Function to get current image filename from employee table
function getCurrentImageFilename($empId) {
    global $conn;
    $query = "SELECT emp_img FROM employee_tbl WHERE emp_id = '$empId'";
    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['emp_img'];
    }
    return null;
}

// Handles the update of the employee
// Handles the update of the employee
if (isset($_POST['hdnAction']) && $_POST['hdnAction'] == 'hdneditEmployee') {
    $empId = $_POST['empId'];
    $editFName = $_POST['editFname'];
    $editLName = $_POST['editLname'];
    $editGender = $_POST['editGender'];
    $editdob = $_POST['editDob'];
    $editRole = $_POST['editRole'];
    $editMobile = $_POST['editPhone'];
    $editCemail = $_POST['editCemail'];
    $editEmail = $_POST['editPemail'];
    $editJDate = $_POST['editjDate'];
    $editPayrole = $_POST['editPayrole'];
    $editAddress = $_POST['editAddress'];
    $editMs = $_POST['editms'];

    // Fetch the emp_user_id from the employee table
    $empUserId = getEmpUserIdFromEmployee($empId);

    if (!$empUserId) {
        $response['success'] = false;
        $response['message'] = "Error: Employee User ID not found for employee.";
        echo json_encode($response);
        exit();
    }

    // Fetch the user ID from the admin table
    $userId = getUserIdFromAdmin($empUserId);

    if (!$userId) {
        $response['success'] = false;
        $response['message'] = "Error: User ID not found in admin table.";
        echo json_encode($response);
        exit();
    }

    // Directory where images are stored
    $targetDir = $image;

    // Ensure the directory exists; create if not
    if (!file_exists($targetDir)) {
        if (!mkdir($targetDir, 0777, true)) {
            $response['success'] = false;
            $response['message'] = "Failed to create directory for image upload.";
            echo json_encode($response);
            exit();
        }
    }

    // Get the current image filename from the database
    $currentImage = getCurrentImageFilename($empId);

    // Generate new image filename using user ID (assuming it's unique per user)
    $newImageFilename = $userId . "." . pathinfo($_FILES["editImage"]["name"], PATHINFO_EXTENSION);
    $targetFilePath = $targetDir . $newImageFilename;

    // Check if the new file exists; if so, replace the existing one
    if (file_exists($targetFilePath)) {
        unlink($targetFilePath); // Remove the existing file
    }

    // Move uploaded file to target directory
    if (!empty($_FILES["editImage"]["tmp_name"])) {
        $imageFileType = strtolower(pathinfo($_FILES["editImage"]["name"], PATHINFO_EXTENSION));

        // Check if image file is an actual image or fake image
        $check = getimagesize($_FILES["editImage"]["tmp_name"]);
        if ($check === false) {
            $response['success'] = false;
            $response['message'] = "Error: File is not an image.";
            echo json_encode($response);
            exit();
        }

        // Check file size (optional, here 5MB max)
        if ($_FILES["editImage"]["size"] > 10000000) {
            $response['success'] = false;
            $response['message'] = "Error: File is too large.";
            echo json_encode($response);
            exit();
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            $response['success'] = false;
            $response['message'] = "Error: Only JPG, JPEG, PNG files are allowed.";
            echo json_encode($response);
            exit();
        }

        // Move file to target directory
        if (move_uploaded_file($_FILES["editImage"]["tmp_name"], $targetFilePath)) {
            $editImage = $newImageFilename; // Set new image filename
        } else {
            $response['success'] = false;
            $response['message'] = "Sorry, there was an error uploading your file.";
            echo json_encode($response);
            exit();
        }
    }

    // Update employee details in database
    $editQuery = "UPDATE `employee_tbl` a
                  LEFT JOIN `emp_additional_tbl` b ON a.`emp_id` = b.`emp_id`
                  SET a.`emp_first_name` = '$editFName',
                      a.`emp_last_name` = '$editLName',
                      a.emp_gender = '$editGender',
                      a.emp_married_status = '$editMs',
                      a.emp_role = '$editRole',
                      b.emp_dob = '$editdob',
                      b.emp_personal_email = '$editEmail',
                      b.emp_company_email = '$editCemail',
                      b.emp_pay_role = '$editPayrole',
                      b.emp_joining_date = '$editJDate',
                      b.emp_mobile = '$editMobile',
                      b.emp_address = '$editAddress'";

    if (isset($editImage)) {
        $editQuery .= ", a.emp_img = '$editImage'";
    }

    $editQuery .= " WHERE a.emp_id = '$empId'";

    $editRes = mysqli_query($conn, $editQuery);

    if ($editRes) {
        $_SESSION['message'] = "Employee details updated successfully!";
        $response['success'] = true;
        $response['message'] = "Employee details updated successfully!";
    } else {
        $response['success'] = false;
        $response['message'] = "Error updating database: " . mysqli_error($conn);
    }

    echo json_encode($response);
    exit();
}
//Handles Fetching the employee details for editing 
if (isset($_POST['empId']) && $_POST['empId'] != '') {
    $empId = $_POST['empId'];

    $empFetch="SELECT employee_tbl.*,
    emp_additional_tbl.*
    FROM employee_tbl
    LEFT JOIN emp_additional_tbl ON emp_additional_tbl.emp_id=employee_tbl.emp_id
    WHERE employee_tbl.emp_status='Active' AND employee_tbl.emp_id='$empId'";
    $fetchResult = mysqli_query($conn, $empFetch);
    
    if ($fetchResult) {

        $row = mysqli_fetch_assoc($fetchResult);
         // Construct the image URL
        $image_url = '../image/Employee/' . $row['emp_img'];
        $employeeDetails = array(
            'emp_id' => $row['emp_id'],
            'first_name' => $row['emp_first_name'],
            'last_name' => $row['emp_last_name'],
            'dob' => $row['emp_dob'],
            'address' => $row['emp_address'],
            'personal_email' => $row['emp_personal_email'],
            'company_email' => $row['emp_company_email'],
            'phone' => $row['emp_mobile'],
            'pay_role' => $row['emp_pay_role'],
            'role'=>$row['emp_role'],
            'married_status'=>$row['emp_married_status'],
            'gender'=>$row['emp_gender'],
            'joining_date'=>$row['emp_joining_date'],
            'img'=>$image_url,


        );
        echo json_encode($employeeDetails);
    } else {
        $response['message'] = "Error executing query: " . mysqli_error($conn);
        echo json_encode($response);
    }
    exit();
}





// Handle deleting a Employee
if (isset($_POST['deleteId'])) {
    $id = $_POST['deleteId'];
    $queryDel = "UPDATE `employee_tbl` a
   LEFT JOIN `emp_additional_tbl` b ON a.`emp_id` = b.`emp_id`
   LEFT JOIN admin_tbl c ON c.user_id=a.emp_user_id
    SET a.emp_status='Inactive',
    b.emp_status='Inactive',
    c.status='Inactive'
        WHERE a.emp_id='$id'";
    $reDel = mysqli_query($conn, $queryDel);

    if ($reDel) {
        $_SESSION['message'] = "Employee details have been deleted successfully!";
        $response['success'] = true;
        $response['message'] = "Employee details have been deleted successfully!";
    } else {
        $_SESSION['message'] = "Unexpected error in deleting Employee details!";
        $response['message'] = "Error: " . mysqli_error($conn);
    }

    echo json_encode($response);
    exit();
}


?>
