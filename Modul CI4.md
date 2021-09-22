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
- Membuat CRUD Tampil Data
- Membuat CRUD Simpan Data
- Membuat CRUD Ubah Data
- Membuat CRUD Hapus Data
- Tentang Migration dan Seeding
- Membuat Fitur Autentifikasi
- Membuat Restful API
- Referensi
- Tentang

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

```php
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

Silahkan buka url `http://localhost:8080/employe` dan amati hasilnya.

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
        //ganti dengan query builder diatas
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

Silahkan edit Model **EmployeModel.php** dan **hapus** *function construct dan getData()* seperti dibawah ini

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

## Referensi
---

- [Dokumentasi Codeigniter 4](https://codeigniter.com/user_guide/index.html)
- [https://rudyekoprasetya.wordpress.com/2020/03/02/pemrograman-web-dengan-php/](https://rudyekoprasetya.wordpress.com/2020/03/02/pemrograman-web-dengan-php/)
- [https://rudyekoprasetya.wordpress.com/2020/04/02/belajar-framework-code-igniter/](https://rudyekoprasetya.wordpress.com/2020/04/02/belajar-framework-code-igniter/)
- [https://en.wikipedia.org/wiki/Rasmus_Lerdorf](https://en.wikipedia.org/wiki/Rasmus_Lerdorf)
- [https://www.warungbelajar.com/penanganan-form-dan-form-validasi-di-codeigniter-4.html](https://www.warungbelajar.com/penanganan-form-dan-form-validasi-di-codeigniter-4.html)
-[https://www.warungbelajar.com/cara-menggunakan-query-builder-di-codeigniter.html](https://www.warungbelajar.com/cara-menggunakan-query-builder-di-codeigniter.html)