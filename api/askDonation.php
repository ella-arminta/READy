<?php 
include 'connect.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
        echo $emailErr;
    }else{
        $name =$_POST['name'];
        $phone = $_POST['phone'];
        if(is_numeric($_POST['numBooks'])){
            if(intval($_POST['numBooks']) > 0 ){
                $msg = $_POST['msg'];
                $numBooks = intval($_POST['numBooks']);
                $addr =$_POST['addr'];
                $cat = $_POST['cat'];

                $sql = "INSERT INTO req_donate (id,organization_name,`address`,email_addr,phone,books,categories,msg,progress) VALUES (?,?,?,?,?,?,?,?,?)";
                $stmt = $pdo->prepare($sql); 
                if($stmt->execute([null,$name,$addr,$email,$phone,$numBooks,$cat,$msg,'waiting'])){
                    echo 'berhasil';
                }else{
                    echo 'gagal';
                }
            }
        }
    }
   
    
    
    
}else{
    header("Location: ../index.php");
}



?>