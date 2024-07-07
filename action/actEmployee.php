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
    $payrole=$_POST['payrole'];
    $gender=$_POST['gender'];
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
    function count_name($value) {
        global $conn;
        $count_sql = "SELECT COUNT(*) as count FROM admin_tbl WHERE name='$value' AND status='Active';";
        $result_count = mysqli_query($conn, $count_sql);
        $row = mysqli_fetch_assoc($result_count);
        return $row['count'];
    }

    function generateRandomNumber($username) {
        $name = "$username";
        $num = mt_rand(100, 999);
        $last_user_name = $name . $num;
        return $last_user_name;
    } 
    
    $count = count_name($username);
    if ($count > 0) {
        $rand_name = generateRandomNumber($username);
        $password = generateRandomNumber($username);
        $empuser_sql = "INSERT INTO admin_tbl(name, username, pass, role) VALUES ('$name', '$rand_name', '$password', '$role')";
    } else {
        $password = generateRandomNumber($username);
        $empuser_sql = "INSERT INTO admin_tbl(name, username, pass, role) VALUES ('$name', '$username', '$password', '$role')";
    }
    
    if ($conn->query($empuser_sql) === TRUE) {
        $last_insert_id = $conn->insert_id;

        $emp_sql = "INSERT INTO employee_tbl (entity_id, emp_first_name, emp_last_name, emp_gender, emp_user_id, emp_married_status, emp_img) VALUES (1, '$fname', '$lname', '$gender', '$last_insert_id', '$married_status', '$image_name')";

        if ($conn->query($emp_sql) === TRUE) {
            $last_parent_id = $conn->insert_id;

            $emp_add_sql = "INSERT INTO emp_additional_tbl (emp_id, emp_personal_email, emp_company_email, emp_dob,emp_pay_role, emp_joining_date, emp_role, emp_mobile, emp_address) VALUES ('$last_parent_id', '$pemail', '$cemail', '$dob','$payrole', '$jDate', '$role', '$mobile', '$address')";

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
}
echo json_encode($response);