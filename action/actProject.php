<?php
include("../db/dbConnection.php");
session_start();


header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];

// Add Employee
if (isset($_POST['hdnAction']) && $_POST['hdnAction'] == 'addEmployee') {
    
      // Ensure all required fields are filled
      $requiredFields = ['pname', 'client', 'developers', 'pemail', 'cemail', 'dob', 'address', 'jDate', 'role', 'ms', 'payrole', 'gender'];
      foreach ($requiredFields as $field) {
          if (!isset($_POST[$field]) || empty($_POST[$field])) {
              $response['message'] = "Please fill all required fields.";
              echo json_encode($response);
              exit();
          }
      }

}