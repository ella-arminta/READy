<?php
require '../api/connect.php';
if(!isset($_SESSION['admin_id'])) {
    header('Location: index.php');
} 
$id = $_SESSION['admin_id'];
$sql = "SELECT * FROM `admin` WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$nama = $stmt->fetch();
$table_co = 1;
?>

<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['submit']) && $_POST['submit'] == 'Post'){
        $title = $_POST['title'];
    $caption = $_POST['caption'];
    $target_dir = "../assets/images/events/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $img_name = basename($_FILES["image"]["name"]);
    // $vn_name = "hehehe tes";
    $image = basename($_FILES['image']['name']);
    $msg = "-";
    $vn = "-";
    $file = "-";

    if($img_name != ""){
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "<script>
            alert('Failed to upload image');
            window.location.href='postEvents.php';
            </script>";
        } else {
            $sql = "INSERT INTO `onevents` (id,title,caption,picture) VALUES (?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([null,$title,$caption,$img_name]);

            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                // chmod('/home/genta/public_html/Rakhir-main/asset'.$vn, 644); 
                echo "<script>
                alert('Event Posted');
                window.location.href='postEvents.php';
                </script>";

            } else {
                // echo "<script>
                // alert('Failed to upload');
                // window.location.href='postEvents.php';
                // </script>";
            }
        }    
    }
    }
    if($_POST['submit'] == 'Delete'){
        $eventId = $_POST['eventId'];
        $stmt = $pdo->prepare("DELETE FROM onevents WHERE id = ?");
        if($stmt->execute([$eventId])){
            echo '<script>alert("Event deleted")</script>';
        }else{
            echo '<script>alert("Failed to delete")</script>';
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
    <title>Post Ongoing Events</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <!-- fontawesome -->
  <script src="https://kit.fontawesome.com/e52db3bf8a.js" crossorigin="anonymous"></script>
</head>
<style>
    .navbar-nav {
    width: 100%;
    margin-right: 30px;
    display: flex;
    justify-content: flex-end;
  }

  .nav-item {
    text-align: center;
  }

  h1 {
    margin-top: 50px;
    text-align: center;
  }

  h3 {
    margin: 30px 30px;
    font-weight: bold;
  }

  h1 {
    text-decoration: underline;
  }

  .swal2-styled.swal2-confirm {
    background-color: red;
  }
</style>
<body>
    <!-- navbar -->
  <nav class="navbar navbar-expand-lg  navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="https://getbootstrap.com/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24">
        Welcome, <?php echo $nama['fullname']?>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav  mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="main.php"><i
                class="fa-solid fa-circle-dollar-to-slot"></i> Donation</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" aria-current="page" href="organizations.php"><i class="fa-solid fa-building"></i> Organizations</a>
          </li>
          <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="postEvents.php"><i class="fa-solid fa-calendar"></i> Ongoing Events</a>
                </li>
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="adminSettings.php"><i
                class="fa-solid fa-screwdriver-wrench"></i> Admin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="api/logout.php"><i
                class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
    <h1>Post Ongoing Events</h1>
    <div class='container'>
        <form action="postEvents.php" method="post" enctype="multipart/form-data">
            <label for="title">Title : </label>
            <input type="text" name='title' id='title' required>

            <label for="caption">Caption : </label>
            <input type="text" name='caption' id='caption' required>

            <label for="picture">Picture : </label>
            <input type='file' id="img" name="image" accept="image/*" required>

            <input type="submit" value="Post" name="submit">
        </form>
        <p style="color:red;text-align:center;">Perhatian : nama picture tidak boleh ada yang sama!</p>
    </div>

    <!-- Events -->
    <h1>Ongoing Events</h1>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Caption</th>
                <th scope="col">Picture</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $events = $pdo->prepare("SELECT * FROM onevents");
                $events->execute();
                while($event = $events->fetch()){ ?>
                    <tr>
                        <th scope="row"><?= $table_co ?></th>
                        <td><?= $event['title'] ?></td>
                        <td><?= $event['caption']?></td>
                        <td><img src="../assets/images/events/<?= $event['picture'] ?>" style="width:30%" alt=""></td>
                        <td>
                            <form action="postEvents.php" method="post">
                            <input type="text" style="display:none;" name="eventId" value="<?=$event['id'] ?>">
                            <input type="submit" name="submit" value="Delete" class="btn btn-danger"></input>
                            </form>
                        </td>
                    </tr>
                    <?php $table_co++; ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>