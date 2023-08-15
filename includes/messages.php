<?php 
if(isset($_REQUEST['success'])){$success = $_REQUEST['success'];}
if(isset($success) AND !empty($success)){?>

<section class="tile color greensea">
  <div class="alert alert-success alert-dismissible">
    <h4 class="small-uppercase">
      <?=$success?>
    </h4>
  </div>
</section>
<?php } if(isset($_REQUEST['error'])){$error = $_REQUEST['error'];}?>
<?php if(isset($error) AND !empty($error)){?>
<section class="tile color red">
  <div class="alert alert-danger alert-dismissible">
    <h4 class="small-uppercase">
      <?=$error?>
    </h4>
  </div>
</section>
<?php } ?>
<?php 
if(isset($_REQUEST['warning'])){$warning = $_REQUEST['warning'];}
if(isset($warning) AND !empty($warning)){?>
<section class="tile color orange textured">
  <div class="alert alert-warning alert-dismissible">
    <h4 class="small-uppercase">
      <?=$warning?>
    </h4>
  </div>
</section>
<?php } ?>
<?php if(isset($information) AND !empty($information)){?>
<section class="tile color blue">
  <div class="tile-header">
    <h4 class="small-uppercase">
      <?=$information?>
    </h4>
  </div>
</section>
<?php } ?>