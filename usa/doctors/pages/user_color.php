<?php
$xcrud = Xcrud::get_instance();


		$xcrud->table('user_color');
		$xcrud->unset_add();
    $xcrud->unset_edit();
    $xcrud->unset_remove();
    //$xcrud->unset_view();
    $xcrud->unset_csv();
    $xcrud->unset_limitlist();
    $xcrud->unset_numbers();
    $xcrud->unset_pagination();
    $xcrud->unset_print();
    $xcrud->unset_search();
    $xcrud->unset_title();
    $xcrud->unset_sortable();
	$xcrud->buttons_position('left');   
	echo $xcrud->render();

?>