$(document).ready(function(){
    $('.navTrigger').click(function () {
        $(this).toggleClass('active');
        $("#mainListDiv").toggleClass("show_list");
        $("#mainListDiv").fadeIn();
        if($("#mainListDiv").hasClass('show_list')){
            $('.my-bg-black').fadeIn();
        }else{
            $('.my-bg-black').fadeOut();
        }
    });
    $(window).scroll(function() {
        if ($(document).scrollTop() > 50) {
            $('.nav').addClass('affix');
        } else {
            $('.nav').removeClass('affix');
        }

        if($(document).scrollTop() < 871 ){
            var top = $(document).scrollTop()/3;
            $('#carouselExampleSlidesOnly .carousel-inner').css('margin-top',top);
        }
    });
    var titleTop ;
    if(window.matchMedia("(max-width: 767px)").matches){
        titleTop = '-80px' 
    }else{
        titleTop = '-80px'
    }
    // HOME
    $('.title').animate({
        opacity: '1',
        zIndex:'0'
    },400)
    setTimeout(function(){
        $('.title').animate({
            marginTop:titleTop
        })
        setTimeout(function(){
            $('.desc').animate({
                marginBottom:titleTop,
                zIndex:'0',
                opacity:'1'
            })
            
        },400)
    },1000)
    setTimeout(function(){
        $('.nav .container').fadeIn();
    },2000)
    $(".nav .container")
    .css("display", "flex")
    .hide();
    setTimeout(function(){
        $('button.down').fadeIn();
    },3000)

    $('button.down').click(function(){
        $('html,body').animate({scrollTop: $(".quote").offset().top}, 50);
    })
    $('.desc').click(function(){
        $('html,body').animate({scrollTop: $(".quote").offset().top}, 50);
    })
    // src = https://codepen.io/piilzner/pen/myLBgR
    // typewriting animation
    function animate(elements, callback) {
        var i = 0;
        (function iterate() {
            if (i < elements.length) {
                elements[i].style.display = "block"; 
                animateNode(elements[i], iterate); 
                i++;
            } else
                callback();
                // animate($("#typewriter").children());
        })();
        function animateNode(element, callback) {
            var pieces = [];
            if (element.nodeType==1) {
                while (element.hasChildNodes())
                    pieces.push(element.removeChild(element.firstChild));
                setTimeout(function childStep() {
                    if (pieces.length) {
                        animateNode(pieces[0], childStep); 
                        element.appendChild(pieces.shift());
                    } else
                        // callback();
                        animate($("#typewriter").children());
                }, 10000/60);
            } else if (element.nodeType==3) {
                pieces = element.data.match(/.{0,1}/g); 
                element.data = "";
                (function addText(){
                    element.data += pieces.shift();
                    setTimeout(pieces.length
                        ? addText
                        : callback,
                    10000/60);
                })();
            }
        }
    }
    animate($("#typewriter").children());
    /* Demo purposes only */	
    $("figure").mouseleave(
        function () {
        $(this).removeClass("hover");
        }
    );
    if (window.matchMedia("(max-width: 760px)").matches) { // If media query matches
        $('.our div:nth-child(2) figure').removeClass('hover')
        $('.our div:nth-child(1) figure').addClass('hover');
        $("figure").mouseleave(
            function () {
            $(this).removeClass("hover");
            }
        );
      } else {
        // document.body.style.backgroundColor = "pink";
      }  
    if(window.matchMedia("(min-width: 768px)").matches){
        $('figure.snip0024').attr('data-aos','fade-up')
    }
})




