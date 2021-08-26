<?php
function getHttpVars() {
    $superglobs = array(
        '_POST',
        '_REQUEST',
        '_GET',
        '_FILES',
        'HTTP_POST_VARS',
        'HTTP_GET_VARS'
    );
    $httpvars = array();
    // extract the right array
    foreach ($superglobs as $glob) {
        global $$glob;
        if (isset($$glob) && is_array($$glob)) {
            $httpvars = $$glob;
        } //isset($$glob) && is_array($$glob)
        if (count($httpvars) > 0)
            break;
    } //$superglobs as $glob
    return $httpvars;
}
 
$db = Xcrud_db::get_instance();

extract(getHttpVars());

$msg = '';

$type = '';


///get profile data
//$id=$_REQUEST['id'];
function user($id){

$db = Xcrud_db::get_instance();

$db->query("select * from profile where id = ".$id."");
$row = $db->row();
    if ($row > 0) {
        return $row;
    } else {
        return false;
    }

}
function cleandata($data) {
    return trim($data);
}


function employment() {
    $db = Xcrud_db::get_instance();
    $db->query("SELECT * FROM employment WHERE uid = '".$_SESSION['userid']."'"); // executes query, 
    $result = $db->result();
	return $result;
}
function education() {
    $db = Xcrud_db::get_instance();
    $db->query("SELECT * FROM education WHERE uid = '".$_SESSION['userid']."'"); // executes query, 
    $result = $db->result();
	return $result;
}
//pix_upload function

function fileupload($filename, $prefix) {

    $uploaded_files_location = 'images'; //This is the directory where uploaded files are saved on your server

    if (!file_exists($uploaded_files_location)) {
        mkdir($uploaded_files_location, 0777, true);
    }

    $value = explode(".", $_FILES[$filename]['name']);
    $ext = strtolower(array_pop($value));

    $newname = $prefix . "_" . rand() . "." . $ext;
    $final_location = $uploaded_files_location . "/" . $newname;
    if (move_uploaded_file($_FILES[$filename]['tmp_name'], $final_location)) {
        return $newname;
    }
}
///  add new user

if (isset($action) && $action === 'register_form') {

    if ($password === $confrim_password) {



        $db->query("SELECT username FROM profile WHERE username= '" . $username . "'"); // executes query

        if ($db->row() == 0) {

            foreach ($_POST as $key => $value) {
                if ($value) {
                    $value = cleandata($value);
                    if ($key != 'action' && $key != 'confrim_password') { //For omiting some record
                        $fields[] = $key;
                         $values[] = "'" . $value . "'";
                        
                    }
                }
            } // build arrays of the form's field/value pairs

            $field_str = implode(',', $fields); // turn those arrays into comma-separated strings
            $values_str = implode(',', $values);




            $result = $db->query("INSERT INTO profile ($field_str) VALUES ($values_str)"); // executes query
            $lastinsid = $db->insert_id();

            foreach ($_FILES as $key => $value) {
                if ($value) {

                    $file = fileupload($key, $key);
                    if ($file) {
                        $filefields[] = $key . "='" . $file . "'";
                    }
                }
            }

            if ($result) {
                $msg = "Sign up Successfully! ";
                $type = 'success';
				
            }
        } else {
            $msg = 'This user name is all ready Registered';
            $type = 'error';
        }
    } else {
        $msg = "Password not match";
        $type = 'error';
    }
}


///update data
if (isset($action) && $action === 'update_profile') {



    if ($password === $confrim_password) {





        //Check dublicate email address

        if ($_SESSION['email'] != $email) {

            $db->query("SELECT email FROM profile WHERE email= '" . $email . "'"); // executes query

            $number_of_row = $db->row();
        } else {

            $number_of_row = 0;
        }



        if ($number_of_row == 0) {


			foreach ($_POST as $key => $value) {

                if ($value) {

                    $value = cleandata($value);

                    if ($key != 'action' && $key != 'confirm_password') { //For omiting some record
                        if ($key == 'password') {



                            $field[] = $key . " = '" . $value . "' ";
                        } elseif ($key == 'date_of_birth') {
                            $value = date_format(date_create($value), "Y-m-d");
                            $field[] = $key . " = '" . ($value) . "' ";
                        } else {

                            $field[] = $key . " = '" . ($value) . "' ";
                        }
                    }
                }
            } // build arrays of the form's field/value pairs





            $field_str = implode(',', $field); // turn those arrays into comma-separated strings







            $result = $db->query("UPDATE profile SET $field_str WHERE id = '" . $_SESSION['userid'] . "'"); // executes query



			foreach ($_FILES as $key => $value) {

                if ($value) {



                    $file = fileupload($key, $key);

                    if ($file) {

                        $filefields[] = $key . "='" . $file . "'";
                    }
                }
            }

            if (isset($filefields) && count($filefields) > 0) {



                $file_field_str = implode(',', $filefields); // turn those arrays into comma-separated strings



                $result = $db->query("UPDATE profile SET $file_field_str  WHERE id = '" . $_SESSION['userid'] . "'"); // executes query, 
            }

            if ($result) {

                $msg = "Profile update Successfully! ";
				//echo "success";
                $type = 'success';



                //Updating session

                $_SESSION['email'] = $email;

                $_SESSION['name'] = $name;
            }
        } else {

            $msg = 'This Email is all ready Registered';
			//echo "error found";
            $type = 'error';
        }
    } else {

        $msg = "Password not match";
		//echo "password not match";
        $type = 'error';
    }
}









?>