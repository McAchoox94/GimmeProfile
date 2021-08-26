<?php

$xcrud = Xcrud::get_instance();

//$xcrud->table('social_profiles');
if($_SESSION['userrole'] === 'admin'){
$xcrud->table('social_profiles');
$xcrud->relation('uid','profile','id','name');
$xcrud->label('uid','Name');
}elseif($_SESSION['userrole'] === 'user'){
$xcrud->table('social_profiles');
 $xcrud->where('uid =', $_SESSION['userid']);
 $xcrud->readonly('uid');
$xcrud->before_insert('uid_example');
$xcrud->columns('uid', true);
 } 
$xcrud->buttons_position('left');

echo $xcrud->render();

?>