<?php
$xcrud = Xcrud::get_instance();
$xcrud->query("SELECT DISTINCT u.fullname, q.title, r.answer FROM  `user` u, question q,  responce r 
WHERE  q.`qid`=r.`qid` AND u.`id`=r.`uid`");
$xcrud->label('fullname','User Name')->label('title','Question Title')->label('answer','Answer ');

$xcrud->buttons_position('left');
echo $xcrud->render();
?>