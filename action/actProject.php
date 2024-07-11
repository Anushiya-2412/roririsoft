<?php
include("../db/dbConnection.php");
session_start();


header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];

// Add Employee
if (isset($_POST['hdnAction']) && $_POST['hdnAction'] == 'addProject') {
    
   

      // Ensure all required fields are filled
      $requiredFields = ['pname', 'client', 'developers', 'startDate', 'endDate', 'charge','description','clientAddress','programming'];
      foreach ($requiredFields as $field) {
          if (!isset($_POST[$field]) || empty($_POST[$field])) {
              $response['message'] = "Please fill all required fields.";
              echo json_encode($response);
              exit();
          }
      }
    $projectName=$_POST['pname'];
    $projectDescription=$_POST['description'];
    // $developers = implode(',', $_POST['developers']);
    $developers = $_POST['developers']; 
    $programming = $_POST['programming'];
    // $programming = implode(',', $_POST['programming']);
    $clientName=$_POST['client'];
    $clientAddress=$_POST['clientAddress'];
    $startDate=$_POST['startDate'];
    $endDate=$_POST['endDate'];
    $duration=$_POST['duration'];
    $charge=$_POST['charge'];
    $iniPay=$_POST['iniPay'];
    $proStatus=$_POST['proStatus'];

     // Encode the arrays to JSON
     $developersJson = json_encode($developers);
     $programmingJson = json_encode($programming);

     // Combine clientName and clientAddress into an associative array
    $clientInfo = [
        'name' => $clientName,
        'address' => $clientAddress
    ];

    // Encode the client information as JSON
    $clientJson = json_encode($clientInfo);
 
   $insQuery="INSERT INTO `project_tbl`(`project_name`, `programming`, `developers`, `client`, `start_date`, `end_date`, `duration`, `inital_pay`, `total_pay`, `description`,`project_status`) VALUES ('$projectName','$programmingJson','$developersJson','$clientJson','$startDate','$endDate','$duration','$iniPay','$charge',' $projectDescription','$proStatus')";
   if ($conn->query($insQuery) === TRUE) {
    $response['success'] = true;
    $response['message'] = "Project details added successfully!";
} else {
    $response['message'] = "Unexpected error in adding Project details! " . $conn->error;
}
echo json_encode($response);
exit();
}
//Handles the delete a project

// Handle deleting a Employee
if (isset($_POST['deleteId'])) {
    $id = $_POST['deleteId'];
    $queryDel = "UPDATE `project_tbl` SET status='Inactive'
    WHERE project_id='$id'";
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
