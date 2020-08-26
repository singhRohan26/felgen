$('.clicklink').on('click touchend', function (e) {
    var el = $(this);
    var link = el.attr('href');
    window.location = link;
});

$(window).scroll(function () {
    if ($(window).scrollTop() >= 45) {
        $('.header').addClass('fixed_header');
    }
    else {
        $('.header').removeClass('fixed_header');
    }
});
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
        $('#mySidenav').css('top', '70px');
    }
    else {
        $('#mySidenav').css('top', '-100%');
    }
});
$('.sidenavlink').click(function () {
    $('#mySidenav').css('top', '-100%');
    $('.hamburger').removeClass('is-active');
});


// scroll start
 $('a[href*="#"]').click(function() {
    var id =  $(this).attr('href');
     $('html, body').animate({         
         scrollTop: $(id).offset().top
     }, 1000);
 });
// funnel start

    $('.btn_1').click(function () {
        $('.btn_1').removeClass("active-tab");
        $(this).addClass("active-tab");
    });
/*! rangeslider.js - v2.1.1 | (c) 2016 @andreruffert | MIT license | https://github.com/andreruffert/rangeslider.js */
!function (a) {
    "use strict";
    "function" == typeof define && define.amd ? define(["jquery"], a) : "object" == typeof exports ? module.exports = a(require("jquery")) : a(jQuery)
}(function (a) {
    "use strict";
    function b() {
        var a = document.createElement("input");
        return a.setAttribute("type", "range"), "text" !== a.type
    }
    function c(a, b) {
        var c = Array.prototype.slice.call(arguments, 2);
        return setTimeout(function () {
            return a.apply(null, c)
        }, b)
    }
    function d(a, b) {
        return b = b || 100, function () {
            if (!a.debouncing) {
                var c = Array.prototype.slice.apply(arguments);
                a.lastReturnVal = a.apply(window, c), a.debouncing = !0
            }
            return clearTimeout(a.debounceTimeout), a.debounceTimeout = setTimeout(function () {
                a.debouncing = !1
            }, b), a.lastReturnVal
        }
    }
    function e(a) {
        return a && (0 === a.offsetWidth || 0 === a.offsetHeight || a.open === !1)
    }
    function f(a) {
        for (var b = [], c = a.parentNode; e(c); )
            b.push(c), c = c.parentNode;
        return b
    }
    function g(a, b) {
        function c(a) {
            "undefined" != typeof a.open && (a.open = a.open ? !1 : !0)
        }
        var d = f(a), e = d.length, g = [], h = a[b];
        if (e) {
            for (var i = 0; e > i; i++)
                g[i] = d[i].style.cssText, d[i].style.setProperty ? d[i].style.setProperty("display", "block", "important") : d[i].style.cssText += ";display: block !important", d[i].style.height = "0", d[i].style.overflow = "hidden", d[i].style.visibility = "hidden", c(d[i]);
            h = a[b];
            for (var j = 0; e > j; j++)
                d[j].style.cssText = g[j], c(d[j])
        }
        return h
    }
    function h(a, b) {
        var c = parseFloat(a);
        return Number.isNaN(c) ? b : c
    }
    function i(a) {
        return a.charAt(0).toUpperCase() + a.substr(1)
    }
    function j(b, e) {
        if (this.$window = a(window), this.$document = a(document), this.$element = a(b), this.options = a.extend({}, n, e), this.polyfill = this.options.polyfill, this.orientation = this.$element[0].getAttribute("data-orientation") || this.options.orientation, this.onInit = this.options.onInit, this.onSlide = this.options.onSlide, this.onSlideEnd = this.options.onSlideEnd, this.DIMENSION = o.orientation[this.orientation].dimension, this.DIRECTION = o.orientation[this.orientation].direction, this.DIRECTION_STYLE = o.orientation[this.orientation].directionStyle, this.COORDINATE = o.orientation[this.orientation].coordinate, this.polyfill && m)
            return!1;
        this.identifier = "js-" + k + "-" + l++, this.startEvent = this.options.startEvent.join("." + this.identifier + " ") + "." + this.identifier, this.moveEvent = this.options.moveEvent.join("." + this.identifier + " ") + "." + this.identifier, this.endEvent = this.options.endEvent.join("." + this.identifier + " ") + "." + this.identifier, this.toFixed = (this.step + "").replace(".", "").length - 1, this.$fill = a('<div class="' + this.options.fillClass + '" />'), this.$handle = a('<div class="' + this.options.handleClass + '" />'), this.$range = a('<div class="' + this.options.rangeClass + " " + this.options[this.orientation + "Class"] + '" id="' + this.identifier + '" />').insertAfter(this.$element).prepend(this.$fill, this.$handle), this.$element.css({position: "absolute", width: "1px", height: "1px", overflow: "hidden", opacity: "0"}), this.handleDown = a.proxy(this.handleDown, this), this.handleMove = a.proxy(this.handleMove, this), this.handleEnd = a.proxy(this.handleEnd, this), this.init();
        var f = this;
        this.$window.on("resize." + this.identifier, d(function () {
            c(function () {
                f.update(!1, !1)
            }, 300)
        }, 20)), this.$document.on(this.startEvent, "#" + this.identifier + ":not(." + this.options.disabledClass + ")", this.handleDown), this.$element.on("change." + this.identifier, function (a, b) {
            if (!b || b.origin !== f.identifier) {
                var c = a.target.value, d = f.getPositionFromValue(c);
                f.setPosition(d)
            }
        })
    }
    Number.isNaN = Number.isNaN || function (a) {
        return"number" == typeof a && a !== a
    };
    var k = "rangeslider", l = 0, m = b(), n = {polyfill: !0, orientation: "horizontal", rangeClass: "rangeslider", disabledClass: "rangeslider--disabled", horizontalClass: "rangeslider--horizontal", verticalClass: "rangeslider--vertical", fillClass: "rangeslider__fill", handleClass: "rangeslider__handle", startEvent: ["mousedown", "touchstart", "pointerdown"], moveEvent: ["mousemove", "touchmove", "pointermove"], endEvent: ["mouseup", "touchend", "pointerup"]}, o = {orientation: {horizontal: {dimension: "width", direction: "left", directionStyle: "left", coordinate: "x"}, vertical: {dimension: "height", direction: "top", directionStyle: "bottom", coordinate: "y"}}};
    return j.prototype.init = function () {
        this.update(!0, !1), this.onInit && "function" == typeof this.onInit && this.onInit()
    }, j.prototype.update = function (a, b) {
        a = a || !1, a && (this.min = h(this.$element[0].getAttribute("min"), 0), this.max = h(this.$element[0].getAttribute("max"), 100), this.value = h(this.$element[0].value, Math.round(this.min + (this.max - this.min) / 2)), this.step = h(this.$element[0].getAttribute("step"), 1)), this.handleDimension = g(this.$handle[0], "offset" + i(this.DIMENSION)), this.rangeDimension = g(this.$range[0], "offset" + i(this.DIMENSION)), this.maxHandlePos = this.rangeDimension - this.handleDimension, this.grabPos = this.handleDimension / 2, this.position = this.getPositionFromValue(this.value), this.$element[0].disabled ? this.$range.addClass(this.options.disabledClass) : this.$range.removeClass(this.options.disabledClass), this.setPosition(this.position, b)
    }, j.prototype.handleDown = function (a) {
        if (this.$document.on(this.moveEvent, this.handleMove), this.$document.on(this.endEvent, this.handleEnd), !((" " + a.target.className + " ").replace(/[\n\t]/g, " ").indexOf(this.options.handleClass) > -1)) {
            var b = this.getRelativePosition(a), c = this.$range[0].getBoundingClientRect()[this.DIRECTION], d = this.getPositionFromNode(this.$handle[0]) - c, e = "vertical" === this.orientation ? this.maxHandlePos - (b - this.grabPos) : b - this.grabPos;
            this.setPosition(e), b >= d && b < d + this.handleDimension && (this.grabPos = b - d)
        }
    }, j.prototype.handleMove = function (a) {
        a.preventDefault();
        var b = this.getRelativePosition(a), c = "vertical" === this.orientation ? this.maxHandlePos - (b - this.grabPos) : b - this.grabPos;
        this.setPosition(c)
    }, j.prototype.handleEnd = function (a) {
        a.preventDefault(), this.$document.off(this.moveEvent, this.handleMove), this.$document.off(this.endEvent, this.handleEnd), this.$element.trigger("change", {origin: this.identifier}), this.onSlideEnd && "function" == typeof this.onSlideEnd && this.onSlideEnd(this.position, this.value)
    }, j.prototype.cap = function (a, b, c) {
        return b > a ? b : a > c ? c : a
    }, j.prototype.setPosition = function (a, b) {
        var c, d;
        void 0 === b && (b = !0), c = this.getValueFromPosition(this.cap(a, 0, this.maxHandlePos)), d = this.getPositionFromValue(c), this.$fill[0].style[this.DIMENSION] = d + this.grabPos + "px", this.$handle[0].style[this.DIRECTION_STYLE] = d + "px", this.setValue(c), this.position = d, this.value = c, b && this.onSlide && "function" == typeof this.onSlide && this.onSlide(d, c)
    }, j.prototype.getPositionFromNode = function (a) {
        for (var b = 0; null !== a; )
            b += a.offsetLeft, a = a.offsetParent;
        return b
    }, j.prototype.getRelativePosition = function (a) {
        var b = i(this.COORDINATE), c = this.$range[0].getBoundingClientRect()[this.DIRECTION], d = 0;
        return"undefined" != typeof a["page" + b] ? d = a["client" + b] : "undefined" != typeof a.originalEvent["client" + b] ? d = a.originalEvent["client" + b] : a.originalEvent.touches && a.originalEvent.touches[0] && "undefined" != typeof a.originalEvent.touches[0]["client" + b] ? d = a.originalEvent.touches[0]["client" + b] : a.currentPoint && "undefined" != typeof a.currentPoint[this.COORDINATE] && (d = a.currentPoint[this.COORDINATE]), d - c
    }, j.prototype.getPositionFromValue = function (a) {
        var b, c;
        return b = (a - this.min) / (this.max - this.min), c = Number.isNaN(b) ? 0 : b * this.maxHandlePos
    }, j.prototype.getValueFromPosition = function (a) {
        var b, c;
        return b = a / (this.maxHandlePos || 1), c = this.step * Math.round(b * (this.max - this.min) / this.step) + this.min, Number(c.toFixed(this.toFixed))
    }, j.prototype.setValue = function (a) {
        (a !== this.value || "" === this.$element[0].value) && this.$element.val(a).trigger("input", {origin: this.identifier})
    }, j.prototype.destroy = function () {
        this.$document.off("." + this.identifier), this.$window.off("." + this.identifier), this.$element.off("." + this.identifier).removeAttr("style").removeData("plugin_" + k), this.$range && this.$range.length && this.$range[0].parentNode.removeChild(this.$range[0])
    }, a.fn[k] = function (b) {
        var c = Array.prototype.slice.call(arguments, 1);
        return this.each(function () {
            var d = a(this), e = d.data("plugin_" + k);
            e || d.data("plugin_" + k, e = new j(this, b)), "string" == typeof b && e[b].apply(e, c)
        })
    }, "rangeslider.js is available in jQuery context e.g $(selector).rangeslider(options);"
});
$(function () {
    $('.footage ').rangeslider({
        polyfill: false,
        onInit: function () {
            $('.propertyheader .pull-right').text($('.footage').val());
            $('.propertyheader .pull-left').text((parseInt($('.footage').val()) - 500));
        },
        onSlide: function (position, value) {
            $('.propertyheader .pull-right').text(value);
            $('.propertyheader .pull-left').text((parseInt(value) - 500));
        },
        onSlideEnd: function (position, value) {
        }
    });


    $('.header2input').rangeslider({
        polyfill: false,
        onInit: function () {
            $('.header2 .pull-right').text("$ " + $('.header2input').val());
        },
        onSlide: function (position, value) {
            $('.header2 .pull-right').text("$ " + value);
        },
        onSlideEnd: function (position, value) {
        }
    });

    $('.header3input').rangeslider({
        polyfill: false,
        onInit: function () {
            $('.header3 .pull-right').text("$ " + $('.header3input').val());
        },
        onSlide: function (position, value) {
            $('.header3 .pull-right').text("$ " + value);
        },
        onSlideEnd: function (position, value) {
        }
    });
});

$('.tab').click(function () {
    if ($(this).hasClass('active')) {
        $('.tab').find('span').removeClass('color');
        $('.tab').find('.fa').removeClass('fa-chevron-up').addClass('fa-chevron-down');
        $('.tab').removeClass('active');
        $('.tabs').slideUp();
    }
    else {
        var id = $(this).data('id');
        $('.tab').find('span').removeClass('color');
        $(this).find('span').addClass('color');
        $('.tab').find('.fa').removeClass('fa-chevron-up').addClass('fa-chevron-down');
        $(this).find('.fa').addClass('fa-chevron-up').removeClass('fa-chevron-down');
        $('.tab').removeClass('active');
        $(this).addClass('active');
        $('.tabs').slideUp();
        $('#tab' + id).slideDown();
    }

});

$('.myclick').click(function () {
    var type = $(this).data('type');
    $('.click' + type).removeClass('active');
    $(this).toggleClass('active');
});
$('.funnel').hide();
$('#step1').show();
$('.nextme').click(function () {
    $(this).parents('.btns.boxes').children(".hide_input").val($(this).data('val'))
    var id = $(this).data('id');
    $(".error_gen_chk").remove();
    if(id == '4'){
        var disease = [];
        var url = $(this).data('url');
       $('.diseases_check input').each(function(){
          if($(this).prop('checked') == true){
             disease.push($(this).val());
          }
        });
       if(disease == ""){
            $(".diseases_check").prepend('<span class="error_gen_chk text-danger">Please select one option</span>');
      }else{
          $('.funnel').hide();
          $('#step' + id).fadeIn();  
      }
    }else if(id == '6'){
        var city = [];
        var url = $(this).data('url');
       $('.city_chk input').each(function(){
          if($(this).prop('checked') == true){
             city.push($(this).val());
          }
        })
       if(city == ""){
            $(".city_chk").before('<span class="error_gen_chk text-danger">Please select one option</span>');
      }else{
          $('.funnel').hide();
          $('#step' + id).fadeIn();  
      }
    }else if(id == '11'){
        if($("#user_name").val() != "" && $("#user_number").val() != "" && $("#user_email").val() != ""){
            $('.funnel').hide();
             $('#step' + id).fadeIn();
        }
    }else{
        $('.funnel').hide();
        $('#step' + id).fadeIn();
    }
    
});
$('.prevme').click(function () {
    var id = $(this).data('id');
    $('.funnel').hide();
    $('#step' + id).fadeIn();
});

/*for solar page funnel*/
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

/*for eco progress bar*/

$( document ).ready(function(){
    $('.now').css("width", function(){
        return $(this).attr("data")
    })
});

/*for active class add*/
 $('p').click(function () {
        $('.active1').removeClass("active");
        $(this).addClass("active");
    });



 $('.nextme').click(function (e) { //#A_ID is an example. Use the id of your Anchor
    $('html, body').animate({
        scrollTop: $('.funnel_main').offset().top - 84 //#DIV_ID is an example. Use the id of your destination on the page
    }, 'slow');
});
$('.prevme').click(function (e) { //#A_ID is an example. Use the id of your Anchor
    $('html, body').animate({
        scrollTop: $('.funnel_main').offset().top - 84 //#DIV_ID is an example. Use the id of your destination on the page
    }, 'slow');
});


// date function

$(document).ready(function() {
// Create two variables with names of months and days of the week in the array
var monthNames = [ "JANUARY", "FEBRUARY", "MARCH", "APRIL", "MAY", "JUNE", "JULY", "AUGUST", "SEPTEMBER", "OCTOBER", "NOVEMBER", "DECEMBER" ]; 
// Create an object newDate()
var newDate = new Date();
// Retrieve the current date from the Date object
newDate.setDate(newDate.getDate());
// At the output of the day, date, month and year    
$('#Date').html(monthNames[newDate.getMonth()]+ " " + newDate.getDate() + ", " + newDate.getFullYear());   
}); 

if ($(window).width() <= 767) {
    $('.before').insertBefore($('.after'));
    $('.before1').insertBefore($('.after1'));
    $('.before2').insertBefore($('.after2'));
    $('.before3').insertBefore($('.after3'));
    $('.before4').insertBefore($('.after4'));
    $('.before5').insertBefore($('.after5'));
    $('.before6').insertBefore($('.after6'));
}



$(document).ready(function () {
    $('.funnel_footer_show').click(function () {
        $(".linkadd").attr("href","../home.html");
        $('.funnel_footer').css('display', 'block');
    });
});

$(document).ready(function () {
    $('.footer_hide').click(function () {
        $(".linkadd").removeAttr("href","../home.html");
        $('.funnel_footer').css('display', 'none');
    });
});