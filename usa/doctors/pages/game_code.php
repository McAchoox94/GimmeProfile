<?php
	$xcrud1 = Xcrud::get_instance();

	  $db = Xcrud_db::get_instance();
	
	if(isset($_POST['Save']) && $_POST['Save']=="Save"){
	
	
	  $coords = trim($_POST['coords']);
	 
	if(!Xcrud_config::$demo_mode){
        $query = "UPDATE game_code SET `coords` = '$coords' WHERE id = '1'";
         $sql_re = $db->query($query);
	}
        //$xcrud->query($query);
	
	//$query = 'UPDATE game_code SET `coords` = \'1\' WHERE id = ' . 1;
       // $res = $xcrud1->query($query);
	//echo $res;
	  //echo $query = "UPDATE game_code SET coords = '$coords' WHERE id = '1'";
     // echo $res = $xcrud1->query($query);
	 
	   //$sql_re = $xcrud1->query("UPDATE game_code SET `coords` = '1'");  
	 
	}
     $xcrud1->query("SELECT * FROM game_code");
    $xcrud1->columns('game_screen'); // columns in grid
    $xcrud1->fields('game_screen'); // fields in details
 	$xcrud1->unset_print();
 	$xcrud1->unset_csv();
 	$xcrud1->unset_limitlist();
    echo $xcrud1->render();
	

    
//Bring result
 
 
        $queryimg = 'SELECT site_url,game_screen FROM `settings`';
        $db->query($queryimg);
        $result = $db->result();
		
		$dbc = Xcrud_db::get_instance();
		$querycord = 'SELECT coords FROM `game_code`';
        $dbc->query($querycord);
        $resultcord = $dbc->result();
if($result[0]['game_screen']!="" || $result[0]['game_screen']!=NULL){		
  echo "<h4>Choose Map Area below and then SAVE</h4>";

?>  
<form action="" method="POST"  >
<div class="span6">
      <input type="hidden" name="coords" class="canvas-area" 
        placeholder="Shape Coordinates" 
        data-image-url="<?=$result[0]['site_url']."/images/thumbs/".$result[0]['game_screen']?>" value="<?=$resultcord[0]['coords']?>">
   
    <input type="submit" name="Save" value="Save" class="btn btn-primary" />
    
    </div>
    </form>
   <? } else { 
     echo "<h4>Please add game screen on settings </h4>";
    } ?>