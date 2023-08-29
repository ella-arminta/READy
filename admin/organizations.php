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

$sql = "SELECT * FROM req_donate where progress = ?";
$data_waiting = $pdo->prepare($sql);
$data_waiting->execute(['waiting']);

$sql = "SELECT * FROM req_donate where progress = ?";
$data_ongoing = $pdo->prepare($sql);
$data_ongoing->execute(['ongoing']);

$sql = "SELECT * FROM req_donate where progress = ?";
$data_finnish = $pdo->prepare($sql);
$data_finnish->execute(['finnish']);

// $result = mysqli_query($con, "SELECT * FROM `admin` WHERE id = '$id'");
// $user = mysqli_fetch_object($result);
// $data_waiting = mysqli_query($con,"SELECT * FROM req_donate where progress = 'waiting'");
$table_co = 1;
$table_on = 1;
$table_fi = 1;
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>READy admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <!-- fontawesome -->
  <script src="https://kit.fontawesome.com/e52db3bf8a.js" crossorigin="anonymous"></script>
  <!-- Data tables lib -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
  </script>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>

  <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

  <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
  <link rel="icon" href="assets/images/2020_IBE_LOGO-Vertikal.jpg" type="image/x-icon">

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
          <li class="nav-item active">
            <a class="nav-link active" aria-current="page" href="organizations.php"><i class="fa-solid fa-building"></i> Organizations</a>
          </li>
          <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="postEvents.php"><i class="fa-solid fa-calendar"></i> Ongoing Events</a>
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
  <h1>Ask For Donation</h1>

  <div class="container" id="waitinglist">
    <h3>Waiting list</h3>
    <table class="table table-stripped" id="data-maba">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Organization Name</th>
          <th scope="col">Address</th>
          <th scope="col">Email</th>
          <th scope="col">Phone</th>
          <th scope="col">Number of Books needed</th>
          <th scope="col">Book Categories</th>
          <th scope="col">Message</th>
          <th scope="col">Progress</th>
          <th scope="col">Register Time</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php while($donate = $data_waiting->fetch()):?>
        <tr class="<?php echo $donate['id']?>">
          <th scope="row"><?= $table_co; ?></th>
          <td><?= $donate['organization_name']; ?></td>
          <td><?= $donate['address']; ?></td>
          <td><?= $donate['email_addr'] ;?></td>
          <td>+62 <?= $donate['phone'] ?></td>
          <td><?= $donate['books']?></td>
          <td><?= $donate['categories']?></td>
          <td><?= $donate['msg']?></td>
          <td><?= $donate['progress'] ?></td>
          <td><?= $donate['timestamp'] ?></td>
          <td>
            <div style="display:flex">
              <button type="button" onclick="acceptOrgan(<?php echo $donate['id']?>)"
                class="btn btn-primary">Accept</button>
              <button type="button" onclick="removeOrgan(<?php echo $donate['id']?>)"
                class="btn btn-danger">Delete</button>
            </div>
          </td>
        </tr>
        <?php $table_co++; ?>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
  <div class="container" id="ongoinglist">
    <h3>Ongoing list</h3>
    <table class="table table-stripped" id="data-maba">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Organization Name</th>
          <th scope="col">Address</th>
          <th scope="col">Email</th>
          <th scope="col">Phone</th>
          <th scope="col">Number of Books needed</th>
          <th scope="col">Book Categories</th>
          <th scope="col">Message</th>
          <th scope="col">Progress</th>
          <th scope="col">Accepted Time</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php while($donate = $data_ongoing->fetch()):?>
        <tr class="<?php echo $donate['id']?>">
          <th scope="row"><?= $table_on; ?></th>
          <td><?= $donate['organization_name']; ?></td>
          <td><?= $donate['address']; ?></td>
          <td><?= $donate['email_addr'] ;?></td>
          <td>+62 <?= $donate['phone'] ?></td>
          <td><?= $donate['books']?></td>
          <td><?= $donate['categories']?></td>
          <td><?= $donate['msg']?></td>
          <td><?= $donate['progress'] ?></td>
          <td><?= $donate['timestamp'] ?></td>
          <td>
            <div style="display:flex">
              <button type="button" onclick="finnishOrgan(<?php echo $donate['id']?>)"
                class="btn btn-primary">Finnish</button>
              <button type="button" onclick="cancelOrgan(<?php echo $donate['id']?>)"
                class="btn btn-danger">Waiting</button>
            </div>
          </td>
        </tr>
        <?php $table_on++; ?>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
  <div class="container" id="ongoinglist">
    <h3>Finnished list</h3>
    <table class="table table-stripped" id="data-maba">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Organization Name</th>
          <th scope="col">Address</th>
          <th scope="col">Email</th>
          <th scope="col">Phone</th>
          <th scope="col">Number of Books needed</th>
          <th scope="col">Book Categories</th>
          <th scope="col">Message</th>
          <th scope="col">Progress</th>
          <th scope="col">Finnished Time</th>
        </tr>
      </thead>
      <tbody>
        <?php while($donate = $data_finnish->fetch()):?>
        <tr class="<?php echo $donate['id']?>">
          <th scope="row"><?= $table_fi; ?></th>
          <td><?= $donate['organization_name']; ?></td>
          <td><?= $donate['address']; ?></td>
          <td><?= $donate['email_addr'] ;?></td>
          <td>+62 <?= $donate['phone'] ?></td>
          <td><?= $donate['books']?></td>
          <td><?= $donate['categories']?></td>
          <td><?= $donate['msg']?></td>
          <td><?= $donate['progress'] ?></td>
          <td><?= $donate['timestamp'] ?></td>
        </tr>
        <?php $table_fi++; ?>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script>
    $(document).ready(function () {
      // $("#fetch-data-panitia").addClass("active");
      $('#data-maba thead th').each(function () {
        var title = $(this).text();
        $(this).html(title + '<input class="form-control" type="text" placeholder="Search ' + title + '" />');
      });

      var t = $('table').DataTable({
        dom: 'Blfrtip',
        buttons: [{
            extend: 'excel',
            // exportOptions: {
            //   columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11 ]
            // }
          },
          {
            extend: 'pdf',
            // exportOptions: {
            //   columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11 ]
            // }
          },
          {
            extend: 'print',
            // exportOptions: {
            //   columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11 ]
            // }
          }


        ],
        "lengthMenu": [
          [10, 25, 50, -1],
          [10, 25, 50, "All"]
        ],
        "scrollX": true,
        "order": [
          [0, "asc"]
        ],

        initComplete: function () {
          this.api()
            .columns()
            .every(function () {
              var that = this;

              $('input', this.header()).on('keyup change clear', function () {
                if (that.search() !== this.value) {
                  that.search(this.value).draw();
                }
              });
            });
        },
      });
    })
  </script>
  <script>
    function acceptOrgan(id) {
      $.ajax({
        type: 'POST',
        url: 'api/acceptOrgan.php',
        data: {
          noDonate: id,
        },
        success: function (data) {
          if (data == 'berhasil') {
            Swal.fire({
              icon: "success",
              timer: 2000,
              title: 'Request Accepted',
              showCancelButton: false,
              showConfirmButton: false,
              timerProgressBar: true,
              html: `${'Organization will be moved to ongoing list'}<br/><br/>`,
            });
            setTimeout(function () {
              location.reload();
              return false;
            }, 2000)
          } else {
            alert('Something went wrong')
          }
        }
      })
    }
    function removeOrgan(id) {
      Swal.fire({
        title: 'Are you sure to remove donation forever',
        showDenyButton: false,
        showCancelButton: true,
        confirmButtonText: 'remove',
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          $.ajax({
            type: 'POST',
            url: 'api/removeOrgan.php',
            data: {
              noDonate: id,
            },
            success: function (data) {
              if (data == 'berhasil') {
                Swal.fire({
                  icon: "success",
                  timer: 2000,
                  title: 'Request Removed/Deleted',
                  showCancelButton: false,
                  showConfirmButton: false,
                  timerProgressBar: true,
                  html: `${'Request removed from waiting list'}<br/><br/>`,
                });
                setTimeout(function () {
                  location.reload();
                  return false;
                }, 2000)
              } else {
                alert('Something went wrong')
              }
            }
          })
        } else if (result.isDenied) {
          Swal.fire('Donation data not deleted', '', 'info')
        }
      })
    }
    function finnishOrgan(id) {
      $.ajax({
        type: 'POST',
        url: 'api/finnishOrgan.php',
        data: {
          noDonate: id,
        },
        success: function (data) {
          if (data == 'berhasil') {
            Swal.fire({
              icon: "success",
              timer: 2000,
              title: 'Request Finnished',
              showCancelButton: false,
              showConfirmButton: false,
              timerProgressBar: true,
              html: `${'Donation has been received by the organization'}<br/><br/>`,
            });
            setTimeout(function () {
              location.reload();
              return false;
            }, 2000)
          } else {
            alert('Something went wrong')
          }
        }
      })
    }
    function cancelOrgan(id) {
      Swal.fire({
        title: 'Put Back Organization to waiting list?',
        showDenyButton: false,
        showCancelButton: true,
        confirmButtonText: 'Put Back to Waiting',
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          $.ajax({
            type: 'POST',
            url: 'api/cancelOrgan.php',
            data: {
              noDonate: id,
            },
            success: function (data) {
              if (data == 'berhasil') {
                Swal.fire({
                  icon: "success",
                  timer: 2000,
                  title: 'Organizaiton successfully put back to waiting list',
                  showCancelButton: false,
                  showConfirmButton: false,
                  timerProgressBar: true,
                  html: `${'Organization removed from ongoing list and displayed in waiting list'}<br/><br/>`,
                });
                setTimeout(function () {
                  location.reload();
                  return false;
                }, 2000)
              } else {
                alert('Something went wrong')
              }
            }
          })
        } else if (result.isDenied) {
          Swal.fire('Donation data not deleted', '', 'info')
        }
      })

    }
  </script>
  <style>
    .swal2-styled.swal2-confirm {
      background-color: red;
    }
  </style>
</body>

</html>