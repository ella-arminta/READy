<?php 
include "api/connect.php";
$stmt = $pdo->prepare("SELECT * FROM donation where progress = ?");
$stmt->execute(['finnish']);
$jum = $stmt->rowCount();
$orangs = $pdo->prepare("SELECT fname FROM donation where progress = ? and pub = ?");
$orangs->execute(['finnish',1]);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Our Activities- READy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/e52db3bf8a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/projects.css">
    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- names -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <link rel="icon" href="assets/images/2020_IBE_LOGO-Vertikal.jpg" type="image/x-icon">
</head>
<style>
  .landing .carousel-item img{
  /* height: 100vh; */
  object-fit: cover;
}
#carouselExampleSlidesOnly{
  height: 100%;
  width: 100%;
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
                    <li><a href="index.php">Home</a></li>
                    <li><a href="targets.html">Targets</a></li>
                    <li><a href="activities.php" style="color: var(--orange-dark);">Activities</a></li>
                    <li><a href="events.php">Ongoing Events</a></li>
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
        <h1 class="hidden" data-aos="fade-up"  data-aos-duration="1000">Activities</h1>
    </div>
    <!-- Start of Page -->
    <section class="wedo">
        <div>
            <h1 data-aos="fade-up"data-aos-offset="300"><b>What We Do?</b></h1>
            <p data-aos="fade-up" data-aos-offset="300">We collect, sort, and ship books to the villages in Indonesia to help children who cannot afford to buy books.  Schools are also often poorly resourced and a single book can be shared between many pupils.  We also create mini-libraries for the school in the village. </p>
        </div>
        <div>
            <img src="assets/images/donate.jpg" alt="">
        </div>
    </section>
    <section class="sometimes">
        <div>
            <img src="assets/images/project2.png" alt="">
        </div>
        <div>
            <h1 data-aos="fade-up" data-aos-offset="300"><b>Another Action</b></h1>
            <p data-aos="fade-up" data-aos-offset="220">We also sometimes pay a visit to several village where our Library located. To maintain the usage of the library</p>
        </div>
    </section>
    <?php if ($orangs->rowCount() > 0){?>
    <section class="thanku" id="thanku" data-aos="fade-up"  data-aos-offset="220">
        <div class="othercontainer">
        <h2 >Thank you for <?php echo $jum ?> generous people that have donated</h2>
            <div class="names slider">
                <?php while ($orang = $orangs->fetch()){ ?>
                    <div class="slide"><h1> <?= $orang['fname']; ?></h1></div>
                <?php } ?>
            </div>
        </div>
    </section>
    <?php } ?>
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
    <!-- <script src="js/jquery-3.6.0.min.js"></script> -->
    <script src="js/navAnim.js"></script>
    <script>
        $(document).ready(function(){
            setTimeout(function(){
                $('.nav .container').fadeIn();
            },700)
            $('h1.hidden').addClass('show');
            $('h1.hidden').removeClass('hidden');
            $('.names').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 1500,
                arrows: false,
                dots: false,
                pauseOnHover:false,
                responsive: [{
                    breakpoint: 768,
                    setting: {
                        slidesToShow:4
                    }
                }, {
                    breakpoint: 520,
                    setting: {
                        slidesToShow: 3
                    }
                }]
            });
        })
    </script>
    <script>
        AOS.init();
      </script>
</body>
</html>
