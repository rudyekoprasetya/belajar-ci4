<?= $this->extend('template/layout') ?>

<?= $this->section('content'); ?>
<div class="content"> 
    <h1><?= $judul; ?></h1>
    <p>Ini adalah laman Gallery</p>
    <?php for($i=0; $i<5; $i++) { ?>
    <img src="https://picsum.photos/10<?= $i; ?>" width="100px" height="100px">
    <?php } ?>
</div> 
<?= $this->endSection(); ?>