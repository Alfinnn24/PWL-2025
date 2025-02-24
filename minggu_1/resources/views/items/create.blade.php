<!DOCTYPE html> <!-- menentukan tipe dokumen sebagai HTML -->
<html> <!-- membuka tag HTML -->
<head> <!-- bagian kepala dokumen -->
    <title>Add Item</title> <!-- menetapkan judul halaman -->
</head>
<body> <!-- bagian isi halaman -->
    <h1>Add Item</h1> <!-- judul utama halaman -->

    <form action="{{ route('items.store') }}" method="POST"> <!-- form untuk menambahkan item, mengarah ke route 'items.store' dengan metode POST -->
        @csrf <!-- token keamanan untuk mencegah CSRF (Cross-Site Request Forgery) -->
        
        <label for="name">Name:</label> <!-- label untuk input nama -->
        <input type="text" name="name" required> <!-- input field untuk nama, wajib diisi -->
        <br> <!-- baris baru -->

        <label for="description">Description:</label> <!-- label untuk input deskripsi -->
        <textarea name="description" required></textarea> <!-- textarea untuk deskripsi, wajib diisi -->
        <br> <!-- baris baru -->

        <button type="submit">Add Item</button> <!-- tombol untuk mengirim form -->
    </form>

    <a href="{{ route('items.index') }}">Back to List</a> <!-- link untuk kembali ke daftar item -->
</body>
</html> <!-- menutup tag HTML -->