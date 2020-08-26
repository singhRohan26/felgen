<?php 
defined('BASEPATH') or exit ('No direct script access allowed');

class Api extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['Api_model']);
        $this->load->model(['Post_model']);
    }
    
    public function uniqueId() {
        $str = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNIPQRSTUVWXYZ';
        $nstr = str_shuffle($str);
        $unique_id = substr($nstr, 0, 10);
        return $unique_id;
    }
    
    public function Registration(){
        $this->output->set_content_type('application/json');
        $key = $this->input->post('key');
        $name = $this->input->post('name');
        $email  = $this->input->post('email');
        $pass = $this->input->post('password');
        if(!empty($_FILES['image']['name'])){
            $file1=$this->doUploadFile('image');
        }if(empty($_FILES['image']['name'])){
            $file1='';
        }
        if($key == 1){
           //registration
            $checkmail = $this->Api_model->checkmail($email);
            if($checkmail){
                $this->output->set_output(json_encode(['result' => -1, 'msg' => 'E-Mail bereits vorhanden' ,'data' => 'E-Mail bereits vorhanden']));
                return false;
            }else{
                $result = $this->Api_model->signUp($name,$email,$pass,$file1,$this->uniqueId());
                if($result){
                    $img = $result['image'];
                    if(!empty($img)){
                        $result['image'] = base_url('uploads/profile-images/'.$result['image']); 
                    }else{
                        $result['image'] = ''; 
                    }
                    $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Registrierung erfolgreich' ,'data' => $result]));
                    return false;
                }else{
                    $this->output->set_output(json_encode(['result' => 0, 'msg' => 'Registrierung fehlgeschlagen' ,'data' => 'Registrierung fehlgeschlagen']));
                    return false;
                }
            }
        }else{
           //login
            $checkmail = $this->Api_model->checkmail($email);
            if($checkmail){
                if(!empty($pass)){
                    $password = $this->Api_model->checkpass($email,$pass);
                    if($password){
                        $phone = $password['phone'];
                        if($phone == null){
                            $password['phone'] = '';
                        }
                        $img = $password['image'];
                        if(!empty($img)){
                            $password['image'] = base_url('uploads/profile-images/'.$password['image']);
                        }else{
                            $password['image'] = ''; 
                        }
                        $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Login erfolgreich' ,'data' => $password]));
                        return false;
                    }else{
                        $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Falsches Passwort' ,'data' => 'Falsches Passwort']));
                        return false;
                    }
                }else{
                    $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Email überprüft' ,'data' => 'Email überprüft']));
                }
            }else{
                $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Email existiert nicht.' ,'data' => 'Email existiert nicht']));
                return false;
            }
        }
    }
    
    public function forgetPass(){
        $this->output->set_content_type('application/json');
        $email = $this->input->post('email');
        $newpass = rand('111111','999999');
        $checkmail = $this->Api_model->checkmail($email);
        if($checkmail){
            $updatePass = $this->Api_model->updatePass($email,$newpass);
            if($updatePass){
                $this->load->library('email');
                $this->email->set_mailtype("html");
                $this->email->from('info@felgen.com');
                $this->email->to($email);
                $this->email->subject('New Password');
                $htmlContent = '<p>Ihr neues Passwort für Ihr Konto lautet : '.$newpass.'</p>';
                $this->email->message($htmlContent);
                $res = $this->email->send();
                if ($res) {
                    $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Neues Passwort an Ihre E-Mail senden' , 'data' => 'Neues Passwort an Ihre E-Mail senden']));
                } else {
                    $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Error', 'data' => 'Error']));
                }
            }
        }
        else{
            $this->output->set_output(json_encode(['result' => 0, 'msg' => 'E-Mail-ID nicht registriert' ,'data' => 'E-Mail-ID nicht registriert']));
            return false;
        }
    }
    
    public function changePass(){
        $this->output->set_content_type('application/json');
        $user_id = $this->input->post('user_id');
        $old_pass = $this->input->post('old_pass');
        $new_pass  = $this->input->post('new_pass');
        $c_pass  = $this->input->post('c_pass');
        $checkold = $this->Api_model->checkold($old_pass,$user_id);
        if($checkold){
            if($old_pass == $new_pass){
                $this->output->set_output(json_encode(['result' => -2, 'msg' =>'Neues und altes Passwort dürfen nicht identisch sein' , 'data' => 'Neues und altes Passwort dürfen nicht identisch sein']));
            }else{
                if($new_pass == $c_pass){
                    $result = $this->Api_model->changePass($user_id,$old_pass,$new_pass);
                    if($result){
                        $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Das Passwort wurde erfolgreich geändert' , 'data' => 'Das Passwort wurde erfolgreich geändert']));
                    }else{
                        $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Aktualisierung fehlgeschlagen' , 'data' => 'Aktualisierung fehlgeschlagen']));
                    }
                }else{
                    $this->output->set_output(json_encode(['result' => 0, 'msg' =>'Neues und bestätigtes Passwort stimmen nicht überein' , 'data' => 'Neues und bestätigtes Passwort stimmen nicht überein']));
                }
            }  
        }else{
            $this->output->set_output(json_encode(['result' => -3, 'msg' =>'Das alte Passwort ist nicht korrekt' , 'data' => 'Das alte Passwort ist nicht korrekt']));
        }
    }
    
    public function updateBankDetails(){
        $this->output->set_content_type('application/json');
        $user_id = $this->input->post('user_id');
        $bank_name = $this->input->post('bank_name');
        $branch_name = $this->input->post('branch_name');
        $ifsc_code = $this->input->post('ifsc_code');
        $account_no = $this->input->post('account_no');
        $recipient = $this->input->post('recipient');
        $result = $this->Api_model->doupdateBankDetails($user_id,$bank_name,$branch_name,$ifsc_code,$account_no,$recipient);
        if($result){
            $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Bankverbindung erfolgreich aktualisiert.' , 'data' => $result]));
        }else{
            $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Details nicht aktualisiert.' , 'data' => 'Details nicht aktualisiert.']));
        }
    }
    
    public function loginWithFacebook(){
        $this->output->set_content_type('application/json');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $checkmail = $this->Api_model->checkmail($email);
        if($checkmail){
            $userid = $checkmail['user_id'];
            $image = $this->Api_model->getprofileimg($userid);
                if(!empty($image['image'])){
                    $checkmail['image'] = base_url('uploads/profile-images/'.$image['image']);
                }else{
                    $checkmail['image'] = '';
                }
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Login erfolgreich', 'data' => $checkmail]));
            return false;
        }else{
            $result = $this->Api_model->LoginwithFacebook($name,$email);
            if($result){
                 $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Login erfolgreich', 'data' => $result]));
                return false;
            }else{
                $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Login fehlgeschlagen', 'data' => 'Login fehlgeschlagen']));
                return false;
            }
        }
    }

    private function addpostImagesoptions() {
        $config = array();
        $config['upload_path'] = './uploads/posts/test/';
        $config['allowed_types'] = 'jpeg|jpg|png|mp4|mpg|mpeg|mpe|mov|avi|qt';
        $config['max_size'] = '3072';
        $config['overwrite'] = TRUE;
        $config['file_name'] = rand(11111, 99999);
        return $config;
    }
    
    public function addpostImages($post_id){
        $this->output->set_content_type('application/json');
        $this->load->library('upload');
        $count = count($_FILES['image_url']['size']);
        foreach ($_FILES as $key => $value) {
            for ($s = 0; $s < $count; $s++) {
                $_FILES['image_url']['name'] = $value['name'][$s];
                $_FILES['image_url']['type'] = $value['type'][$s];
                $_FILES['image_url']['tmp_name'] = $value['tmp_name'][$s];
                $_FILES['image_url']['error'] = $value['error'][$s];
                $_FILES['image_url']['size'] = $value['size'][$s];
                $this->upload->initialize($this->addpostImagesoptions());
                $this->upload->do_upload('image_url');
                $data = $this->upload->data();
                $this->Api_model->postImages($data['file_name'],$post_id);
            }
        }
    }
    
    public function addEditDeletePosts(){
        $this->output->set_content_type('application/json');
        $key = $this->input->post('key');
        $user_id = $this->input->post('user_id');
        $post_id = $this->input->post('post_id');
        $manufacturer_id = $this->input->post('manufacturer_id');
        $size_id = $this->input->post('size_id');
        $pcd_id = $this->input->post('pcd_id');
        $location_id = $this->input->post('location_id');
        $title = $this->input->post('title');
        $features = $this->input->post('features');
        $color = $this->input->post('color');
        $price = $this->input->post('price');
        $description = $this->input->post('description');
        $reference_no = rand('111111','999999');
        $date = date('Y-m-d');
        $time = date('H:i');
        
        if ($key == 1) {
            //Add Post
            $result = $this->Api_model->addPost($user_id,$manufacturer_id,$size_id,$pcd_id,$location_id,$title,$features,$color,$price,$description,$reference_no,$date,$time);
            if($result){
                $post_id = $result['post_id'];
                $this->addpostImages($post_id);
                $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Beitrag erfolgreich hinzugefügt' , 'data' => $result]));
            }else{
                $this->output->set_output(json_encode(['result' => 0, 'msg' =>'Beitrag konnte nicht hinzugefügt werden' , 'data' => 'Beitrag konnte nicht hinzugefügt werden']));
            }
        }else if($key == 2){
            $result = $this->Api_model->editPost($post_id,$manufacturer_id,$size_id,$pcd_id,$location_id,$title,$features,$color,$price,$description);
            if($result){
                if (!empty($_FILES['image_url']['size'])) {
                    $this->addpostImages($result['post_id']);
                }
                $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Beitrag erfolgreich aktualisiert' , 'data' => $result]));
            }else{
                $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Es wurden keine Änderungen vorgenommen.' , 'data' => 'Es wurden keine Änderungen vorgenommen.']));
            }
        }else{
            //Delete Post
            $deletePost = $this->Api_model->do_delete_post($post_id);
            if ($deletePost) {
                $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Es wurden keine Änderungen vorgenommen.', 'data' => 'Es wurden keine Änderungen vorgenommen.']));
            }else{
                $this->output->set_output(json_encode(['result' => 0, 'msg' => 'Etwas ist schief gelaufen.', 'data' => 'Etwas ist schief gelaufen.']));
            }
            return FALSE;
        }
    }

    public function getPostData(){
        $this->output->set_content_type('application/json');
        $post_id = $this->input->post('post_id');
        $user_id = $this->input->post('user_id');
        $result = $this->Api_model->getPostDetailByPostId($post_id);
        if($result){
            $result['favourites'] = $this->Api_model->checkfavourite($result['post_id'],$user_id);
            $images = $this->Api_model->getPostImages($post_id);
            $i=0; 
            foreach($images as $img){
                $result['images'][$i]['id'] = $img['media_id'];
                $result['images'][$i]['image'] = base_url('uploads/posts/test/'.$img['media']);
                $i++;
            }
            $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Daten geladen' , 'data' => $result]));
        }
    }

    public function deletePostImage(){
        $this->output->set_content_type('application/json');
        $image_id = $this->input->post('image_id');
        $post_id = $this->input->post('post_id');
        $result = $this->Api_model->do_delete_post_image($image_id, $post_id);
        if($result){
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Bild erfolgreich gelöscht.', 'data' => 'Bild erfolgreich gelöscht.']));
        }else{
            $this->output->set_output(json_encode(['result' => 0, 'msg' => 'Etwas ist schief gelaufen.', 'data' => 'Etwas ist schief gelaufen.']));
        }
    }

    public function viewPostDetail(){
        $this->output->set_content_type('application/json');
        $post_id = $this->input->post('post_id');
        $user_id = $this->input->post('user_id');
        $result = $this->Api_model->getPostDetailByPostId($post_id);
        if($result){
            if(!empty($user_id)){
                $result['favourites'] = $this->Api_model->checkfavourite($result['post_id'],$user_id);
            }else{
                $result['favourites'] = 0;
            }
            if(!empty($user_id)){
                $chat_status = $this->Api_model->checkChatStatus($result['post_id'],$user_id);
                if(!empty($chat_status['sender_id'] && $chat_status['reciever_id'] && $result['post_id'])){
                    if($chat_status['status'] == '1'){
                        $result['chat_status'] = '1';
                    }else{
                        $result['chat_status'] = '0';
                    }
                }else{
                    $result['chat_status'] = "";
                }
            }else{
                $result['chat_status'] = "";
            }
            $i=0;
            $images = $this->Api_model->getPostImages($post_id);
            $reviews = $this->Api_model->getReviewsPostid($post_id);
            if(!empty($reviews)){
                foreach ($reviews as $review) {
                $result['reviews'][$i]['review'] = $review['review'];
                $result['reviews'][$i]['rating'] = $review['rating'];
                $result['reviews'][$i]['username'] = $review['name'];
                if(!empty($review['image'])){
                   $result['reviews'][$i]['image'] = base_url('uploads/profile-images/'.$review['image']);    
                }else{
                    $result['reviews'][$i]['image'] = '';
                }
                $i++;
            }
            }else{
                $result['reviews'] = [];
            }
            $i=0;
            foreach($images as $img){
                $result['images'][$i] = base_url('uploads/posts/test/'.$img['media']);
                $i++;
            }
            $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Daten geladen' , 'data' => $result]));
        }else{
            $this->output->set_output(json_encode(['result' => 0, 'msg' =>'Daten nicht gefunden.' , 'data' => 'Daten nicht gefunden.']));
        }
    }

    public function viewPostList(){
        $this->output->set_content_type('application/json');
        $user_id = $this->input->post('user_id');
        $post_id = $this->input->post('post_id');
        $avg_rating = $this->Api_model->avgrating($user_id);
        if(empty($avg_rating)){
          $avg_rating = '0';    
        }
        $result = $this->Api_model->getPostListingByUserId($user_id, $post_id);
        $user_data = $this->Api_model->get_user_data($user_id);
        if(!empty($user_data['image'])){
            $image = base_url('uploads/profile-images/'.$user_data['image']);
        }else{
            $image = '';
        }
        if($result){
            $i=0;
            foreach ($result as $res) {
                $uploaded_time = $res['date'].' '.$res['time'];
                $datetime = $this->uploaded_time($uploaded_time);
                $result[$i]['post_id'] = $res['post_id'];
                if(!empty($user_id)){
                    $result[$i]['favourites'] = $this->Api_model->checkfavourite($res['post_id'],$user_id);
                    $result[$i]['uploaded_time'] = $datetime;
                }else{
                    $result[$i]['favourites']=0;
                }

                $images = $this->Api_model->getPostImage($res['post_id']);
                if(!empty($images)){
                    $result[$i]['media'] = base_url('uploads/posts/test'.$images['media']);
                }else{
                    $result[$i]['media'] = '';
                }

                $i++;
            }
            $this->output->set_output(json_encode(['result' => 1,'avg_rating'=>round($avg_rating) , 'msg' =>'Daten geladen', 'user_image' => $image, 'user_name' => $user_data['name'], 'count' => count($result), 'data' => $result]));
        }else{
            $this->output->set_output(json_encode(['result' => 0, 'msg' =>'Keine Daten gefunden' , 'data' => 'Keine Daten gefunden']));
        }
    }


    public function uploaded_time($uploaded_time){
        $date1 = strtotime($uploaded_time);
        $date2 = strtotime(date('Y-m-d H:i:s'));
        $diff = abs($date2 - $date1);
        $years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        $hours = floor(($diff - $years * 365*60*60*24  - $months*30*60*60*24 - $days*60*60*24) / (60*60));
        $minutes = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60);
        $seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minutes*60));

        $uploaded='';
        if(!empty($seconds)){
            if(!empty($minutes)){
              if(!empty($hours)){
                if(!empty($days)){
                    if(!empty($months)){
                        if(!empty($years)){
                            $years." years ";
                            $uploaded=$years." years";
                        }else{
                        $months." months ";
                        $uploaded=$months." months";
                        }
                    }else{
                        $days." days ";
                        $uploaded=$days." days";
                    }
                }else{
                    $hours." hours ";
                    $uploaded=$hours." hours";
                }
            }else{
                 $minutes." minutes ";
                 $uploaded=$minutes." minutes";
            }
            }else{
                $seconds.' seconds';
                $uploaded=$seconds." seconds";
            }
        }
        return $uploaded;
    }

    public function viewBasicPopularList(){
        $this->output->set_content_type('application/json');
        $key = $this->input->post('key');
        $user_id = $this->input->post('user_id');
        $city_id = $this->input->post('city_id');
        if ($key == 1) {
            $resultBasic = $this->Api_model->getBasicPostListing($user_id, $city_id);
            if($resultBasic){
                $i=0;
                foreach ($resultBasic as $resBasic) {
                    $resultBasic[$i]['post_id'] = $resBasic['post_id'];
                    if(!empty($user_id)){
                        $resultBasic[$i]['favourites'] = $this->Api_model->checkfavourite($resBasic['post_id'],$user_id);    
                    }else{
                        $resultBasic[$i]['favourites']=0;
                    }
                    $images = $this->Api_model->getPostImage($resBasic['post_id']);
                    if(!empty($images)){
                        $resultBasic[$i]['media'] = base_url('uploads/posts/test/'.$images['media']);
                    }else{
                        $resultBasic[$i]['media'] = '';
                    }
                    $i++;
                }
                $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Daten geladen' , 'data' => $resultBasic]));
            }else{
                $this->output->set_output(json_encode(['result' => 0, 'msg' =>'Keine Daten gefunden' , 'data' => []]));
            }
        }else{
            $resultPopular = $this->Api_model->getPopularPostListing($user_id, $city_id);
            if ($resultPopular) {
                $i=0;
                foreach ($resultPopular as $resPopular) {

                    $resultPopular[$i]['post_id'] = $resPopular['post_id'];
                    if(!empty($user_id)){
                        $resultPopular[$i]['favourites'] = $this->Api_model->checkfavourite($resPopular['post_id'],$user_id);    
                    }else{
                        $resultPopular[$i]['favourites']=0;
                    }

                    $image = $this->Api_model->getPostImage($resPopular['post_id']);
                    if(!empty($image)){
                        $resultPopular[$i]['media'] = base_url('uploads/posts/test/'.$image['media']);
                    }else{
                        $resultPopular[$i]['media'] = '';
                    }
                    $i++;
                }
                $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Daten geladen' , 'data' => $resultPopular]));
            }else{
                $this->output->set_output(json_encode(['result' => 0, 'msg' =>'Keine Daten gefunden' , 'data' => []]));
            }
        }
    }

    public function addFavourite(){
        $this->output->set_content_type('application/json');
        $post_id = $this->input->post('post_id');
        $user_id = $this->input->post('user_id');
        $checkingResponse = $this->Api_model->checkFavourites($post_id, $user_id);
        if ($checkingResponse) {
            $this->output->set_output(json_encode(['result' => 0, 'msg' => 'Produkt erfolgreich aus den Favoriten entfernt !.']));
            return FALSE;
        } else {
            $response = $this->Api_model->addToWishlist($post_id, $user_id);
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Produkt erfolgreich zu den Favoriten hinzugefügt !.']));
            return FALSE;
        }
    }

    public function favouritesList(){
        $this->output->set_content_type('application/json');
        $user_id = $this->input->post('user_id');
        $result = $this->Api_model->favouritesList($user_id);
        if ($result) {
            $i=0;
            foreach ($result as $res) {

                $result[$i]['post_id'] = $res['post_id'];
                if(!empty($user_id)){
                    $result[$i]['favourites'] = $this->Api_model->checkfavourite($res['post_id'],$user_id);    
                }else{
                    $result[$i]['favourites']=0;
                }

                $images = $this->Api_model->getPostImage($res['post_id']);
                if(!empty($images)){
                    $result[$i]['media'] = base_url('uploads/posts/test/'.$images['media']);
                }else{
                    $result[$i]['media'] = '';
                }
                $i++;
            }
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Daten gefunden', 'data' => $result]));
        }else{
            $this->output->set_output(json_encode(['result' => 0, 'msg' => 'Keine Daten gefunden.', 'data' => $result]));
        }
    }

    public function getUserData(){
        $this->output->set_content_type('application/json');
        $user_id = $this->input->post('user_id');
        $result = $this->Api_model->getUserDetailByUserId($user_id);
        if($result){
            if(!empty($result['image'])){
                $result['image'] = base_url('uploads/profile-images/'.$result['image']);
            }else{
                $result['image'] = '';
            }
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Daten gefunden', 'data' => $result]));
            return false;
        }else{
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Keine Daten gefunden', 'data' => 'Keine Daten gefunden']));
            return false;
        }
    }

    public function doUploadFile($file){
        $file1 = $_FILES[$file]['name'];
        $config['upload_path'] = './uploads/profile-images/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '0';
        $config['file_name'] = rand();
        $this->upload->initialize($config);
        $this->upload->do_upload($file);
        $upload_data = $this->upload->data();
        return $upload_data['file_name']; 
    }

    public function updateUserProfile(){
        $this->output->set_content_type('application/json');
        $user_id = $this->input->post('user_id');
        $name = $this->input->post('name');
        $phone = $this->input->post('phone');
        
        if(!empty($_FILES['image_url']['name'])){
            $file = $_FILES['image_url']['name'];
            $ext = pathinfo($file,PATHINFO_EXTENSION);
            $fnn = rand().'.'.$ext;
            $config['upload_path'] = './uploads/profile-images/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['file_name']  = $fnn;
            $this->upload->initialize($config);
            if($this->upload->do_upload('image_url')){ 
                $result = $this->Api_model->doupdateprofileimg($name,$phone,$fnn,$user_id);
                if($result){
                    $img = $result['image'];
                    if(!empty($img)){
                        $result['image'] = base_url('uploads/profile-images/'.$result['image']);
                    }else{
                        $result['image'] = '';
                    } 
                $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Profil aktualisiert' , 'data' => $result]));
                }else{
                    $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Profil konnte nicht aktualisiert werden.' , 'data' => 'Profil konnte nicht aktualisiert werden.']));
                }
            }
        }else{                                                      
            $result = $this->Api_model->doupdateprofile($name,$phone,$user_id);
            if($result){
            $img = $result['image'];
            if(!empty($img)){
                $result['image'] = base_url('uploads/profile-images/'.$result['image']);    
            }else{
                $result['image'] = '';
            }
                $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Profil aktualisiert.' , 'data' => $result]));        
            }else{
                $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Profil konnte nicht aktualisiert werden' , 'data' => 'Profil konnte nicht aktualisiert werden']));
            }
        } 
    }

    public function getallCities(){
        $this->output->set_content_type('application/json');
        $cities = $this->Api_model->getallCities();
        if($cities){
            $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Daten gefunden' , 'data' => $cities]));
        }else{
            $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Keine Daten gefunden' , 'data' => 'Keine Daten gefunden']));
        }
    }
    
    public function getallFilterCities(){
        $this->output->set_content_type('application/json');
        $cities = $this->Api_model->getallFilterCities();
        if($cities){
            $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Daten gefunden' , 'data' => $cities]));
        }else{
            $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Keine Daten gefunden' , 'data' => 'Keine Daten gefunden']));
        }
    }

    public function getallManufacturers(){
        $this->output->set_content_type('application/json');
        $manufacturers = $this->Api_model->getallManufacturers();
        if($manufacturers){
            $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Daten gefunden' , 'data' => $manufacturers]));
        }else{
            $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Keine Daten gefunden' , 'data' => 'Keine Daten gefunden']));
        }
    }

    public function getallSizes(){
        $this->output->set_content_type('application/json');
        $size = $this->Api_model->getallSizes();
        if($size){
            $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Daten gefunden' , 'data' => $size]));
        }else{
            $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Keine Daten gefunden' , 'data' => 'Keine Daten gefunden']));
        }
    }

    public function getallPCD(){
        $this->output->set_content_type('application/json');
        $pcd = $this->Api_model->getallPCD();
        if($pcd){
            $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Daten gefunden' , 'data' => $pcd]));
        }else{
            $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Keine Daten gefunden' , 'data' => 'Keine Daten gefunden']));
        }
    }

    public function updatebasicPopularPosts(){
        $this->output->set_content_type('application/json');
        $post_id = $this->input->post('post_id');
        $ad_type = $this->input->post('ad_type');
        $result = $this->Api_model->doInsertAdType($post_id, $ad_type);
        if($result){
			  if(!empty($result['media'])){
				  $result['media'] = base_url('uploads/posts/test/'.$result['media']);
			  }else{
				  $result['media'] = '';
			  }
            $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Erfolgreich geupdated.' , 'data' => $result]));
        }else{
            $this->output->set_output(json_encode(['result' => 0, 'msg' =>'Etwas ist schief gelaufen.' , 'data' => 'Etwas ist schief gelaufen.']));
        }
    }

    public function getColorName(){
        $this->output->set_content_type('application/json');
        $color = $this->Api_model->getColorName();
        if($color){
            $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Daten gefunden' , 'data' => $color]));
        }else{
            $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Keine Daten gefunden' , 'data' => 'Keine Daten gefunden']));
        }
    }

    public function addReviewRating(){
        $this->output->set_content_type('application/json');
        $post_id = $this->input->post('post_id');
        $sender_id = $this->input->post('sender_id');
        $reciever_id = $this->input->post('reciever_id');
        $review = $this->input->post('review');
        $rating = $this->input->post('rating');
        $result = $this->Api_model->doInsertReviewRating($post_id, $sender_id, $reciever_id, $review, $rating);
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Bewertung erfolgreich hinzugefügt.' , 'data' => 'Bewertung erfolgreich hinzugefügt.']));
        }else{
            $this->output->set_output(json_encode(['result' => 0, 'msg' =>'Etwas ist schief gelaufen.' , 'data' => 'Etwas ist schief gelaufen.']));
        }
    }

    public function chatInsert(){
        $this->output->set_content_type('application/json');
        $post_id = $this->input->post('post_id');
        $sender_id = $this->input->post('sender_id');
        $reciever_id = $this->input->post('reciever_id');
        $message = $this->input->post('message');
        $time = date('H:i');
        $date = date('Y-m-d');
		$result_sender=$this->Api_model->checkSenderToReceiver($post_id,$sender_id, $reciever_id, $message, $time, $date);
		$result_receiver=$this->Api_model->checkReceiverToSender($post_id,$sender_id, $reciever_id, $message, $time, $date);
		
		if($result_sender || $result_receiver){
			$result = $this->Api_model->updatechatlist($post_id,$message,$time, $date);
		}else{
			$result = $this->Api_model->insertchatList($post_id,$sender_id, $reciever_id, $message, $time, $date);
		}
        if($result){
            $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Daten gefunden.' , 'data' => 'Daten gefunden.']));
        }else{
            $this->output->set_output(json_encode(['result' => 0, 'msg' =>'Etwas ist schief gelaufen.' , 'data' => 'Etwas ist schief gelaufen.']));
        }
    }

    public function getPages(){
        $this->output->set_content_type('application/json');
        $page_id = $this->input->post('page');
        $result = $this->Api_model->getPages($page_id);
        $result['text'] = html_entity_decode(strip_tags($result['text']));
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Daten gefunden.', 'data' => $result]));
        } else {
            $this->output->set_output(json_encode(['result' => 0, 'msg' => 'Keine Daten gefunden.', 'data' => 'Keine Daten gefunden.']));
            return FALSE;
        }
    }

    public function filterPosts(){
        $this->output->set_content_type('application/json');
        $manufacturer_id = $this->input->post('manufacturer_id');
        $size_id = $this->input->post('size_id');
        $pcd_id = $this->input->post('pcd_id');
        $city_id = $this->input->post('city_id');
        $color_name = $this->input->post('color_name');
        $user_id = $this->input->post('user_id');
        $resultBasic = $this->Api_model->getFilteredBasicData($manufacturer_id, $size_id, $pcd_id, $city_id, $color_name, $user_id);
        $i=0;
        foreach ($resultBasic as $resBasic) {
            $resultBasic[$i]['post_id'] = $resBasic['post_id'];
            if(!empty($user_id)){
                $resultBasic[$i]['favourites'] = $this->Api_model->checkfavourite($resBasic['post_id'],$user_id);    
            }else{
                $resultBasic[$i]['favourites']=0;
            }

            $images = $this->Api_model->getPostImage($resBasic['post_id']);
            if(!empty($images)){
                $resultBasic[$i]['media'] = base_url('uploads/posts/test/'.$images['media']);
            }else{
                $resultBasic[$i]['media'] = '';
            }
            $i++;
        }
        $resultPopular = $this->Api_model->getFilteredPopularData($manufacturer_id, $size_id, $pcd_id, $city_id, $color_name, $user_id);
        
        $i=0;
        foreach ($resultPopular as $resPopular) {
            $resultPopular[$i]['post_id'] = $resPopular['post_id'];
            if(!empty($user_id)){
                $resultPopular[$i]['favourites'] = $this->Api_model->checkfavourite($resPopular['post_id'],$user_id);    
            }else{
                $resultPopular[$i]['favourites']=0;
            }

            $image = $this->Api_model->getPostImage($resPopular['post_id']);
            if(!empty($image)){
                $resultPopular[$i]['media'] = base_url('uploads/posts/test/'.$image['media']);
            }else{
                $resultPopular[$i]['media'] = '';
            }
            $i++;
        }
        // print_r($resultPopular);die;
        if($resultBasic || $resultPopular){
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Daten gefunden.', 'basic' => $resultBasic, 'popular' => $resultPopular]));
        }else {
            $this->output->set_output(json_encode(['result' => 0, 'msg' => 'Keine Daten gefunden.', 'data' => []]));
            return FALSE;
        }
    }

    public function chatList(){
        $this->output->set_content_type('application/json');
        $reciever_id = $this->input->post('reciever_id');
        $result = $this->Api_model->getChatList($reciever_id);
        $i = 0;
        foreach ($result as $res) {
            $uploaded_time = $res['time'];
            $datetime = $this->uploaded_time($uploaded_time);   
                    
            $image = $this->Api_model->getUserImage($res['user_id']);
            if(!empty($image)){
                $result[$i]['image'] = base_url('uploads/profile-images/'.$image['image']);
                $result[$i]['uploaded_time'] = $datetime;
            }else{
                $result[$i]['image'] = '';
            }
            $i++;
        }
        if($result){
            $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Daten gefunden.' , 'data' => $result]));
        }else{
            $this->output->set_output(json_encode(['result' => 0, 'msg' =>'Etwas ist schief gelaufen.' , 'data' => 'Etwas ist schief gelaufen.']));
        }
    }
    
    public function chatusers(){
        $this->output->set_content_type('application/json');
        $user_id = $this->input->post('user_id');
        $result = $this->Api_model->getchatuserlists($user_id);
        if($result){
            $i=0;
            foreach($result as $res){
                if($user_id == $res['receiver_id1']){
                    $result[$i]['user_type'] = "Seller";
                }else{
                    $result[$i]['user_type'] = "Buyer";
                }
                
                $image = $this->Api_model->getpostimg($res['post_id']);
                if(!empty($image['media'])){
                    $result[$i]['post_image'] = base_url('uploads/posts/test/'.$image['media']);    
                }else{
                    $result[$i]['post_image'] = '';
                }
                if(!empty($res['receiver_image'])){
					$result[$i]['receiver_image'] = base_url('uploads/profile-images/'.$res['receiver_image']);
				}else{
					$result[$i]['receiver_image'] = '';
				}
				$user_id = $result[$i]['sender_id'];
                $i++;
            }
            $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Daten geladen.' , 'data' => $result]));
        }else{
            $this->output->set_output(json_encode(['result' => 0, 'msg' =>'Keine Daten gefunden.' , 'data' => 'Keine Daten gefunden.']));
        }
    }
	
	public function chatActions(){
		$this->output->set_content_type('application/json');
		$type = $this->input->post('type');
		$user_id = $this->input->post('user_id');
		$post_id = $this->input->post('post_id');
		$rec_id = $this->input->post('rec_id');
		if($type == 'finish'){
			$result = $this->Api_model->finishdeal($user_id,$post_id,$rec_id);
			if($result){
				$this->output->set_output(json_encode(['result' => 1, 'msg' =>'Deal beendet' , 'data' => 'Deal beendet']));
			}else{
				$this->output->set_output(json_encode(['result' =>-1, 'msg' =>'gescheitert' , 'data' => 'gescheitert']));
			}
		}else{
			$result = $this->Api_model->deletechat($user_id,$post_id,$rec_id);
			if($result){
				$this->output->set_output(json_encode(['result' => 1, 'msg' =>'Chat gelöscht' , 'data' => 'Chat gelöscht']));
			}else{
				$this->output->set_output(json_encode(['result' =>-1, 'msg' =>'gescheitert' , 'data' => 'gescheitert']));
			}
		}
	}
	
	public function userReviews(){
		$this->output->set_content_type('application/json');
		$user_id = $this->input->post('user_id');
		$result = $this->Api_model->userReviews($user_id);
		if($result){
			$i=0;
			foreach($result as $res){
				if(!empty($res['image'])){
				    $result[$i]['image'] = base_url('uploads/profile-images/'.$res['image']);
			    }else{
				    $result[$i]['image'] = '';
			    }
			    $i++;
			}
			$this->output->set_output(json_encode(['result' => 1, 'msg' =>'Daten geladen.' , 'data' => $result]));
		}else{
			$this->output->set_output(json_encode(['result' =>-1, 'msg' =>'Keine Daten gefunden.' , 'data' => 'Keine Daten gefunden.']));
		}
	}
	//-------------stripe payment-----------------
	public function payment(){
		$this->output->set_content_type('application/json');
		$post_id = $this->input->post('post_id');
		$price = $this->input->post('price');
		$user_id = $this->input->post('user_id');
		$source = $this->input->post('source');
		$token = $this->input->post('token');
		require_once('application/libraries/stripe-php/init.php');
        \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));
        try {
            $charge = \Stripe\Charge::create ([
                "amount" => ($price * 100),
                "currency" => "EUR",
                "source" => $token,
                "description" => "Felgeninserate Payment"
            ]);
            $chargeJson = $charge->jsonSerialize();
        }catch(Stripe_CardError $e) {
            // Since it's a decline, Stripe_CardError will be caught
            $body = $e->getJsonBody();
            $err  = $body['error'];
            print('Status is:' . $e->getHttpStatus() . "\n");
            print('Type is:' . $err['type'] . "\n");
            print('Code is:' . $err['code'] . "\n");
                // param is '' in this case
            print('Param is:' . $err['param'] . "\n");
            print('Message is:' . $err['message'] . "\n");
            } catch (Stripe_InvalidRequestError $e) {
                // Invalid parameters were supplied to Stripe's API
            } catch (Stripe_AuthenticationError $e) {
                // Authentication with Stripe's API failed
                // (maybe you changed API keys recently)
            } catch (Stripe_ApiConnectionError $e) {
                // Network communication with Stripe failed
            } catch (Stripe_Error $e) {
                // Display a very generic error to the user, and maybe send
                // yourself an email
            } catch (Exception $e) {
                // Something else happened, completely unrelated to Stripe
            }
        if(!empty($chargeJson)){
            $txn_id = $chargeJson['balance_transaction'];
            $this->Api_model->stripetransaction($user_id,$post_id,$txn_id,$source);
    		$this->Api_model->updateAdType($price,$post_id);
    		$result = $this->Api_model->getpostimg($post_id);
		    if(!empty($result['media'])){
			    $result['media'] = base_url('uploads/posts/test/'.$result['media']);
			}else{
			     $result['image'] = '';
			 }
		    $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Transaktion erfolgreich.', 'data' => $result]));
		    return false;
		 }else{	 
		    $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Transaktion fehlgeschlagen.', 'data' => 'Transaktion fehlgeschlagen.']));
		    return false;
		 }
	}
	//-------------stripe payment-----------------
	//-------------payapl-----------------
	public function paypalPayment(){
	    $this->output->set_content_type('application/json');
		$post_id = $this->input->post('post_id');
		$price = $this->input->post('price');
		$user_id = $this->input->post('user_id');
		$source = $this->input->post('source');
		$txn_id = $this->input->post('token');
		$resultPayment = $this->Api_model->paypalPayment($post_id,$user_id,$source,$txn_id);
		if($resultPayment){
    		$this->Api_model->updateAdType($price,$post_id);
    		$result = $this->Api_model->getpostimg($post_id);
    		if(!empty($result['media'])){
    		    $result['media'] = base_url('uploads/posts/test'.$result['media']);
    		}else{
    		     $result['image'] = '';
    		}
		$this->output->set_output(json_encode(['result' => 1, 'msg' => 'Transaktion erfolgreich.', 'data' => $result]));
		    return false;
		}else{	 
		    $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Transaktion fehlgeschlagen.', 'data' => 'Transaktion fehlgeschlagen.']));
		    return false;
		}
	}
	//-------------paypal-----------------
	
	//-------------push notification-----------------
// 	public function getToken(){
//         $this->output->set_content_type('application/json');
//         $user_id = $this->input->post('user_id');
//         $token_id = $this->input->post('token_id');
//         $check = $this->Post_model->checkTokenid($token_id);
//             if($check){
//                 $this->output->set_output(json_encode(['result' => 0, 'msg' => 'Token existiert bereits', 'data' => 'Token existiert bereits']));
//                 return false;
//             }else{
//                 $getuser = $this->Post_model->checkUser($user_id);
//                 if($getuser){
//                     $result = $this->Post_model->updateToken($user_id,$token_id);
//                 if($result){
//                     $this->output->set_output(json_encode(['result' => 2, 'msg' => 'Token-ID aktualisiert', 'data' => $result]));
//                     return false;
//                 }else{
//                     $this->output->set_output(json_encode(['result' => -2, 'msg' => 'Fehler beim Aktualisieren der Token-ID', 'data' => 'Fehler beim Aktualisieren der Token-ID']));
//                     return false;
//                 }
//             }else{
//                 $result = $this->Post_model->getToken($user_id,$token_id);
//                 if($result){
//                     $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Token-ID hinzugefügt', 'data' => $result]));
//                     return false;
//                 }else{
//                     $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Fehler beim Hinzufügen der Token-ID', 'data' => 'Fehler beim Hinzufügen der Token-ID']));
//                     return false;
//                 }
//             }      
//         }
//     }

  public function getToken()
  {
        $this->output->set_content_type('application/json');
        $user_id = $this->input->post('user_id');
        $token_id = $this->input->post('token_id');
        $result = $this->Post_model->getToken($user_id,$token_id);
        if($result){
                    $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Token-ID hinzugefügt', 'data' => $result]));
                    return false;
                }else{
                    $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Fehler beim Hinzufügen der Token-ID', 'data' => 'Fehler beim Hinzufügen der Token-ID']));
                    return false;
                }
  }
    
    public function sendNotification(){
        $this->output->set_content_type('application/json');
        $user_id = $this->input->post('user_id');
        $text = $this->input->post('msg');
        $result = $this->Post_model->getTokenByid($user_id);
        foreach($results as $result)
        {
            $token = $result['token_id'];
             $msg= array('body'	=> $text ,
		            'title'	=> 'New Message'
		          );
            $res = $this->send_notification($token,$msg);
            return $res;
        }
        
    }
    
    function send_notification($token,$msg){
        define( 'API_ACCESS_KEY', 'AAAAMHB7GD8:APA91bFj-nk-afJVFTns4pQPXmqAL_FgDK6m7tyPf-wF7hRHoE-yIICuj_6BUUpM_M96zpk4Bg2TAJ6m037X5Dg9npcgW8VmIicGDmBGBJxF4mvED9-97w-RM0hezh8fy3E6jr7mM-Mn');	    
		    $fields = array(
    			 'to' => $token,
    			 'notification' =>$msg
		 	);
            $headers = array('Authorization:key = '.API_ACCESS_KEY,
                'Content-Type: application/json'
            );
    	    $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
       
            $result = curl_exec($ch);    
            if ($result === FALSE) {
               die('Curl failed: ' . curl_error($ch));
           }
           curl_close($ch);
           return 'Notification Send All';
	}
	
	public function deleteToken(){
	    $this->output->set_content_type('application/json');
	    $user_id = $this->input->post('user_id');
        $token_id = $this->input->post('token_id');
	    $result = $this->Api_model->checkUserToken($user_id, $token_id);
	    if($result){
	        $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Daten gelöscht', 'data' => $result]));
            return false;
	    }else{
	        $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Keine Daten gefunden.', 'data' => 'Keine Daten gefunden.']));
            return false;
	    }
	}
	
	//-------------push notification-----------------
}
?>