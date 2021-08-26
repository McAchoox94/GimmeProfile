<style>
body .modal-dialog {
    /* new custom width */
    width: 800px;
    /* must be half of the width, minus scrollbar on the left (30px) */
}
a.btn.btn-success {
margin-bottom: 15px;
margin-left: 815px;
}
</style>



<a href="manage.php?page=theme"  class="btn btn-success">Change Theme | Background</a>
<!--
<a href="manage.php?page=theme">Theme Setting</a>
-->


<?php


$xcrud = Xcrud::get_instance();

if($_SESSION['userrole'] === 'admin')
	{
		$xcrud->table('user_theme');
		//$xcrud->where('uid =', $_SESSION['userid']);
		$xcrud->relation('uid','profile','id','name');
		$xcrud->label('uid','Name');
	$xcrud->relation('theme_id','theme_settings','id','theme_name');
		
	}
	elseif($_SESSION['userrole'] === 'user')
	{
		$xcrud->table('theme_settings');
		$xcrud->columns('active', true);
		
		$xcrud->join('id','user_theme','theme_id');
		
		$xcrud->where('user_theme.uid =', $_SESSION['userid']);
		$xcrud->change_type('theme_preview', 'image', '', array(
        'width' => 750,
        'path' => '../images/'));
		$xcrud->modal('theme_preview');
		$xcrud->relation('user_theme.uid','profile','id','name');
		
	}





        
		
		//$xcrud->modal('theme_preview');
		

	$xcrud->unset_add();
    $xcrud->unset_edit();
    $xcrud->unset_remove();
    //$xcrud->unset_view();
    $xcrud->unset_csv();
    $xcrud->unset_limitlist();
    $xcrud->unset_numbers();
    $xcrud->unset_pagination();
    $xcrud->unset_print();
    $xcrud->unset_search();
    $xcrud->unset_title();
    $xcrud->unset_sortable();
	$xcrud->buttons_position('left');   
	echo $xcrud->render();


//// Background_color

echo "<h3>Selected Background</h3>";
$xcrud2 = Xcrud::get_instance();
//$xcrud2->table('user_background');

if($_SESSION['userrole'] === 'admin')
	{
		$xcrud2->table('user_background');
		$xcrud2->relation('uid','profile','id','name');
	$xcrud2->label('uid','Name');
		
	}
	elseif($_SESSION['userrole'] === 'user')
	{
		$xcrud2->table('user_background');
		//$xcrud2->where('uid =', $_SESSION['userid']);
		
		/////////////////////
		$xcrud2->table('custom_background');
		$xcrud2->columns('active', true);
		
		$xcrud2->join('id','user_background','background_id');
		
		$xcrud2->where('user_background.uid =', $_SESSION['userid']);
		$xcrud2->change_type('theme_preview', 'image', '', array(
        'width' => 750,
        'path' => '../images/'));
		$xcrud2->modal('theme_preview');
		$xcrud2->relation('user_background.uid','profile','id','name');
		
		
	}
	$xcrud2->relation('background_id','custom_background','id','background_name');
	$xcrud2->change_type('background_color','text','#ffffff',array('id'=>'colorpicker'));
   
    /*$xcrud2->create_action('publish', 'publish_background'); // action callback, function publish_action() in functions.php
    $xcrud2->create_action('unpublish', 'unpublish_background');
    $xcrud2->button('#', 'unpublished', 'icon-close glyphicon glyphicon-remove', 'xcrud-action', 
        array(  // set action vars to the button
            'data-task' => 'action',
            'data-action' => 'publish',
            'data-primary' => '{id}'), 
        array(  // set condition ( when button must be shown)
            'active',
            '!=',
            '1')
    );
    $xcrud2->button('#', 'published', 'icon-checkmark glyphicon glyphicon-ok', 'xcrud-action', array(
        'data-task' => 'action',
        'data-action' => 'unpublish',
        'data-primary' => '{id}'), array(
        'active',
        '=',
        '1'));*/

$xcrud2->change_type('background_preview', 'image', '', array(
        'width' => 200,
        'path' => '../images/'));
		//$xcrud2->unset_edit();
	$xcrud2->modal('background_preview');
	$xcrud2->unset_add();
    $xcrud2->unset_edit();
    $xcrud2->unset_remove();
    //$xcrud2->unset_view();
    $xcrud2->unset_csv();
    $xcrud2->unset_limitlist();
    $xcrud2->unset_numbers();
    $xcrud2->unset_pagination();
    $xcrud2->unset_print();
    $xcrud2->unset_search();
    $xcrud2->unset_title();
    $xcrud2->unset_sortable();
	$xcrud2->buttons_position('left');
	echo $xcrud2->render();
	
	//
	
//echo "<h1>Selected Language</h1>";	
//$xcrud3 = Xcrud::get_instance();
//
//if($_SESSION['userrole'] === 'admin'){
//	$xcrud3->table('user_language');
//	$xcrud3->relation('lang_id','language','id','name');
//	$xcrud3->relation('uid','profile','id','name');
//	$xcrud3->label('uid','Name');
//	}
//	elseif($_SESSION['userrole'] === 'user'){
//	$xcrud3->table('user_language');
//	$xcrud3->relation('lang_id','language','id','name');
//	$xcrud3->where('uid =', $_SESSION['userid']);
//	
//	}
//		
//	
//
//	$xcrud3->unset_add();
//   $xcrud3->unset_edit();
//    $xcrud3->unset_remove();
//    //$xcrud3->unset_view();
//    $xcrud3->unset_csv();
//    $xcrud3->unset_limitlist();
//    $xcrud3->unset_numbers();
//    $xcrud3->unset_pagination();
//    $xcrud3->unset_print();
//    $xcrud3->unset_search();
//    $xcrud3->unset_title();
//    $xcrud3->unset_sortable(); 
//	$xcrud3->buttons_position('left');	
//	echo $xcrud3->render();
	
	echo "<h3>Selected Color</h3>";	
$xcrud4 = Xcrud::get_instance();

if($_SESSION['userrole'] === 'admin'){
	$xcrud4->table('user_color');
	$xcrud4->relation('color_id','colors','id','color_name');
	$xcrud4->relation('uid','profile','id','name');
	$xcrud4->label('uid','Name');
	}
	elseif($_SESSION['userrole'] === 'user'){
	$xcrud4->table('user_color');
	$xcrud4->relation('color_id','colors','id','color_name');
	$xcrud4->where('uid =', $_SESSION['userid']);
	
	}
		
	

	$xcrud4->unset_add();
   $xcrud4->unset_edit();
    $xcrud4->unset_remove();
    //$xcrud3->unset_view();
    $xcrud4->unset_csv();
    $xcrud4->unset_limitlist();
    $xcrud4->unset_numbers();
    $xcrud4->unset_pagination();
    $xcrud4->unset_print();
    $xcrud4->unset_search();
    $xcrud4->unset_title();
    $xcrud4->unset_sortable(); 
	$xcrud4->buttons_position('left');	
	echo $xcrud4->render();

?>