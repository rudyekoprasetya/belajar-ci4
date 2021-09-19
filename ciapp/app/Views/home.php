<?= $this->extend('template/layout') ?>

<?= $this->section('content'); ?>
<div class="content"> 
    <h2><?= $judul; ?></h2> 
    <p><?= $isi; ?></p> 
</div> 
<?= $this->endSection(); ?>