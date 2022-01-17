<?= $this->extend('template/layout') ?>

<?= $this->section('content'); ?>
<div class="content"> 
    <h2 align="center"><?= $judul; ?></h2>
    <form action="/admin/save" method="post">
    <?= csrf_field(); ?>
        <table align="center">
            <tr>
                <td>Username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit">Save</button>
                    <a href="/admin">
                        <button type="button">Cancel</button>
                    </a>
                </td>
            </tr>
        </table>
    </form>
</div>

<?= $this->endSection(); ?>