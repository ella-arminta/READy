<?php 
include 'connect.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
        echo $emailErr;
    }else{
        // cek email udh ada belum?
        $stmt = $pdo->prepare("SELECT * FROM `wantupdate` WHERE email = ?");
        $stmt->execute([$email]);
        $rowcount = $stmt->rowCount();
        if($rowcount > 0){
            echo 'email sdh terdaftar';
        }else{
            $stmt = $pdo->prepare("INSERT INTO wantupdate (id,email) value (?,?)");
            if($stmt->execute([null,$email])){
                echo "berhasil";
            }else{
                echo 'tidak berhasil';
            }
            
        }
    }
}else{
    header("Location: ../index.php");
}
?>