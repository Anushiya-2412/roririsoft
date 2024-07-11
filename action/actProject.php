<?php
include("../db/dbConnection.php");
session_start();


header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];

// Add Employee
if (isset($_POST['hdnAction']) && $_POST['hdnAction'] == 'addProject') {
    
   

      // Ensure all required fields are filled
      $requiredFields = ['pname', 'clientName', 'developers', 'startDate', 'charge','description','programming'];
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
    $clientName=$_POST['clientName'];
    
    $startDate=$_POST['startDate'];
 
    $duration=$_POST['duration'];
    $charge=$_POST['charge'];
    $iniPay=$_POST['iniPay'];
    $proStatus=$_POST['proStatus'];

     // Encode the arrays to JSON
     $developersJson = json_encode($developers);
     $programmingJson = json_encode($programming);

     // Combine clientName and clientAddress into an associative array
    
 
   $insQuery="INSERT INTO `project_tbl`(`project_name`, `programming`, `developers`, `client`, `start_date`,  `duration`, `inital_pay`, `total_pay`, `description`,`project_status`) VALUES ('$projectName','$programmingJson','$developersJson','$clientName','$startDate','$duration','$iniPay','$charge',' $projectDescription','$proStatus')";
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

//Handles Fetching the employee details for editing 
if (isset($_POST['editPro']) && $_POST['editPro'] != '') {
    $editPro = $_POST['editPro'];

    $projectFetch="SELECT * FROM project_tbl WHERE project_id='$editPro' AND status='Active'";
    $fetchResult = mysqli_query($conn, $projectFetch);
    
    if ($fetchResult) {

        $row = mysqli_fetch_assoc($fetchResult);
        
        $projectDetails = array(
            'pro_id' => $row['project_id'],
            'project_name' => $row['project_name'],
            'description' => $row['description'],
            'programming' => $row['programming'],
            'developers' => $row['developers'],
            'iniPay' => $row['inital_pay'],
            'pro_status' => $row['project_status'],
            'charge' => $row['total_pay'],
            'startDate' => $row['start_date'],
            'duration'=>$row['duration'],
            'client'=>$row['client'],
            
        


        );
        echo json_encode($projectDetails);
    } else {
        $response['message'] = "Error executing query: " . mysqli_error($conn);
        echo json_encode($response);
    }
    exit();
}

