<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>READy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/home.css">
    <script src="https://kit.fontawesome.com/e52db3bf8a.js" crossorigin="anonymous"></script>
    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>

<body>
    <div class="my-bg-black" style="background-color: #00000070;width:100%;height:100%;position:fixed;top:0;left:0;z-index:2;display: none;"></div>
    <!-- navbar -->
    <nav class="nav">
        <div class="container">
            <div class="row">
                <div class="logo">
                    <a href="https://ibecsr.petra.ac.id/"><img class="ibe-logo"src="assets/images/2020_IBE_LOGO-Vertikal.jpg" alt="Logo IBE"></a>
                </div>
                <span class="navTrigger">
                    <i></i>
                    <i></i>
                    <i></i>
                </span>
            </div>
            <div id="mainListDiv" class="main_list">
                <ul class="navlinks">
                    <li><a href="index.php" style="color: var(--orange-dark);">Home</a></li>
                    <li><a href="targets.html">Targets</a></li>
                    <li><a href="activities.php">Activities</a></li>
                    <li><a href="events.php">Ongoing Events</a></li>
                    <li><a href="history.html" >History</a></li>
                    <!-- <li><a href="faq.html">Faq</a></li> -->
                    <li><a href="donate.php" class="regist">Donate Now!</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Logo Section -->
    <section class="landing">
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
        <h1 class="title hidden ">READy</h1>
        <h3 class="desc hidden effect-underline">Be ready to spread kindness which can change others life</h3>
        <button class="down"><i class="fa-solid fa-arrow-down fa-2xl"></i></button>
    </section>
    <!-- QUOTE -->
    <div class="quote">
        <div id="wrapper">
            <div id="typewriter">
              <h1>"ALONE WE CAN DO SO LITTLE, TOGETHER WE CAN DO SO MUCH"</h1>
            </div>
          </div>
        <p>- Helen Keler -</p>
    </div>
    <!-- WHAT DO WE DO -->
    <section class="whatwedo">
        <h1 data-aos="fade-up" data-aos-offset="300">What is READy?</h1>
        <p data-aos="fade-up" data-aos-offset="300">READy is the book donation and library development charity held by International Business Engineering. Every period we give the opportunity to those who are less fortunate by providing brand new books or good condition second-hand books is still good to several libraries in schools located in the village.</p>
    </section>
    <section class="our">
        <div>
            <figure class="snip0024" data-aos="fade-right" data-aos-offset="300">
                <img src="assets/images/activities1.png" alt="sample29"/>
                <div>
                    <h2>Our Activities</h2>		
                    <i class="fa-solid fa-arrow-right-long"></i>
                    <div class="curl"></div>
                    <a href="activities.php"></a>
                </div>				
            </figure>
        </div>
        <div>
            <figure class="snip0024 hover" data-aos="fade-left" data-aos-offset="300">
                <img src="assets/images/targets1.jpg" alt="sample42"/>
                <div>
                    <h2>Our Targets</h2>
                    <i class="fa-solid fa-arrow-right-long"></i>		
                    <div class="curl"></div>
                    <a href="targets.html"></a>
                </div>				
            </figure>
        </div>
        <div>
            <figure class="snip0024" data-aos="fade-right" data-aos-offset="300">
                <img src="assets/images/liveEvents1.png" alt="sample31"/>
                <div>		
                    <h2>Ongoing Events</h2>	
                    <i class="fa-solid fa-arrow-right-long"></i>
                    <div class="curl"></div>
                    <a href="events.php"></a>
                </div>			
            </figure>
            <!-- <h1 class="headline">Our Live Events</h1>
            <p></p>
            <img src="assets/images/liveEvents1.png" alt="" class="ourimages"> -->
        </div>
    </section>
    
    <!-- choose  -->
    <section class="splitSc">
        <div class="donate">
            <img src="assets/images/givebooks.jpg" alt="">
            <h1>Give Books</h1>
            <a href="donate.php"><button>Donate Now!</button></a>
        </div>
        <div class="ask">
            <img src="assets/images/getbooks.jpg" alt="">
           <h1>Need Books</h1>
           <a href="askDonate.php"><button>Ask for Donation</button></a>
        </div>
    </section>
    <!-- stay uptodate -->
    <div class="update" data-aos="fade-up" data-aos-offset="100" style="margin:40px auto">
        <h1>Sign Up Email to <u>Stay Up To Date</u> !</h1>
        <form method="post" style="display:flex;flex-direction:column;" class="updateForm">
            <input type="email" name="email" id="email" style="height: 35px;padding: 10px;margin-top: 10px;font-size:20px" placeholder="Type Your Email Here" required>
            <button class="snip1245 email" type="submit">
                Email Me!
                <i class="fa-solid fa-envelope-open"></i>
            </button>
        </form>
    </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/navAnim.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $('.splitSc div.donate a').on('mouseenter',function(){
            $('.splitSc div.donate img').css('transform','scale(1.2) rotate(10deg)')
        })
        $('.splitSc div.donate a').on('mouseleave',function(){
            $('.splitSc div.donate img').css('transform','scale(1)')
        })
        $('.splitSc div.ask a').on('mouseenter',function(){
            $('.splitSc div.ask img').css('transform','scale(1.2) rotate(10deg)')
        })
        $('.splitSc div.ask a').on('mouseleave',function(){
            $('.splitSc div.ask img').css('transform','scale(1)')
        })
        $('.updateForm').on('submit',function(e){
            e.preventDefault();
            $.ajax({
                type:"POST",
                url: 'api/emailUpdate.php',
                data: $('.updateForm').serialize(),
                success: function(hasil){
                    if(hasil == 'email sdh terdaftar'){
                        $(".updateForm").html("<h1>Email already registered</h1>");
                        $('.updateForm button').css('display','none');
                        $('.updateForm input').css('display','none');
                    }else if(hasil == 'berhasil'){
                        $(".updateForm").html("<h1>Email successfully registered</h1>");
                        $('.updateForm button').css('display','none');
                        $('.updateForm input').css('display','none');
                    }else if(hasil == 'Invalid email format'){
                        Swal.fire({
                            icon: "error",
                            title: 'Invalid Email Format!',
                            timer: 3000,
                            showCancelButton: false,
                            showConfirmButton: false,
                            timerProgressBar: true,
                            html: `${''}<br/><br/>`,
                        });
                    }else {
                       console.log(hasil);
                    }
                    $(".updateForm input#email").val("");
                },
                error: function(xhr, status, error){
                    alert(xhr);
                }
            })
        })
    </script>
    
</body>

</html>