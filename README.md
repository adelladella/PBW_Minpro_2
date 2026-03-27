### Mini Project 1 – Pemrograman Berbasis WEB

# 🌸 Adella Putri – Portfolio Website

###### Nama: Adella Putri

###### NIM: 2409116006

###### Kelas: A, Sistem Informasi 2024

## 🌸 Full Page Website Overview

<img width="1920" height="4065" alt="screencapture-minpro2-pbw-adella-test-2026-03-27-20_52_07" src="https://github.com/user-attachments/assets/750e0a1b-61e7-48c7-ba2f-9ee5090fe893" />

Website ini merupakan portfolio pribadi berbasis **HTML, CSS, Bootstrap 5, dan Vue JS**.  
Website bersifat statis namun memiliki elemen interaktif menggunakan Vue JS.

Berikut merupakan tampilan keseluruhan website portfolio yang terdiri dari:

- Floating Navbar
- Hero Section dengan interaksi Vue
- About Section dengan toggle content
- Dynamic Skills Progress Bar
- Timeline Organizational Experience
- Responsive Academic Projects Grid
- Certificate Cards
- Interactive Contact Form
- Footer

Seluruh section dirancang responsif menggunakan Bootstrap 5 dan dikombinasikan dengan Vue JS untuk elemen interaktif.

# 📂 Struktur Folder

Project ini memiliki struktur folder sederhana yang terdiri dari:

- File `index.html` berfungsi sebagai file utama website.
- File `style.css` digunakan untuk seluruh styling tambahan.
- Folder `images/` berisi foto profil dan gambar sertifikat.

**Update pada Mini Project 2:**

- File `index.html` diubah menjadi `index.php`
- Penambahan file `koneksi.php` untuk koneksi database
- Website terintegrasi dengan PHP dan MySQL (database)

---

# 🖥️ Penjelasan Setiap Section & Implementasi Kode

<details>
<summary> Click Here </summary>

## 1️⃣ Navbar (Floating Navigation Bar)

<img width="1919" height="155" alt="image" src="https://github.com/user-attachments/assets/b53f9b87-4894-43b7-90ea-df5d6e8d88fb" />

Pada bagian ini saya menggunakan komponen Navbar dari Bootstrap 5 yang saya modifikasi menjadi floating navbar dengan tambahan styling custom.

Di dalam `index.html` saya menggunakan struktur berikut:

```html
<nav class="navbar navbar-expand-lg navbar-floating fixed-top">
```

<img height="500" alt="iPad-PRO-11-127 0 0 1" src="https://github.com/user-attachments/assets/00d0c99c-5e76-4ba0-9f30-78a66357f10d" />

Class `navbar-expand-lg` saya gunakan agar navbar responsive dan akan berubah menjadi hamburger menu pada ukuran layar kecil.


Saya juga menambahkan class custom `.navbar-floating` di file style.css untuk memberikan efek mengambang, blur background, dan rounded shape:

```css
.navbar-floating {
    top: 20px;
    left: 50%;
    transform: translateX(-50%);
    width: 85%;
    background: rgba(255,255,255,0.75);
    backdrop-filter: blur(15px);
    border-radius: 50px;
}
```
<img width="1919" height="244" alt="image" src="https://github.com/user-attachments/assets/f2a3286e-e0f7-4522-8fdb-8dc63549ad31" />

Efek glow pada nama saya tambahkan menggunakan:
```css
.glow-brand {
    text-shadow:
        0 0 6px rgba(231,84,128,0.5),
        0 0 12px rgba(231,84,128,0.3);
}
```

Saya menggunakan efek ini untuk memberikan kesan modern dan aesthetic, dan karena sebelumnya saya sudah pernah membuat desain web dengan navbar yang mirip, oleh karena itu saya implementasikan kembali disini.

---

## 2️⃣ Hero Section

<img width="1912" height="784" alt="image" src="https://github.com/user-attachments/assets/e14825b7-851e-46ad-975d-2125c7d1a7dd" />

Hero section merupakan bagian pertama yang dilihat pengguna. Pada bagian ini saya menggunakan Vue JS untuk menampilkan nama secara dinamis dan membuat interaksi tombol.

Saya menggunakan interpolation Vue:
```html
<h1>{{ nama }}</h1>
```

Dan pada script Vue saya mendefinisikan:
```html
data() {
  return {
    nama: "Adella Putri",
    greetingVisible: false
  }
```

🔘 Implementasi Tombol “Say Hello”

Saya membuat tombol dengan _event handling_ menggunakan directive `@click`:
```html
<button class="btn btn-hero-modern rounded-pill px-4"
        @click="toggleGreeting">
  Say Hello ✿
</button>
```

Saat tombol ditekan, method `toggleGreeting()` akan dijalankan:
```html
methods: {
  toggleGreeting() {
    this.greetingVisible = !this.greetingVisible
  }
}
```

Method ini berfungsi untuk mengubah nilai boolean `greetingVisible` menjadi _true_ atau _false_.

Saya kemudian menggunakan directive `v-if` untuk menampilkan teks hanya ketika `greetingVisible` bernilai _true_:
```html
<transition name="fade">
  <p v-if="greetingVisible"
     class="mt-4 fw-semibold text-pink hero-greeting">
     Welcome to my portfolio spaceᯓ★
  </p>
</transition>
```

Before Click:

<img width="620" height="172" alt="image" src="https://github.com/user-attachments/assets/26783936-7b33-4b24-ac17-8bee2935938d" />

After Click:

<img width="604" height="207" alt="image" src="https://github.com/user-attachments/assets/40ecb9dd-d6f3-475a-a9fc-b8f08a29fb91" />


Ketika tombol ditekan:
- Nilai `greetingVisible` berubah
- Vue melakukan reactive rendering
- Teks muncul atau menghilang secara dinamis

✨ Efek Transisi

Saya juga menambahkan efek animasi menggunakan `<transition>` dan CSS:
```css
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.6s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
```

Tujuan saya menggunakan transition adalah agar teks tidak muncul secara tiba-tiba, melainkan dengan animasi fade yang lebih halus dan modern.

Before Click:

<img width="232" height="77" alt="image" src="https://github.com/user-attachments/assets/f3a41fda-d117-48da-aa81-adf520400b17" />

After Click:

<img width="268" height="93" alt="image" src="https://github.com/user-attachments/assets/8f0213c5-d8c2-44e1-9f35-1a9337b50d95" />

Pada bagian foto, saya menambahkan efek glow menggunakan pseudo-element CSS:

<img width="605" height="472" alt="image" src="https://github.com/user-attachments/assets/003613fc-863a-4a5a-ba4b-630485803020" />

```html
.hero-image-wrapper::before {
    background: radial-gradient(circle, rgb(218, 92, 130), transparent);
}
```

Efek ini saya gunakan untuk menciptakan kesan cahaya di belakang foto profil.

---

## 3️⃣ About Me Section

<img width="1919" height="359" alt="image" src="https://github.com/user-attachments/assets/a39488ce-1e3c-4c2f-aa05-102462caab3d" />

Pada section ini saya menampilkan deskripsi singkat tentang diri saya. Saya juga menambahkan tombol toggle untuk menampilkan informasi tambahan.

<img width="1919" height="440" alt="image" src="https://github.com/user-attachments/assets/ce77cace-6985-4886-9129-04a67732a770" />

Saya menggunakan directive Vue:
```html
<button @click="showAbout = !showAbout">
<p v-if="showAbout">
```

Tujuan saya menggunakan `v-if` adalah agar konten tambahan hanya muncul ketika tombol ditekan, sehingga halaman terlihat lebih clean.

---

## 4️⃣ Skills (_Core Competencies_)

<img width="1919" height="510" alt="image" src="https://github.com/user-attachments/assets/dea12d5c-ca35-4683-96c9-b8b3085207f5" />

Pada bagian ini saya menampilkan kompetensi dalam bentuk progress bar.

Saya menggunakan looping Vue:
```html
<div v-for="skill in skills">
```

Data skills saya simpan dalam _array_:
```html
skills: [
  { name: "Administrative & Documentation Management", level: 90 }
]
```

Untuk mengatur lebar progress bar secara dinamis, saya menggunakan binding:
```html
:style="{width: skill.level + '%'}"
```

Saya memilih pendekatan ini agar progress bar dapat diatur hanya melalui data tanpa perlu mengubah HTML secara manual.

---

## 5️⃣ Organizational Experience

<img width="1919" height="466" alt="image" src="https://github.com/user-attachments/assets/8c7b902e-8579-45cf-8e29-71bffb0b7f9f" />

Section ini saya buat dalam bentuk timeline vertikal. Saya menggunakan `v-for` untuk menampilkan setiap pengalaman organisasi.
```html
<div v-for="exp in experiences">
```

Dan di Vue:
```html
experiences: [
  {
    title: "Laboratory Assistant — PTI 2025",
    subtitle: "PRAKTISI Sistem Informasi",
    desc: "Facilitated practical lab sessions..."
  }
]
```

Saya menambahkan styling timeline di CSS:

<img width="672" height="434" alt="image" src="https://github.com/user-attachments/assets/77010e8d-868d-4ac5-bbf9-70a95deb6afe" />

```html
.timeline {
    border-left: 3px solid #e75480;
}
```

Tujuan saya membuat timeline adalah agar pengalaman terlihat terstruktur secara kronologis.


---

## 6️⃣ Academic Projects

<img width="1919" height="500" alt="image" src="https://github.com/user-attachments/assets/1b719020-5237-4c86-b3b1-a8e67fd87417" />

Pada bagian ini saya menggunakan Bootstrap _Grid System_:
```html
<div class="row g-4">
<div class="col-sm-12 col-md-6 col-lg-4">
```
Pendekatan ini saya gunakan agar layout _responsive_ di berbagai ukuran layar.

Data project saya simpan dalam _array Vue_ dan saya tampilkan menggunakan `v-for`.

---

## 7️⃣ Certificates

<img width="1919" height="640" alt="image" src="https://github.com/user-attachments/assets/586f82e3-2714-460a-9df6-441adb89ac0f" />

Saya menggunakan komponen card Bootstrap untuk menampilkan sertifikat.
```html
<img :src="cert.image">
```

Saya menggunakan binding `:src` agar gambar dapat diambil langsung dari data Vue.

Efek hover saya tambahkan di CSS untuk meningkatkan interaksi visual.

## 8️⃣ Contact Form

<img width="1919" height="589" alt="image" src="https://github.com/user-attachments/assets/95ac97fe-d0e3-45dd-af94-6ab860e10226" />

Pada bagian ini saya menggunakan two-way binding Vue:
```html
<input v-model="form.name">
<textarea v-model="form.message">
```

Saat form disubmit, saya menggunakan:
```html
@submit.prevent="submitForm"
```

`.prevent` saya gunakan agar halaman tidak reload.

Di dalam method:
```html
submitForm() {
  this.formSubmitted = true
}
```

---

## 9️⃣ Footer

<img width="1919" height="88" alt="image" src="https://github.com/user-attachments/assets/6d4651e8-61e5-490f-abae-ceb218d08cfb" />

Footer saya gunakan untuk menampilkan copyright dan informasi teknologi yang digunakan.
```html
<footer class="text-center py-4 bg-pink text-white">
```

Saya menggunakan class Bootstrap untuk memusatkan teks dan memberikan padding.

Saya juga menggunakan v-if untuk menampilkan pesan sukses setelah submit.

</details>

# 🔄 Update pada Mini Project 2

<details>
<summary> Click Here </summary>

## 1. Konversi Website Menjadi Dinamis

Pada Mini Project 2, website yang sebelumnya bersifat statis dikembangkan menjadi dinamis dengan menggunakan PHP dan MySQL.

File utama diubah dari: `index.html` ke `index.php`

---

## 2. Penambahan File Koneksi Database

Ditambahkan file baru bernama `koneksi.php` yang berfungsi untuk menghubungkan website dengan database.

```php
<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "portfolio_adella";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
```

Digunakan dengan:

```
include 'koneksi.php';
```

---

## 3. Integrasi Database

Database yang digunakan:

`portfolio_adella`

Tabel:
1. skills
2. experiences
3. projects
4. certificates
   
<img width="297" height="178" alt="image" src="https://github.com/user-attachments/assets/65e9b38c-05fc-4fda-b1bd-62f7ffa7928c" />

---

## 4. Pengambilan Data dengan PHP
`$skills = mysqli_query($conn, "SELECT * FROM skills");`

`<?php while ($skill = mysqli_fetch_assoc($skills)) { ?>`

---

## 5. Perubahan Implementasi Section

Semua section yang sebelumnya menggunakan Vue untuk data kini menggunakan PHP dan database:

- Skills
- Organizational Experience
- Academic Projects
- Certificates

---

## 6. Penggunaan Vue

Vue tetap digunakan untuk: interaksi, toggle, dan animasi.

---

## 7. Peningkatan Tampilan (Typography)

Font yang digunakan:
1. Playfair Display (heading)
2. Poppins (isi)

Menggunakan `<link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Poppins&display=swap" rel="stylesheet">`

---

## 8. Perubahan Tampilan UI
Perubahan nama navbar menjadi `_Adella’s Space ✿_`
Perbaikan ukuran font agar lebih proporsional
Tampilan lebih clean dan modern

Hasilnya: 

<img width="2760" height="1586" alt="Macbook-Air-minpro2_pbw_adella test" src="https://github.com/user-attachments/assets/717aba93-d720-4c45-8eba-905773df2126" />

dan juga: 

<img width="2760" height="1586" alt="Macbook-Air-minpro2_pbw_adella test (1)" src="https://github.com/user-attachments/assets/ff994db2-1c14-4249-aa3d-93fa74bf1979" />



---

## 9. Perbandingan Tampilan
Sebelum (Mini Project 1)

<img width="1920" height="4206" alt="screencapture-127-0-0-1-5500-index-html-2026-03-01-13_47_49" src="https://github.com/user-attachments/assets/7c35c59e-54be-4a19-a0e8-f1eac1aaa448" />

Sesudah (Mini Project 2)

<img width="1920" height="4065" alt="screencapture-minpro2-pbw-adella-test-2026-03-27-20_52_07" src="https://github.com/user-attachments/assets/750e0a1b-61e7-48c7-ba2f-9ee5090fe893" />

Perubahan utama:

- Data menjadi dinamis
- Tampilan lebih rapi
- Typography lebih modern
- Struktur lebih profesional

---

</details>

# 🛠️ Teknologi yang Digunakan
<details>
<summary> Click Here </summary>

Dalam project ini saya menggunakan:

### Frontend
<p>
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg" width="40"/>
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/css3/css3-original.svg" width="40"/>
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bootstrap/bootstrap-original.svg" width="40"/>
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/vuejs/vuejs-original.svg" width="40"/>
</p>

- HTML  
- CSS  
- Bootstrap  
- Bootstrap Icons  
- Vue JS  

---

### Backend & Database (Mini Project 2)
<p>
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" width="40"/>
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg" width="40"/>
</p>

- PHP  
- MySQL (phpMyAdmin)  

</details>
