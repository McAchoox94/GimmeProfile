<?php
$xcrud = Xcrud::get_instance();
$xcrud->table('news_feed');
$xcrud->unset_add();
$xcrud->unset_remove();
$xcrud->change_type('feedDescription', 'textarea');
$xcrud->table_name('Facebook News Feed Settings');
$xcrud->buttons_position('left');
$xcrud->change_type('feedThumbnail', 'image', '', array(
        'width' => 250,
        'path' => '../images/',
'thumbs' => 
    array(
        array(
            'width' => 100,
            'height' => 100,
            'crop' => true,
            'folder' => 'thumbs'),
			array(
            'width' => 390,
            'height' => 366,
            'crop' => true,
            'folder' => 'thumbs')

        )));

$xcrud->label('feedFlg','Facebook Share Active')->label('feedThumbnail','Newsfeed Image')->label('feedTitle','Title')->label('feedDescription','Description');
$xcrud->buttons_position('left');
$xcrud->validation_required('feedThumbnail')->validation_required('feedTitle')->validation_required('feedDescription');
$xcrud->validation_pattern('feedTitle', '[a-zA-Z]{10,100}');
$xcrud->validation_pattern('feedDescription', '[a-zA-Z]{10,140}');
//$xcrud->theme('bootstrap');
     echo $xcrud->render('edit',1);
?> 