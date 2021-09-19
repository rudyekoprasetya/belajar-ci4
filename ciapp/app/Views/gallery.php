<?= $this->extend('template/layout') ?>

<?= $this->section('content'); ?>
<div class="content"> 
    <h1><?= $judul; ?></h1>
    <p>Ini adalah laman Gallery</p>
    <img src="https://picsum.photos/100" width="100px" height="100px">
</div> 
<?= $this->endSection(); ?>