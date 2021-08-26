<?php
Xcrud_config::$editor_url = dirname($_SERVER["SCRIPT_NAME"]).'/editors/ckeditor/ckeditor.js'; // can be set in config

$xcrud = Xcrud::get_instance();

if($_SESSION['userrole'] === 'admin'){
$xcrud->table('employment');
$xcrud->relation('uid','profile','id','name');
$xcrud->label('uid','Name');
}else{
$xcrud->table('employment');
//$xcrud->relation('employment.uid','profile','id','name');
//$xcrud->label('uid','Name');
$xcrud->where('uid =', $_SESSION['userid']);
$xcrud->readonly('uid');
$xcrud->before_insert('uid_example');
$xcrud->columns('uid', true);

}

//   $xcrud->fields('designation,date_from,date_to');
//    $xcrud->change_type('date_from', 'date', '', array('range_end' => 'date_from', 'placeholder' => 'Date from...'));
//    $xcrud->change_type('date_to', 'date', '', array('range_start' => 'date_to', 'placeholder' => 'Date to...'));
 
$xcrud->buttons_position('left');

echo $xcrud->render();

?>