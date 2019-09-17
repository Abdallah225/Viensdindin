// geston des script

// script js d'active toggleClass
$(document).ready(function(){
    $('.menu').click(function(){
        $('mylink').toggleClass('active');
    })
})
// scrip pour l'animation du scrool du navbar
$(function(){
$(window).scroll(function() {
if($(window).scrollTop() >= 200) {
$('nav').addClass('scrolled');
}
else {
$('nav').removeClass('scrolled');
}
});
});

// click change backround color navbar
clicked = true;
$(document).ready(function(){
    $(".navbar-toggler").click(function(){
        if(clicked){
            $(".navbar").css('background-color', 'rgba(0, 0, 0, 0.8)');
            clicked  = false;
        } else {
            $(".navbar").css('background-color', 'rgba(0, 0, 0, 0)');
            clicked  = true;
        }   
    });
});

// fin du script du navbar

// script du survol des differents video
$(document).ready(function() {
$('.box').each(function(i, obj) {
$(this).on("mouseover", hoverVideo);
$(this).on("mouseout", hideVideo);
});
});

function hoverVideo() {
$(this).find(".overlayImage").hide();
$(this).find(".thevideo")[0].play();
}

function hideVideo(video) {
$(this).find(".thevideo")[0].currentTime = 0;
$(this).find(".thevideo")[0].pause();
$(this).find(".overlayImage").show();
}
// fin du script du survol


// debut du script carousel

//     $('.owl-carousel').owlCarousel({
// 	stagePadding: 30,
//     loop:false,
//     margin: 5,
//     responsiveClass:true,
//     responsive:{
//         0:{
//             items:1,
//             nav:false
//         },
//         600:{
//             items:3,
//             nav:false
//         },
//         1000:{
//             items:3,
//             nav:true,
        
//         }
//     }
// })
// script pour animer les actions sur les differents video au survol des images des differents films
function playVideof(element){
$("#"+element.id).on({
  mouseenter: function(){
  $(".action-v-"+element.id).show();
  },
  mouseleave: function(){
    $(".action-v-"+element.id).hide();
  }
});
}
function playVideo(element){
$("#"+element.id).on({
  mouseenter: function(){
  $(".action-v-"+element.id).show();
  },
  mouseleave: function(){
    $(".action-v-"+element.id).hide();
  }
});
}
