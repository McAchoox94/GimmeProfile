<?php  include("inner_header.php");?>
        <div id="page">
            <div id="menu"><?php include(dirname(__FILE__).'/menu.php') ?></div>
            <div id="content">
                <div class="clr">&nbsp;</div>
                <h1><?php echo $title_1 ?></h1>
                <p><?php echo $description ?></p>
                <?php include($file) ?>
                <div class="clr">&nbsp;</div>
            </div>
        </div>
      </body>
</html>
