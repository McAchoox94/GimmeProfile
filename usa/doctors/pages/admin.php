<?php
$xcrud = Xcrud::get_instance();
$xcrud->table('admin');
$xcrud->validation_required('username')->validation_required('password');
$xcrud->buttons_position('left');
echo $xcrud->render();
?>