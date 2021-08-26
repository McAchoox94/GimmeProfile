<?php
Xcrud_config::$editor_url = dirname($_SERVER["SCRIPT_NAME"]).'/editors/ckeditor/ckeditor.js'; // can be set in config

$xcrud = Xcrud::get_instance();
if($_SESSION['userrole'] === 'admin'){
$xcrud->table('education');
$xcrud->relation('uid','profile','id','name');
$xcrud->label('uid','Name');
}elseif($_SESSION['userrole'] === 'user'){
$xcrud->table('education');
$xcrud->where('uid =', $_SESSION['userid']);
$xcrud->readonly('uid');
$xcrud->before_insert('uid_example');
$xcrud->columns('uid', true);
}
//$xcrud->table('education');
$xcrud->buttons_position('left');
echo $xcrud->render();
?>