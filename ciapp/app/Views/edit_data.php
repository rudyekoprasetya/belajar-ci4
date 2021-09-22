<?= $this->extend('template/layout') ?>

<?= $this->section('content'); ?>
<div class="content"> 
    <h2 align="center"><?= $judul; ?></h2>
    <form action="/employe/update" method="post">
    <?= csrf_field(); ?>
    <input type="hidden" name="_method" value="put">
<?php foreach($employe as $row): ?>
        <table align="center">
            <tr>
                <td>ID</td>
                <td><input type="text" name="id" value="<?= $row['id'];?>" readonly></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value="<?= $row['nama'];?>"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><textarea name="alamat" rows="5"><?= $row['alamat'];?></textarea></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>
                    <select name="gender" >
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Gaji</td>
                <td><input type="text" name="gaji" value="<?= $row['gaji'];?>"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit">Update</button>
                    <a href="/employe">
                        <button type="button">Cancel</button>
                    </a>
                </td>
            </tr>
        </table>
<?php endforeach; ?>
    </form>
</div>

<?= $this->endSection(); ?>