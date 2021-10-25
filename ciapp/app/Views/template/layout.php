<!DOCTYPE html>
<html>
<head> 
    <meta charset="utf-8"> 
    <title><?= $judul; ?></title> 
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/style.css'); ?>">
</head>
<body> 
 
    <!-- membuat container -->
<div class="container"> 
    <!-- header --> 
    <?= $this->include('template/header'); ?> 
    <!-- header --> 
 
    <dic class="isi">    
        <!-- sidebar --> 
        <?= $this->include('template/sidebar'); ?> 
        <!-- sidebar --> 
 
        <!-- content --> 
        <?= $this->renderSection('content'); ?>
        <!-- content --> 
 
    </div> 
 
</div> 
 
</body>
</html>