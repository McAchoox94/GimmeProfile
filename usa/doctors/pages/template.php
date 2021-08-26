<?php
$xcrud = Xcrud::get_instance();


$xcrud->table('template');
$xcrud->change_type('template','select','','default,single-page');
//$xcrud->relation('uid','colors','id','color_name');
//$xcrud->label('uid','Color Name');
$xcrud->where('uid =', $_SESSION['userid']);
//$xcrud->columns('uid', true);
$xcrud->buttons_position('left');
$xcrud->unset_remove();
$xcrud->readonly('uid');
$xcrud->before_insert('uid_example');
echo $xcrud->render();

?>