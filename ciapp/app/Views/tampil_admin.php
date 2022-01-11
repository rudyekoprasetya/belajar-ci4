<?= $this->extend('template/layout') ?>

<?= $this->section('content'); ?>
<div class="content"> 
    <h2 align="center">CRUD Admin</h2>
    <p align="center"><a href="/admin/create">Tambah Data</a></p>
    <table border="1" align="center">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Password</th>
            <th>Aksi</th>
        </tr>
<?php foreach($admin as $row): ?>
        <tr>
            <td><?= $row['id_admin'];?></td>
            <td><?= $row['username'];?></td>
            <td><?= '*********';?></td>
            <td>
               <a href="/admin/<?= $row['id_admin'];?>/edit">edit</a>  | 
               <a href="/admin/<?= $row['id_admin'];?>/delete" onclick="return confirm('Apakah Yakin?')">delete</a> 
            </td>
        </tr>
<?php endforeach;?>
    </table>
</div> 
<?= $this->endSection(); ?>