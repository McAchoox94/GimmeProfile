<?php
Xcrud_config::$editor_url = dirname($_SERVER["SCRIPT_NAME"]).'/editors/ckeditor/ckeditor.js'; // can be set in config

$xcrud = Xcrud::get_instance();
	if($_SESSION['userrole'] === 'admin')
	{
		$xcrud->table('profile');
		$xcrud->change_type('role','select','','admin,user');
	}
	elseif($_SESSION['userrole'] === 'user')
	{
		$xcrud->table('profile');
		$xcrud->disabled('role');
		$xcrud->where('id =', $_SESSION['userid']);
		$xcrud->unset_add();
$xcrud->unset_remove();
	}
	$xcrud->relation('profile_template','template','id','template_name');
$xcrud->columns('confrim_password', true);
$xcrud->field_tooltip('picture', 'Make sure picture width should be 153 pixels');
$xcrud->relation('language','language','id','name');
$xcrud->change_type('about', 'texteditor');
$xcrud->change_type('address_point','point','39.909736,-6.679687',array('text'=>'Your are here'));
$xcrud->change_type('picture', 'image', '', array(
        'width' => 300,
        'height' => 400,
        'path' => '../images/',
'thumbs' => 
    array(
        array(
            'width' => 700,
            'height' => 700,
            'crop' => true,
            'folder' => 'thumbs_single'),
			array(
            'width' => 153,
           'height' => 186,
            'crop' => true,
            'folder' => 'thumbs')

        )));
  
$xcrud->change_type('background_image', 'image', '', array(
        'width' => 153,
        'path' => '../images/',
'thumbs' => 
    array(
        array(
            'width' => 1000,
            'crop' => true)
        )));
   $xcrud->change_type('password', 'password', 'md5', array('maxlength'=>10));

$xcrud->columns('about,password,address,datetime_added,address_point,date_of_birth,website,phone', true); 
 $xcrud->buttons_position('left');
		$xcrud->modal('picture');
		$xcrud->theme('bootstrap');
		if($_SESSION['userrole'] === 'admin'){
		echo $xcrud->render();
		}
		else
		{
		echo $xcrud->render('edit',$_SESSION['userid']);
		}
		
	 //'edit',1
?> 