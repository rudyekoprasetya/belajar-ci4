<!DOCTYPE html>
<html>
<head> 
    <meta charset="utf-8"> 
    <title><?= $judul; ?></title>
</head>
<body> 
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
</body>
</html>