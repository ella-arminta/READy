<?php 
require '../../api/connect.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(!isset($_SESSION['admin_id'])) {
        header('Location: ../index.php');
    } 
    $nomor = intval($_POST['noDonate']);
    $sql = "DELETE FROM donation  where id = ?";
    $stmt = $pdo->prepare($sql); 
    if($stmt->execute([$nomor])){
        echo 'berhasil';
    }else{
        echo 'gagal';
    }
    // if(mysqli_query($con, "DELETE FROM donation where id=$nomor")){
    //     echo 'berhasil';
    // }else{
    //     echo 'gagal';
    // }
}else{
    header("Location: ../index.php");
}
?>