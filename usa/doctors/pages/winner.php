<?php
$xcrud = Xcrud::get_instance();
if(isset($_GET['qid'])){
?>
<a href="javascript:Xcrud.reload();" data-task="create" class="btn btn-success xcrud-action"><i class="icon-star glyphicon glyphicon-star"></i> Randomize again</a>
<?
$qry="SELECT u.uid, u.fullname, u.mobile,r.`answer`,q.`qid`, u.email FROM  `user` u,  responce r, question q 
WHERE   (q.`right_answer`=r.`answer` AND q.`qid`=r.`qid`) AND  u.`id`=r.`uid` AND  q.`qid`=".$_GET['qid']." ORDER BY RAND() LIMIT 1";

$db = Xcrud_db::get_instance();
$db->query($qry);
$row = $db->row();
if($row){
$xcrud->query($qry);

 $xcrud->label('fullname','User Name')->label('title','Question Title')->label('answer','Answer ');
    $xcrud->unset_csv();
    $xcrud->unset_print();

$xcrud->buttons_position('left');
echo $xcrud->render();
}
 }else{

$xcrud = Xcrud::get_instance();
$xcrud->table('question');
$xcrud->hide_button('save_return');
 $xcrud->unset_add();
    $xcrud->unset_edit();
    $xcrud->unset_remove();
    $xcrud->unset_view();
    $xcrud->unset_csv();
    $xcrud->unset_print();
   
//image upload with resizing
   $xcrud->create_action('publish', 'choose_winner'); // action callback, function publish_action() in functions.php
$xcrud->button('index.php?page=winner&qid={qid}','Choose Winner','icon-star glyphicon glyphicon-star','',array('target'=>'_parent'));

$xcrud->change_type('q_image_path', 'image', '', array(
        'width' => 410,
        'path' => '../images/',
'thumbs' => 
    array(
        array(
            'width' => 100,
            'height' => 100,
            'crop' => true,
            'folder' => 'thumbs'),
			array(
            'width' => 730,
            'height' => 700,
            'crop' => true,
            'folder' => 'thumbs')

        )));
$xcrud->change_type('answer1_path', 'image', '', array(
        'width' => 150,
        'path' => '../images/',
'thumbs' => 
    array(
        array(
            'width' => 100,
            'height' => 100,
            'crop' => true,
            'folder' => 'thumbs'),
			array(
            'width' => 195,
          //  'height' => 95,
            'crop' => true,
            'folder' => 'thumbs')

        )));
$xcrud->change_type('answer2_path', 'image', '', array(
        'width' => 150,
        'path' => '../images/',
'thumbs' => 
    array(
        array(
            'width' => 100,
           // 'height' => 100,
            'crop' => true,
            'folder' => 'thumbs'),
			array(
            'width' => 195,
           // 'height' => 95,
            'crop' => true,
            'folder' => 'thumbs')

        )));
$xcrud->change_type('answer3_path', 'image', '', array(
        'width' => 150,
        'path' => '../images/',
'thumbs' => 
    array(
        array(
            'width' => 100,
            'height' => 100,
            'crop' => true,
            'folder' => 'thumbs'),
			array(
            'width' => 195,
           // 'height' => 95,
            'crop' => true,
            'folder' => 'thumbs')

        )));

 
$xcrud->label('q_image_path','Question Image')->label('answer1_path','Answer Image One')->label('answer2_path','Answer Image Two');

$xcrud->label('answer3_path','Answer Image Three')->label('right_answer','Correct Answer');
$xcrud->modal('q_image_path,answer1_path,answer2_path,answer3_path');
$xcrud->buttons_position('left');

$xcrud->theme('bootstrap');
     echo $xcrud->render();

	}
?>