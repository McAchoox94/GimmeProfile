<?php
$xcrud = Xcrud::get_instance();
$xcrud->table('fangate');
$xcrud->table_name('This is Major Settings of Pinterest Application');
$xcrud->unset_add();
$xcrud->unset_remove();
//image upload with resizing
//$xcrud->change_type('fangate_image', 'image', '', array('width' => 810, 'height' => 150));	
$xcrud->field_tooltip('fangate_image', 'Make sure fangate image width should be 810 pixels');
$xcrud->field_tooltip('quiz_header', 'Make sure Quiz Header image width should be 730 pixels');
$xcrud->field_tooltip('quiz_footer', 'Make sure Quiz Footer width should be 730 pixels');
$xcrud->validation_required('fangate_image')->validation_required('quiz_header')->validation_required('quiz_footer')->validation_required('fangate_active');
$xcrud->validation_required('participated_image')->validation_required('thanks_image');
$xcrud->field_tooltip('thanks_image', 'This Image will come once user submit the Quiz, Make sure width should be 810 pixels');
$xcrud->field_tooltip('participated_image', 'This Image will come once user already particiated in the Quiz, Make sure width should be 810 pixels');


$xcrud->change_type('fangate_image', 'image', '', array(
        'width' => 810,
        'path' => '../images/',
'thumbs' => 
    array(
        array(
            'width' => 100,
            'height' => 100,
            'crop' => true,
            'folder' => 'thumbs'),
			array(
            'width' => 810,
         //   'height' => 950,
        //    'crop' => true,
            'folder' => 'thumbs')

        )));
$xcrud->change_type('game_screen', 'image', '', array(
        'width' => 810,
        'path' => '../images/',
'thumbs' => 
    array(
        array(
            'width' => 100,
            'height' => 100,
            'crop' => true,
            'folder' => 'thumbs'),
			array(
            'width' => 810,
         //   'height' => 950,
        //    'crop' => true,
            'folder' => 'thumbs')

        )));
$xcrud->change_type('offer_image', 'image', '', array(
        'width' => 810,
        'path' => '../images/',
'thumbs' => 
    array(
        array(
            'width' => 100,
            'height' => 100,
            'crop' => true,
            'folder' => 'thumbs'),
			array(
            'width' => 810,
         //   'height' => 950,
        //    'crop' => true,
            'folder' => 'thumbs')

        )));
 
$xcrud->change_type('quiz_header', 'image', '', array(
        'width' => 410,
        'path' => '../images/',
'thumbs' => 
    array(
        array(
            'width' => 100,
            'height' => 100,
            'crop' => true,
            'folder' => 'thumbs'),
			array(
            'width' => 730,
         //   'height' => 950,
           'crop' => true,
            'folder' => 'thumbs')

        )));
 
$xcrud->change_type('quiz_footer', 'image', '', array(
        'width' => 410,
        'path' => '../images/',
'thumbs' => 
    array(
        array(
            'width' => 100,
            'height' => 100,
            'crop' => true,
            'folder' => 'thumbs'),
			array(
            'width' => 730,
         //   'height' => 950,
            'crop' => true,
            'folder' => 'thumbs')

        )));
 
$xcrud->label('fangate_active','Fangate Active');

 $xcrud->modal('fangate');
$xcrud->buttons_position('left');
//$xcrud->change_type('fangate_image', 'image', '', array('manual_crop' => true));
//$xcrud->change_type('fangate_image', 'image', false, array(
//        'width' => 450,
//        'path' => 'uploads/',
//        'thumbs' => array(array(
//                'height' => 55,
//                'width' => 120,
//                'crop' => true,
//                'marker' => '_th'))));
$xcrud->theme('bootstrap');
     echo $xcrud->render('edit',1);
?> 