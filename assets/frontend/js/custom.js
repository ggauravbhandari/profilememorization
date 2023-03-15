$(document).ready(function() {
  var owl = $('.owl-1');
  owl.owlCarousel({
    margin: 10,
    loop: false,
    rewind: true,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 1
      },
      1000: {
        items: 2
      }
    }
  })
  // Custom Button
  $('.customNextBtn').click(function() {
    owl.trigger('next.owl.carousel');
  });
  $('.customPreviousBtn').click(function() {
    owl.trigger('prev.owl.carousel');
  });
})


$(document).ready(function() {
  var owl = $('.owl-2');
  owl.owlCarousel({
    margin: 10,
    loop: true,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 1
      },
      1000: {
        items: 1
      }
    }
  })
  // Custom Button
  $('.customNextBtn').click(function() {
    owl.trigger('next.owl.carousel');
  });
  $('.customPreviousBtn').click(function() {
    owl.trigger('prev.owl.carousel');
  });
})

$(document).ready(function() {
  var owl = $('.owl-3');
  owl.owlCarousel({
    margin: 10,
    loop: true,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 1
      },
      1000: {
        items: 1
      }
    }
  })
 
})

$('.nav-1').on('click',function(){
  $('ul').slideToggle(280);
});



$('.menu-btn-toggle').click(function(){
  $('.menu-btn-toggle').toggleClass("click");
  $('.sidebar').toggleClass("show");
  $('.overlay-div').toggleClass("overlay");
  $('body').toggleClass("overflow-hidden");
});
$('.feat-btn').click(function(){
  $('nav ul .feat-show').toggleClass("show");
  $('nav ul .first').toggleClass("rotate");
});
$('.serv-btn').click(function(){
  $('nav ul .serv-show').toggleClass("show1");
  $('nav ul .second').toggleClass("rotate");
});
$('nav ul li').click(function(){
  $(this).addClass("active").siblings().removeClass("active");
});


$(window).scroll(function(){
    if ($(window).scrollTop() >= 150) {
        $('header').addClass('fixed-header');
    }
    else {
        $('header').removeClass('fixed-header');
    }
});

const getDatePickerTitle = elem => {
  // From the label or the aria-label
  const label = elem.nextElementSibling;
  let titleText = '';
  if (label && label.tagName === 'LABEL') {
    titleText = label.textContent;
  } else {
    titleText = elem.getAttribute('aria-label') || '';
  }
  return titleText;
}

const elems = document.querySelectorAll('.datepicker_input');
for (const elem of elems) {
  const datepicker = new Datepicker(elem, {
    'format': 'dd/mm/yyyy', // UK format
    title: getDatePickerTitle(elem)
  });
}


$('.without-caption').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    closeBtnInside: false,
    mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
    image: {
      verticalFit: true
    },
    zoom: {
      enabled: true,
      duration: 300 // don't foget to change the duration also in CSS
    }
  });

$(document).ready(function() {
  
  // variables 
  var toTop = $('.to-top');
  // logic
  toTop.on('click', function() {
    $('html, body').animate({
      scrollTop: $('#section-2').offset().top,
    });
  });

});

var mybutton = document.getElementById("top-btn");

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

jQuery(document).ready(function ($) {

    $('.nav a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
}) 

$('a.scroll').on('click', function (e) {
        // var href = $(this).attr('href');
        var divPosition = $('#section-2').offset();
        $('html, body').animate({scrollTop: divPosition.top}, "slow");
        // $('html, body').animate({
        //     scrollTop: $(href).offset().top
        // }, 'slow');
        e.preventDefault();
    });
  });


$(function(){

    $('#featured-post').click(function(e){
      e.preventDefault();
        $('#pills-tab a[href="#pills-home"]').tab('show');
    })

})  


$(document).ready(function(){
  $(".demo-comment div.recent-item").slice(0,1).show();
  $(".demo-comment #loadMore").click(function(e){
    e.preventDefault();
    $(".demo-comment div.recent-item:hidden").slice(0,1).fadeIn("slow");
    
    if($(".demo-comment div.recent-item:hidden").length == 0){
       $(".demo-comment #loadMore").fadeOut("slow");
      }
  });
})