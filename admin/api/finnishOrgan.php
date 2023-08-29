<?php 
require '../../api/connect.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(!isset($_SESSION['admin_id'])) {
        header('Location: ../index.php');
    } 
    $nomor = intval($_POST['noDonate']);
    $sql = "UPDATE req_donate SET progress = 'finnish' where id = ?";
    $stmt = $pdo->prepare($sql); 
    if($stmt->execute([$nomor])){
        echo 'berhasil';
    }else{
        echo 'gagal';
    }
    // if(mysqli_query($con, "UPDATE donation SET progress = 'finnish' where id = $nomor")){
    //     echo 'berhasil';
    // }else{
    //     echo 'gagal';
    // }
}else{
    header("Location: ../index.php");
}
?>