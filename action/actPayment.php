<?php

include("C:\\xampp\\htdocs\\ERP\\db\\dbConnection.php");
session_start();


header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];

//Handles Add the payment details 
if (isset($_POST['hdnAction']) && $_POST['hdnAction'] == 'addPayment') {

    // // Ensure all required fields are filled
    // $requiredFields = ['proName', 'overAmnt', 'amntReceived', 'balance', 'date','payMode','received'];
    // foreach ($requiredFields as $field) {
    //     if (!isset($_POST[$field]) || empty($_POST[$field])) {
    //         $response['message'] = "Please fill all required fields.";
    //         echo json_encode($response);
    //         exit();
    //     }
    // }
     $pId=$_POST['proId'];
    // $pro_name=$_POST['proName'];
    // $total=$_POST['overAmnt'];
    //$amntReceived=$_POST['amntReceived'];
    $balance=$_POST['balance'];
    $date=$_POST['date'];
    $payMode=$_POST['payMode'];
    
    $receivedBy=$_POST['received'];

    // $selIni="SELECT overall_received FROM `project_tbl` WHERE project_id='$pId'";
    // $iniResult=mysqli_query($conn,$selIni);
    // if($iniResult){
    //     $row=mysqli_fetch_array($iniResult);

    //     $preAmnt=$row['overall_received'];
    // }

    // $addReceived=$preAmnt+$amntReceived;

    // $updIni="UPDATE `project_tbl` SET `overall_received`='$addReceived' WHERE project_id='$pId'";
    // $resUpd=mysqli_query($conn,$updIni);

    $insertPayment="INSERT INTO `project_amount`(`project_id`, `amnt_received`, `pay_date`, `pay_mode`, `received_by`) VALUES ('$pId','$balance','$date','$payMode','$receivedBy')";
    if ($conn->query($insertPayment) === TRUE) {
        $response['success'] = true;
        $response['message'] = "Payment details added successfully!";
    } else {
        $response['message'] = "Unexpected error in adding Payment details! " . $conn->error;
    }
    echo json_encode($response);
    exit();

}

//Handles Fetching the payment details for viewing 
if (isset($_POST['proId']) && $_POST['proId'] != '') {
    $proId = $_POST['proId'];

    $projectName="SELECT project_tbl.*,SUM(amnt_received) FROM  project_tbl
LEFT JOIN project_amount ON project_amount.project_id=project_tbl.project_id
WHERE project_tbl.project_id='$proId'";
    $fetchRes = mysqli_query($conn, $projectName);
    
    if ($fetchRes) {

        $row = mysqli_fetch_assoc($fetchRes);
        
        $projectDetails = array(
            'pro_id' => $row['project_id'],
            'project_name' => $row['project_name'],
            'iniPay' => $row['SUM(amnt_received)'],
            'pro_status' => $row['project_status'],
            'charge' => $row['total_pay'],
            

        );
        echo json_encode($projectDetails);
    } else {
        $response['message'] = "Error executing query: " . mysqli_error($conn);
        echo json_encode($response);
    }
    exit();
}

//Handles Updating the payment Details

if (isset($_POST['hdnAction']) && $_POST['hdnAction'] == 'editPayment') {
    $editPayId=$_POST['editPayId'];
    
    $paid=$_POST['balanceE'];
    $payModeE=$_POST['payModeE'];
    $dateE=$_POST['dateE'];
    $receivedE=$_POST['receivedE'];
   
        // Update Project details in database
        $editPay = "UPDATE `project_amount`
         SET `amnt_received`='$paid',
         `pay_date`='$dateE',
         `pay_mode`='$payModeE',
         `received_by`='$receivedE'
          WHERE pro_amt_id='$editPayId'";

                
                $editRes = mysqli_query($conn, $editPay);

            if ($editRes) {
                $_SESSION['message'] = "Project details updated successfully!";
                $response['success'] = true;
                $response['message'] = "Project details updated successfully!";
            } else {
                $response['success'] = false;
                $response['message'] = "Error updating database: " . mysqli_error($conn);
            }

            echo json_encode($response);
            exit();
}




//Handles Fetching the payment Detatils for editing

if(isset($_POST['editPayId']) && $_POST['editPayId']!=''){
    
    $payE=$_POST['editPayId'];

    $paySel="SELECT project_tbl.*, project_amount.*
            FROM project_amount
            LEFT JOIN project_tbl ON project_tbl.project_id=project_amount.project_id
            WHERE project_amount.pro_amt_id='$payE'";
    $fetchpay = mysqli_query($conn, $paySel);
    if($fetchpay){

        $rowPay=mysqli_fetch_array($fetchpay);

        $payDetails=array(
            'pay_amt_id'=>$rowPay['pro_amt_id'],
            'pro_name'=>$rowPay['project_name'],
            // 'over_pay'=>$rowPay['overall_received'],
            'total_pay'=>$rowPay['total_pay'],
            'amnt_paid'=>$rowPay['amnt_received'],
            'receivedBy'=>$rowPay['received_by'],
            'date'=>$rowPay['pay_date'],
            'payModeE'=>$rowPay['pay_mode'],

        );
        echo json_encode($payDetails);
    } else {
        $response['message'] = "Error executing query: " . mysqli_error($conn);
        echo json_encode($response);
    }
    exit();
    }

 




?>