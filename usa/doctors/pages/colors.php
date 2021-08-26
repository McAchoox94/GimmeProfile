<?php
$xcrud = Xcrud::get_instance();



//$xcrud->change_type('template','select','','main,single');




$xcrud->table('colors');

$xcrud->create_action('publish', 'publish_color'); // action callback, function publish_action() in functions.php
//$xcrud->create_action('unpublish', 'unpublish_theme');
$xcrud->button('#', 'unpublished', 'icon-close glyphicon glyphicon-ok', 'xcrud-action', 
        array(  // set action vars to the button
            'data-task' => 'action',
            'data-action' => 'publish',
            'data-primary' => '{id}') 
    );
//    $xcrud->button('#', 'published', 'icon-checkmark glyphicon glyphicon-ok', 'xcrud-action', array(
//        'data-task' => 'action',
//        'data-action' => 'unpublish',
//        'data-primary' => '{id}'), array(
//        'active',
//        '=',
//        '1'));

$xcrud->columns('active', true);
		$xcrud->change_type('theme_preview', 'image', '', array(
        'width' => 750,
        'path' => '../images/'));
		$xcrud->modal('theme_preview');
		
		$xcrud->unset_remove();
		$xcrud->unset_edit();
		$xcrud->unset_add();
				
		echo $xcrud->render();
?>