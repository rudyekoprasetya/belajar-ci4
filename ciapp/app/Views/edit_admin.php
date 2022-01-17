<?= $this->extend('template/layout') ?>

<?= $this->section('content'); ?>
<div class="content"> 
    <h2 align="center"><?= $judul; ?></h2>
    <form action="/admin/update" method="post">
    <?= csrf_field(); ?>
    <input type="hidden" name="_method" value="put">
<?php foreach($admin as $row): ?>
        <table align="center">
            <tr>
                <td>ID</td>
                <td><input type="text" name="id_admin" value="<?= $row['id_admin'];?>" readonly></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" value="<?= $row['username'];?>"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" value="<?= $row['password'];?>"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit">Update</button>
                    <a href="/admin">
                        <button type="button">Cancel</button>
                    </a>
                </td>
            </tr>
        </table>
<?php endforeach; ?>
    </form>
</div>

<?= $this->endSection(); ?>