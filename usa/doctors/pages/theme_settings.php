<style>
body .modal-dialog {
    /* new custom width */
    width: 800px;
    /* must be half of the width, minus scrollbar on the left (30px) */
}

</style>


<?php
$xcrud = Xcrud::get_instance();
$xcrud->table('theme_settings');

$xcrud->create_action('publish', 'publish_theme'); // action callback, function publish_action() in functions.php
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
//        'data-primary' => '{id}'));

$xcrud->columns('active', true); 
		$xcrud->change_type('theme_preview', 'image', '', array(
        'width' => 750,
        'path' => '../images/'));
		$xcrud->modal('theme_preview');
		
		$xcrud->unset_remove();
		$xcrud->unset_edit();
		$xcrud->unset_add();
				
		echo $xcrud->render();


//// Background_color

echo "<h1>Background Color</h1>";
$xcrud2 = Xcrud::get_instance();
$xcrud2->table('custom_background');
$xcrud2->change_type('background_color','text','#ffffff',array('id'=>'colorpicker'));

    $xcrud2->create_action('publish', 'publish_background'); // action callback, function publish_action() in functions.php
 //   $xcrud2->create_action('unpublish', 'unpublish_background');
    $xcrud2->button('#', 'unpublished', 'icon-close glyphicon glyphicon-ok', 'xcrud-action', 
        array(  // set action vars to the button
            'data-task' => 'action',
            'data-action' => 'publish',
            'data-primary' => '{id}')
    );
//    $xcrud2->button('#', 'published', 'icon-checkmark glyphicon glyphicon-ok', 'xcrud-action', array(
//        'data-task' => 'action',
//        'data-action' => 'unpublish',
//        'data-primary' => '{id}'));
$xcrud2->columns('active', true); 
$xcrud2->change_type('background_preview', 'image', '', array(
        'width' => 200,
        'path' => '../images/'));
		$xcrud2->modal('background_preview');
		
		$xcrud2->unset_edit();
		$xcrud2->unset_remove();
		echo $xcrud2->render();
?>