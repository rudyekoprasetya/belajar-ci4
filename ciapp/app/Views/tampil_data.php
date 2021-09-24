<?= $this->extend('template/layout') ?>

<?= $this->section('content'); ?>
<div class="content"> 
    <h2 align="center">CRUD Employe</h2>
    <p align="center"><a href="/employe/create">Tambah Data</a></p>
    <table border="1" align="center">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Gender</th>
            <th>Gaji</th>
            <th>Aksi</th>
        </tr>
<?php foreach($employe as $row): ?>
        <tr>
            <td><?= $row['id'];?></td>
            <td><?= $row['nama'];?></td>
            <td><?= $row['alamat'];?></td>
            <td><?= $row['gender'];?></td>
            <td><?= $row['gaji'];?></td>
            <td>
               <a href="/employe/<?= $row['id'];?>/edit">edit</a>  | 
               <a href="/employe/<?= $row['id'];?>/delete" onclick="return confirm('Apakah Yakin?')">delete</a> 
            </td>
        </tr>
<?php endforeach;?>
    </table>
</div> 
<?= $this->endSection(); ?>