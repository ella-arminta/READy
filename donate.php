<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Donate - READy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/e52db3bf8a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/team.css">
    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <link rel="icon" href="assets/images/2020_IBE_LOGO-Vertikal.jpg" type="image/x-icon">
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
/* kesamping */
#idonate{
    margin-bottom:80px;
    background-color: orange;
    padding: 40px 55px;
    border-radius: 10px;
    margin-top: 80px;
    margin-left:5%;
    margin-right: 6%;
    box-shadow: 0 10px 16px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%) !important;
}
label,form p{
    color:var(--blue);
    font-family: 'Oswald',serif;
    font-size : x-large;
}
#idonate input,.ans{
    font-size:medium;
}
#idonate{
    display: flex;
    flex-direction:column;
}
#idonate input{
    border:none;
    background-color:transparent;
    border:solid 1px white;
    height:40px;
    font-weight:800;
}
.input-group-text{
    background-color:var(--blue);
    color:white;
    font-size:large;
    border:none;
}
#idonate input::placeholder{
    color:white;
}
.option{
    display:flex;
    justify-content:center;
    align-items:center;
}
input[type="radio"]{
    margin-right:10px;
    width:20px;
    height:20px;
}
.mycol{
    width:45%;
}
.mycol2{
    width:55%;
}
@media (min-width:813px){
    .judulPage{
    height:100vh;
    height:100%;
    max-height:1015px;
    }
    .judulPage .layer{
        width:41%;
        height:80vh;
       border-radius:10px;
       border-top-right-radius:0px;
       border-top-left-radius:0px;
    }
    .judulPage h1{
        margin-top:-200px;
    }
    .mycol2{
        display:flex;
        justify-content:center;
        align-items:center;
    }
   
}

@media (max-width:812px){
    .row.form{
        flex-direction:column;
    }
    .mycol{
        width:100%;
    }
    .mycol2{
        width:100%;
    }
    #idonate{
        margin: 10% 10%;
    }

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
                    <li><a href="activities.php">Activities</a></li>
                    <li><a href="events.php">Ongoing Events</a></li>
                    <li><a href="history.html" >History</a></li>
                    <!-- <li><a href="faq.html">Faq</a></li> -->
                    <li><a href="#" class="regist">Donate Now!</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="row form">
        <div class="mycol">
            <div class="judulPage">
                <div id="carouselExampleSlidesOnly" class="carousel slide " data-bs-ride="carousel">
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
                <h1 class="hidden" data-aos="fade-up"  data-aos-duration="1000">Book Donation</h1>
            </div>
            </div>
        <div class="mycol2">
            <!-- Donation Form -->
            <form id="idonate" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label" >Full Name*</label>
                    <input name="fname" type="text" class="form-control" id="name" placeholder="Enter Full Name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address*</label>
                    <input type="email" class="form-control" id="email" required name="email"placeholder="Enter Email">
                </div>
                <label for="phone" class="form-label" >Phone Number*</label>
                <div class="mb-3 input-group">
                    <span class="input-group-text" id="basic-addon1">+62</span>
                    <input name="phone" type="text" class="form-control" id="phone" placeholder="896 xxxx xxxx" required>
                </div>
                <div class="">
                    <label for="numBooks">How many books you want to donate?*</label>
                    <input  name="numBooks" type="number" min="1" id="numBooks" placeholder="Enter Number" required>
                </div>
                <p>Do you want your name to be published in website as a donor?*</p>
                <div class="option"> 
                    <input type="radio" id="yesPub" name="pub" value="yes" required>
                    <label for="yesPub" class="ans" style="margin-right:10px">Yes</label>
                    <input type="radio" id="noPub" style="margin-left:10px" name="pub" value="no">
                    <label for="noPub"  class="ans" >No</label>
                </div>
               

                <p>How would you like to send your books?*</p>
                <div class="option" style="align-self:start">
                <input type="radio" id="dropOff" name="sendBooks" onclick="otherSend(false)" value="dropOff" required>
                <label for="dropOff" class="ans">Drop off at P.621 Building ,International Business Engineering ,Petra Christian University.</label><br>
                </div>
                <div class="option" style="align-self:start">
                <input type="radio" id="courrier" name="sendBooks" value="courrier" onclick="otherSend(false)">
                <label for="courrier" class="ans">Use a courrier to Petra Christian University P.621 Building</label><br>
                </div>
                <div class="option"style="align-self:start">
                <input type="radio" id="other" name="sendBooks" value="other" onclick="otherSend(true)">
                <label for="other"  class="ans">Other</label><br>
                </div>
                
                <input type="text" style="display:none;" class="otherOption" name="otherOpt">

                <div class="mb-3">
                    <label for="msg" class="form-label">Messages</label>
                    <input type="text" class="form-control" id="msg" required placeholder="Give a message" name="msg">
                </div>
                <button type="submit" style="font-size:large" class="btn btn-primary">Submit</button>
            </form>
        </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/navAnim.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
         function otherSend(x){
                if(x == true){
                    document.querySelector('.otherOption').style.display = '';
                }else{
                    document.querySelector('.otherOption').style.display = 'none';
                }
        }
    </script>
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
            $('#idonate').on('submit',function(e){
                e.preventDefault();
                $.ajax({
                    type : "POST",
                    url: 'api/addDonation.php',
                    data: $('#idonate').serialize(),
                    success: function(event) {
                        console.log(event)
                        if(event == 'berhasil'){
                            Swal.fire({
                                icon: "success",
                                timer:3000,
                                title: 'Donation Proposal Submitted',
                                showCancelButton: false,
                                showConfirmButton: false,
                                timerProgressBar: true,
                                html: `${'Your donation is on waiting list. We will contact you for further information. Thank You for donating with us!'}<br/><br/>`,
                            });
                            setTimeout(function(){
                                window.location.replace("index.php");
                            },3000)
                        }else {
                            Swal.fire({
                                icon: "error",
                                title: 'Oops..',
                                timer:3000,
                                showCancelButton: false,
                                showConfirmButton: false,
                                timerProgressBar: true,
                                html: `${'Something went wrong, please fill out this form again'}<br/><br/>`,
                            });
                            // setTimeout(function(){
                            //     window.location.replace("donate.php");
                            // },3000)
                        }
                    },
                    error: function(xhr, resp, text) {
                        console.log(xhr, resp, text);
                        alert('terjadi kesalahan');
                    }

                })
            })
        
    </script>
    <script>
        AOS.init();
      </script>
</body>
</html>