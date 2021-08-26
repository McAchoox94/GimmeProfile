<?php

$xcrud = Xcrud::get_instance();

//$xcrud->table('portfolio');
	if($_SESSION['userrole'] === 'admin')
	{
		$xcrud->table('portfolio');
		$xcrud->relation('uid','profile','id','name');
		$xcrud->label('uid','Name');
	}
	elseif($_SESSION['userrole'] === 'user')
	{
		$xcrud->table('portfolio');
		$xcrud->where('uid =', $_SESSION['userid']);
		$xcrud->readonly('uid');
		$xcrud->before_insert('uid_example');
		$xcrud->columns('uid', true);
 }
 
$xcrud->buttons_position('left');
$xcrud->validation_required('picture');
$xcrud->validation_required('project_name');
//$xcrud->field_tooltip('link', 'If you enter link it will work  Image will come once user fine the hidden zone, Make sure width should be 810 pixels');
$xcrud->relation('category','portfolio_category','id','name','portfolio_category.uid ='. $_SESSION['userid'] ,"",true);
//$xcrud->relation('category','portfolio_category','name','name','portfolio_category.active = 1',"",true);
    $xcrud->label('category','Portfolio Categories');

$xcrud->change_type('picture', 'image', '', array(
        'width' => 350,
        'height' => 350,
        'path' => '../images/',
'thumbs' => 
    array(
        array(
            'width' => 180,
            'height' => 120,
            'crop' => true,
            'folder' => 'thumbs'),
			array(
            'width' => 600,
          //  'height' => 120,
            //'crop' => true,
            'folder' => 'portfolio')

        )));
  
 
 
 $xcrud->modal('picture');

echo $xcrud->render();

?>