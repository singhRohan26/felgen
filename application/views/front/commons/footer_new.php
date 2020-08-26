
   <!-- Modal -->
  <div class="modal fade modal_postadd" id="modal_postadd" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
         <h4>Bitte wählen Sie ein Abonnement aus, um mit Ihrem Beitrag fortzufahren. Andernfalls wird Ihr Beitrag gelöscht</h4>
       <div class="debait_card post_card boxs">
			<!-- <form> -->
			<span>
				<input type="radio" id="yes_add" name="radio-group">
				<label for="yes_add">Ja, ich möchte fortfahren</label>
			</span>
			<span>
				<input type="radio" id="no_add" onclick="window.location.href='<?php echo base_url();?>'" name="radio-group">
				<label for="no_add">Nein, ich bin nicht interessiert</label>
			</span>
			<!-- </form> -->
	</div>
       
      </div>
      
    </div>
  </div>

<section class="footerbtm boxs">
    <div class="container-fluid">
        <div class="btmleft d-inline-block ">
            <p><span><i class="far fa-copyright"></i></span> FELGENINSERATE</p>
        </div>
        <div class="btmright d-inline-block float-right ">
            <a target="_blank" href="<?php echo $socialmedia[2]['url']; ?>"><i class="fab fa-instagram"></i></a>
            <a target="_blank" href="<?php echo $socialmedia[0]['url']; ?>"><i class="fab fa-twitter"></i></a>
            <a target="_blank" href="<?php echo $socialmedia[1]['url']; ?>"><i class="fa fa-facebook-f"></i></a>
        </div>
    </div>
</section>
<?php if(!empty($receiver_user['user_id'])){ ?>
  <div id="chck_config" data-url="<?php echo base_url('site/setapikey');?>" data-msg="<?php echo base_url('site/chat_wrapper/'. $receiver_user['user_id']);?>" data-val="<?php echo base_url('post/addChatList');?>">
         <?php if(!empty($login_user)){
            if(empty($login_user['image'])){
                $login_user['image'] = 'user.png';
            }  if(empty($receiver_user['image'])){
                $receiver_user['image'] = 'user.png';
            }
         ?>
               <input type="hidden" id="login_user_id" value="<?php echo $login_user['user_id'];?>">
            <input type="hidden" id="chat_list" value="<?php echo base_url('post/addChatList');?>">
               <input type="hidden" id="login_user_name" value="<?php echo $login_user['name'];?>">
               <input type="hidden" id="login_user_image" value="<?php echo base_url('uploads/profile-images/'.$login_user['image']);?>">
               <input type="hidden" id="reciver_user_id" value="<?php echo $receiver_user['user_id'];?>">
               <input type="hidden" id="reciver_user_name" value="<?php echo $receiver_user['name'];?>">
               <input type="hidden" id="reciver_user_image" value="<?php echo base_url('uploads/profile-images/'.$receiver_user['image']);?>">
               <input type="hidden" id="reciver_post_id" value="<?php echo $receiver_user['post_id'];?>">
          <?php
              }
          ?>
  </div>
<?php } ?>
  <div class="modal subscription_modal" id="subscription_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-body">
                  <div class="signupPopup boxs">
                      <div class="innerSignup client_Login boxs py-0">
                          <button type="button" class="close float-left" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                          <div class="signupContent boxs">
                              <div class="signupTop detailFill  boxs">
                                  <p>Thank You For Adding Post</p>
                              </div>
                              <div class="signupBtm boxs">
                                  <span class="signUptxt">Do you want a Subscription ?</span>
                                  <div class="signupBtns boxs">
                                      <a href="<?php echo base_url('Post/payment/'. $post_id)?>">YES</a>
                                      <a href="<?php echo base_url('/'); ?>" class="notNow">NOT NOW</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div> 
      </div>
  </div>
    <script src="<?php echo base_url('public/js/jquery.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/slick.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/fontawesome.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/custom.js'); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://js.stripe.com/v2/"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
    <script src="<?php echo base_url('public/js/event.js'); ?>"></script>
    <script>
		
          $('.select2').select2();
    </script>
    
   <script>
// Set your publishable key
    Stripe.setPublishableKey('pk_live_itDsxpWkrkvDNLUEIfsGNXOl00NbEMM7Ua');

// Callback to handle the response from stripe
    function stripeResponseHandler(status, response) {
        if (response.error) {
            // Enable the submit button
            $('#payment_btn').removeAttr("disabled");
            // Display the errors on the form
            $(".payment-status").html('<p>' + response.error.message + '</p>');
        } else {
            var form$ = $('#stripe_form');
            // Get token id
            var token = response.id;
            // Insert the token into the form
            form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
            // Submit form to the server
            form$.get(0).submit();
        }
    }
    
  
    // On form submit
    $(document).on('submit', '#stripe_form', function (evt) {
        evt.preventDefault();
        // Disable the submit button to prevent repeated clicks
        $('#payment_btn').attr("disabled", "disabled");
        
//        var month = $('.carddropbtn1').children('span').text();
//        var year = $('.carddropbtn2').children('span').text();
        // Create single-use token to charge the user
        Stripe.createToken({
            number: $('#acc').val(),
            exp_month: $('#month').val(),
            exp_year: $('#year').val(),
//            exp_month: month,
//            exp_year: year,
            cvc: $('#cvv').val()
        }, stripeResponseHandler);

        // Submit from callback
        return false;
    });
</script>
<!-- The core Firebase JS SDK is always required and must be listed first -->
 <script src="https://www.gstatic.com/firebasejs/5.9.1/firebase.js"></script>

<script>
  // Your web app's Firebase configuration
//   function firebase(){
//   var url = $("#chck_config").data('url');
//   $.post(url, function(res){
//         var firebaseConfig = {
//                 apiKey: '"'+res.firebase['authDomain']+'"',
//                 authDomain: '"'+res.firebase['authDomain']+'"',
//                 databaseURL: '"'+res.firebase['databaseURL']+'"',
//                 projectId: '"'+res.firebase['projectId']+'"',
//                 storageBucket: '"'+res.firebase['storageBucket']+'"',
//                 messagingSenderId: '"'+res.firebase['messagingSenderId']+'"',
//                 appId: '"'+res.firebase['appId']+'"',
//                 measurementId: '"'+res.firebase['measurementId']+'"',
//             };
             
            
//               firebase.initializeApp(firebaseConfig);
           
//   })
// }
// firebase();
   
 
 var firebaseConfig = {
     apiKey: "AIzaSyAt0B_0iiT7l3me1JHuskPi0AH-sSXGOpQ",
    authDomain: "felgeninserate.firebaseapp.com",
    databaseURL: "https://felgeninserate.firebaseio.com",
    projectId: "felgeninserate",
    storageBucket: "felgeninserate.appspot.com",
    messagingSenderId: "208045545535",
    appId: "1:208045545535:web:1cdb9df46a79b8fc14008a",
    measurementId: "G-X803947X1F"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  
  $(document).on('click', '.img_desc_rec', function (e) {
  var login_user_id = $("#login_user_id").val();
  var login_user_name = $("#login_user_name").val();
  var login_user_image = $("#login_user_image").val();
  var reciver_user_id = $("#reciver_user_id").val();
  var reciver_user_name = $("#reciver_user_name").val();
  var reciver_user_image = $("#reciver_user_image").val();
  var reciver_post_id = $("#reciver_post_id").val();
  firebase.database().ref('users/' + login_user_id).set({

                id: login_user_id,
                name: login_user_name,
               

            })

 var url = $("#chck_config").data('val');
 
   $.post(url, { sender_id: $("#login_user_id").val(), reciever_id: $("#reciver_user_id").val(), post_id: $("#reciver_post_id").val(), message: $('.chat_desc').val() } );
       
  var messagesRef = firebase.database().ref('messages');
                var msg = $('.chat_desc').val();
                if (msg.trim() != '') {
                     $.post('Post/sendNotification',{ user_id: $("#login_user_id").val(), text: $('.chat_desc').val() });
                      var msg = $('.chat_desc').val();
                       $('.chat_desc').val('');
                      var newPostKey = firebase.database().ref().child('messages').push().key;
                      var keyyyy = firebase.database().ref("messages").push().key;
                      var newMessageRef = messagesRef.push();
                      var key = newMessageRef.key;
                      firebase.database().ref('user-messages/' + login_user_id +'/'+reciver_post_id+'/' + reciver_user_id +'/' + key).set("1");
                      firebase.database().ref('user-messages/' + reciver_user_id +'/'+reciver_post_id+'/' + login_user_id +'/' + key).set("1");
                                newMessageRef.set({
                                    formId: login_user_id,
                                    text: msg,
                                    toId: reciver_user_id,
                                });  
   
                           }

 });

         var query = firebase.database().ref('user-messages/' + $("#login_user_id").val() +'/'+$("#reciver_post_id").val()+'/' + $("#reciver_user_id").val());
            var senderr_masg=[];
            var recieverr_masg=[];            
           query.on('child_added', function (childSnapshot) {
         var key = childSnapshot.key;
         var query_msg = firebase.database().ref('messages');
          
             query_msg.on('child_added', function (childSnapshot) {
     
            var msgData = childSnapshot.val();
            var formId =msgData.formId;
            var toId =msgData.toId;
            var key_msg = childSnapshot.key;
            
            if(key==key_msg){
                       if(formId==$("#login_user_id").val()) {
                             var sender_masg =msgData.text;
                             senderr_masg.push(sender_masg);
                  $(".chat_msg")
                  .append('<div class="message-box boxs"><div class="message-box__item outgoing"><div class="name"><div class="box-text tringl tringl2"><p>'+msgData.text+'</p></div><div class="chatimng1 chatimng2 boxs"><img src="'+$("#login_user_image").val()+'" class="img-responsive" alt="chat2"></div></div></div></div> ')
                       }
                       if(toId==$("#login_user_id").val()) {
                         $(".chat_msg")
                  .append('<div class="message-box boxs"><div class="message-box__item incoming"><div class="name"><div class="chatimng1 boxs"><img src="'+$("#reciver_user_image").val()+'" class="img-responsive" alt="chat1"></div><div class="box-text tringl tringl1"><p>'+msgData.text+'</p> </div></div></div> ')
                          var reciever_masg =msgData.text;
                              recieverr_masg.push(reciever_masg);
                       }
            }

         
        });
            
        });
              
         
</script>
  
</body>
</html>