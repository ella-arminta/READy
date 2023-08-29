<?php 
require 'connect.php';
// button = accept, remove, cancel
// progress = finnish, ongoing, waiting, cancelled
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
        echo $emailErr;
    }else{
        $fname = $_POST['fname'];
        $phone = $_POST['phone'];
        if(is_numeric($_POST['numBooks'])){
            if(intval($_POST['numBooks']) > 0 ){
                $numBooks = intval($_POST['numBooks']);
                $publish = $_POST['pub'];
                if($publish == 'yes'){
                    $publish = 1;
                }else{
                    $publish = 0;
                }
                $sendBooks = $_POST['sendBooks'];
                $msg =$_POST['msg'];
                if($sendBooks == 'other'){
                    $other = $_POST['otherOpt'];
                }else{
                    $other = '';
                }
                $progress = 'waiting';

                $sql = "INSERT INTO donation (id,email,fname,phone,numBooks,pub,sendBy,other,progress,userMsg) VALUES (?,?,?,?,?,?,?,?,?,?)";
                $stmt = $pdo->prepare($sql); 
                if($stmt->execute([null,$email,$fname,$phone,$numBooks,$publish,$sendBooks,$other,$progress,$msg])){
                    echo 'berhasil';
                }else{
                    echo 'gagal';
                }

                // if(mysqli_query($con,"INSERT INTO donation (id,email,fname,phone,numBooks,pub,sendBy,other,progress,userMsg) 
                // VALUES 
                // (null,'$email','$fname','$phone',$numBooks,$publish,'$sendBooks','$other','$progress','$msg')" )){
                //     echo 'berhasil';
                // }else{
                //     echo 'gagal';
                // }
            }
        }
    }
   
    
    
    
}else{
    header("Location: ../index.php");
}


?>