<?php 
require 'api/connect.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ongoing Events - READy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/e52db3bf8a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/team.css">
    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>
<style>
    .landing .carousel-item img{
    /* height: 100vh; */
    object-fit: cover;
  }
  #carouselExampleSlidesOnly{
    height: 100%;
  }
  .carousel-inner{
    height: 100%;
    object-fit: cover;
  }
  .carousel-item{
    height: 100%;
    width: 100%;
    width: 100vw!important;
    /* height: 100%; */
  }
  .carousel-item img{
    min-width: 100%;
    min-height: 100%;
    object-fit: cover;
    object-position: 50% 50%;
  }
  </style>
<body>
<div class="my-bg-black" style="background-color: #00000070;width:100%;height:100%;position:fixed;top:0;left:0;z-index:2;display: none;"></div>
    <!-- navbar -->
    <nav class="nav">
        <div class="container">
            <div class="row">
                <div class="logo">
                    <a href="#"><img class="ibe-logo"src="assets/images/2020_IBE_LOGO-Vertikal.jpg" alt="Logo IBE"></a>
                </div>
                <span class="navTrigger">
                    <i></i>
                    <i></i>
                    <i></i>
                </span>
            </div>
            <div id="mainListDiv" class="main_list">
                <ul class="navlinks">
                    <li><a href="index.php" >Home</a></li>
                    <li><a href="targets.html">Targets</a></li>
                    <li><a href="activities.php">Activities</a></li>
                    <li><a href="events.php" style="color: var(--orange-dark);">Ongoing Events</a></li>
                    <li><a href="history.html" >History</a></li>
                    <!-- <li><a href="faq.html">Faq</a></li> -->
                    <li><a href="donate.php" class="regist">Donate Now!</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="judulPage">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="assets/images/home3.jpeg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="assets/images/home1.jpeg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="assets/images/home2.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
        </div>
        <div class="layer"></div>
        <h1 class="hidden" data-aos="fade-up"  data-aos-duration="1000">Ongoing Events</h1>
    </div>

    <!-- carousel -->
    <?php 
            $stmt = $pdo->prepare("SELECT * FROM onevents");
            $stmt->execute();
            $i=1;
            ?>
    <?php if($stmt->rowCount() < 1){ ?>
                <div style="width:100%;height:calc(100vh - 71px);display:flex;justify-content:center;align-items:center;">
                    <h1 style="color:var(--blue);background-color:var(--orange);padding:10px;">Coming Soon!</h1>
                </div>
            <?php }else{?>
    <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="false" style="height:100vh;background-color:black">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <?php while($event = $stmt->fetch()){ ?>
                <div class="carousel-item <?php if($i == 1){echo 'active';}; ?>">
                    <img src="assets/images/events/<?= $event['picture']?>" class="d-block w-100" alt="<?= $event['title']?>">
                    <div class="carousel-caption d-none d-md-block">
                        <div style="background-color:white;border-radius:40px;width:60%;margin:auto;padding:10px">
                            <h1 style="color:var(--blue);font-family:'Oswald',serif;"><?= $event['title']?></h1>
                            <p style="font-family:'Oswald',serif"><?=$event['caption']?></p>
                        </div>      
                    </div>
                </div>
            <?php $i++?>
            <?php } ?>
            
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <?php }?>
    <!-- copyright -->
    <div class="copyright">
        <div>
            <h3><i class="fa-solid fa-location-dot"></i> Address</h3>
            <h3>P.621 Building</h3>
            <h3>International Business Engineering</h3>
            <h3>Petra Christian University</h3>
            <h3>Jl. Siwalankerto No.121-131, Siwalankerto, Kec. Wonocolo, Surabaya, East Java 60236</h3>
        </div>
        <div>
            <h3><i class="fa-solid fa-address-book"></i> Contact</h3>
            <h3>tu-ibe@petra.ac.id</h3>
            <h3>+62 822 3319 6920</h3>
        </div>
        <div id="google_translate_element"></div>
    </div>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
        }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/navAnim.js"></script>
    <script>
        $(document).ready(function(){
            setTimeout(function(){
                $('.nav .container').fadeIn();
            },700)
            $('h1.hidden').addClass('show');
            $('h1.hidden').removeClass('hidden');
        })
    </script>
    <script>
        AOS.init();
      </script>
</body>
</html>