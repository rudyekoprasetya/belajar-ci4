<?php echo $this->extend('template/layout'); ?>


<?php echo $this->section('content'); ?>
<div class="content"> 
    <h1><?= $judul; ?></h1> 
    <form action="/hitung/proses" method="post"> 
         <?= csrf_field(); ?>
        <p> 
            <input type="text" name="angka1" value="<?= $angka1; ?>"> x  
            <input type="text" name="angka2" value="<?= $angka2; ?>"> = 
            <?= $hasil; ?>
        </p> 
        <p><button type="submit">HITUNG</button></p> 
    </form>
</div>
<?php echo $this->endSection(); ?>