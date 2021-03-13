<!DOCTYPE html>
<html lang="en">
<head>
<title><?=(isset($title)) ? $title : $this->l_skin->apps_config('title');?></title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="<?php if(isset($description)){echo $description;} ?>">
<meta name="keywords" content="<?php if(isset($keywords)){echo $keywords;} ?>">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="no-cache">

<link rel="stylesheet" href="<?=base_url('lib/login/fonts/icomoon/style.css');?>">
<link rel="stylesheet" href="<?=base_url('lib/login/css/owl.carousel.min.css');?>">
<link rel="stylesheet" href="<?=base_url('lib/login/css/bootstrap.min.css');?>">
<link rel="stylesheet" href="<?=base_url('lib/login/css/style.css');?>">

<link rel="stylesheet" href="<?=base_url('lib/fontawesome/fontawesome.min.css');?>">
<?php if(isset($css)){$this->l_skin->css_load($css);} ?>
<link rel="stylesheet" href="<?=base_url('src/css/portal.css?v='.filemtime('src/css/portal.css').'');?>">
<link rel="stylesheet" href="<?=base_url('src/css/tema/bootstrap-material.css?v='.filemtime('src/css/tema/bootstrap-material.css').'');?>">
<link rel="stylesheet" href="<?=base_url('src/css/tema/shreerang-material.css?v='.filemtime('src/css/tema/shreerang-material.css').'');?>">
<link rel="icon" href="<?=base_url($this->l_skin->apps_config('favicon'));?>" type="image/x-icon">
<script>var site_url='<?=site_url();?>';</script>
</head>
<body>

<?=$content;?> 

<script src="<?=base_url('lib/login/js/jquery-3.3.1.min.js');?>"></script>
<script src="<?=base_url('lib/login/js/popper.min.js');?>"></script>
<script src="<?=base_url('lib/login/js/bootstrap.min.js');?>"></script>
<script src="<?=base_url('lib/login/js/main.js');?>"></script>

<script src="<?=base_url('lib/jquery/jquery.min.js')?>"></script>
<script src="<?=base_url('lib/bootstrap/js/bootstrap.min.js')?>"></script>
<?php if(isset($js)){$this->l_skin->js_load($js);} ?>
</body>
</html>