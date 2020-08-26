
var Event = function () {
    this.__construct = function () {
        this.loader();
        this.tooltip();
        this.commonForm();
        this.imageCommonForm();
        this.imageCommonForm1();
        this.contentWrapper();
        this.changeStatus();
        this.delete();
        this.deletePosts();
        this.changeCity();
        this.changeSubCategory();
        this.fileUploadOnDrop();
        this.showModal();
        this.showModalSignUp();
        this.showSignupModal();
        this.showForgotPasswordModal();
        this.postWishlist();
        this.changeTheme();
        this.offDarkMode();
        this.onDarkMode();
        this.searchWrapper();
        this.socialLogin();
        this.IpAddress();
        this.IpAddressSocial();
        this.getChartWrapper();
        this.changeCountryData();
        this.doSubmitData();
        this.showtransportcountry();
        this.popularFilter();
        this.popular_filter_form();
        this.basicFilter();
        this.basic_filter_form();
		this.chatwrapper();
		this.chat_filter_form();
		// this.orderCancel();
// 		this.hideinput();
		this.back_btn();
		this.del_chat();
		
        
    };

    this.loader = function () {
        $(document).ready(function () {
            $(".loader-admin").fadeOut("slow");
        });
    };

    this.tooltip = function () {
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    };

    this.commonForm = function () {
        $(document).on('submit', '#common-form,#common-form-forgot,#bank_form,#change_pass,#stripe_form,#review_form', function (evt) {
            evt.preventDefault();
            $(".loader").fadeIn("slow");
            var url = $(this).attr("action");
            var postdata = $(this).serialize();
            $.post(url, postdata, function (out) {
                $(".loader").fadeOut("slow");
                $(".input-field > .text-danger").remove();
                $(".form-group > .text-danger").remove();
                if (out.result === 0) {
                    for (var i in out.errors) {
                        $("#" + i).parents(".input-field, " + " .form-group").append('<span class="text-danger">' + out.errors[i] + '</span>');
                    }
                    if (out.err) {
                        $("#category_id").parents(".input-field, " + " .form-group").append('<span class="text-danger">' + out.err + '</span>');
                    }
                    if (out.errCountry) {
                        $("#country_id").parents(".input-field, " + " .form-group").append('<span class="text-danger">' + out.errCountry + '</span>');
                    }
                    return true;
                }
                if (out.result === -3) {
                    $("#subcategory_name").parents(".input-field").append('<span class="text-danger">' + out.error_msg_tkn + '</span>');
                }
                if (out.result === -1) {
                    var message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>';
                    $(".error_msg").removeClass('alert-danger alert-success').addClass('alert alert-danger alert-dismissable').show();
                    $(".error_msg").html(message + out.msg);
                    $(".error_msg").fadeOut(2000);
                }
                if (out.result === -2) {
                    var message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>';
                    $(".error_msg").removeClass('alert-danger alert-success').addClass('alert alert-danger alert-dismissable').show();
                    $(".error_msg").html(message + out.msg);
                    $(".error_msg").fadeOut(5000);
                    window.setTimeout(function () {
                        window.location.href = out.url;
                    }, 2000);
                }
                if (out.result === 1) {
                    // swal("Good job!",out.msg, "success")
                    var message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>';
                    $(".error_msg").removeClass('alert-danger alert-danger').addClass('alert alert-success alert-dismissable').show();
                    $(".error_msg").html(message + out.msg);
                    $(".error_msg").fadeOut(5000);
                    if (out.url !== undefined) {
                        window.setTimeout(function () {
                            window.location.href = out.url;
                        }, 2000);
                    }
                }
				if (out.result === 5) {
                    swal("Gut gemacht",out.msg, "success")
                    var message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>';
                    $(".error_msg").removeClass('alert-danger alert-danger').addClass('alert alert-success alert-dismissable').show();
                    $(".error_msg").html(message + out.msg);
                    $(".error_msg").fadeOut(5000);
                    if (out.url !== undefined) {
                        window.setTimeout(function () {
                            window.location.href = out.url;
                        }, 2000);
                    }
                }
                if (out.result === 3) {
                    $('#loginModal').modal('hide');
                    $('#signingUp').modal('show');
                }
                if (out.result === 4) {
                    $('#signupModal').modal('hide');
                    $('#signingUp').modal('show');
                }
            });
        });
    };

    this.imageCommonForm = function () {
		
        $("#image-common-form,#profile-form,#addpost_form").submit(function (evt) {
            evt.preventDefault();
            $(".loader").fadeIn("slow");
            $.ajax({
                url: $(this).attr("action"),
                type: "post",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                success: function (out) {
                    $(".loader").fadeOut("slow");
                    $(".input-field > .error").remove();
                    $(".form-group > .text-danger").remove();
                    $(".err_img").remove();
                    if (out.result === 0) {
                        for (var i in out.errors) {
								$("#" + i).parents(".input-field, " + " .form-group").append('<span class="text-danger">' + out.errors[i] + '</span>');
								$("#" + i).focus();
                        }
                        if (out.err) {
                            $("#category_id").append('<span class="text-danger">' + out.err + '</span>');
                        }
                        if (out.err_img) {
                            $(".all_img_v").append('<span class="text-danger err_img">' + out.err_img + '</span>');
                        }
                        if (out.errCountry) {
                            $("#country_id").parents(".input-field, " + " .form-group").append('<span class="text-danger">' + out.errCountry + '</span>');
                        }
                        if (out.errCountryManu) {
                            $("#country_manu_id").parents(".input-field, " + " .form-group").append('<span class="text-danger">' + out.errCountryManu + '</span>');
                        }
                        if (out.errCities) {
                            $("#city_id").parents(".input-field, " + " .form-group").append('<span class="text-danger">' + out.errCities + '</span>');
                        }
                    }
                    if (out.result === -4) {

                        $("#city_id").parent(".input-field, " + " .form-group").append('<span class="text-danger">' + out.errCountry + '</span>');
                        $("#city_id").focus();
                    }
                    if (out.result === -5) {

                        $("#city_id").parent(".input-field, " + " .form-group").append('<span class="text-danger">' + out.errCountryy + '</span>');
                        $("#city_id").focus();
                    }
                    if (out.result === -1) {

                        var message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>';
                        $("#error_msg").removeClass('alert-warning alert-success').addClass('alert alert-danger alert-dismissable').show();
                        $("#error_msg").html(message + out.msg);
                        $("#error_msg").fadeOut(2000);
                        if (out.url) {
                            window.location.href = out.url;
                        }
                    }
                    if (out.result === -2) {
                        var message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>';
                        $("#error_msg").removeClass('alert-danger alert-success').addClass('alert alert-danger alert-dismissable').show();
                        $("#error_msg").html(message + out.msg);
                        $("#error_msg").fadeOut(2000);
                        window.setTimeout(function () {
                            window.location.href = out.url;
                        }, 1000);
                    }
					if (out.result === 4) {
						// $("#modal_postadd").modal('show');
						// $("#yes_add").attr("data-url", out.url);
						var message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>';
                        $("#error_msg").removeClass('alert-danger alert-success').addClass('alert alert-danger alert-dismissable').show();
                        $("#error_msg").html(message + out.msg);
                        $("#error_msg").fadeOut(2000);
                        window.setTimeout(function () {
                            window.location.href = out.url;
                        }, 1000);
                    }
                    if (out.result === 1) {
						
					    
                        var message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>';
                        $("#error_msg").removeClass('alert-danger').addClass('alert alert-success alert-dismissable').show();
                        $("#error_msg").html(message + out.msg);
                        $("#error_msg").fadeOut(5000);
                        window.setTimeout(function () {
                            window.location.href = out.url;
                        }, 2000);
                    }
                }
            });
        });
		
		$(document).on('click', '#yes_add', function(){
			window.location.href = $(this).data('url');
			
		})
    };
	
	
	this.back_btn = function () {
        $(document).on('click', '.back_btn', function (e) {
            $("#modal_postadd").modal('show');
			$(document).on('click', '#yes_add', function(){
			location.reload();
			
		})
			
        });
    };
    
    this.del_chat = function() {
          $(document).on('click', '.del_chat', function(e){
        e.preventDefault();
        var url = $(this).attr("href");
        swal({
            title: "Mochten Sie diesen Chat wirklich loschen?",
            icon: "warning",
            buttons: ["stornieren", "In Ordnung"],
            dangerMode: true,
            closeOnClickOutside: false,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.post(url, '', function (out) {
                    if (out.result === 5) {
                        // location.reload();
                        window.location.href = out.url;
                    }
                });
            }
        });
        
    });
        
    };
	

    this.imageCommonForm1 = function () {
        $("#image-common-form1").submit(function (evt) {
            evt.preventDefault();
            $(".loader").fadeIn("slow");
            $.ajax({
                url: $(this).attr("action"),
                type: "post",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (out) {
                    $(".loader").fadeOut("slow");
                    $(".form-group1 > .error").remove();
                    $(".form-group1 > .text-danger").remove();
                    if (out.result === 0) {
                        for (var i in out.errors) {
                            $("#" + i).parents(".form-group1").append('<span class="text-danger">' + out.errors[i] + '</span>');
                            $("#" + i).focus();
                        }
                        if (out.err) {
                            $("#category_id").parents(".form-group1").append('<span class="text-danger">' + out.err + '</span>');
                        }
                        if (out.errCountry) {
                            $("#country_id").parents(".form-group1").append('<span class="text-danger">' + out.errCountry + '</span>');
                        }
                        if (out.errCountryManu) {
                            $("#country_manu_id").parents(".form-group1").append('<span class="text-danger">' + out.errCountryManu + '</span>');
                        }
                        if (out.errCities) {
                            $("#city_id").parents(".form-group1").append('<span class="text-danger">' + out.errCities + '</span>');
                        }
                    }
                    if (out.result === -4) {
                        $("#city_id").parents(".form-group1").append('<span class="text-danger">' + out.errCountry + '</span>');
                        $("#city_id").focus();
                    }
                    if (out.result === -5) {

                        $("#city_id").parents(".form-group1").append('<span class="text-danger">' + out.errCountryy + '</span>');
                        $("#city_id").focus();
                    }
                    if (out.result === -1) {
                        var message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>';
                        $("#error_msg").removeClass('alert-warning alert-success').addClass('alert alert-danger alert-dismissable').show();
                        $("#error_msg").html(message + out.msg);
                        $("#error_msg").fadeOut(2000);
                        if (out.url) {
                            window.location.href = out.url;
                        }
                    }
                    if (out.result === -2) {
                        var message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>';
                        $("#error_msg").removeClass('alert-danger alert-success').addClass('alert alert-danger alert-dismissable').show();
                        $("#error_msg").html(message + out.msg);
                        $("#error_msg").fadeOut(2000);
                        window.setTimeout(function () {
                            window.location.href = out.url;
                        }, 1000);
                    }
                    if (out.result === 1) {
						swal("Good job!", "You clicked the button!", "success")
                        var message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>';
                        $("#error_msg").removeClass('alert-danger alert-danger').addClass('alert alert-success alert-dismissable').show();
                        $("#error_msg").html(message + out.msg);
                        // $("#error_msg").fadeOut(5000);
                        window.setTimeout(function () {
                            window.location.href = out.url;
                        }, 2000);
                    }
                }
            });
        });
    };

    this.contentWrapper = function () {
        $(document).ready(function () {
            var url = $('#content-wrapper').data('url');
            // alert(url)
            $.post(url, '', function (out) {
                if (out.result === 1) {
                    $('#content-wrapper').html(out.content_wrapper);
                    $('#datable_1').DataTable({
                        responsive: true,
                        destroy: true
                    });
                }
            });
        });
    };

    this.changeStatus = function () {
        $(document).on('click', '.change-status', function (e) {
            e.preventDefault();
            var url = $(this).attr("href");
            $.post(url, function (out) {
                if (out.result === 1) {
                    $('html, body').animate({
                        scrollTop: $(".hk-sec-wrapper").offset().top
                    }, 500);
                    var message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>';
                    $("#res_status").removeClass('alert-warning alert-danger').addClass('alert alert-success alert-dismissable').show();
                    $("#res_status").html(message + out.msg);
                    $("#res_status").fadeOut(2000);
                    window.setTimeout(function () {
                        location.reload();
                    }, 2000);
                }
            });
        });
    };
      
	  
	  this.hideinput = function () {
        $(document).on('submit', '#review_form', function (e) {
            e.preventDefault();
            $('#review_form').hide();
        });
    };
	
	
    this.delete = function () {
        $(document).on('click', '.delete', function (e) {
            e.preventDefault();
            var url = $(this).attr("href");
            swal({
                title: "Do you really want to Delete?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                closeOnClickOutside: false,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.post(url, '', function (out) {
                        if (out.result === 1) {
                            window.location.href = out.url;
                        }
                    });
                }
            });
        });
    };
    
    this.deletePosts = function(){
        $(document).on('click', '.delposts', function (e) {
            e.preventDefault();
            var url = $(this).attr("href");
            $.post(url, '', function (out) {
                if (out.result === 1) {
                    window.location.href = out.url;
                }
            });
        });
    }

    this.changeCity = function () {
        $(document).on('change', '.country_manu_id', function () {
            var country_manu_id = $(this).val();
            var url = $(this).data('url')
            var data = $(this).parent("div").parent("div").children(".cityManufac").children("select");
            $.post(url, {
                country_manu_id: country_manu_id
            }, function (res) {
                if (data == "undefined") {
                    $(data).html(res.city_wrapper);
                } else {
                    $("#city_id").html(res.city_wrapper);
                }

            })
        })
    }

    this.changeSubCategory = function () {
        $(document).on('change', '#category_id', function () {
            var category_id = $(this).val();
            var url = $(this).data('url')
            var data = $(this).parent("div").parent("div").children(".sub_category").children("select");
            $.post(url, {
                category_id: category_id
            }, function (res) {
                if (data == "undefined") {
                    $(data).html(res.subcategory_wrapper);
                } else {
                    $(".sub_category").html(res.subcategory_wrapper);
                }

            })
        })
    }

    this.fileUploadOnDrop = function () {
        $(document).on('change', '#uploadFile', function (evt) {
            evt.preventDefault();
            var url = $(this).data('url');
            var data = new FormData($('#imgForm')[0]);
            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                mimeType: "multipart/form-data",
                contentType: false,
                cache: false,
                processData: false,
                success: function (out) {
                    location.reload();
                },
                error: function (jqXHR, textStatus, errorThrown) {

                }
            });
        });
    };

    this.showModal = function () {
        $(document).on('click', '.signInBtn', function (evt) {
            $("#signupModal").hide();
            $("#loginModal").show();
        });
    };

    this.showModalSignUp = function () {
        $(document).on('click', '.signUpModals', function (evt) {
            $("#signupModal").show();
            $("#loginModal").hide();
        });
    };

    this.showSignupModal = function () {
        $(document).on('click', '#storemodal', function (evt) {
            $("#signupModal").modal('show');
        });
    };

    this.showForgotPasswordModal = function () {
        $(document).on('click', '.forgotPassword', function (evt) {
            $("#forgotPasswordModal").show();
            $("#loginModal").hide();
        });
    };

    this.postWishlist = function () {
        $(document).on('click', '.wish_heart', function (evt) {
            evt.preventDefault();
            if ($("body").data("session") != "") {
                if ($(this).children('i').hasClass('heartColor')) {
                    $(this).children('i').removeClass('heartColor');
                } else {
                    $(this).children('i').addClass('heartColor');
                }
                var cls = $(this).children('i');
                var url = $(this).attr('href');
                $.post(url, '', function (out) {
                    if (out.result === 1) {
                        if ($(cls).hasClass("heartColor")) {
                            $(".wishBox").fadeIn();
                            $(".wishBox span").html("Zu Ihrer Wunschliste hinzugefgt !.");
                            $(".wishBox").fadeOut(2000);
                        } else {
                            $(".wishBox").fadeIn();
                            $(".wishBox").fadeOut(2000);
                            $(".wishBox span").html("Von Ihrer Wunschliste entfernt!. ");
                        }
                    }
                });
            } else{
                $(".wishBox").fadeIn();
                $(".wishBox").fadeOut(8000);
                $(".wishBox span").html("Bitte melden Sie sich an, um diesen Artikel zu Ihrer Wunschliste hinzuzufügen");
            }
        });
    };


    this.changeTheme = function () {
        $(document).ready(function () {
            var url = $('#check-theme').val();
            $.post(url, '', function (out) {
                if (out.result === 1) {
                    if (out.dark_mode === 'on') {
                        obj.offDarkMode();
                        $('.show_map input').prop('checked', true);
                    } else {
                        obj.onDarkMode();
                        $('.show_map input').prop('checked', false);
                    }
                }
            });
        });


        $(document).on('click', '.show_map input', function (evt) {
            var url = $('#change-theme').val();
            if ($('.show_map input').is(':checked')) {
                $.post(url, {
                    dark_mode: 'on'
                }, function (out) {
                    if (out.result === 1) {
                        obj.offDarkMode();
                    }
                });
            } else {
                $.post(url, {
                    dark_mode: 'off'
                }, function (out) {
                    if (out.result === 1) {
                        obj.onDarkMode();
                    }
                });
            }
        });
    };

    this.offDarkMode = function () {
        $('.map_area').show();
        $(".test_demo").removeClass("intro");
    };

    this.onDarkMode = function () {
        $('.map_area').hide();
        $(".test_demo").addClass("intro");
    };

    this.searchWrapper = function () {
        document.addEventListener("mousedown", function (event) {
            if (event.target.closest("#search, .serachData"))
                return;
            $('.serachData').slideUp();
        });
        $(document).on("keyup", "#search", function (e) {
            e.preventDefault();
            var search = $(this).val();
            var url = $(this).data('url');
            // alert(url);
            var element = document.getElementById("search_wrapper");
            element.classList.add("serachData");
            $.post(url, {
                search: search
            }, function (res) {
                $(".serachData").show();
                if (search != "") {
                    $(".serachData").html(res.search_wrapper);
                } else {
                    $(".serachData").html('');
                }
            })
        })
        $(document).on("click", "#search", function (e) {
            e.preventDefault();
            var search = $(this).val();
            var url = $(this).data('url');
            $.post(url, {
                search: search
            }, function (res) {
                $(".serachData").show();
            })
        })
    }

    this.socialLogin=function(){
        $(document).on('click','#fb-login',function(evt){
            evt.preventDefault();
            var postUrl = $(this).data('url');
            var url=$(this).data('url');
            var linkhref=$(this).attr('href');
            $.post(url,{postUrl:postUrl},function(out){
                if(out.result===1){
                   window.location.href = linkhref;
                }
            });
        });
        
        // $(document).on('click','#google-login',function(evt){
        //      evt.preventDefault();
        //     var postUrl=$(location).attr('href');
        //     var url=$(this).data('url');
        //     var linkhref=$(this).attr('href');
        //     $.post(url,{postUrl:postUrl},function(out){
        //         if(out.result===1){
        //           window.location.href = linkhref;
        //         }
        //     });
        // });
    }

    this.IpAddress = function () {
        $(document).on('click', '.ip_addr a', function () {
            var url = $(this).data('url');
            $.post(url, function () {

            })
        })
    }

    this.IpAddressSocial = function () {
        $(document).on('click', '.iconos a', function () {
            var url = $(this).data('url');
            $.post(url, function () {

            })
        })
    }

    this.getChartWrapper = function () {
        var url = $("#content_wrapper_chart").data('url');
        $.post(url, function (res) {
            var ctx = document.getElementById('piechart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: res.social_icons,
                    datasets: [{
                        label: '# of Votes',
                        data: res.count_icons,
                        backgroundColor: res.color
                }]
                },
                options: {
                    cutoutPercentage: 65,
                    responsive: true,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                display: false
                            },
                            gridLines: {
                                display: false,
                                drawBorder: false,
                            },
                            angleLines: {
                                display: false
                            }
                    }]
                    },
                    elements: {
                        arc: {
                            borderWidth: 0
                        },
                        center: {
                            color: '#a0abb4', //Default black
                            fontStyle: 'GoogleSansBold', //Default Arial
                            fontSize: 37 //Default 20 (as a percentage)
                        }
                    },

                    tooltips: {
                        enabled: true
                    },
                    hover: {
                        mode: null
                    },

                    legend: {
                        display: false,
                        position: 'right',
                        labels: {
                            fontFamily: 'GoogleSansMedium',
                            fontColor: '#a0abb4',
                            fontSize: 18,
                            usePointStyle: true,
                        }
                    }

                }
            });
        })
    }

    this.changeCountryData = function () {
        $(document).on('change', '.made_in_drop_made .check_custom .custom-control-input, .made_in_drop .check_custom .custom-control-input, .made_in_drop_con .check_custom .custom-control-input', function () {
            var label_val = $(this).siblings("label").html();
            // alert("okkkkk")
            var data_id = $(this).data('id');
            var svg = '<svg width="5.503" height="8.912" viewBox="0 0 5.503 8.912"><path fill="#000" d="M.003 1.047l3.4 3.409-3.4 3.408 1.044 1.048 4.456-4.456L1.047 0z" data-name="Path 108" /></svg>';
            $(this).parents("li").children("a").html(label_val + svg)
            if (data_id) {
                $(this).parents("li").children("a").attr('data-id', data_id)
            }
            var data_id_reset = $(this).parents("li").children("a");
            var data_id_reset_id = $(".made_in #content_wrapper_conutr").attr('id');
            var url = $(this).data('url');
            if (url) {
                $.post(url, function (res) {
                    $("#content_wrapper_conutr").show();
                    $("#content_wrapper_conutr").html(res.content_wrapper);
                    $(data_id_reset).attr('data-id', '');
                })
            }
            var suburl = $(this).data('suburl');
            if (suburl) {
                $.post(suburl, function (res) {
                    if (res.result === 1) {
                        $("#content_wrapper_subcategory").show();
                        $("#content_wrapper_subcategory").html(res.content_wrapper);
                    }
                    if (res.result === 0) {
                        $("#content_wrapper_subcategory").hide();
                    }
                })
            }
            var country_id = $(data_id_reset).data('id');
            if (country_id && data_id_reset_id) {
                $(".click_srch").show();
            } else {
                $(".click_srch").hide();
            }
        })
    }

    this.doSubmitData = function () {
        $(document).on('click', '.click_srch', function () {
            var cat_id = $("#catgry").data('id');
            var country_id = $("#content_wrapper_conutr a").data('id');
            var url = $(this).data('url');
            $.post(url, {
                country_id: country_id,
                cat_id: cat_id
            }, function (out) {
                window.location.href = out.url
            })
        })
    }

    this.showtransportcountry = function () {
        $("#select_country").click(function () {
            $("#transportation_country").show();
            $("#worldwide").click(function () {
                $("#transportation_country").hide();
            });
        });
    }
	
	this.chatwrapper = function () {
        var url = $("#chat_wrapper").data('url');
        $.post(url, function (res) {
            $("#chat_wrapper").html(res.chat_wrapper);
        })
    }

    this.popularFilter = function () {
        var url = $("#post_wrapper").data('url');
        $.post(url, function (res) {
            $("#post_wrapper").html(res.content_wrapper);
        })
    }

    this.popular_filter_form = function () {
        $(document).on('submit', '#popular_filter_form', function (evt) {
            evt.preventDefault();

            var url = $(this).attr("action");
            
            var postdata = $(this).serialize();
            var form = $(this)[0];

            $.post(url, postdata, function (out) {
                $('.error').remove();

                if (out.result === 0) {
                    for (var i in out.errors) {
                        $("#" + i).parent(".viewForm").append('<span class="error text-danger "><p style="text-align : left;">' + out.errors[i] + '</p></span>');
                        $("#" + i).focus();
                    }
                }
                if (out.result === -1) {

                }
                if (out.result === 1) {
                    $('#post_wrapper').html(out.content_wrapper);
                }
            });

        });
    };


 this.chat_filter_form = function () {
        $(document).on('click', '#chat_filter', function (evt) {
            evt.preventDefault();
            var url = $(this).attr("href");            

            $.post(url,'', function (out) {
                $('.error').remove();

                if (out.result === 0) {
                    for (var i in out.errors) {
                        $("#" + i).parent(".viewForm").append('<span class="error text-danger "><p style="text-align : left;">' + out.errors[i] + '</p></span>');
                        $("#" + i).focus();
                    }
                }
                if (out.result === -1) {

                }
                if (out.result === 1) {
                    $('#chat_wrapper').html(out.chat_wrapper);
                }
            });

        });
    };

    this.basicFilter = function () {
        var url = $("#basic_product_wrapper").data('url');
        $.post(url, function (res) {
            $("#basic_product_wrapper").html(res.basic_wrapper);
        })
    }

    this.basic_filter_form = function () {
        $(document).on('submit', '#basic_filter_form', function (evt) {
            evt.preventDefault();

            var url = $(this).attr("action");

            var postdata = $(this).serialize();
            var form = $(this)[0];

            $.post(url, postdata, function (out) {
                $('.error').remove();

                if (out.result === 0) {
                    for (var i in out.errors) {
                        $("#" + i).parent(".viewForm").append('<span class="error text-danger "><p style="text-align : left;">' + out.errors[i] + '</p></span>');
                        $("#" + i).focus();
                    }
                }
                if (out.result === -1) {

                }
                if (out.result === 1) {
                    $('#basic_product_wrapper').html(out.basic_wrapper);
                }
            });

        });
    };
    
 
    

    this.__construct();
};
var obj = new Event();
