<?php
 if($_SESSION['userrole'] === 'user') {
	echo "<h1>Selected Language</h1>";	
	$xcrud3 = Xcrud::get_instance();
	
 $sql='SELECT pro.`name` as Username,lang.`name` as Language  FROM `profile` pro,`language` lang  WHERE pro.`language`=lang.id and    pro.`id`='.$_SESSION['userid'];
 	$xcrud3->query($sql);
 	$xcrud3->unset_limitlist();
  	echo $xcrud3->render();
  	$xcrud3->unset_sortable(); 
	$xcrud3->buttons_position('left');	
	
	
}


//////////////////////////

if($_SESSION['userrole'] === 'admin'){
	$xcrud = Xcrud::get_instance();
	$xcrud->table('language');
	$xcrud->buttons_position('left');
	echo $xcrud->render();

	$xcrud1 = Xcrud::get_instance();
	$xcrud1->table('captions');
	$xcrud1->buttons_position('left');
	
	$xcrud1->disabled('CAPTION','edit');
	$xcrud1->relation('LANGUAGE','language','id','name');
	$xcrud1->label('LANGUAGE','Language');
	$xcrud1->validation_required('CAPTION');
	$xcrud1->validation_required('VALUE');
	$xcrud1->validation_required('LANGUAGE');
	echo $xcrud1->render();
} 
?>