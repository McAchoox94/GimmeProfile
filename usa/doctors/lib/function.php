<?php 
 
function redirect_JS($page){
     echo '<script>window.location = "'.$page.'";</script>';	
}
function islogin() {
    if(!(isset($_SESSION['adminName']) && $_SESSION['adminName'] != NULL  )){
        redirect_JS('login.php');
    }
}

function img_hodelr(){
		$img='<img class="img-rounded" data-src="holder.js/140x140" alt="140x140"  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIwAAACMCAYAAACuwEE+AAACZElEQVR4nO3YMW6jUBRA0ex/KeyABdDTu6VmC0yFRTxOJldyJsY5xSlwJH8r78L/9tu6rht81dtPfwDORTAkgiERDIlgSARDIhgSwZAIhkQwJIIhEQyJYEgEQyIYEsGQCIZEMCSCIREMiWBIBEMiGBLBkAiGRDAkgiERDIlgSARDIhgSwZAIhkQwJIIhEQyJYEgEQyIYEsGQCIZEMCSCIREMiWBIBEMiGBLBkAiGRDAkgiERDIlgSARDIhgSwZAIhkQwJIIhEQyJYEgEQyIYkpcIZhzHbRiGu3+7XC7bMAzbPM/X15Zl2YZhuFqW5anXeyanD+Y4iM+GexzgMAzbNE3buq7bNE3bOI5Pu96zOXUwx+HdG+A8z38NcH8CXC6Xd9fLslyfBPtw53l+90R49Ho//f/7dcHsd+q9LWIf/u0W8dEA9+tpmq7vdYznu9Y7m1MHcxzk7QDHcdymaboOch/g/tT4bIBf3XYetd6ZvGQwx63kdoBfueP3p8zxHPKd653JSwazX9+apumfZ4p94Pt73DtrPHK9s3nJYI5u7/h1/fxbyziO784q977RPHK9s/mVwXz0u8hH543brelR653RSwTD/yMYEsGQCIZEMCSCIREMiWBIBEMiGBLBkAiGRDAkgiERDIlgSARDIhgSwZAIhkQwJIIhEQyJYEgEQyIYEsGQCIZEMCSCIREMiWBIBEMiGBLBkAiGRDAkgiERDIlgSARDIhgSwZAIhkQwJIIhEQyJYEgEQyIYEsGQCIZEMCSCIREMiWBIBEMiGBLBkAiGRDAkgiERDIlgSARDIhgSwZD8AfUPWAU8wvWVAAAAAElFTkSuQmCC">';
		
		return $img;	
}	

function delete_img($imgName){
	@unlink("../".APP_UPLOAD_PATH.$imgName);
	@unlink("../".APP_UPLOAD_PATH.'thumb_'.$imgName);
	@unlink("../".APP_UPLOAD_PATH.'mid_'.$imgName);
}
function page_fan_gate($settingID){
	//chek if fan page Already EXSIT
			 global $db;
			 $db->bind("settingID",$settingID);
			 $fangatRow =$db->query("SELECT fan_gateID,fan_gate_img,fanGateflg FROM fan_gate WHERE settingID = :settingID");
			 
			 if($fangatRow[0]["fan_gateID"] > 0){
						
						$fangateImg = "../".APP_UPLOAD_PATH.'mid_'.$fangatRow[0]['fan_gate_img'];		 
			 }
			 if($fangatRow[0]["fanGateflg"] == 1){
			 	 $YesGateflg ="checked=\"checked\"";
				 $NoGateflg="";
			 }else{
				 $YesGateflg="";
				 $NoGateflg ="checked=\"checked\"";;
			}
	$fanGate ='<div class="accordion-group">
									<div class="accordion-heading">
										<a href="#collapseOne" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle">
										<i class="icon-picture"></i><b>Optional Fan Gate</b>
                                        <small>Force visitors to Like your Page before they can access your app.</small></a>
									</div>
									<div class="accordion-body collapse" id="collapseOne">
										<div class="accordion-inner group">
                                        <div class="col-lg-5">
										<label for="chk_share">Add Fan Gate Image?</label>
										<input name="fanGateflg" type="radio" value="0" class="raido-btn" '.$NoGateflg.' />
										No
										<input name="fanGateflg" type="radio" value="1" class="raido-btn" '.$YesGateflg.'/>
										Yes
										</div>
                                        <div class="col-lg-7">
                                        <label class="control-label">Fan Gate Image</label><br  />
											<div class="fileinput fileinput-new" data-provides="fileinput">';
  											if($fangateImg !=''){
													$fanGate .=' <img src="'.$fangateImg.'" alt="IMge" class="img-thumbnail" / >';
												}else{
												$fanGate .=' <div class="fileinput-new thumbnail" style="">';
    											
													$fanGate .=''.img_hodelr();
												
														
  										$fanGate .=' </div> ';
										}
  											$fanGate .=' <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
  										    <div>
    											<span class="btn btn-default btn-file">
    											<span class="fileinput-new btn">Select image</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="fangateImg" id="fangateImg" >
                                                </span>
    											<a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
  											</div>
										</div><br  />
                                        <small>Image max width: 810 px.</small>
                                        </div><!--END OF col-lg-6-->
										</div><!--END OF accordion-inner group-->
									</div>
								</div>';
				return 		$fanGate;		
}
//---------------------------------
function share_newsfeed($settingID){
	//chek if newsfeed Already EXSIT
	global $db;
	$db->bind("settingID",$settingID);
	$feedRow =$db->query("SELECT * FROM news_feed WHERE settingID = :settingID");
			 
			 if($feedRow[0]["feedId"] > 0){
						
						 $feedImg 	= "../".APP_UPLOAD_PATH.'mid_'.$feedRow[0]['feedThumbnail'];		 
			 			 $feedTitle	=	$feedRow[0]['feedTitle'];
						 $feedDescription	=	$feedRow[0]['feedDescription'];
			 }else{
						 $feedImg 	= '';		 
			 			 $feedTitle	=	'';
						 $feedDescription	=	'';
			}
			if($feedRow[0]["feedFlg"] == 1){
				$feedFlg="checked";
			}else{
				$feedFlg="";	
			}
	$newsfeed ='<div class="accordion-group">
									<div class="accordion-heading">
										<a href="#collapseThree" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle">
										<i class="icon-facebook-sign"></i> <b>Facebook Share/Send links</b>
                                        <small>Control what image and message display when people share your app.</small> </a>
									</div>
									<div class="accordion-body collapse" id="collapseThree">
										<div class="accordion-inner  group">
											 <div class="col-lg-6">
                                             	<label class="control-label">Share Image</label><br  />
											<div class="fileinput fileinput-new" data-provides="fileinput">';
  												if($feedImg !=''){
													$newsfeed .=' <img src="'.$feedImg.'" alt="IMge1" class="img-thumbnail"  />';
												}else{
												$newsfeed .=' <div class="fileinput-new thumbnail" style="">';
                                                	$newsfeed .=''.img_hodelr();
													$newsfeed .=' </div>';
                                             }
                                             $newsfeed .=' <div class="fileinput-preview fileinput-exists thumbnail" 
                                             		style="max-width: 200px; max-height: 150px;"></div>
  										    <div>
    											<span class="btn btn-default btn-file">
    											<span class="fileinput-new btn">Select image</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="newsfeedImg" id="newsfeedImg" />
                                                </span>
    											<a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
  											</div>
										</div>
                                             </div>
                                             <div class="col-lg-6">
                                                 <input type="checkbox" name="chk_share" id="chk_share" value="1" '.$feedFlg.' />
                                                 <label for="chk_share">Add Send and Share buttons</label> 
												 <br />
												 <label for="shareTitle">Share title</label>
                                                 <input type="text" class="form-control input-md" name="shareTitle" id="shareTitle" value="'.$feedTitle.'" />
                                                 <label for="shareTitle">Share description</label>
                                                 <textarea id="Sharedescription" name="Sharedescription">'.$feedDescription.'</textarea>
                                                 Characters left:<div class="countdown"></div>
                                                 
                                             </div>
										</div>
									</div>
								</div>';
			return $newsfeed;					
}
//-----------------------------------
function check_img_type($img_name,$img_type){
		if($img_name !=''){
			if($img_type!= 'image/jpeg'&&  $img_type != 'image/jpg'&&  $img_type != 'image/gif'&& $img_type!= 'image/png'){
				echo '<div class="form-group">
					<div class="alert alert-error" style="color:#B94A48; background:#F2DEDE; text-align:left; margin-top:20px;">
					<strong>Error!</strong> Please upload only Image file!
				</div>
				</div>';
				die();
			}
		}
}
//-------------------------------
function generate_unique_name($flieName){
		if($flieName !=''){
			$random_digit=rand(0000,9999);
			$time=time();
			$ext=substr($flieName, -3); 
			$newFileName=$time.'_'.$random_digit.'.'.$ext;
			return $newFileName;
		}
}
//------------------------------
function is_url_exist($url){
    $ch = curl_init($url);    
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if($code == 200){
       $status = true;
    }else{
      $status = false;
    }
    curl_close($ch);
   return $status;
}


function upload_header_image($fileName,$fileTemp){
	if($fileName !=''){
	//Upload an Image on Server----
	move_uploaded_file($fileTemp,"../".APP_UPLOAD_PATH.$fileName);
	list($width, $height, $type, $attr) = getimagesize("../".APP_UPLOAD_PATH.$fileName);	

	if( $width > 810){
			//Create image with 810 width---------
			 $thumb = new easyphpthumbnail;
			 $thumb -> Thumbwidth = 810;
			 $thumb -> Thumbheight = "";
			 $thumb -> Thumblocation = "../".APP_UPLOAD_PATH;
			 $thumb -> Thumbprefix = '';
			 $thumb -> Thumbsaveas = ' ';
			 $thumb -> Thumbfilename = $fileName;
			 $thumb -> Createthumb("../".APP_UPLOAD_PATH.$fileName,'file');
	}else if($width < 810){
		echo '<div class="form-group">
					<div class="alert alert-error" style="color:#B94A48; background:#F2DEDE; text-align:left; margin-top:20px;">
					<strong>Error!</strong> Please choose images with 810px width !
				</div>
				</div>';
				@unlink("../".APP_UPLOAD_PATH.$fileName);
				die();
	}
	//Create a MIDUME Img
	 $thumb = new easyphpthumbnail;
	 $thumb -> Thumbwidth = 405;
	 $thumb -> Thumbheight = "";
	 $thumb -> Thumblocation = "../".APP_UPLOAD_PATH;
	 $thumb -> Thumbprefix = 'mid_';
	 $thumb -> Thumbsaveas = ' ';
	 $thumb -> Thumbfilename = $fileName;
	 $thumb -> Createthumb("../".APP_UPLOAD_PATH.$fileName,'file');
	 //Create a Thumbnail Img
	 $thumb = new easyphpthumbnail;
	 $thumb -> Thumbwidth = 100;
	 $thumb -> Thumbheight = 100;
	 $thumb -> Thumblocation = "../".APP_UPLOAD_PATH;
	 $thumb -> Thumbprefix = 'thumb_';
	 $thumb -> Thumbsaveas = ' ';
	 $thumb -> Thumbfilename = $fileName;
	 $thumb -> Createthumb("../".APP_UPLOAD_PATH.$fileName,'file');
	}
}//END OF function upload_image

function upload_file($fileName,$fileTemp){
	if($fileName !=''){
	  global $db;
	  $row = $db->query("select * from settings LIMIT 1");
	  $settingID =$row[0]["id"];
	  if($row[0]["downloadFile"] !=""){
		  @unlink("../".APP_UPLOAD_PATH.$row[0]["downloadFile"]);
	  }	
	  move_uploaded_file($fileTemp,"../".APP_UPLOAD_PATH.$fileName);
	}
}//END OF function upload_file
function upload_fanGate_image($fileName,$fileTemp){
	if($fileName !=''){
	//Upload an Image on Server----
	move_uploaded_file($fileTemp,"../".APP_UPLOAD_PATH.$fileName);
	list($width, $height, $type, $attr) = getimagesize("../".APP_UPLOAD_PATH.$fileName);	

	if( $width > 810){
			//Create image with 810 width---------
			 $thumb = new easyphpthumbnail;
			 $thumb -> Thumbwidth = 810;
			 $thumb -> Thumbheight = '';
			 $thumb -> Thumblocation = "../".APP_UPLOAD_PATH;
			 $thumb -> Thumbprefix = '';
			 $thumb -> Thumbsaveas = ' ';
			 $thumb -> Thumbfilename = $fileName;
			 $thumb -> Createthumb("../".APP_UPLOAD_PATH.$fileName,'file');
	}else if($width < 810){
		echo '<div class="form-group">
					<div class="alert alert-error" style="color:#B94A48; background:#F2DEDE; text-align:left; margin-top:20px;">
					<strong>Error!</strong> Please choose images with 810px width !
				</div>
				</div>';
				@unlink("../".APP_UPLOAD_PATH.$fileName);
				die();
	}
	//Create a MIDUME Img
	 $thumb = new easyphpthumbnail;
	 $thumb -> Thumbwidth = 405;
	 $thumb -> Thumbheight = "";
	 $thumb -> Thumblocation = "../".APP_UPLOAD_PATH;
	 $thumb -> Thumbprefix = 'mid_';
	 $thumb -> Thumbsaveas = ' ';
	 $thumb -> Thumbfilename = $fileName;
	 $thumb -> Createthumb("../".APP_UPLOAD_PATH.$fileName,'file');
	 //Create a Thumbnail Img
	 $thumb = new easyphpthumbnail;
	 $thumb -> Thumbwidth = 100;
	 $thumb -> Thumbheight = 100;
	 $thumb -> Thumblocation = "../".APP_UPLOAD_PATH;
	 $thumb -> Thumbprefix = 'thumb_';
	 $thumb -> Thumbsaveas = ' ';
	 $thumb -> Thumbfilename = $fileName;
	 $thumb -> Createthumb("../".APP_UPLOAD_PATH.$fileName,'file');
	}
}//END OF function upload_image
function upload_NewsFeedImg($fileName,$fileTemp){
	if($fileName !=''){
	//Upload an Image on Server----
	move_uploaded_file($fileTemp,"../".APP_UPLOAD_PATH.$fileName);
	list($width, $height, $type, $attr) = getimagesize("../".APP_UPLOAD_PATH.$fileName);	

	if( $width > 400){
			//Create image with 810 width---------
			 $thumb = new easyphpthumbnail;
			 $thumb -> Thumbwidth = 400;
			 $thumb -> Thumbheight = "";
			 $thumb -> Thumblocation = "../".APP_UPLOAD_PATH;
			 $thumb -> Thumbprefix = '';
			 $thumb -> Thumbsaveas = ' ';
			 $thumb -> Thumbfilename = $fileName;
			 $thumb -> Createthumb("../".APP_UPLOAD_PATH.$fileName,'file');
	}
	//Create a MIDUME Img
	 $thumb = new easyphpthumbnail;
	 $thumb -> Thumbwidth = 200;
	 $thumb -> Thumbheight = 200;
	 $thumb -> Thumblocation = "../".APP_UPLOAD_PATH;
	 $thumb -> Thumbprefix = 'mid_';
	 $thumb -> Thumbsaveas = ' ';
	 $thumb -> Thumbfilename = $fileName;
	 $thumb -> Createthumb("../".APP_UPLOAD_PATH.$fileName,'file');
	 //Create a Thumbnail Img
	 $thumb = new easyphpthumbnail;
	 $thumb -> Thumbwidth = 100;
	 $thumb -> Thumbheight = 100;
	 $thumb -> Thumblocation = "../".APP_UPLOAD_PATH;
	 $thumb -> Thumbprefix = 'thumb_';
	 $thumb -> Thumbsaveas = ' ';
	 $thumb -> Thumbfilename = $fileName;
	 $thumb -> Createthumb("../".APP_UPLOAD_PATH.$fileName,'file');
	}
}//END OF function upload_NewsFeedImg
function save_fangate_intoDB($setting_id,$fangateImg_name,$fanGateflg){
	
	if($fanGateflg !=''){
			 global $db,$app_update;
			 $db->bind("settingID",$setting_id);
			 $fangatRow =$db->query("SELECT fan_gateID,fan_gate_img FROM fan_gate WHERE settingID = :settingID");
			 if($fangatRow[0]["fan_gateID"] > 0){
						//DELTET old IMAGE 4m SERVER
						$sqlGate ="UPDATE fan_gate SET fanGateflg='{$fanGateflg}'";
						if($fangateImg_name !=""){
						delete_img($fangatRow[0]['fan_gate_img']);
						$sqlGate .=" ,fan_gate_img='{$fangateImg_name}'";
						}
						$sqlGate .=" WHERE settingID =$setting_id";
						$db->query("$sqlGate");
						$app_update =true;
						 			
			}else{
						$insert   =  $db->query("INSERT INTO fan_gate(settingID,fan_gate_img,fanGateflg,active) 
						VALUES(:settingID,:fan_gate_img,:fanGateflg,:acrive)", 
						array("settingID"=>$setting_id,"fan_gate_img"=>$fangateImg_name,"fanGateflg"=>$fanGateflg,"acrive"=>1));
						$app_insert	=true;					
			}
	}//END OF if($fangateImg_name !=''){
			
}
//---------------------------------------------
function save_newfeed($setting_id,$newsfeedImg_name,$shareTitle,$Sharedescription,$chk_share){
	if($shareTitle !=''){
		global $db,$app_update;
		$db->bind("settingID",$setting_id);
		$feedRow =$db->query("SELECT * FROM news_feed WHERE settingID = :settingID");
			 
			 if($feedRow[0]["feedId"] > 0){
		
						//DELTET old IMAGE 4m SERVER
						$sqlNews ="UPDATE news_feed SET feedTitle='{$shareTitle}',feedDescription='{$Sharedescription}',feedFlg='{$chk_share}'";
						if($newsfeedImg_name !=""){
						delete_img($feedRow[0]['feedThumbnail']);
						$sqlNews .=" ,feedThumbnail='{$newsfeedImg_name}'";
						}
						$sqlNews .=" WHERE settingID ={$setting_id}";
						$db->query($sqlNews);
						$app_update =true;
						
			}else{
						
						$insert   =  $db->query("INSERT INTO news_feed(feedTitle,feedDescription,feedThumbnail,feedFlg,settingID)
												VALUES(:shareTitle,:Sharedescription,:newsfeedImg_name,:chk_share,:settingID)",
						array("shareTitle"=>$shareTitle,"Sharedescription"=>$Sharedescription,"newsfeedImg_name"=>$newsfeedImg_name,
							   "chk_share"=>$chk_share,"settingID"=>$setting_id));	
					$app_insert	=true;				
			}
		
	}
}//END OF save_newfeed
//-----------------------------
?>
<?php

 function parse_signed_request($signed_request, $secret) {
        list($encoded_sig, $payload) = explode('.', $signed_request, 2);

        // decode the data
        $sig = base64_url_decode($encoded_sig);
        $data = json_decode(base64_url_decode($payload), true);

        if (strtoupper($data['algorithm']) !== 'HMAC-SHA256') {
            error_log('Unknown algorithm. Expected HMAC-SHA256');
            return null;
        }

        // check sig
        $expected_sig = hash_hmac('sha256', $payload, $secret, $raw = true);
        if ($sig !== $expected_sig) {
            error_log('Bad Signed JSON signature!');
            return null;
        }

        return $data;
    }

    function base64_url_decode($input) {
        return base64_decode(strtr($input, '-_', '+/'));
    }
	
	function base64url_encode($data) { 
		return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); 
	} 
	
	function base64url_decode($data) { 
		return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
	} 
	
	
	function d($d){
		echo '<pre>';
		print_r($d);
		echo '</pre>';
	}

	function getValue($table, $field, $where){
		
		global $user, $db, $appid;
		//echo "SELECT ".$field." FROM `".$table."` where ".$where;
		$result = $db->query("SELECT ".$field." FROM `".$table."` where ".$where);
		if($db->num_rows($result)){
			$arr= $db->fetch_array($result);
			return  $arr[$field]; 
		}else{
			return false;
			}
 	}

	function getCountValue($table, $field, $where){
		
		global $user, $db, $appid;
		//echo "SELECT ".$field." FROM `".$table."` where ".$where;
		$result = $db->query("SELECT count(".$field.") as ".$field." FROM `".$table."` where ".$where);
		if($db->num_rows($result)){
			$arr= $db->fetch_array($result);
			return  $arr[$field]; 
		}else{
			return false;
			}
 	}


   	function getHttpVars() {
		$superglobs = array(
			'_POST',
			'_REQUEST',
			'_GET',
			'_FILES',
			'HTTP_POST_VARS',
			'HTTP_GET_VARS');
		$httpvars = array();
		// extract the right array
		foreach ($superglobs as $glob) {
			global $$glob;
			if (isset($$glob) && is_array($$glob)) {
				$httpvars = $$glob;
			 }
			if (count($httpvars) > 0)
				break;
		}
		return $httpvars;
	}
	function getPageId($pageurl){
		$arr=file_get_contents("https://graph.facebook.com/?ids=".$pageurl);
$obj = json_decode($arr,true);
foreach ($obj as $name) {
$pageid=$name['id'];
}
return $pageid;

		}
function randomPassword() {
		$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
		$pass = array(); //remember to declare $pass as an array
		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		for ($i = 0; $i < 8; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass); //turn the array into a string
	}
			