Instruksi :
1. Download program ini dalam bentuk Zip
2. Extract
3. Jalankan XAMPP
4. Buka halaman PhpMyAdmin dan buat database baru dengan nama db_mahasiswa
5. Import database yang ada didalam file ini dengan nama db_mahasiswa.sql ke PhpMyAdmin
6. Buka file di code editor Visual Studio Code
7. Ubah file env example menjadi .env dan sesuaikan Enviroment database dengan xampp anda
8. Buka Terminal
9. Ketikkan php spark serve
10. Buka browser, ketikkan : localhost:8080
11. login
12. Masukkan email dan password
    
Akun Mahasiswa
  - Email : 18560033@gmail.com
  - Password : 18560033
  - Email : 18560012@gmail.com
  - Password : 18560012

Akun Admin Akademik
  - Email : 12300001@gmail.com
  - Password : 12300001

13. Hak Akses :

Hak Akses Menu Mahasiswa :
  - Input KRS
  - Export KRS
  - Upload KRS
  - Melihat Data KRS nya
  - Menghapus Data KRS nya

Hak Akses Admin Akademik :
  - CRUD Data Mahasiswa
  - CRUD Data Matakuliah
  - CRUD Data Admin Akademik
  - Melihat, Menyetujui dan Menolak Data KRS Mahasiswa

14. Setiap Admin Akademik menginputkan data mahasiswa baru, secara otomatis akan membuatkan akun mahasiswa baru yang bisa digunakan untuk mengakses sistem (secara default nim mahasiswa digunakan sebagai password)
15. Setiap Admin Akademik menginputkan data admin akademik (pegawai) baru, secara otomatis juga akan membuatkan akun admin akademik yang bisa digunakan untuk mengakses sistem (secara default nip admin akademik digunakan sebagai password)
16. Catatan :
  - Mayoritas data mahasiswa dibuat menggunakan data faker (fakerphp), sehingga tidak secara otomatis memiliki akun untuk mengakses sistem
  - Sistem ini sudah menggunakan Filter URL, sehingga Mahasiswa tidak dapat mengakses menu Admin Akademik melalui URL, begitu juga sebaliknya.

16. Catatan Bug : Masih belum ditemuka bug


Apabila dapat kendala saat menjalankan program, silahkan hubungi saya di instagram saya : hafid.js
