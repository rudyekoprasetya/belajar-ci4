<?= $this->extend('template/layout') ?>

<?= $this->section('content'); ?>
<div class="content"> 
    <h2 align="center"><?= $judul; ?></h2>
    <form action="/employe/save" method="post">
    <?= csrf_field(); ?>
        <table align="center">
            <tr>
                <td>ID</td>
                <td><input type="text" name="id"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><textarea name="alamat" id="" rows="5"></textarea></td>
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
                <td><input type="text" name="gaji"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit">Save</button>
                    <a href="/employe">
                        <button type="button">Cancel</button>
                    </a>
                </td>
            </tr>
        </table>
    </form>
</div>

<?= $this->endSection(); ?>