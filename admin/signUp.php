<?php
require '../api/connect.php';
//if(!isset($_SESSION['admin_id'])) {
//    header('Location: index.php');
//} 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['fname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $hash = password_hash($pass, PASSWORD_DEFAULT);
    // cek email udh ada belom
    // $result = mysqli_query($con, "SELECT * FROM `admin` WHERE email = '$email'");
    $stmt = $pdo->prepare("SELECT * FROM `admin` WHERE email = ?");
    $stmt->execute([$email]);
    $rowcount = $stmt->rowCount();

    if($rowcount>0){
        echo "
            <script>
            alert('Account already created. Please login or wait for account to be activated by admin.')
            window.location.href = 'index.php'
            </script>";
    }else{
        $sql = "INSERT INTO admin (email,`password`,phone,account_activated,fullname) VALUES (?,?,?,?,?)";
        $stmt = $pdo->prepare($sql); 
        if($stmt->execute([$email,$hash,$phone,0,$name])){
            echo "
            <script>
            alert('Account succesfully created. Please wait for account to be activated by admin.');
            window.location.href = 'index.php'
            </script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Account READy</title>
    <link rel="icon" href="assets/images/2020_IBE_LOGO-Vertikal.jpg" type="image/x-icon">
</head>
<body>
    <h1>READy Admin Sign Up</h1>
    <form action="signUp.php" method="post">
        <label for="fname">Full Name :</label>
        <input type="text" name="fname" class="fname" id="fname" required>
        <label for="phone">Phone Number :</label>
        <input type="text" name="phone" class="phone" id="phone" required>
        <label for="email">Email :</label>
        <input type="email" name="email" class="email" id="email" required>
        <label for="password">Password :</label>
        <input type="password" name="password" class="password" id="password" required>
        <button type="submit">Sign Up</button>
    </form>
</body>
</html>