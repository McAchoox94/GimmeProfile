<?php

$xcrud = Xcrud::get_instance();
if($_SESSION['userrole'] === 'admin'){
	$xcrud->table('skills');
	$xcrud->before_insert('uid_example');
	$xcrud->relation('uid','profile','id','name');
$xcrud->label('uid','Name');
	}
elseif($_SESSION['userrole'] === 'user'){
	$xcrud->table('skills');
	$xcrud->where('uid =', $_SESSION['userid']);
	$xcrud->readonly('uid');
	$xcrud->before_insert('uid_example');
	$xcrud->columns('uid', true);
//$xcrud->after_insert('skill_insert');

}

$xcrud->relation('category','skills_category','id','name','skills_category.uid ='. $_SESSION['userid']);
$xcrud->label('category','Choose Category');

$xcrud->buttons_position('left');	
echo $xcrud->render();

?>