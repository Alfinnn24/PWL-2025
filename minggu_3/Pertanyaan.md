# Pertanyaan

Jawablah pertanyaan berikut sesuai pemahaman materi di atas:

1. Pada Praktikum 1 - Tahap 5, apakah fungsi dari APP_KEY pada file setting .env Laravel?
Jawab: APP_KEY berfungsi untuk mengenkripsi data dalam aplikasi Laravel.

2. Pada Praktikum 1, bagaimana kita men-generate nilai untuk APP_KEY?
Jawab: Yaitu dengan menggunakan php artisan key:generate

3. Pada Praktikum 2.1 - Tahap 1, secara default Laravel memiliki berapa file migrasi?
dan untuk apa saja file migrasi tersebut?
Jawab: 4 yaitu create users table yang berfungsi untuk membuat table users, create
password reset token yang berfungsi untuk membuat token untuk menghapus dan
membuat password baru, create failed jobs yang berfungsi untuk meyimpan informasi
proses yang error pada database, create personal access token yang berfungsi untuk
membuat token autentikasi untuk user yang ingin mengakses API.

4. Secara default, file migrasi terdapat kode $table->timestamps();, apa tujuan/output
dari fungsi tersebut?
Jawab: Fungsi tersebut berfungsi untuk meyimpan informasi waktu ketika ada proses
yang dilakukan pada database.

5. Pada File Migrasi, terdapat fungsi $table->id(); Tipe data apa yang dihasilkan dari
fungsi tersebut?
Jawab: Tipe ID sama halnya dengan tipe data integer, namun bedanya pada tipe data
ID nilainya akan auto increment dan menjadi primary key.

6. Apa bedanya hasil migrasi pada table m_level, antara menggunakan $table->id();
dengan menggunakan $table->id('level_id'); ?
Jawab: Bedanya yaitu pada penamaan attribute ketika menggunakan $table->id() maka
nama attributnya yaitu id sedangkan ketika menggunakan $table->id(‘level_id) maka
nama attribute akan sama dengan nilai yang ada didalam petik yaitu level_id

7. Pada migration, Fungsi ->unique() digunakan untuk apa?
Jawab: Fungsi unique digunakan agar nilai dari suatu attribute tidak ada yang sama
tanpa menjadikannya primary key

8. Pada Praktikum 2.2 - Tahap 2, kenapa kolom level_id pada tabel m_user
menggunakan $tabel->unsignedBigInteger('level_id'), sedangkan kolom level_id
pada tabel m_level menggunakan $tabel->id('level_id') ?
Jawab: karena pada table m_user level_id digunakan untuk menjadi foreign key
sedangkan pada table m_level level_id digunakan untuk menjadi primary key

9. Pada Praktikum 3 - Tahap 6, apa tujuan dari Class Hash? dan apa maksud dari kode
program Hash::make('1234');?
Jawab: Class Hash digunakan untuk mengenkripsikan nilai atau menyembunyikan
nilai asli dari suatu attribute, kode Hash::make(‘1234’) bertujuan untuk mengenkripsi
nilai 1234 agar menjadi nilai acak pada database.

10. Pada Praktikum 4 - Tahap 3/5/7, pada query builder terdapat tanda tanya (?), apa
kegunaan dari tanda tanya (?) tersebut?
Jawab: Tanda tanya tersebut digunakan sebagai parameter terikat yang nilainya
terpisah dari query SQL itu sendiri

11. Pada Praktikum 6 - Tahap 3, apa tujuan penulisan kode protected $table =
‘m_user’; dan protected $primaryKey = ‘user_id’; ?
Jawab: kode protected $table = ‘m_user’; digunakan untuk mengidentifikasi nama
table, sedangkan kode protected $primaryKey = ‘user_id’; digunakan untuk
mengidentifikasi primary key dari tabbel m_user yaitu user_id

12. Menurut kalian, lebih mudah menggunakan mana dalam melakukan operasi CRUD ke
database (DB Façade / Query Builder / Eloquent ORM) ? jelaskan
Jawab: Menurut lebih menggunakan Query Builder karena lebih terstruktur dan mudah
dipahami.
