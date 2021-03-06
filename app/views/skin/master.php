<!DOCTYPE html>
<html lang="en" class="material-style layout-fixed">
<head>
<title><?=(isset($title)) ? $title : $this->l_skin->apps_config('title');?></title>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="<?php if(isset($description)){echo $description;} ?>">
<meta name="keywords" content="<?php if(isset($keywords)){echo $keywords;} ?>">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="no-cache">

<link rel="stylesheet" href="<?=base_url('lib/fontawesome/fontawesome.min.css');?>">
<link rel="stylesheet" href="<?=base_url('src/css/tema/ionicons.css');?>">
<link rel="stylesheet" href="<?=base_url('src/css/tema/linearicons.css');?>">
<link rel="stylesheet" href="<?=base_url('src/css/tema/feather.css');?>">

<?php if(isset($css)){$this->l_skin->css_load($css);} ?>
<link rel="stylesheet" href="<?=base_url('src/css/tema/bootstrap-material.css');?>">
<link rel="stylesheet" href="<?=base_url('src/css/tema/shreerang-material.css')?>">

<!-- <link rel="stylesheet" href="<?=base_url('src/css/global.css?v='.filemtime('src/css/global.css').'');?>"> -->
<link rel="stylesheet" href="<?=base_url('src/css/tema/uikit.css?v='.filemtime('src/css/tema/uikit.css').'');?>">
<link rel="stylesheet" href="<?=base_url('src/css/tema/perfect-scrollbar.css');?>">
<link rel="icon" href="<?=base_url($this->l_skin->apps_config('favicon'));?>" type="image/x-icon">
<script>var site_url='<?=site_url();?>';</script>
</head>
<body>

<?=$header;?> 
<?=$sidebar;?> 
<?=$content;?> 
<?=$modal;?> 
<?=$footer;?> 

<script src="<?=base_url('lib/jquery/jquery.min.js')?>"></script>
<script src="<?=base_url('lib/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?=base_url('lib/bootstrap/js/popper.min.js')?>"></script>
<script src="<?=base_url('lib/sweetalert/sweetalert2.all.min.js')?>"></script>
<script src="<?=base_url('src/js/tema/perfect-scrollbar.js')?>"></script>
<script src="<?=base_url('src/js/tema/sidenav.js')?>"></script>
<script src="<?=base_url('src/js/tema/layout-helpers.js')?>"></script>
<script src="<?=base_url('src/js/tema/material-ripple.js')?>"></script>
<script src="<?=base_url('src/js/tema/demo.js')?>"></script>
<script src="<?=base_url('lib/loading/loadingoverlay.min.js')?>"></script>

<script src="<?=base_url('src/js/global.js')?>"></script>

<!-- <script>$('[data-sidenav]').sidenav();</script> -->
<?php if(isset($js)){$this->l_skin->js_load($js);} ?>
</body>
</html>