# Modul Praktikum CodeIgniter 4
---

Penyusun **Rudy Eko Prasetya, S.Kom** - Blog [https://rudyekoprasetya.wordpress.com](https://rudyekoprasetya.wordpress.com)

![Code Igniter](https://rudyekoprasetya.files.wordpress.com/2020/04/codeigniter.jpg)

Modul ini disusun sebagai bahan ajar praktikum pemrograman web dinamis untuk siswa SMK atau Mahasiswa menggunakan framework CodeIgniter Versi 4 untuk membangun suatu aplikasi web.

Modul ini dibuat berdasarkan dokumentasi resmi dari Codeigniter yang dipersingkat agar mudah untuk dipraktekkan dan dipahami. Sehingga jika menginginkan panduan lengkap bisa merujuk ke [https://codeigniter.com/user_guide/index.html](https://codeigniter.com/user_guide/index.html).

Modul ini menggunakan lisensi [Creative Common](https://creativecommons.org/licenses/by-sa/4.0/) dengan atribut NonKomersial-BerbagiRupa dimana Lisensi ini mengizinkan setiap orang untuk menggubah, memperbaiki, dan membuat ciptaan turunan bukan untuk kepentingan komersial, selama mereka mencantumkan kredit dan melisensikan ciptaan turunan dengan syarat yang serupa dengan ciptaan asli.

## Daftar Isi
---

- [Pengantar](#pengantar)
- [Persiapan dan Installasi](#persiapan-dan-installasi)
- [Mengenal Struktur Folder](#mengenal-struktur-folder)
- [Mengenal Route dan Controller](#mengenal-route-dan-controller)
- [Mengenal View](#mengenal-view)
- [Template Engine](#template-engine)
- [Membuat CRUD Tampil Data](#membuat-crud-tampil-data)
- [Membuat CRUD Simpan Data](#membuat-crud-simpan-data)
- [Membuat CRUD Edit Data](#membuat-crud-edit-data)
- [Membuat CRUD Hapus Data](#membuat-crud-hapus-data)
- [Tentang Migration dan Seeding](#tentang-migration-dan-seeding)
- [Membuat Autentifikasi](#membuat-autentifikasi)
- [Membuat Restful API](#membuat-restful-api)
- [Referensi](#referensi)
- [Tentang Penyusun](#tentang)

## Pengantar
---

**CodeIgniter** adalah sebuah framework PHP yang dapat mempercepat pengembang untuk membuat sebuah aplikasi web. Ada banyak library dan helper yang berguna didalamnya dan tentunya mempermudah proses development.

Menggunakan Framework Ibarat ingin membangun rumah maka Anda tidak perlu membuat semen, memotong kayu menjadi papan, mengubah batu menjadi porselen dan lain-lain. Anda cukup memilih komponen-komponen tersebut lalu dikombinasikan menjadi rumah yang indah.

Framework ini juga sempat menjadi perhatian pembuat php – [Rasmus Lerdorf](https://en.wikipedia.org/wiki/Rasmus_Lerdorf)

> **“I like CodeIgniter because it is faster, lighter and the leastlike a framework.”** – *Rasmus Lerdorf*

Code Igniter disingkat CI awalnya buatan dari Ellislab namun pengembangannya sekarang di pegang MIT. Framework ini bisa diunduh di [https://codeigniter.com/download](https://codeigniter.com/download).

Perlu diketahui CI menggunakan teknik **MVC (Model View Controller)**. MVC sebenarnya adalah teknik pemogramanan yang memisahkan bisnis logic (alur pikir), data logic (penyimpanan data) dan presentation logic (antarmuka aplikasi) atau secara sederhana adalah memisahkan antara desain, data dan proses.

- **Model** berhubungan dengan data dan interaksi ke database atau webservice. Biasanya di dalam model akan berisi class dan fungsi untuk mengambil, melakukan update dan menghapus data website. Sebuah aplikasi web biasanya menggunakan basis data dalam menyimpan data, maka pada bagian Model biasanya akan berhubungan dengan perintah-perintah query SQL.
- **View** berhubungan dengan segala sesuatu yang akan ditampilkan ke end-user. Di dalam view hanya berisi variabel-variabel yang berisi data yang siap ditampilkan. View dapat dikatakan sebagai halaman website yang dibuat dengan menggunakan HTML dan bantuan CSS atau JavaScript.
- **Controller** Tugas controller adalah menyediakan berbagai variabel yang akan ditampilkan di view, memanggil model untuk melakukan akses ke basis data, menyediakan penanganan kesalahan/error, mengerjakan proses logika dari aplikasi serta melakukan validasi atau cek terhadap input.


![konsep MVC](https://rudyekoprasetya.files.wordpress.com/2020/04/mvc.jpg?w=616&h=328)


## Persiapan dan Installasi
---

**Perlu Diperhatikan** sebelum mempelajari CI wajib bagi kita untuk belajar tantang Teknologi Web seperti [HTML](https://rudyekoprasetya.wordpress.com/2020/03/26/belajar-html-dari-nol/), [CSS](https://rudyekoprasetya.wordpress.com/2020/03/31/panduan-belajar-css/), [Dasar Pemrograman PHP](https://rudyekoprasetya.wordpress.com/2020/03/02/pemrograman-web-dengan-php/) dan [Object Oriented Programming](https://rudyekoprasetya.wordpress.com/2020/04/02/object-oriented-programming/). 

> Karena kebanyakan mereka yang belajar CodeIgniter tanpa memiliki dasar PHP yang baik akan mengalami banyak kesulitan, bukan dalam menguasi konsep CodeIgniter tetapi masih seputar PHP. Setidaknya kita telah memahami konsep OOP pada PHP untuk mulai belajar.

Sebelum menggunakan CI ada beberapa software yang harus di install antara lain
1. XAMPP [download disini](https://www.apachefriends.org/index.html)
2. Code Editor [Sublime-Text](https://www.sublimetext.com/) atau [VSCode](https://code.visualstudio.com/)
3. Composer [Disini untuk Panduan Composer](https://rudyekoprasetya.wordpress.com/2021/01/01/berkenalan-dengan-composer/)
4. Git [Disini untuk Panduan Git](https://rudyekoprasetya.wordpress.com/category/git/)
5. Web Browser Rekomendasi Chrome [Download Disini](https://www.google.com/intl/id_id/chrome/)

Codeigniter 4 membutuhkan *versi php 7.3* keatas. Selain itu membutuhkan  **intl extension** dalam php kita.

Jika menemui masalah yang mengatakan kita belum mengaktifkan extention intl, masalah ini ditemui saat kita menginstall dengan menggunakan composer. Buka file **php.ini**

lalu cari tulisan seperti ini **extension=intl**, hilangkan tanda titik koma diawal sehingga kurang lebih seperti ini :

```console
;extention=intl
```

menjadi

```console
extention=intl
```
setelah itu restart service apache

Setelah install software diatas untuk memulai menggunakan CI. Buatlah suatu folder kerja, semisal Documents/belajar-ci . CI ini tidak harus diletakkan didalam folder HTDOCS di XAMPP, apa berarti kita tidak butuh XAMPP? tetap kita butuhkannya untuk membuat aplikasi database nantinya. Silahkan aktifkan git bash atau console/terminal anda pada folder kerja tersebut. Semisal kita akan membuat project dengan nama **web-app** kemudian ketikan perintah dibawah ini

```console
composer create-project codeigniter4/appstarter web-app --no-dev
```

Tunggu sampai proses selesai, kemudian jalankan perintah dibawah ini

```console
cd web-app
```

selanjutnya jalan server development

```console
php spark serve

CodeIgniter v4.1.4 Command Line Tool - Server Time: 2021-09-18 22:00:23 UTC-05:00

CodeIgniter development server started on http://localhost:8080
Press Control-C to stop.
[Sun Sep 19 10:00:24 2021] PHP 7.4.1 Development Server (http://localhost:8080) started
```

angan tutup console diatas kemudian buka web brower anda, kemudian ketikan alamat
http://localhost:8080  maka akan muncul seperti ini

![Welcome](https://codeigniter4.github.io/userguide/_images/welcome.png)

untuk menutup development server diatas tinggal menekan tombol **CTRL+C**

Sampai sini kita sudah berhasil menginstall CI dan siap melakukan coding kepada aplikasi kita

## Mengenal Struktur Folder
---

Sebelum memulai membuat aplikasi, alangkah baiknya kita mengenal struktur folder dari CI itu sendiri.

```console
web-app
 |- app
 	|- Config
 	|- Controllers
 	|- Database
 	|- Filters
 	|- Helpers
 	|- Language
 	|- Libraries
 	|- Models
 	|- ThirdParty
 	|- Views
 |- public
 	|- .htaccess
 	|- favicon.ico
 	|- index.php
 |- tests
 |- vendor
 |- writable
 |- .gitignore
 |- composer.json
 |- env
 |- LICENSE
 |- README.md
 |- spark

```

- **app** adalah folder untuk aplikasi kita dimana folder aplikasi kita
- **config** berisi semua file konfigurasi seperti database, routes, service, mail dan lainnya
- **controllers** digunakan untuk meletakkan semua file controller aplikasi kita
- **database** folder ini berisi tentang file-file untuk fitur migration database dan seeders (yang akan dibahas nantinya)
- **helpers** folder ini berisi berbagai macam helper yang digunakan untuk mengembangkan aplikasi
- **language** digunakan apabila kita ingin menginstall bahasa dalam CI
- **libraries** Apabila kita ingin membuat library baru bisa dimasukan dalam folder ini
- **models** digunakan untuk meletakkan semua file model aplikasi kita
- **views** folder untuk meletakkan view atau template dari aplikasi kita
- **public** adalah folder untuk file utama atau index.php kita, selain itu disini kita bisa membuat path untuk menajemen file seperti file upload user 
- **vendor** folder yang digunakan untuk menyimpan library atau plugin yang kita install untuk membangun aplikasi, biasanya menggunakan composer untuk pengelolaannya
- **.gitignore** adalah file untuk git version control
- **composer.json** adalah file konfigurasi composer
- **env** adalah file untuk konfigurasi environment seperti konfigurasi database, base_url dan lingkungan pengembangan.
- **spark** adalah file utama untuk command cli CI

Disini saya tidak akan menjelaskan semua, hanya yang sering digunakan saja. Diharapkan dengan mengenal struktur folder CI akan mempermudah kita dalam menggunakannya

Selanjutnya silahkan rename file *env* menjadi *.env* dan sesuaikan untuk environmentnya

```console
#--------------------------------------------------------------------
# ENVIRONMENT
#--------------------------------------------------------------------

# CI_ENVIRONMENT = production

```

kita hilangkan tanda pagar (#) kemudian kita ubah environment dari production menjadi development agar bisa menampilkan error jika ada kesalahan coding, menjadi seperti dibawah ini

```console
#--------------------------------------------------------------------
# ENVIRONMENT
#--------------------------------------------------------------------

CI_ENVIRONMENT = development

```

Sampai sini kita CI sudah siap untuk digunakan.


## Mengenal Route dan Controller
---

Seperti yang kita ketahui bahwa CI menggunakan konsep MVC untuk membangun aplikasi. Dimana bagian yang terpentingnya adalah controller.

Untuk memulai bekerja dengan controller silahkan buat file dengan Nama **Web.php** (gunakan Huruf Besar Awal) yang terletak di folder **app/controllers**. Jangan sampai salah tempat ya!

Berikut adalah code nya

```php
<?php

namespace App\Controllers;

class Web extends BaseController {
    public function index() {
        echo "hallo nama saya Code Igniter 4 salam Kenal";
    }
}
```

Struktur coding diatas menggunakan format [OOP](https://rudyekoprasetya.wordpress.com/2020/04/02/object-oriented-programming/). Dimana kita membuat class Web yang merupakan turunan dari class CI_Controller. Yang perlu diperhatikan disini adalah untuk **nama class controller harus sama dengan nama filenya**.

Coba buka web browser Anda dan akses `http://localhost:8080/web` dengan asumsi server development ci sudah berjalan. *Apakah yang akan muncul??*

Fungsi `index()` adalah fungsi yang dijalankan pertama. Dalam CI controller diakses setelah url utama atau base url. kita tinggal memanggil nama controller tanpa perlu diikut extensi php. berikut adalah ilustrasinya

![url ci](https://rudyekoprasetya.files.wordpress.com/2020/04/ci2.jpg)


- **Konfigurasi Base Url**, Bagian ini merupakan url yang kita masukkan pada konfigurasi base_url yang berupakan url paling dasar untuk mengakses web atau aplikasi kita
- **Segmen URI pertama** yaitu nama class/controller.
- **Segmen URI kedua** yaitu fungsi dari class controller yang telah kita panggil tadi. Apabila segment kedua ini kosong maka fungsi yang dipanggil adalah fungsi index dari kelas controller tersebut.
- **Segmen URI ketiga** biasanya berisi url parameter dari fungsi.

Sekarang coba lakukan perubahan pada file controller Web.php menjadi berikut

```php
<?php

namespace App\Controllers;

class Web extends BaseController {
    public function index() {
        echo "hallo nama saya Code Igniter 4 salam Kenal";
    }

    public function komentar() {
        echo "ini adalah fungsi komentar";
    }
}
```

Coba buka url `http://localhost:8080/web/komentar` *apakah yang muncul??*

Coba tambahkan function lagi pada controller Web.php 

```php
<?php

namespace App\Controllers;

class Web extends BaseController {
    public function index() {
        echo "hallo nama saya Code Igniter 4 salam Kenal";
    }

    public function komentar() {
        echo "ini adalah fungsi komentar";
    }

    public function nama($nama) {
        echo "Haloo nama saya $nama";
    }
}
```

Coba buka url `http://localhost:8080/web/nama/rudy` *Tulisan apakah yang muncul?*

variable nama diatas dikirim menggunakan uri atau url parameter. Dalam CI kita bisa mengirimkan lebih dari satu parameter, sebagai contoh berikut ini

```php
public function nama($nama,$umur) {
        echo "Haloo nama saya $nama, umur saya $umur";
}
```

Coba buka url `http://localhost:8080/web/nama/rudy/30` dan amatilah.

Kita jua bisa melakukan kostumisasi pada url project CI kita. 

Silahkan buka file **Routes.php** yang ada pada folder **app/Config/** dan tambahkan code berikut ini pada bagian Routes Definition

```php
/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

//membuat route function komentar pada controller web
$routes->get('/komentar', 'Web::komentar');

//membuat route untuk function nama lengkap dengan uri parameter
$routes->get('/nama/(:any)/(:num)', 'Web::nama/$1/$2');
```

Simpan dan coba buka browser dan ketikan url `http://localhost:8080/komentar` apakah yang muncul??

Semua fungsi dalam route tersebut akan menentukan url dalam aplikasi, secara default route utama `/` adalah menampilkan controller Home pada function index. Sehingga bila di buka `http://localhost:8080/` muncullah welcome screen dari CI.

Sedangkan code `$routes->get('/komentar', 'Web::komentar');` membuat route baru dengan url `http://localhost:8080/komentar` yang akan mengarah ke controller web pada function komentar.

Untuk pengiriman uri parameter kita bisa definisikan tipe data apa saja yang boleh dikirimkan, sebagai contoh code routes `$routes->get('/nama/(:any)/(:num)', 'Web::nama')` bahwa untuk uri segment pertama `$1` yaitu nama boleh semua jenis data `:any` sedangkan segment kedua `$2` untuk umur hanya boleh angka saja `:num`. Penjelasan lengkap bisa merujuk ke [https://codeigniter.com/user_guide/incoming/routing.html#placeholders](https://codeigniter.com/user_guide/incoming/routing.html#placeholders)

coba akses url `http://localhost:8080/nama/rudy/tigapuluh`, apakah yang muncul?

bandingkan dengan url `http://localhost:8080/nama/rudy/30`, amatilah

Dalam route ini kita bisa mendefinisikan berbagai macam request HTTP seperti GET, POST, PUT, DELETE dan sebagainya. ini akan kita bahas pada bab selanjutnya. 


### latihan
1. Buatlah project baru laravel dengan nama **olshop**
2. Buat Controller baru dengan nama **Dashboard** didalam project tersebut
3. Buatlah URL atau laman dalam project tersebut dengan struktur sebagai berikut

```console
- Home  (/home) Berisi tulisan Selamat Datang di Olshop Kami 
 
- Product (/product) Berisi tulisan 
  |- Sepatu  
  |- Baju 
  |- Celana 
 
- About (/about) Berisi lorem
```
4. Pada laman produk ditiap item mengandung link dimana link tersebut akan mengarah ke detail tiap produk  `/produk/detail/{harga}`, semisal bila di klik Baju maka akan muncul laman detail produk yang berisi harga tiap produk yang dipilih, berikut detailnya

```console
Sepatu - 300.000 
Baju - 200.000 
Celana - 150.000
```

5. Gunakan Hanya Controller Dashboard untuk mengerjakan semua laman diatas dan sesuaikan router nya
6. Gunakan URL parameter untuk mengerjakan laman detail harga produk


## Mengenal View
---

**Views** adalah representasi visual dari suatu halaman web yang pada umumnya bertugas untuk menampilkan data yang diterima oleh Controller dari Model. Dalam hal ini Views adalah bagian dari sistem CI di mana HTML dihasilkan dan kemudian ditampilkan di layar pengguna.

Untuk praktikum mengirimkan data ke View silahkan buat file **biodata.php** di folder **app/Views**

```html
<!DOCTYPE html>
<html>
<head> 
    <meta charset="utf-8"> 
    <title>Profile</title>
</head>
<body bgcolor="salmon"> 
    <h1 align="center">Ini adalah view dari CI</h1> 
    <h2 align="center">Selamat Datang <?= $nama; ?> dari <?= $alamat; ?></h2>
</body>
</html>
```

Kemudian kita tambahkan `function biodata` pada controller web 

```php
public function biodata() {
        $data['nama'] = 'Rudy Eko Prasetya';
        $data['alamat'] = 'Kediri';
        return view('biodata',$data);
}
```

Kita tambahkan route untuk mengakses function tersebut di file **Routes.php** di folder **app/Config/**

```php
//route untuk biodata
$routes->get('/biodata', 'Web::biodata');
```

Coba buka url `http://localhost:8080/biodata` dan amatilah

Selain mengirim data dari controller ke view, kita bisa mengirim data dari view ke controller untuk diolah. Untuk Praktikum silahkan buat fungsi baru pada controller Web.

```php
public function hitung() {
    $data['judul'] = 'Kalkulator Sederhana'; 
    $data['angka1'] = 0; 
    $data['angka2'] = 0; 
    $data['hasil'] = 0; 
    return view('kalkulator',$data); 
}

public function proses() {
    $data['judul'] = 'Kalkulator Sederhana'; 
    $data['angka1']=$this->request->getPost('angka1');
    $data['angka2']=$this->request->getPost('angka2');
    $data['hasil'] = $data['angka1'] * $data['angka2']; 
    return view('kalkulator',$data); 
}
```

Diatas terdapat dua fungsi, fungsi hitung dan proses, untuk hitung digunakan untuk menampilkan view kalkulator, sedangkan fungsi proses digunakan untuk proses perhitungannya. Code `$this->request->getPost('angka1');` digunakan untuk menangkap value dari form input dengan atribut name *angka1* begitu pula dengan form input untuk *angka2*. Untuk code `$data['hasil'] = $data['angka1'] * $data['angka2'];` digunakan untuk menghitung perkalian antara angka1 dan angka2 dan menyimpannya dalam variable hasil.

Kemudian kita buat view pada folder **app/Views** dengan nama file **kalkulator.php**

```html
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
```

code `<?= csrf_field(); ?>` digunakan untuk memberikan [token CSRF (Cross-Site Request Forgery)](https://en.wikipedia.org/wiki/Cross-site_request_forgery) dibagian form untuk mengamankan form aplikasi ini.

Kemudian kita berikan routenya pula sebagai berikut

```php
//route untuk function hitung dan proses
$routes->get('/hitung', 'Web::hitung');
$routes->post('/hitung/proses', 'Web::proses');
```

bis dilihat bahwa untuk request route `$routes->post('/hitung/proses', 'Web::proses');` menggunakan method POST untuk memproses hasil input dari form.

Coba buka url `http://localhost:8080/hitung` kemudian masukan angkanya dan klik tombol HITUNG amatilah hasilnya.

### latihan

1. Buatlah Controller dengan nama **Mahasiswa**
2. Dengan menggunakan teknik parsing data, jika diakses via url `http://localhost:8080/mahasiswa` akan menampilan data list mahasiswa berikut

```console
DAFTAR MAHASISWA 
 
+------------------------------------------+ 
+ Nama        + Alamat           +  Gender + 
+-------------+------------------+---------+ 
+ Anton       + Surabaya         +  L      + 
+-------------+------------------+---------+ 
+ Budi        + Kediri           +  L      + 
+-------------+------------------+---------+ 
+ Ani         + Malang           +  P      + 
+-------------+------------------+---------+ 
+ Sinta       + Surabaya         +  P      + 
+-------------+------------------+---------+
```
3. Buatlah Suatu laman dengan url `http://localhost:8080/segitiga` dimana akan menampilkan suatu perhitungan luas segitiga. Gunakan **Controller Web** untuk  mengerjakannya.
4. Gunakan teknik parsing data dan routing yang tepat
5. Anda bisa menggunakan CSS untuk mempercantik tampilan web anda


## Template Engine
---

Sistem templating adalah salah satu fitur yang harus dipikirkan di dalam Membangun suatu aplikasi web. Dengan menyusun view-view yang ada, kita sebenarnya dapat membuat sebuah template yang cukup powerful. Idenya sederhana saja, cukup membagi sebuah halaman menjadi beberapa area.

CI versi 4 memiliki template engine untuk melakukannya. Berbeda dengan versi sebelumnya versi 3 dimana untuk templating kita harus membuat suatu library sendiri.

Semisal kita memiliki layout seperti dibawah ini

```console
+----------------------------------------------+ 
+                  HEADER                      + 
+----------------------------------------------+ 
+         +                                    + 
+         +                                    + 
+         +                                    + 
+ SIDEBAR +            CONTENT                 + 
+         +                                    + 
+         +                                    +  
+         +                                    +  
+----------------------------------------------+ 
```

Laout kita bagi menjadi 3 bagian, yaitu HEADER, SIDEBAR dan CONTENT. Dimana Untuk CONTENT adalah bagian yang isinya selalu berubah sesuai dengan laman apa yang diakses.

Untuk memahaminya silahkan buat controller baru dengan nama *Dashboard.php*

```php
<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController {

	public function __construct() {
        //aktifkan url helper
        helper('url');
    }

    public function index() {
        $data['judul']='Laman Home'; 
        $data['isi']='Lorem ipsum dolor sit amet'; 
        return view('dashboard',$data);
    }
}
```

Pada controller diatas saya aktifkan helper url untuk mengakses file css yang ada pada folder public. Agar bisa digunakan pada semua function maka saya gunakan fungsi constructor.

Kemudian kita buat file **style.css** di folder **public/css** sebagai berikut

```css
body { 
    font: 16px arial, sans-serif; 
    background-color: lightgray; 
} 
 
.container { 
    width: 800px; 
    margin: auto; 
    background-color: white; 
} 
 
.header { 
    padding-top: 20px; 
    padding-right: 20px; 
    padding-left: 20px; 
} 
 
.header .judul { 
    font-size: 40px; 
    font-weight: bold; 
    margin-bottom: 5px; 
} 
 
.banner { 
    height: 200px; 
    background-image: url(https://picsum.photos/200); 
    background-size: cover; 
    border-top: 5px solid navy; 
    border-bottom: 5px solid skyblue; 
} 
 
.isi { 
    display: flex; 
    margin: 5px; 
} 
 
.sidebar { 
    width: 10rem; 
    height: 60vh; 
    border: 0.5px solid navy; 
    background-color: navy; 
    padding: 10px; 
} 
 
.content { 
    margin-left: 5px; 
    width: 100vh; 
    height: 100%; 
    padding-top: 10px; 
    padding-left: 10px; 
    padding-right: 5px; 
    border: 0.5px solid skyblue; 
} 
 
.nav li { 
    list-style: none; 
    margin-bottom: 10px; 
} 
 
.nav li a { 
    text-decoration: none; 
    color: white; 
} 
 
.nav li a:hover { 
    background-color: lightblue; 
    color: navy; 
}
```

Kemudian kita buat baru view dengan nama **dashboard.php**

```html
<!DOCTYPE html>
<html>
<head> 
    <meta charset="utf-8"> 
    <title><?= $judul; ?></title> 
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/style.css'); ?>">
</head>
<body> 
 
<!-- membuat container -->
<div class="container"> 

    <!-- header --> 
    <div class="header"> 
        <h1 class="judul">Welcome To My Web</h1> 
    </div> 
    <div class="banner"></div> 
    <!-- header --> 
 
    <dic class="isi">    
        <!-- sidebar --> 
        <div class="sidebar"> 
            <ul class="nav"> 
                <li><a href="/dashboard">Home</a></li> 
                <li><a href="/dashboard/gallery">Gallery</a></li> 
                <li><a href="/dashboard/about">About</a></li> 
            </ul> 
        </div> 
        <!-- sidebar --> 
 
        <!-- content --> 
        <div class="content"> 
            <h2><?= $judul; ?></h2> 
            <p><?= $isi; ?></p> 
        </div> 
        <!-- content --> 
 
    </div>  

</div> 
 
</body>
</html>
```

Coding `<?= base_url('css/style.css'); ?>` digunakan untuk merujuk pada file style.css yang terletak pada folder **public/css**, base_url disini bisa digunakan dengan mengaktifkan helper url.

Coba akses url `http://localhost:8080/dashboard`, maka akan muncul laman web sesuai dengan layout diatas.

Sekarang kita akan membuat layout tersebut menjadi beberapa bagian. kita pisah bagian header dan sidebar dalam file tersendiri yang diletakan didalam folder **views/template** berikut strukturnya

```console
- Views 
   |- template 
        |- header.php 
        |- sidebar.php 
        |- layout.php
   |- dashboard.php 
```

code untuk file **sidebar.php**

```html
<div class="sidebar"> 
    <ul class="nav"> 
        <li><a href="/dashboard">Home</a></li> 
        <li><a href="/dashboard/gallery">Gallery</a></li> 
        <li><a href="/dashboar/about">About</a></li> 
    </ul> 
</div>
```

code untuk file **header.php**

```html
<div class="header"> 
        <h1 class="judul">Welcome To My Web</h1> 
</div> 
<div class="banner"></div> 
```

code untuk file **layout.php**

```html
<!DOCTYPE html>
<html>
<head> 
    <meta charset="utf-8"> 
    <title><?= $judul; ?></title> 
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body> 
 
    <!-- membuat container -->
<div class="container"> 
    <!-- header --> 
    <?= $this->include('template/header'); ?> 
    <!-- header --> 
 
    <dic class="isi">    
        <!-- sidebar --> 
        <?= $this->include('template/sidebar'); ?> 
        <!-- sidebar --> 
 
        <!-- content --> 
        <?= $this->renderSection('content'); ?>
        <!-- content --> 
 
    </div> 
 
</div> 
 
</body>
</html>
```

Coding `<?= $this->include(); ?>` digunakan untuk menggabungkan file sidebar dan header yang sudah kita sendirikan. Sedangkan coding `<?= $this->renderSection('content'); ?>` digunakan untuk menampilkan content dinamis yang berubah-ubah.

Selanjutnya kita lakukan penyesuaian dengan file **dashboard.php** menjadi dibawah ini

```html
<?= $this->extend('template/layout') ?>

<?= $this->section('content'); ?>
<div class="content"> 
    <h2><?= $judul; ?></h2> 
    <p><?= $isi; ?></p> 
</div> 
<?= $this->endSection(); ?>
```

coding `<?= $this->extend('template/layout') ?>` digunakan untuk melakukan extends dengan layout template yang kita buat sedangkan coding `<?= $this->section('content'); ?>` digunakan untuk membuat section untuk konten yang akan di load pada layout utama.

coba buka kembali url `http://localhost:8080/dashboard`

Sekarang kita buat fungsi baru pada controller *Dashboard.php*

```php
<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController {

	public function __construct() {
        //aktifkan url helper
        helper('url');
    }

    public function index() {
        $data['judul']='Laman Home'; 
        $data['isi']='Lorem ipsum dolor sit amet'; 
        return view('dashboard',$data);
    }

    public function gallery() {
        $data['judul']='Laman Gallery';  
        return view('gallery',$data);
    }

    public function about() {
        $data['judul']='Laman About'; 
        $data['isi']='Ini adalah halaman about'; 
        return view('about',$data);
    }
}
```

kemudian kita buat file viewnya antara lain

file **gallery.php**

```html
<?= $this->extend('template/layout') ?>

<?= $this->section('content'); ?>
<div class="content"> 
    <h1><?= $judul; ?></h1>
    <p>Ini adalah laman Gallery</p>
    <img src="https://picsum.photos/100" width="100px" height="100px">
</div> 
<?= $this->endSection(); ?>
```

file **about.php**

```html
<?= $this->extend('template/layout') ?>

<?= $this->section('content'); ?>
<div class="content"> 
    <h2><?= $judul; ?></h2> 
    <p><?= $isi; ?></p> 
</div> 
<?= $this->endSection(); ?>
```

Coba akses menu gallery dan about pada laman web yang sudah kita buat tadi.

Dari sini bisa kita simpulkan bahwa kegunaan sistem templating adalah :
- **Kerja Sama Tim Yang Lebih Baik** Dengan pemisahan menggunakan templating ini, maka rekan bagian pengerjaan desain tidak lagi terganggu oleh kode program yang Anda buat. Begitupun Anda, tidak khawatir lagi script/kode program yang telah dibuat akan terganggu.
- **Code Yang Bersih** Situs dengan aplikasi kompleks, misalnya sebuah portal, pasti memerlukan Code yang kompleks yang menghabiskan sampai ribuan baris. Tentunya akan sangat mengganggu sekali kalau code yang sudah memusingkan itu ditambah lagi dengan tag- tag HTML di dalamnya.
- **Perubahan Tampilan Lebih Cepat Dan Mudah** Dengan pemisahan melalui template, hal tersebut dapat dilakukan dengan mudah, bahkan tanpa harus merombak code PHP sedikit pun.

### latihan

1. Buatlah project baru dengan nama **template-admin**
2. Buatlah controller **Dashboard** didalamnya
3. Dalam project tersebut memiliki 5 Laman yaitu *Home, Product, Service, Contact, About*
4. Gunakan template **SB Admin 2 Bootstrap** yang bisa didownload di
[https://startbootstrap.com/theme/sb-admin-2](https://startbootstrap.com/theme/sb-admin-2)
5. Gunakan Template Engine CI untuk membagi layout menjadi

```console
+----------------------------------------------+ 
+                  HEADER                      + 
+----------------------------------------------+ 
+         +                                    + 
+         +                                    + 
+         +                                    + 
+         +                                    + 
+ SIDEBAR +            CONTENT                 + 
+         +                                    + 
+         +                                    +  
+         +                                    +  
+         +                                    +  
+         +                                    +  
+----------------------------------------------+
+                  FOOTER                      + 
+----------------------------------------------+ 
```

6. Sesuaikan menu dan kontennya dengan laman-laman diatas


## Membuat CRUD Tampil Data
---

Pada tahap ini kita akan mengenal salah satu komponen MVC yaitu Model, Dimana fungsinya adalah mengelola segala macam pengelolaan sumber daya data dalam aplikasi kita. Kita akan membuat aplikasi CRUD *(Create, Read, Update dan Delete)* untuk data pegawai atau employe.

Untuk praktikum silahkan buka xampp dan jalankan *web server apache dan database mysql*.Kita buat database baru dengan nama **company** dimana terdapat tabel dengan nama **employes**. 

Untuk tabel employes anda bisa paste SQL dibawah untuk membuatnya

```sql
CREATE TABLE `employes` (
`id` int(4) NOT NULL,
`nama` varchar(30) DEFAULT NULL,
`alamat` text DEFAULT NULL,
`gender` enum('L','P') DEFAULT NULL,
`gaji` int(10) DEFAULT NULL,
`created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE
current_timestamp(),
`updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `employes`
ADD PRIMARY KEY (`id`);

```
Selanjutnya kita ubah konfigurasi file **.env** untuk koneksi ke database

```console
#--------------------------------------------------------------------
# DATABASE
#--------------------------------------------------------------------

database.default.hostname = localhost
database.default.database = company
database.default.username = root
database.default.password = 
database.default.DBDriver = MySQLi
# database.default.DBPrefix =

```

buka tanda pagar (#) pada bagian hostname, serta masukan username dan password untuk user MySQL serta nama database company yang telah kita buat sebelumnya. Jangan lupa untuk menyimpannya.

Selanjutnya kita buat File Model dengan nama **EmployeModel.php** di folder **app/Models** sebagai berikut

```php
<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeModel extends Model {

    //membuat properti untuk Model
    protected $db;

    public function __construct() {
        parent:: __construct();
        //koneksikan ke database
        $this->db = db_connect();
    }

    public function getData() {
        //query
        $query="SELECT * FROM employes";
        //ambil data dan jadikan array
        $data=$this->db->query($query)->getResultArray();
        return $data;
    }
}
```
Coding `db_connect()` digunakan untuk mengkoneksikan Model dengan database kita. fungsi `getData()` digunakan untuk menampilkan semua data dari table employe dan mengembalikannya untuk disimpan dalam variable `$data`.

Selanjutnya kita buat Controller baru dengan nama **Employe.php**

```php
<?php

namespace App\Controllers;

class Employe extends BaseController {

    protected $employeModel;

    public function __construct() {
        //load model
        $this->employeModel=new \App\Models\EmployeModel();
    }
   
    public function index() {
        // memasukan semua data dalam array
        $data['judul']='CRUD Employe'; 
        //memanggil fungsi dari model
        $data['employe']=$this->employeModel->getData(); 
        //Menampilkan hasil ke view
        return view('tampil_data',$data);
    }
}
```

kita load Model dengan code `$this->employeModel=new \App\Models\EmployeModel();` pada constructor agar ditiap function dalam Controller bisa memanggilnya berulang-ulang. 
Hasil dari `function getData()` dimasukan dalam array asosiatif dalam variable employe yang dikirimkan ke view.

berikut adalah file view **tampil_data.php** yang disimpan di folder **app/Views**

```html
<?= $this->extend('template/layout') ?>

<?= $this->section('content'); ?>
<div class="content"> 
    <h2 align="center">CRUD Employe</h2>
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
            <td>edit | delete</td>
        </tr>
<?php endforeach;?>
    </table>
</div> 
<?= $this->endSection(); ?>
```
Disini kita gunakan template engine yang sudah dibuat sebelumnya agar tampilannya menarik. Untuk Coding `foreach($employe as $row):` digunakan untuk menampilan data dari Controller secara iterasi atau perulangan yang dirender dalam array.

Coba tambahkan beberapa data dalam table employe kemudiaan silahkan buka url `http://localhost:8080/employe` dan amati hasilnya.

Dalam CodeIgniter ada yang namanya Query Builder. **Query Builder** adalah class yang disediakan oleh codeigniter, yang digunakan untuk berkomunikasi dengan database, dengan adanya query builder, anda dapat melakukan perintah seperti *insert, select, update & delete*, dengan perintah query yang lebih minimal. 

Coba edit file Model **EmployeModel.php** menjadi dibawah ini

```php
<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeModel extends Model {

    protected $db;

    //tambahkan properti untuk nama table
    protected $table='employes';

    public function __construct() {
        parent:: __construct();
        //koneksikan ke database
        $this->db = db_connect();
    }

    public function getData() {
        //query
        // $query="SELECT * FROM employes";
        //ambil data dan jadikan array
        // return $data=$this->db->query($query)->getResultArray();
        //hapus code diatas
        //ganti query builder diatas menjadi dibawah ini
        $builder=$this->db->table($this->table);
        return $data=$builder->get()->getResultArray();
    }
}
```
Disini perlu menambahkan properti class untuk nama table `protected $table='employes';` kemudian kita buat query builder dengan code `$builder=$this->db->table($this->table);`. Untuk query `SELECT * FROM employes` bisa digantikan dengan `$data=$builder->get()`

Coba buka kembali url `http://localhost:8080/employe` dan amati hasilnya.

Dengan query builder kita tidak perlu menuliskan query lengkap untuk memanipulasi data kita. Ada berbagai macam fungsi seperti *get(), select(), limit(), insert(), update(), delete()* dan lainya untuk menggantikan query database. Selengkapnya bisa merujuk ke [https://codeigniter.com/user_guide/database/query_builder.html](https://codeigniter.com/user_guide/database/query_builder.html).

Selain itu CI 4 memiliki builtin function seperti [Eloquent dalam Laravel](https://laravel.com/docs/8.x/eloquent#introduction) untuk lebih mempermudah kita dalam memanipulasi data dengan Model. 

Semisal kita ingin menampilkan semua data dalam tabel pengurus seperti diatas. kita cukup memanggil function findAll() dalam Controller tanpa perlu mendefinikasi fungsi tersebut dalam Model.

Silahkan edit Model **EmployeModel.php** dan **hapus atau comment** *function construct dan getData()* seperti dibawah ini

```php
<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeModel extends Model {

    protected $db;
    //tambahkan properti untuk nama table
    protected $table='employes';
    //tambahkan properti untuk primary Key table
    protected $primaryKey = 'id';

    
}
```
Disini perlu kita definiskasi primary key dari tabel dalam hal ini primary key kita adalah id. Untuk konfiguirasi lengkap bisa merujuk ke [https://codeigniter.com/user_guide/models/model.html](https://codeigniter.com/user_guide/models/model.html).

Selanjutnya kita edit controller **Employe.php** dimana code `$data['employe']=$this->employeModel->getData();` kita ganti dengan `$data['employe']=$this->employeModel->findAll(); ` seperti dibawah ini.

```php
<?php

namespace App\Controllers;

class Employe extends BaseController {

    protected $employeModel;

    public function __construct() {
        //load model
        $this->employeModel=new \App\Models\EmployeModel();
    }
   
    public function index() {
        $data['judul']='CRUD Employe'; 
        //ganti dengan function findAll()
        $data['employe']=$this->employeModel->findAll(); 
        return view('tampil_data',$data);
    }
}
```

Coba buka kembali url `http://localhost:8080/employe` Manakah yang menurut Anda lebih mudah??.

## Membuat CRUD Simpan Data
---

Untuk operasi Tambah Data pertama kita definisikan function di Model **employeModel.php**

```php
<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeModel extends Model {

    protected $db;

    protected $table='employes';

    protected $primaryKey = 'id';

    public function __construct() {
        parent:: __construct();
        //koneksikan ke database
        $this->db = db_connect();
       
    }

    public function getData() {
        //code untuk tampil data sebelumnya disembunyikan
    }

    public function simpan($data) {
        //simpan data ke database
        $builder=$this->db->table($this->table);
        $builder->insert($data);
    }
}
```

Pada code diatas kita gunakan query builder untuk proses penyimpanan data kita.

Selanjutnya kita buat function baru di Controller **Employe.php**. Tambahkan 2 fungsi ini dibawah function index()

```php
public function create() {
     $data['judul'] = 'Add Employe';
     return view('tambah_data',$data);
}

public function save() {
     //ambil data dari form dan masukan ke array
     $data=[
         'id' => $this->request->getPost('id'),
         'nama' => $this->request->getPost('nama'),
         'alamat' => $this->request->getPost('alamat'),
         'gender' => $this->request->getPost('gender'),
         'gaji' => $this->request->getPost('gaji')
     ];

     //panggil function save di model
     $this->employeModel->simpan($data);
     //kembali ke table employe
     return redirect()->to('/employe');
}
```

`function create()` digunakan untuk menampilkan form tambah data. Sedangkan `function save()` digunakan untuk proses penyimpanan data setelah ditekan tombol save di form. Dimana masing-masing data dari form tersimpan dalam suatu asosiatif array. Coding `return redirect()->to('/employe');` digunakan untuk mengembalikan ke tampil data setelah operasi berhasil dilakukan.

Selanjutnya kita buat file view **tambah_data.php**

```html
<?= $this->extend('template/layout') ?>

<?= $this->section('content'); ?>
<div class="content"> 
    <h2 align="center"><?= $judul; ?></h2>
    <form action="/employe" method="post">
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
```

Kita bisa definisikan route di file **Route.php** untuk tampil data dan simpan data agar lebih terstruktur

```php
//route untuk employe
$routes->get('/employe', 'Employe::index');
$routes->post('/employe', 'Employe::save');
```

Coba buka url `http://localhost:8080/employe/create` isikan data dan tekan tombol save.

bila kita ingin Menggunakan function Model CI 4 untuk mempersingkat code. Silahkan edit Model **EmployeModel.php** anda bisa **comment atau hapus** `function simpan()` dan tambahkan coding `protected $allowedFields = ['id', 'nama', 'alamat', 'gender', 'gaji'];` sebagai properti class EmployeModel, dimana ini berfungsi untuk Field atau kolom mana yang bisa di isi.

```php
<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeModel extends Model {

    protected $db;
    //nama tabel
    protected $table='employes';
    //field primary key
    protected $primaryKey = 'id';
    //kolom mana yang boleh diisi
    protected $allowedFields = ['id', 'nama', 'alamat', 'gender', 'gaji'];

}
```

Kemudian kita ubah coding `$this->employeModel->simpan($data);` pada Controller **Employe.php** menjadi `$this->employeModel->insert($data);` seperti dibawah ini

```php
public function save() {
    //ambil data dari form dan masukan ke array
    $data=[
        'id' => $this->request->getPost('id'),
        'nama' => $this->request->getPost('nama'),
        'alamat' => $this->request->getPost('alamat'),
        'gender' => $this->request->getPost('gender'),
        'gaji' => $this->request->getPost('gaji')
    ];

    //menggunakan function Model Insert
    $this->employeModel->insert($data);
    //kembali ke table employe
    return redirect()->to('/employe');
}
```

Coba buka kemblli url `http://localhost:8080/employe/create` dan lakukan penambahan data dan amatilah.


## Membuat CRUD Edit Data
---

Untuk membuat edit data pertama kita buat tambahkan function di Model **ModelEmploye.php** 

```php
<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeModel extends Model {

    protected $db;

    protected $table='employes';

    protected $primaryKey = 'id';

    protected $allowedFields = ['id', 'nama', 'alamat', 'gender', 'gaji'];


    public function __construct() {
        parent:: __construct();
        //koneksikan ke database
        $this->db = db_connect();
       
    }

    public function getData() {
        //fungsi untuk tampil data sebelumnya disembunyikan
    }

    public function simpan($data) {
        //fungsi simpan data ke database sebelumnya disembunyikan
    }

    public function getDataByID($id) {
        $builder=$this->db->table($this->table);
        //ambil data berdasarkan id
        //SELECT * FROM employe WHERE id='$id'
        return $data=$builder->getWhere([ 'id' => $id ])->getResultArray();
    }

    public function ubah($data,$key) {
        $builder=$this->db->table($this->table);
        //ubah data dalam tabel
        //update employe set field1, field2 WHERE id='$id'
        $builder->update($data,$key);
    }
}
```

fungsi `getDataByID($id)` berguna untuk mencari data yang akan diedit dan ditampilkan ke form edit. Sedangkan fungsi `ubah($data,$key)` digunakan untuk update data ke database.

Selanjutnya kita tambahkan fungsi di Controller **Employe.php** dibawah fungsi **save**

```php
public function edit($id) {
    $data['judul']='Edit Employe';
    //ambil data berdasarkan id yang dikirm
    $data['employe']=$this->employeModel->getDataByID($id);
    //tampilkan data di view 
    return view('edit_data',$data);
}

public function update() {
    //ambil data dari form dan masukan ke array
    $data=[
        'nama' => $this->request->getPost('nama'),
        'alamat' => $this->request->getPost('alamat'),
        'gender' => $this->request->getPost('gender'),
        'gaji' => $this->request->getPost('gaji')
    ];
    //panggil fungsi ubah di model dan kirimkan datanya
    $this->employeModel->ubah(['id' => $this->request->getPost('id')],$data);
    //kembali ke table employe
    return redirect()->to('/employe');
}
```
kemudian kita buat routenya, tambahkan route untuk menampilkan data yang akan diedit dengan metode GET sedangkan untuk update datanya menggunakan PUT. Kenapa menggunakan PUT karena untuk stardar komunikasi HTTP untuk update data metode yang digunakan adalah PUT, namun kita tetap bisa menggunakan POST. 

Buka file **Routes.php** tambahkan coding dibawah ini dibawah route sebelumnya

```php
//untuk edit dan ubah
$routes->get('/employe/(:any)/edit', 'Employe::edit/$1');
$routes->put('/employe', 'Employe::update');
```

Selanjutnya kita buat view untuk menampung data yang akan diedit dengan nama **edit_data.php**

```html
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
```

Pada coding diatas kita masukan value untuk masing-masing form sesuai dengan data. Coding `<input type="hidden" name="_method" value="put">` digunakan untuk merubah method yang digunakan menjadi PUT, karena kita set di route menggunakan PUT untuk operasi ubah datanya. 

Jangan lupa kita lakukan penyesuaian pada view **tampil_data.php** untuk memberikan link edit pada tiap baris datanya

```html
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
               <a href="/employe/<?= $row['id'];?>/edit">edit</a>  | delete
            </td>
        </tr>
<?php endforeach;?>
    </table>
</div> 
<?= $this->endSection(); ?>
```
Coba buka `http://localhost:8080/employe` coba klik link edit salah satu data dan amati hasilnya.

Kita bisa pula menggunakan function singkat seperti operasi sebelumnya pada edit data ini. Buka Model **EmployeModel.php** berikan komentar atau hapus fungsi yang sudah dibuat tadi yaitu fungsi `getDataByID($id)` dan `ubah($data,$key)`.

```php
<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeModel extends Model {

    protected $db;

    protected $table='employes';

    protected $primaryKey = 'id';

    protected $allowedFields = ['id', 'nama', 'alamat', 'gender', 'gaji'];
}
```
Jangan lupa sesuaikan pula fungsi di Controller **Employe.php**, kita ubah fungsi `$data['employe']=$this->employeModel->getDataByID($id);` menjadi `$data['employe']=$this->employeModel->where('id', $id)->findAll();;` dan fungsi `$this->employeModel->ubah(['id' => $this->request->getPost('id')],$data);` menjadi ` $this->employeModel->update(['id' => $this->request->getPost('id')],$data);`

```php
public function edit($id) {
    $data['judul']='Edit Employe';
    
    // gunakan fungsi Where()->findAll()
    $data['employe']=$this->employeModel->where('id', $id)->findAll();;
    //tampilkan data di view 
    return view('edit_data',$data);
}

public function update() {
    //ambil data dari form dan masukan ke array
    $data=[
        'nama' => $this->request->getPost('nama'),
        'alamat' => $this->request->getPost('alamat'),
        'gender' => $this->request->getPost('gender'),
        'gaji' => $this->request->getPost('gaji')
    ];
    
    // menggunakan fungsi update()
    $this->employeModel->update(['id' => $this->request->getPost('id')],$data);
    //kembali ke table employe
    return redirect()->to('/employe');
}
```


Coba buka kembali `http://localhost:8080/employe` dan lakukan perubahan data didalamnya.


## Membuat CRUD Hapus Data
---

Untuk membuat operasi hapus data kita tambahkn fungsi baru di Model **EmployeModel.php**

```php
<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeModel extends Model {

    protected $db;

    protected $table='employes';

   
    public function __construct() {
        parent:: __construct();
        //koneksikan ke database
        $this->db = db_connect();
       
    }

    public function getData() {
        //fungsi disembunyikan
    }

    public function simpan($data) {
        //fungsi disembunyikan
    }

    public function getDataByID($id) {
        //fungsi disembunyikan
    }

    public function ubah($key,$data) {
        //fungsi disembunyikan
    }

    public function hapus($key) {
        $builder=$this->db->table($this->table);
        //hapus data sesuai id
        //DELETE FROM employe WHERE id='$id'
        $builder->delete($key);
    }
}
```

Selanjutnya kita buat fungsi destroy di controller **Employe.php**  dibawah fungsi sebelumnya.

```php
public function destroy($id) {
    // hapus data berdasarkan id
    $this->employeModel->hapus(['id' => $id]);
    //kembali ke table employe
    return redirect()->to('/employe');
}
```

Kemudian kita sesuaikan untuk file view **tampil_data.php**

```html
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

               <!-- link untuk hapus data -->
               <a href="/employe/<?= $row['id'];?>/delete" onclick="return confirm('Apakah Yakin?')">delete</a> 


            </td>
        </tr>
<?php endforeach;?>
    </table>
</div> 
<?= $this->endSection(); ?>
```

Coba buka `http://localhost:8080/employe` dan lakukan klik delete pada salah satu data.

Untuk fungsi singkat seperti sebelumnya. Silahkan sesuaikan untuk Model **EmployeModel.php** menjadi dibawah ini

```php
<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeModel extends Model {

    protected $db;

    protected $table='employes';

    protected $primaryKey = 'id';

    protected $allowedFields = ['id', 'nama', 'alamat', 'gender', 'gaji'];
}
```

Kemudian sesuaikan untuk controllernya **Employe.php** ubah kode `$this->employeModel->hapus(['id' => $id]);` menjadi `$this->employeModel->delete($id);` seperti dibawah ini

```php
public function destroy($id) {
    // hapus data berdasarkan id
    $this->employeModel->delete($id);
    //kembali ke table employe
    return redirect()->to('/employe');
}
```

Coba buka kembali `http://localhost:8080/employe` dan lakukan klik delete pada salah satu data dan amatilah.

## Tentang Migration dan Seeding
---

**Migration** adalah cara mudah untuk mengubah, memanipulasi database secara terstruktur dan terorganisir. Dimana kita dapat mengedit fragmen SQL, secara konsisten untuk memberi tahu developer lain saat bekerja dengan team tentang segala macam perubahan schema database project kita.

Disini kita akan membuat table **division** untuk mencatat data bagian atau divisi dari employe untuk project kita dengan migration. Silahkan buka console atau terminal di project ci anda kemudian ketikan perintah

```console
php spark make:migration add_table_division
```
Maka secara otomatis akan dibuatkan file **2021-10-17-021721_AddTableDivision.php** di folder **app/Database/Migrations**. 

Buka file tersebut dan kita lakukan penyesuaian

```php
<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTableDivision extends Migration
{
    public function up()
    {
        //membuat field di table division
        $this->forge->addField([
            'div_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'division' => [
                'type' => 'VARCHAR',
                'constraint' => 60
            ],
            'is_aktif' => [
                'type' => 'ENUM',
                'constraint' => ['yes','no'],
                'default' => 'yes' 
            ],
            'created_at' => [
                'type' => 'TIMESTAMP'
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP'
            ],
        ]);

        $this->forge->addKey('div_id',true);
        $this->forge->createTable('divisions');
    }

    public function down()
    {
        //drop table
        $this->forge->dropTable('divisions');
    }
}
```
Pada file migration diatas saya membuat field div_id sebagai primary key, field division dengan type varchar(100) untuk mencatat divisi dari employe dan field is_aktif untuk mengetahui apakah divisi tersebut aktif atau tidak. Jangan lupa kita tambahkan field created_at dan updated_at dengan tipe timestamp untuk log data.

Selanjutnya jalankan perintah berikut

```console
php spark migrate:refresh
```

Maka secara otomatis pada database anda akan muncul table baru yaitu, *division, users, artifcles dan migrations*.

secara default ci4 sudah memiliki file migration untuk table users dan articles, sedangkan fungsi dari table migration adalah untuk mencatat history atau apa saja perubahan dalam skema database project kita.

Semisal kita akan buat file migration untuk table employes yang sudah kita buat CRUD sebelumnya. Namun sebelum itu silahkan drop atau hapus terlebih dahulu table employes agar proses migration tidak error.

kemudian kita buat file migrationnya dengan perintah

```console
php spark make:migration add_table_employes
```

kemudian kita edit file migration **2021-10-17-033914_AddTableEmployes.php** untuk memberikan field-field yang dibutukan 

```php
<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTableEmployes extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 4,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 30
            ],
            'alamat' => [
                'type' => 'TEXT',
                'default' => null 
            ],
            'gender' => [
                'type' => 'ENUM',
                'constraint' => ['L','P']
            ],
            'gaji' => [
                'type' => 'INT',
                'constraint' => 10
            ],
            'created_at' => [
                'type' => 'TIMESTAMP'
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP'
            ],
        ]);

        $this->forge->addKey('id',true);
        $this->forge->createTable('employes');
    }

    public function down()
    {
        $this->forge->dropTable('employes');
    }
}
```
Jangan lupa setiap ingin melakukan migrate harus menjalankan perintah

```console
php spark migrate:refresh
```

**Perlu diperhatikan** bahwa setelah melakukan migrate, maka kondisi data dalam table akan kosong kembali. karena proses migrate tersebut adalah membuat ulang skema database kita. Akan sangat merepotkan jika kita melakukan input data satu per satu hanya untuk melakukan testing.

Untuk itu kita bisa menggunakan *Seeding*. **Seeding** adalah cara sederhana untuk menambahkan data ke dalam database. Ini sangat berguna selama proses development di mana kita hanya perlu mengisi database dengan data sampel dan di *generate* secara otomatis.

Sebelum itu kita install library [faker](https://fakerphp.github.io/) dengan composer pada project kita. 

Buka terminal,pada file project kita ketikan perintah

```console
composer require --dev fakerphp/faker
```
tunggu sampai proses installasi selesai

Selanjutnya kita buat seeder untuk table employe agar datanya langsung terisi. 

Jalankan perintah dibawah ini pada console atau terminal

```console
php spark make:seeder EmployeSeeder
```

Kemudian kita buka file seeder **EmployeSeeder.php** yang ada pada folder **app/Database/Seeds**

```php
<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class EmployeSeeder extends Seeder
{
    public function run()
    {
        //setting faker untuk data dari indonesia
        $faker = \Faker\Factory::create('id_ID');

        //buat 10 data
        for($i =0; $i < 10; $i++) {
            $data = [
                //generate nama  
                'nama' => $faker->name,
                //generate alamat
                'alamat' => $faker->address,
                //generate gender untuk L atau P
                'gender' => $faker->randomElement(['L','P']),
                //generate gaji 100.000, 200.000 dan 80.000
                'gaji' => $faker->randomElement([100000,200000,80000])
            ];
            //memasukan data ke database
            $this->db->table('employes')->insert($data);
        }
        
    }
}
```
Pada coding diatas kita buat variabel `$faker` yang digunakan sebagai object dari class Factory dengan method static create, pada method static crate kita gunakan parameter **id_ID** agar dummy data kita nanti berisi informasi data dari Indonesia.

ita gunakan perintah perulangan for agar melalui perulangan sebanyak 10 kali untuk 10 data. perintah `randomElement` agar melakukan random string, untuk mendapatkan gender dan gaji.

Semua data di masukan dalam array, dimana masing – masing kolom disesuaikan nilainya dengan method di library faker.

Kemudian dimasukan dalam database dengan code $this->db->table('employes')->insert($data);`

Simpan dan kemudian jalankan perintah

```console
php spark db:seed EmployeSeeder
```

Coba buka `http://localhost/phpmyadmin` cek pada table employes, amatilah datanya. Selain itu coba buka CRUD employe yang sudah kita buat sebelumnya.

### latihan

1. Buatlah table Admin pada project anda dengan menggunakan Migration dengan ketentuan field-field sebagai berikut ini
    - id_admin sebagai primary key nomor urut
    - username berisi email untuk login
    - password berisi password untuk login
    - created_at timestamp 
    - updated_at timestamp
2. Isilah data tabel admin tersebut dengan menggunakan Seeding min 5 data.


## Membuat Autentifikasi
---

*Authentication (autentifikasi) dan Authorization (otorisasi)* merupakan dua hal yang sangat dekat dan sering kali tertukar. Jika sebelumnya kita sudah tahu bahwa **autentikasi** adalah proses untuk memvalidasi keautentikan atau keaslian dari identitas pengguna. Nah, **Otorisasi** adalah proses pengecekan apakah pengguna autentik berhak mengakses resource yang diminta.

Mudahnya bila digambarkan pada sistem aplikasi, otorisasi memeriksa wewenang dari pengguna dalam menentukan fitur apa saja yang dapat diakses. Contohnya, bila pengguna terautentikasi sebagai staf marketing, fitur yang ditampilkan hanya laporan penjualan, kontak client, dan fitur terkait marketing lainnya. Beda cerita jika pengguna terautentikasi sebagai staf admin, seluruh fitur yang ada di dalam sistem akan terbuka.

Agar lebih paham kali ini kita akan membuat fitur register untuk admin beserta login dan logoutnya (Autentifikasi). Dimana fitur tersebut digunakan untuk melindungi fitur CRUD employe agar bisa diakses oleh yang berhak (Otorisasi) atau admin yang terdaftar saja.

Pertama kita buat model **AdminModel.php** dengan perintah

```console
php spark make:model AdminModel
```

Kita sesuaikan coding di AdminModel.php sebagai berikut

```php
<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'admins';
    protected $primaryKey           = 'id_admin';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $protectFields        = true;
    protected $allowedFields        = ['username','password'];

    // Dates
    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';

}

```

Kemudian kita buat controller **Admin.php** dengan perintah

```console
php spark make:controller Admin
```
Selanjutnya kita buat function untuk fitur register dan tampilan login pada controller **Admin.php**

```php
<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController {
    protected $adminModel;

    public function __construct() {
        // load model admin
        $this->adminModel=new \App\Models\AdminModel();
    }

    public function index() {
        $data['judul']='Register Admin Employe'; 
        //tampilkan laman register
        return view('register',$data);        
    }

    public function register() {
        //untuk validasi
        $validasi = $this->validate([
            'username'=>[
                //jika username sudah ada di table dan harus diisi
                'rules' => 'required|is_unique[admins.username]',
                'errors' => [
                    'required' => 'Username harus diisi',
                    'is_unique' => 'Username sudah digunakan'
                ]
            ],
            'password_new' => [
                //password harus diisi dan minimal 4 karakter
                'rules' => 'required|min_length[4]',
                'errors' => [
                    'required' => 'Password harus diisi',
                    'min_length' => 'Password minimal 4 karakter'
                ]
            ],
            'password' => [
                //password keduanya harus sama
                'rules' => 'matches[password_new]',
                'errors' => [
                    'matches' => 'Konfirmasi Password tidak sama'
                ]
            ]
        ]);

        //jika data tidak sesuai kembali dan munculkan pesan error di form register.
        if(!$validasi){
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        //Jika data sesuai lakukan penyimpanan data
        $data=[
            'username' => $this->request->getPost('username'),
            //enkripsi password dengan BCRYPT
            'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT)
        ];
        //memasukan data dalam database
        $this->adminModel->insert($data);

        //jika berhasil arahkan ke tampilan login
        return redirect()->to('/login');
    }

    public function login() {
        $data['judul']='Login Admin Employe'; 
        //tampilkan laman login
        return view('login',$data); 
    }
}
```

coding `$this-validate()` digunakan untuk melakukan validasi form sesuai dengan aturan atau rules yang dibuat. dimana Rules yang dibuat adalah
- **username** : Harus diisi|minimal panjang 4 karakter, username harus unique didalam kolom username di tabel admins
- **password_new** : Harus diisi|minimal panjang 4 karakter
- **password** : isinya harus seperti dibagian password_new
ketika ada rules di form validation tidak sesuai, akan generate session flashdata dengan nama *error*, dengan isinya adalah daftar error dari form validasi, serta akan redirect kembali ke form **register**

Kemudian kita buat view **register.php**

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul;  ?></title>
    <style>
        body {
            font: 15px Arial, sans-serif;
            background-color: lightgrey;
        }
        .form-login {
            height: 20rem;
            width: 40%;
            border: 2px solid navy;
            margin: 2rem auto;
            box-shadow: 5px 7px blue;
            background-color: white;
        }
        button {
            height: 2rem;
            width: 4rem;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="form-login">
    <h2 align="center"><?= $judul;  ?></h2>
    <?php if (!empty(session()->getFlashdata('error'))) { ?>
    <div align="left" class="error">
        <?= session()->getFlashdata('error'); ?>
    </div>
    <?php } ?>
    <form action="/daftar" method="post">
    <?= csrf_field(); ?>
        <table border="0" align="center">
            <tr>
                <td>Username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password_new"></td>
            </tr>
            <tr>
                <td>Ulangi Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit">Register</button> 
                    <button type="reset">Reset</button> 
                </td>
            </tr>
        </table>
    </form>
    <p align="center"><a href="/login">Login jika sudah punya Akun</a></p>
    </div>
    
</body>
</html>
```

Kemudian kita buat view **login.php** sebagai berikut

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul; ?></title>
    <style>
        body {
            font: 15px Arial, sans-serif;
            background-color: lightgrey;
        }
        .form-login {
            height: 220px;
            width: 40%;
            border: 2px solid navy;
            margin: 2rem auto;
            box-shadow: 5px 7px blue;
            background-color: white;
        }

        button {
            height: 2rem;
            width: 4rem;
        }

        .error {
            color: red;
            margin: auto;
        }
    </style>
</head>
<body>
    <div class="form-login">
    <h2 align="center"><?= $judul; ?></h2>

    <?php if (!empty(session()->getFlashdata('error'))) { ?>
    <div align="center" class="error">
        <?= session()->getFlashdata('error'); ?>
    </div>
    <?php } ?>

    <form action="/cek_login" method="post">
    <?= csrf_field(); ?>
        <table border="0" align="center">
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
                <td><button type="submit">Login</button></td>
            </tr>
        </table>
    </form>
    <p align="center"><a href="/register">Belum Punya Akun</a></p>
    </div>
    
</body>
</html>
```
Jangan lupa kita buat route untuk fitur tersebut, buka file **Routes.php** tambahkan route dibawah ini

```php
//untuk autentifikasi dan otorasi
$routes->get('/register', 'Admin::index');
$routes->post('/daftar', 'Admin::register');
$routes->get('/login', 'Admin::login');
```

Sekarang bukalah url `http://localhost:8080/register` coba inputkan data semisal username admin passwordnya admin. Klik register amatilah yang terjadi. Jika berhasil maka akan di redirect ke laman login

Untuk memastikan datanya masuk. Kita buka `http://localhost/phpmyadmun` coba kua table admins. Perhatikan data didalamnya.

Selanjutnya kita akan buat fitur untuk menangani login. Silahkan tambahkan function dibawah ini pada controller Admin

```php
public function cek_login() {
    //ambil data dari form
    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');

    //cari data dari tabel admin sesuai username
    $dataUser=$this->adminModel->where('username',$username)->first();

    // jika ada
    if($dataUser) {
        //jika password sesuai
        if(password_verify($password,$dataUser['password'])) {
            //masukan session untuk username dan status login
            session()->set([
                'username' => $username,
                'logged_in' =>true
            ]);
            //masukan ke laman crud employe
            return redirect()->to('/employe');
        } 
    } else { //jika  salah
        //kembali ke login dan berikan pesan error
        session()->setFlashdata('error', 'Username & Password Salah');
        return redirect()->back();
    }
}
```
Coding diatas digunakan untuk mencari apakah username dan password yang dimasukan ada dalam database. Hal ini bisa dilihat pada code `$dataUser=$this->adminModel->where('username',$username)->first();`. Kemudian jika username ditemukan langkah selanjutnya adalah verifikasi password yang telah di enkripsi dengan code `password_verify($password,$dataUser['password'])`.

Jika semuanya cocok maka data username dan status login akan disimpan dalam sebuah session dalam server dengan code `session()->set()`. Untuk penjelasan sessio bisa mengacu ke [sini](https://rudyekoprasetya.wordpress.com/2020/03/22/php-dasar-9-1-penggunaan-session-untuk-login/).

Disini yang disimpan dalam session adalah username dan status login user apakah **true** atau **false**.

Jika login berhasil akan diarahkan ke laman CRUD Employe. Namun jika gagal maka akan kembali ke laman login disertai tampilan error.

Jangan lupa kita tambahkan route baru pada file **Routes.php** untuk fitur login

```php
$routes->post('/cek_login', 'Admin::cek_login');
```

Cobalah untuk melakukan login dengan akses yang sudah didaftar kan sebelumnya kemudian amatilah hasilnya jika kita coba memasukan akses yang salah.

Ada login pasti ada logout. Untuk membuatnya tambahkan function berikut ini pada controller **Admin.php**

```php
public function logout() {
    //hapus session
    session()->destroy();
    return redirect()->to('/login');
}
```

pada funcfion diatas code `session()->destroy();` digunakan untuk menghapus semua data session. Setelah itu diarahkan kembali ke laman login.

Untuk Link logout silahkan buka file view template kita pada **sidebar.php** tambahkan link logout seperti dibawah ini

```html
<div class="sidebar"> 
    <ul class="nav"> 
        <li><a href="/dashboard">Home</a></li> 
        <li><a href="/dashboard/gallery">Gallery</a></li> 
        <li><a href="/dashboard/about">About</a></li> 
        <li><a href="/employe">Employe</a></li> 
        <!-- untuk logout -->
        <li><a href="/logout">Logout</a></li> 
        <!-- untuk logout -->
    </ul> 
</div>
```

Jangan lupa tambahkan route nya pada file **Routes.php**

```php
$routes->get('/logout', 'Admin::logout');
```

Cobalah untuk klik link **logout** pada menu dan amatilah hasilnya.

Disini kita sudah selesai untuk membuat fitur **otentifikasi**. Namun coba perhatikan cobalah buka via url `http://localhost:8080/employe` *apakah data crud employe muncul???*

*kalau bisa, apa gunanya kita buat fitur login dan logout???*

Pada kasus ini kita belum menerapkan **otorisasi**. Dimana nanti kita set laman crud employe tersebut diakses oleh yang berhak saja atau memaksa user harus login dahulu.

Disini kita akan menggunakan fitur CI 4 yaitu *Controller Filter*. **Controller Filter** digunakan untuk melakukan tindakan baik sebelum atau setelah Controller  dijalankan. Kita dapat memilih URI spesifik tempat filter akan diterapkan. Selengkapnya baca [Controller Filter](https://codeigniter4.github.io/userguide/incoming/filters.html) 

Untuk itu silahkan buat file baru dengan nama **Auth.php** di folder **App/Filters/**

```php
<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface {
    public function before(RequestInterface $request, $arguments = null) {
        // jika user belum login
        if(! session()->get('logged_in')){
            // maka redirct ke halaman login
            return redirect()->to('/login'); 
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {
        // Do something here
    }
}
```

Terdapat 2 function yaitu: `function before() dan function after()`. Pada kasus ini, kita hanya bermain di `function before()`. *Function before*, berfungsi untuk memvalidasi request sebelum request itu sendiri dilakukan. Pada filter **Auth.php** diatas, kita me-redirect users ke halaman login jika mengakses suatu halaman sebelum login.

Selanjutnya kita daftarkan Filter tersebut pada file **Filters.php** di **app/Config**.  kemudian temukan kode berikut:

```php
public $aliases = [
    'csrf'     => CSRF::class,
    'toolbar'  => DebugToolbar::class,
    'honeypot' => Honeypot::class,
];
```
ubah menjadi 

```php
public $aliases = [
    'csrf'     => CSRF::class,
    'toolbar'  => DebugToolbar::class,
    'honeypot' => Honeypot::class,
    'auth' => \App\Filters\Auth::class,
];
```

Yang terakhir kita filter route pada **Routes.php** yang boleh diakses oleh admin, semisal disini route CRUD Employe seperti dibawah ini

```php
//route untuk employe
$routes->get('/employe', 'Employe::index',['filter' => 'auth']);
$routes->post('/employe/save', 'Employe::save',['filter' => 'auth']);
$routes->get('/employe/(:any)/edit', 'Employe::edit/$1',['filter' => 'auth']);
$routes->put('/employe', 'Employe::update',['filter' => 'auth']);
$routes->get('/employe/(:any)/delete', 'Employe::destroy/$1',['filter' => 'auth']);
```

Jika Kita memiliki halaman lain yang ingin di proteksi, maka tinggal tambahkan di route dan tambahkan code `['filter' => 'auth']`, maka halaman tersebut tidak dapat diakses sebelum login tanpa harus membuat file Filter lagi.

Sekarang, jika user mengakses CRUD Employe tanpa login, maka akan otomatis di arahkan ke halaman Login.

## Membuat Restful API
---

Pada Kesempatan kali ini Kita akan membahas mengenai suatu teknologi yang  banyak diperbincangkan, yaitu **API (Application Programming Interface)**. 

*Apasih sebenarnya API itu? Apa kegunaannya? Penting gak kita belajar mengenai API?*. 

![restapi](https://restfulapi.net/wp-content/uploads/rest-arch.jpg)

Singkatnya dahulu sebelum saat kita ingin membuat suatu aplikasi (Semisal aplikasi WEB) kita membuatnya dengan Bahasa Pemrograman PHP dan MySQL sebagai databasenya. Namun bila mana aplikasi kita tersebut ingin bisa diakses dengan perangkat mobile (semisal android) akan sangat tidak memungkinkan bisa menjadi satu database karena pemrograman android menggunakan Java.API ini adalah suatu bagian program yang bisa menghubungkan atau mengkomunikasi antara aplikasi yang berbeda platform.

Dalam Rest API method yang sering digunakan adalah *GET, POST, PUT dan DELETE* sama halnya saat kita membuat aplikasi CRUD, semua method tersebut memiliki fungsi yang sama dengan CRUD.

Untuk Praktikum disini kita akan membuat suatu REST API untuk CRUD data **articles** dimana skenario request atau end point nya adalah sebagai berikut :

- **POST /articles** : untuk menyimpan data artikel
- **GET /articles** : untuk menampilkan semua data artikel
- **GET /articles/id**:  untuk mencari data dari artikel tertentu
- **PUT /articles** : untuk mengubah data suatu artikel
- **DELETE /articles/id** : untuk menghapus suatu artikel

Pertama kita buat dahulu table Articles dengan migration dengan perintah

```console
php spark make:migration add_table_articles
```

Selanjutnya kita edit file migrationnya **2021-10-17-032936_AddTableArticles.php**

```php
<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTableArticles extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 60
            ],
            'articles' => [
                'type' => 'TEXT',
                'default' => null 
            ],
            'author' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'created_at' => [
                'type' => 'TIMESTAMP'
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP'
            ],
        ]);

        $this->forge->addKey('id',true);
        $this->forge->createTable('articles');
    }

    public function down()
    {
        $this->forge->dropTable('articles');
    }
}
```
Selanjutnya kita jalankan migration

```console
php spark migrate
```

Kita buat untuk Seedernya pula dengan perintah

```console
php spark make:seeder ArticleSeeder
```

Kita edit file **ArticleSeeder.php** di **/app/Database/Seeds**

```php
<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        //setting faker
        $faker = \Faker\Factory::create('id_ID');

        //buat 5 data artikel
        for($i=0;$i<5;$i++) {
            $data = [
                'title' => $faker->sentence,
                'articles' => $faker->paragraph,
                'author' => $faker->name
            ];
            //memasukan data ke database
            $this->db->table('articles')->insert($data);
        }        
    }
}
```

kemudian jalankan seeder dengan perintah

```console
php spark db:seed ArticleSeeder
```

Selanjutnya kita buat file Model **ArticleModel.php** 

```console
php spark make:model ArticleModel
```

Selanjutnya kita sesuai untuk file Model ArticleModel sebagai berikut

```php
<?php

namespace App\Models;

use CodeIgniter\Model;

class ArticleModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'articles';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['title','articles','author'];

    // Dates
    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
}
```

Selanjutnya buat controller untuk restful api dengan

```console
php spark make:controller Article --restful
```

Kita edit file controllernya seperti dibawah ini

```php
<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Article extends ResourceController
{    
    protected $articleModel;
    public function __construct() {
        //load model
        $this->articleModel=new \App\Models\ArticleModel();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        //tampilkan semua data
        $data=$this->articleModel->findAll();
        return $this->respond($data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //tampilkan data dengan id tertentu
        $data=$this->articleModel->where('id',$id)->first();
        
        //jika data ketemu
        if($data) {
            return $this->respond($data);
        } else {
            //jika data tidak ditemukan
            return $this->failNotFound('data tidak ditemukan');
        }
        
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //untuk tambah data
        $data = [
            'title' =>$this->request->getVar('title'),
            'articles' =>$this->request->getVar('articles'),
            'author' =>$this->request->getVar('author')
        ];

        //masukan dalam database
        $this->articleModel->insert($data);

        //untuk respon
        return $this->respondCreated($data, 'Data berhasil disimpan');

    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //ambil data
        $data=[
            'title' =>$this->request->getVar('title'),
            'articles' =>$this->request->getVar('articles'),
            'author' =>$this->request->getVar('author')
        ];

        //ubah data
        $this->articleModel->update($id,$data);

        //respon 
        return $this->respondUpdated($data,'Data berhasil diubah');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //cari data berdasarkan id
        $cari=$this->articleModel->find($id);
        
        //jika ada hapus data
        if($cari) {
            $this->articleModel->delete($id);
            return $this->respondDeleted(['id'=>$id.' Data Berhasil dihapus']);
        } else {
            return $this->failNotFound('data tidak ditemukan');
        }
    }
}
```

untuk penjelasan masing-masing fungsi adalah sebagai berikut
- **function index()**- digunakan untuk menampilkan semua data atau `GET /article/`
- **function show()** - digunakan untuk menampilkan salah satu data dengan id tertentu atau `GET /article/:id`
- **function create()** - digunakan untuk menyimpan data baru atau `POST /article/`
- **function update()** - digunakan untuk mengubah data dengan id tertentu atau `PUT /article/:id`
- **function delete()** - digunakan untuk menghpusa data atau `DELETE /article/:id`

untuk ujicoba silahkan buka aplikasi postman. 

Jalankan request dibawah untuk menampilkan semua data

```console
GET http://localhost:8080/article
```

Untuk menyimpan data jalankan request ini disertai dengan data artikel pada body

```console
POST http://localhost:8080/article
```

untuk mencari data semisal data id 1 jalakan request berikut

```console
GET http://localhost:8080/article/1
```

Selanjutnya untuk mengubah data jalankan request berikut ini disertai dengan datanya, semisal kita ubah article id 1

```console
PUT http://localhost:8080/article/1
```

Untuk hapus data semisal data untuk artikel id 1 jalankan 

```console
DELETE http://localhost:8080/article/1
```

Sampai sini kita sudah bisa membuat sebaut restful api dengan codeigniter 4.

### latihan

1. buatlah restful api untuk CRUD table employe
2. buatlah resful api untuk aksi login table admin

## Referensi
---

- [Dokumentasi Codeigniter 4](https://codeigniter.com/user_guide/index.html)
- [https://rudyekoprasetya.wordpress.com/2020/03/02/pemrograman-web-dengan-php/](https://rudyekoprasetya.wordpress.com/2020/03/02/pemrograman-web-dengan-php/)
- [https://rudyekoprasetya.wordpress.com/2020/04/02/belajar-framework-code-igniter/](https://rudyekoprasetya.wordpress.com/2020/04/02/belajar-framework-code-igniter/)
- [https://en.wikipedia.org/wiki/Rasmus_Lerdorf](https://en.wikipedia.org/wiki/Rasmus_Lerdorf)
- [https://www.warungbelajar.com/penanganan-form-dan-form-validasi-di-codeigniter-4.html](https://www.warungbelajar.com/penanganan-form-dan-form-validasi-di-codeigniter-4.html)
- [https://www.warungbelajar.com/cara-menggunakan-query-builder-di-codeigniter.html](https://www.warungbelajar.com/cara-menggunakan-query-builder-di-codeigniter.html)
- [https://stackoverflow.com/questions/8054165/using-put-method-in-html-form](https://stackoverflow.com/questions/8054165/using-put-method-in-html-form)
- [https://www.warungbelajar.com/tutorial-codeigniter-4-part-8-mengenal-fitur-migration-seeding-dan-library-faker-di-codeigniter-4.html](https://www.warungbelajar.com/tutorial-codeigniter-4-part-8-mengenal-fitur-migration-seeding-dan-library-faker-di-codeigniter-4.html)
- [https://www.warungbelajar.com/membuat-fitur-login-dan-register-dengan-codeigniter-4.html](https://www.warungbelajar.com/membuat-fitur-login-dan-register-dengan-codeigniter-4.html)
- [https://restfulapi.net](https://restfulapi.net)
- [https://www.initekno.com/tutorial-codeigniter-4-bahasa-indonesia-membuat-restful-api/](https://www.initekno.com/tutorial-codeigniter-4-bahasa-indonesia-membuat-restful-api/)
- [https://mfikri.com/artikel/restful-api-codeigniter4](https://mfikri.com/artikel/restful-api-codeigniter4)

## Tentang
---

![Penyusun](https://rudyekoprasetya.files.wordpress.com/2009/10/mine.jpg?w=138)

Syahdan,  Seorang anak laki-laki..  lahir di Tulungagung 02 Desember 1990 tepatnya hari minggu wage, Anak pertama dan terakhir ayah ibu dan ingin sekali belajar sampai ke negara seberang.. (semoga bisa ya…). Kehidupan dimulai saat pendidikan dimulai.. ibu selalu mendidik untuk selalu berbuat baik dan jangan sampai menyakiti hati orang lain, dari TK , SD Ngadirejo 1,  dan SMP Negeri 1 di kediri jawa timur, (Bagaimana klo SMA..??) saya ndak pernah SMA,  dulu bercita-cita jadi dokter namun saya urungkan, karena kondisi ekonomi orang tua yang tidak mendukung, akhirnya saya banting setir putar haluan ke SMK, Saya Lulusan SMK Negeri 1 Kediri (kediri juga..??) . Namun Tuhan itu adil, impian untuk menjadi dokter akhirnya di wujudkan (Loohhh koq bisa..??) karena saya jadi dokter komputer, saya mengambil jurusan Teknik Komputer Jaringan. dan Alhamdulillah Lulus di Tahun 2009.

setelah menuntut ilmu, saya mencoba untuk mengamalkannya… lulus dari SMK saya berkeinginnan untuk kuliah, namun tetap berhadapan dengan masalah klasik, yaitu uang, namun klo ada kemauan pasti ada jalan, alhamdulilah saya bekerja disalah satu toko komputer di kediri, dan berkat itu pula saya bisa mendaftar kuliah PTS dikediri, yaitu Universitas Nusantara PGRI. Banyak hal yang bisa dipetik dalam menghadapi kuliah dan kerja ini, khususnya dalam membagi waktu dan perasaan. Sedikit kesulitan pada Tahun Pertama Alhamdulillah bisa diatasi.

Setelah belajar, Mengamalkan, kemudian ada jalan untuk menyampaikan kepada orang lain. Tepatnya September 2010 saya mengajar, meski masih anak bawang dalam dunia pendidikan namun ndak ada salahnya dicoba, karena belajar yang baik itu adalah belajar untuk menyampaikan ilmu kepada orang lain. Fokus pembelajaran dan riset saya adalah *web development (frontend dan backend), Android Development, Linux SysAdmin, AI (Artificial Intelligent) dan lagi gandrung jua dengan IoT (internet Of Things)*