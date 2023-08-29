<?php
require '../api/connect.php';
$tdkTerdaftar="none";
$passSalah ="none";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $pass = $_POST['password'];
    // cari akun
    $stmt = $pdo->prepare("SELECT * FROM `admin` WHERE email = ?");
    $stmt->execute([$email]);
    $rowcount = $stmt->rowCount();
    // $result = mysqli_query($con, "SELECT * FROM `admin` WHERE email = '$email'");
    if ($rowcount<=0){
        $tdkTerdaftar = "";
    }else{
        $stmt = $pdo->prepare("SELECT * FROM `admin` WHERE email = ? and account_activated = ?");
        $stmt->execute([$email,1]);
        $rowcount = $stmt->rowCount();
        // $result = mysqli_query($con, "SELECT * FROM `admin` WHERE email = '$email' and account_activated = 1");
        if($rowcount<=0){
            echo "
            <script>
            alert('Account is not activate. Please contact admin to activate your account.')
            window.location.replace('index.php');
            </script>";
        }else{
            // The hashed password retrieved from database
        
        $obj =  $stmt->fetch(PDO::FETCH_OBJ);
        $hash = $obj->password;
        // Verify the hash against the password entered
        $verify = password_verify($pass, $hash);
        // Print the result depending if they match
        if ($verify) {
            // setcookie("admin_id", $obj->id, time() + 3600*2);
            $_SESSION['admin_id'] = $obj->id;
            echo "
            <script>
            alert('Login Success!')
            window.location.replace('main.php');
            </script>";
        } else {
            $passSalah="";
        }
    
        } 
    }

}
?>
<style>
.emailtdkDaftar{
    color:red;
    font-size:12px;
    display:<?php echo $tdkTerdaftar?>;
}
.passSalah{
    color:red;
    font-size:12px;
    display:<?php echo $passSalah?>;
}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<body>
    <h1>Login Admin</h1>
    <form action="index.php" method="POST">
        <label for="email">Email :</label>
        <input type="email" name="email" class="email" id="email" required>
        <p class="emailtdkDaftar">Email tidak terdaftar</p>
        <label for="password">Password :</label>
        <input type="password" name="password" class="password" id="password" required>
        <p class="passSalah">Password Salah</p>
        <button type="submit">Login</button>
    </form>
    <a href="../index.php">Main Website</a>
</body>
</html>