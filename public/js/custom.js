//images upload start
//function readURL(input) {
//    if (input.files && input.files[0]) {
//        var reader = new FileReader();
//        reader.onload = function(e) {
//            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
//            $('#imagePreview').hide();
//            $('#imagePreview').fadeIn(650);
//        }
//        reader.readAsDataURL(input.files[0]);
//    }
//}
//$("#imageUpload").change(function() {
//    readURL(this);
//});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            var img = $(input).parent("div").siblings('.avatar-preview').children('div');
//            alert((img).attr("id"))
            $(img).css('background-image', 'url('+e.target.result +')');
            $(img).hide();
            $(img).fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$(document).on('change', "#imageUpload2, #imageUpload, #imageUpload3 ,#imageUpload4 ,#imageUpload5 ,#imageUpload6 ,#imageUpload8", function() {
    readURL(this);
});


//function readURL(input) {
//    if (input.files && input.files[0]) {
//        var reader = new FileReader();
//        reader.onload = function(e) {
//            $('#imagePreview2').css('background-image', 'url('+e.target.result +')');
//            $('#imagePreview2').hide();
//            $('#imagePreview2').fadeIn(650);
//        }
//        reader.readAsDataURL(input.files[0]);
//    }
//}
//$("#imageUpload2").change(function() {
//    readURL(this);
//});  


$(document).on("click", function (event) {    var $trigger = $(".header");
    if ($trigger !== event.target && !$trigger.has(event.target).length) {
         $(".my_acc_drop2").slideUp("fast");
    }
 });



  // fixed header

  

  $(window).scroll(function () {
      if ($(window).scrollTop() >= 45) {
          $('.header').addClass('fixed_header');
      } else {
          $('.header').removeClass('fixed_header');
      }
  });

  // fixed header end
  // sidenav dropdown
  $('.sideproduct ul').hide();
$(".sideproduct a").click(function () {
  $(this).parent(".sideproduct").children("ul").slideToggle("100");
  $(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
});
  // sidenav dropdown end



  // hamburger 

  var forEach = function (t, o, r) {
      if ("[object Object]" === Object.prototype.toString.call(t))
          for (var c in t)
              Object.prototype.hasOwnProperty.call(t, c) && o.call(r, t[c], c, t);
      else
          for (var e = 0, l = t.length; l > e; e++)
              o.call(r, t[e], e, t)
  };

  var hamburgers = document.querySelectorAll(".hamburger");
  if (hamburgers.length > 0) {
      forEach(hamburgers, function (hamburger) {
          hamburger.addEventListener("click", function () {
              this.classList.toggle("is-active");
          }, false);
      });
  }

  $('.hamburger').click(function () {

      if ($(this).hasClass('is-active')) {
          $('#mySidenav').css('left', '0px');
      } else {
          $('#mySidenav').css('left', '-250px');
      }
  });


// hamburger end

// slick



// slick end
// slick for product
$('.prolftSlick').slick({
    dots: true,
    arrows: true,
    autoplay: false,
    autoplaySpeed: 3000,
    infinite: false,
    speed: 1000,
    slidesToScroll: 1,
    slidesToShow: 1,
});

// slick for product end

// dropdown profile area
//$(document).ready(function () {
//    $('.useritem').click(function () {
//        $('.my_acc_drop2').slideToggle();
//    })
//});
$(document).ready(function () {
    $(document).on('click', '.unionclick, .useritem', function () {
//        e.preventDefault();
        $(".innerBox").hide();
        $(this).children('.innerBox').slideToggle();
    })
});
//$(document).ready(function () {
//    $(document).on('click','.productclick').click(function () {
//        $("".my_acc_drop3').hide();
//       $(this).children('.my_acc_drop3').slideToggle();
//    })
//});
$(document).ready(function () {
    $('.searchclick').click(function () {
        $('.popular_pro_drop').slideToggle();
    })
});

$(document).ready(function () {
    $('.productclick').click(function () {
        $('.my_acc_drop3').slideToggle();
    })
});
// dropdown profile area end




/* deepanshu js start*/


/*Dropdown start*/
$('.dropdown').click(function () {
    $(this).find('.dropdown-menu').slideToggle(300);

});
$('.dropdown').focusout(function () {
    $(this).find('.dropdown-menu').slideUp(300);
});
$('.dropdown .dropdown-menu li').click(function () {
    $(this).parents('.dropdown').find('span').text($(this).text());
});

$(document).on("click", '.dropdown', function (event) {
//    var $trigger = $(".dropdown");
        $(".dropdown-menu").hide();
        $(this).children(".dropdown-menu").toggle();
        $(this).removeClass('active');
});

$(document).ready(function(){
  $(".new_address").click(function(){
    $(".form_open").slideToggle();
  });
});

/*Dropdown end*/


// tab start
$(document).ready(function () {
    $('.payDtl').hide();
    $('.payDtl1').show();
    $('.clicktab').click(function () {
        var type = $(this).data('type');
        $('.payDtl').hide();
        $('.payDtl' + type).fadeIn();
        $('.clicktab').removeClass('active');
        $(this).addClass('active');
    });
});
// tab end





//chat msg

 // chat smg end
 // manage sale
 $(document).ready(function(){
  $(".ellipis").click(function(){
    $(".ellipes_click").hide();
    $(this).siblings('.ellipes_click').toggle();
  });
});
// mange sale end
//faq start
$(document).ready(function () {
    $(".set > a").on("click", function () {
        if ($(this).hasClass("active")) {
            $(this).removeClass("active");
            $(this).siblings(".content").slideUp(500);
            $(".set > a i").removeClass("fa-chevron-down").addClass("fa-chevron-right");
        } else {
            $(".set > a i").removeClass("fa-chevron-down").addClass("fa-chevron-right");
            $(this).find("i").removeClass("fa-chevron-right").addClass("fa-chevron-down");

            $(".set > a").removeClass("active");
            $(this).addClass("active");
            $(".content").slideUp(500);
            $(this).siblings(".content").slideDown(500);
        }
    });
});
//faq end

//Wishlist Start

$(document).on('click', '#wish_heart', function (evt) {
    evt.preventDefault();
    if ($(this).children('i').hasClass('heartColor')) {
        $(this).children('i').removeClass('heartColor');
        $(".wishBox span").html("Removed from your wishlist!. ");
    } else {
        $(this).children('i').addClass('heartColor');
        $(".wishBox span").html("Added to your wishlist!. ");
    }
    $(".wishBox").fadeIn();
    $(".wishBox").fadeOut(2000);

});

//Wishlist End

//$('.cd-dropdown').click(function() {
// 
//            .children('ul').css('height', 'auto')
//            .children('li').css('top', 0);
//});







document.addEventListener("mousedown",function(event){
    if(event.target.closest(".dropdown , .dropdown-menu"))
       return;
    $('.dropdown-menu').slideUp();
});
document.addEventListener("mousedown",function(event){
    if(event.target.closest(".unionclick , .innerBox"))
       return;
    $('.innerBox').slideUp();
});
document.addEventListener("mousedown",function(event){
    if(event.target.closest(".ellipis , .ellipes_click"))
       return;
    $('.ellipes_click').slideUp();
});
document.addEventListener("mousedown",function(event){
    if(event.target.closest(".productclick , .my_acc_drop3"))
       return;
    $('.my_acc_drop3').slideUp();
});

/// Form validation
//$(document).on('submit', '#common-form', function (evt) {
//    evt.preventDefault();
//    var email=$('#email').val();
//     var name=$('#name').val();
//      var message=$('#message').val();
//      var password =$('#password').val();
//      var pass =$('#pass').val();
//       var pass1 =$('#pass1').val();
//        var number =$('#number').val();
//        var re_pass =$('#re_pass').val();
//   var expire_date =$('#expire_date').val();
//            var Acc =$('#Acc').val();
//             var cvv =$('#cvv').val();
//           //   var con_acc =$('#con_acc').val();
//           //   val ifsc =$('#ifsc').val();
//           //   val Recipient =$('#Recipient').val();
//             
//    if(email===''){
//        $("#email").parents(".form-group").append('<span class="text-danger">Please enter email.</span>');    
//    }
//        if(name===''){
//        $("#name").parents(".form-group").append('<span class="text-danger">Please enter name.</span>');    
//    }
//            if(message===''){
//        $("#message").parents(".form-group").append('<span class="text-danger">Please type message.</span>');    
//    }
//            if(password===''){
//        $("#password").parents(".form-group").append('<span class="text-danger">Please enter password.</span>');    
//    }
//
//            if(pass===''){
//        $("#pass").parents(".form-group").append('<span class="text-danger">Please enter new password.</span>');    
//    }
//                if(pass1===''){
//        $("#pass1").parents(".form-group").append('<span class="text-danger">Please Confirm your password.</span>');    
//    }
//                    if(number===''){
//        $("#number").parents(".form-group").append('<span class="text-danger">Please enter number.</span>');    
//    }
//                      if(re_pass===''){
//        $("#re_pass").parents(".form-group").append('<span class="text-danger">Please Re-enter your password.</span>');    
//    }
//                          if(re_pass===''){
//        $("#re_pass").parents(".form-group").append('<span class="text-danger">Please Re-enter your password.</span>');    
//    }
//    //                     if(bank_name===''){
//    //     $("#bank_name").parents(".form-group").append('<span class="text-danger">Please fill Bank name.</span>');    
//    // }
//    //                         if(branch===''){
//    //     $("#branch").parents(".form-group").append('<span class="text-danger">Please enter Branch name.</span>');    
//    // }
//        
//                            if(expire_date===''){
//        $("#expire_date").parents(".form-group").append('<span class="text-danger">Please enter date.</span>');    
//    }
//      
//                            if(cvv===''){
//        $("#cvv").parents(".form-group").append('<span class="text-danger">Please enter CVV.</span>');    
//    }
//    //                         if(con_acc===''){
//    //     $("#con_acc").parents(".form-group").append('<span class="text-danger">Please Confirm your Account Number</span>');    
//    // }
//      
//
//    //                         if(ifsc===''){
//    //     $("#ifsc").parents(".form-group").append('<span class="text-danger">Please enter IFSC number</span>');    
//    // }
//      
//    //                                 if(Recipient===''){
//    //     $("#Recipient").parents(".form-group").append('<span class="text-danger">Please enter Recipient name.</span>');    
//    // }
//                  
//});







/*
Reference: http://jsfiddle.net/BB3JK/47/
*/

$('select').each(function(){
    var $this = $(this), numberOfOptions = $(this).children('option').length;
  
    $this.addClass('select-hidden'); 
    $this.wrap('<div class="select"></div>');
    $this.after('<div class="select-styled"></div>');

    var $styledSelect = $this.next('div.select-styled');
    $styledSelect.text($this.children('option').eq(0).text());
  
    var $list = $('<ul />', {
        'class': 'select-options'
    }).insertAfter($styledSelect);
  
    for (var i = 0; i < numberOfOptions; i++) {
        $('<li />', {
            text: $this.children('option').eq(i).text(),
            rel: $this.children('option').eq(i).val()
        }).appendTo($list);
    }
  
    var $listItems = $list.children('li');
  
    $styledSelect.click(function(e) {
        e.stopPropagation();
        $('div.select-styled.active').not(this).each(function(){
            $(this).removeClass('active').next('ul.select-options').hide();
        });
        $(this).toggleClass('active').next('ul.select-options').toggle();
    });
  
    $listItems.click(function(e) {
        e.stopPropagation();
        $styledSelect.text($(this).text()).removeClass('active');
        $this.val($(this).attr('rel'));
        $list.hide();
        //console.log($this.val());
    });
  
    $(document).click(function() {
        $styledSelect.removeClass('active');
        $list.hide();
    });

});