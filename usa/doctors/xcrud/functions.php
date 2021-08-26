<?php



function publish_language($xcrud)
{ 
	if ($xcrud->get('primary'))
    {
        $db = Xcrud_db::get_instance();
		$primary = (int)$xcrud->get('primary');
		$query = 'SELECT * from user_language where uid='.(int)$_SESSION['userid'];
		$db->query($query);
		$result = $db->result();
        $count = count($result);
	if($count==0){
		$query = 'INSERT into user_language (`uid`,`lang_id` ,`active`) values ('.(int)$_SESSION['userid'].','.$primary.' ,1)';
		 $db->query($query);
		}else{
        $query = 'UPDATE user_language SET lang_id='.$primary.' where uid='.(int)$_SESSION['userid'];
        $db->query($query);
		}
    }
		publish_action();
}
	
	function publish_color($xcrud)
{ 
	if ($xcrud->get('primary'))
    {
        $db = Xcrud_db::get_instance();
		$primary = (int)$xcrud->get('primary');
		$query = 'SELECT * from user_color where uid='.(int)$_SESSION['userid'];
		$db->query($query);
		$result = $db->result();
        $count = count($result);
	if($count==0){
		$query = 'INSERT into user_color (`uid`,`color_id` ,`active`) values ('.(int)$_SESSION['userid'].','.$primary.' ,1)';
		 $db->query($query);
		}else{
        $query = 'UPDATE user_color SET color_id='.$primary.' where uid='.(int)$_SESSION['userid'];
        $db->query($query);
		}
    }
	publish_action();
}


function unpublish_language($xcrud)
{
    if ($xcrud->get('primary'))
    {
        $db = Xcrud_db::get_instance();
        $query = 'UPDATE language SET `active` = b\'0\' WHERE id = ' . (int)$xcrud->get('primary');
        $db->query($query);
    }
}

function publish_theme($xcrud)
{
    if ($xcrud->get('primary'))
    {
        $db = Xcrud_db::get_instance();
		$primary = (int)$xcrud->get('primary');
		$query = 'SELECT * from user_theme where uid='.(int)$_SESSION['userid'];
		$db->query($query);
		$result = $db->result();
        $count = count($result);
	if($count==0){
		$query = 'INSERT into user_theme (`uid`,`theme_id` ,`active`) values ('.(int)$_SESSION['userid'].','.$primary.',1)';
		 $db->query($query);
		}else{
        $query = 'UPDATE user_theme SET theme_id='.$primary.' where uid='.(int)$_SESSION['userid'];
        $db->query($query);
		}

    }  
      publish_action();
}



function unpublish_theme($xcrud)
{
    if ($xcrud->get('primary'))
    {
        $db = Xcrud_db::get_instance();
        $query = 'UPDATE theme_settings SET `active` = b\'0\' WHERE id = ' . (int)$xcrud->get('primary');
        $db->query($query);
    }
	 publish_action();
}

/*function publish_background($xcrud)
{
    if ($xcrud->get('primary'))
    {
        $db = Xcrud_db::get_instance();
        $query = 'UPDATE custom_background SET `active` = b\'0\'';
        $db->query($query);

        $query = 'UPDATE custom_background SET `active` = b\'1\' WHERE id = ' . (int)$xcrud->get('primary');
        $db->query($query);
 

	}
 }*/
 function publish_background($xcrud){
 if ($xcrud->get('primary'))
    {
        $db = Xcrud_db::get_instance();
		$primary = (int)$xcrud->get('primary');
		$query = 'SELECT * from user_background where uid='.(int)$_SESSION['userid'];
		$db->query($query);
		$result = $db->result();
        $count = count($result);
	if($count==0){
		$query = 'INSERT into user_background (`uid`,`background_id` ,`active`) values ('.(int)$_SESSION['userid'].','.$primary.' ,1)';
		 $db->query($query);
		}else{
        $query = 'UPDATE user_background SET background_id='.$primary.' where uid='.(int)$_SESSION['userid'];
        $db->query($query);
		}
    }
		publish_action();	
}

function unpublish_background($xcrud)
{
    if ($xcrud->get('primary'))
    {
        $db = Xcrud_db::get_instance();
        $query = 'UPDATE custom_background SET `active` = b\'0\' WHERE id = ' . (int)$xcrud->get('primary');
        $db->query($query);
    }
}

function publish_action()
{
   
		echo '<script>' ,
'window.location = "manage.php?page=user_theme";'
, '</script>'
;
    
}
function unpublish_action($xcrud)
{
    if ($xcrud->get('primary'))
    {
        $db = Xcrud_db::get_instance();
        $query = 'UPDATE base_fields SET `bool` = b\'0\' WHERE id = ' . (int)$xcrud->get('primary');
        $db->query($query);
    }
}

function exception_example($postdata, $primary, $xcrud)
{
    $xcrud->set_exception('ban_reason', 'Lol!', 'error');
    $postdata->set('ban_reason', 'lalala');
}

function test_column_callback($value, $fieldname, $primary, $row, $xcrud)
{
    return $value . ' - nice!';
}

function after_upload_example($field, $file_name, $file_path, $params, $xcrud)
{
    $ext = trim(strtolower(strrchr($file_name, '.')), '.');
    if ($ext != 'pdf' && $field == 'uploads.simple_upload')
    {
        unlink($file_path);
        $xcrud->set_exception('simple_upload', 'This is not PDF', 'error');
    }
}

function date_example($postdata, $primary, $xcrud)
{
    $created = $postdata->get('datetime')->as_datetime();
    $postdata->set('datetime', $created);
}

function movetop($xcrud)
{
    if ($xcrud->get('primary') !== false)
    {
        $primary = (int)$xcrud->get('primary');
        $db = Xcrud_db::get_instance();
        $query = 'SELECT `officeCode` FROM `offices` ORDER BY `ordering`,`officeCode`';
        $db->query($query);
        $result = $db->result();
        $count = count($result);

        $sort = array();
        foreach ($result as $key => $item)
        {
            if ($item['officeCode'] == $primary && $key != 0)
            {
                array_splice($result, $key - 1, 0, array($item));
                unset($result[$key + 1]);
                break;
            }
        }

        foreach ($result as $key => $item)
        {
            $query = 'UPDATE `offices` SET `ordering` = ' . $key . ' WHERE officeCode = ' . $item['officeCode'];
            $db->query($query);
        }
    }
}
function movebottom($xcrud)
{
    if ($xcrud->get('primary') !== false)
    {
        $primary = (int)$xcrud->get('primary');
        $db = Xcrud_db::get_instance();
        $query = 'SELECT `officeCode` FROM `offices` ORDER BY `ordering`,`officeCode`';
        $db->query($query);
        $result = $db->result();
        $count = count($result);

        $sort = array();
        foreach ($result as $key => $item)
        {
            if ($item['officeCode'] == $primary && $key != $count - 1)
            {
                unset($result[$key]);
                array_splice($result, $key + 1, 0, array($item));
                break;
            }
        }

        foreach ($result as $key => $item)
        {
            $query = 'UPDATE `offices` SET `ordering` = ' . $key . ' WHERE officeCode = ' . $item['officeCode'];
            $db->query($query);
        }
    }
}
function redirect_JS($page){
     echo '<script>window.location = "'.$page.'";</script>';	
	 exit;
}
function islogin() {
    if(!(isset($_SESSION['adminName']) && $_SESSION['adminName'] != NULL  )){
        redirect_JS('login.php');
    }
}

function uid_example($postdata, $xcrud)
	{
		$postdata->set('uid', $_SESSION['userid']);
	}
	
function is_url_exist($url){
    $ch = curl_init($url);    
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if($code == 200){
       $status = true;
    }else{
      $status = false;
    }
    curl_close($ch);
   return $status;
}

	

