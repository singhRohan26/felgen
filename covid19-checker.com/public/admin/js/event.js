var Event = function () {
  this.__construct = function () {
    this.commonForm();
    this.deleteItem();
  };
    
    this.commonForm = function(){
        $(document).on('submit', '#common-form', function(e){
              e.preventDefault();
            var url = $(this).attr("action");
            var postdata = $(this).serialize();
            $.post(url, postdata, function (out) {
                $(".form-group > .error").remove();
                if (out.result === 0) {
                    var a = 1;
                    for (var i in out.errors) {
                        $("#" + i).parents(".form-group").append('<span class="error text-danger">' + out.errors[i] + '</span>');
                        if(a == 1){
                            $("#" + i).focus();
                        }
                        a++;
                    }
                }
                if (out.result === -1) {
                    var message = '<button type="button" class="btn close" data-dismiss="alert" aria-label="Close"></button>';
                    $("#error_msg").removeClass('alert-warning alert-success admin_chk_suc').addClass('alert alert-danger alert-dismissable admin_chk_dng').show();
                    $("#error_msg").html(message + out.msg);
                    $("#error_msg").fadeOut(2000);
                }
                if (out.result === 1) {
                    var message = '<button type="button" class="btn close" data-dismiss="alert" aria-label="Close"></button>';
                    $("#error_msg").removeClass('alert-danger alert-danger admin_chk_dng').addClass('alert alert-success alert-dismissable admin_chk_suc').show();
                    $("#error_msg").html(message + out.msg);
                    $("#error_msg").fadeOut(2000);
                    window.setTimeout(function () {
                        window.location.href = out.url;
                    }, 1000);
                }
            });
        })
    }
    
    this.deleteItem = function(){
        $(document).on('click', '.delete-item', function(e){
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


  
  this.__construct();
};
var obj = new Event();