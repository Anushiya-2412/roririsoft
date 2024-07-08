<?php
include("../db/dbConnection.php");
session_start();

header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];

// Add Employee
if (isset($_POST['hdnAction']) && $_POST['hdnAction'] == 'addEmployee') {
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

    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image = $_FILES['image'];
        $image_extension = pathinfo($image['name'], PATHINFO_EXTENSION);
        $image_name = $username . '.' . $image_extension;
        $target_dir = '../image/Employee/';
        $target_file = $target_dir . $image_name;

        // Create the target directory if it doesn't exist
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        if (!move_uploaded_file($image['tmp_name'], $target_file)) {
            $response['message'] = "Error uploading image.";
            echo json_encode($response);
            exit;
        }
    } else {
        $response['message'] = "Image is required.";
        echo json_encode($response);
        exit;
    }

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

    $username = generateUniqueUsername($username);
    $password = generateRandomNumber($username); // Assuming this function generates a password

    $empuser_sql = "INSERT INTO admin_tbl(name, username, pass, role) VALUES ('$name', '$username', '$password', '$role')";

    if ($conn->query($empuser_sql) === TRUE) {
        $last_insert_id = $conn->insert_id;

        $emp_sql = "INSERT INTO employee_tbl (entity_id, emp_first_name, emp_last_name, emp_gender, emp_user_id, emp_married_status, emp_img) VALUES (1, '$fname', '$lname', '$gender', '$last_insert_id', '$married_status', '$image_name')";

        if ($conn->query($emp_sql) === TRUE) {
            $last_parent_id = $conn->insert_id;

            $emp_add_sql = "INSERT INTO emp_additional_tbl (emp_id, emp_personal_email, emp_company_email, emp_dob, emp_pay_role, emp_joining_date, emp_role, emp_mobile, emp_address) VALUES ('$last_parent_id', '$pemail', '$cemail', '$dob', '$payrole', '$jDate', '$role', '$mobile', '$address')";

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

    $editQuery1 = "UPDATE `employee_tbl` a
                   LEFT JOIN `emp_additional_tbl` b ON a.`emp_id` = b.`emp_id`
                   SET a.`emp_first_name` = '$editFName',
                       a.`emp_last_name` = '$editLName',
                       a.emp_gender = '$editGender',
                       a.emp_married_status = '$editMs',
                       b.emp_dob = '$editdob',
                       b.emp_personal_email = '$editEmail',
                       b.emp_company_email = '$editCemail',
                       b.emp_pay_role = '$editPayrole',
                       b.emp_joining_date = '$editJDate',
                       b.emp_role = '$editRole',
                       b.emp_mobile = '$editMobile',
                       b.emp_address = '$editAddress'
                   WHERE a.emp_id = '$empId'";

    $editRes = mysqli_query($conn, $editQuery1);

    $response = [];

    if ($editRes) {
        $_SESSION['message'] = "Employee details updated successfully!";
        $response['success'] = true;
        $response['message'] = "Employee details updated successfully!";
    } else {
        $response['success'] = false;
        $response['message'] = "Error: " . mysqli_error($conn);
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
        
        $employeeDetails = array(
            'emp_id' => $row['emp_id'],
            'first_name' => $row['emp_first_name'],
            'last_name' => $row['emp_last_name'],
            'image' => $row['emp_img'],
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
