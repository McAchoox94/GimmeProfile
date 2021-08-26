<?php if($_SESSION['userrole'] === 'admin'){?>
<div id="caption">Administration<small></small></div>
<?php  }else {?><div id="caption">User Setting<small></small></div><?php  }?>
 
<ul id="leftmenu" class="nav nav-pills nav-stacked">
<?php
	foreach($pagedata as $pk=>$pd){ 
?>
    <li class="<?php echo $page == $pk ? 'active' : '' ?>">
        <a href="manage.php?page=<?php echo $pk ?>"><?php echo $pd['title_1'] ?></a>
    </li>
<?php	   
	}//&theme=<?php echo $theme ?>

</ul>