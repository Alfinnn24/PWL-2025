<!DOCTYPE html> <!-- mendeklarasikan tipe dokumen HTML -->
<html>
<head>
    <title>Add Item</title> <!-- menetapkan judul halaman -->
</head>
<body>
    <h1>Add Item</h1> <!-- menampilkan judul utama -->
    
    <form action="{{ route('items.store') }}" method="POST"> <!-- form untuk menambahkan item baru -->
        @csrf <!-- menambahkan token CSRF untuk keamanan -->
        
        <label for="name">Name:</label> <!-- label untuk input nama -->
        <input type="text" name="name" required> <!-- input untuk nama, wajib diisi (required) -->
        <br>
        
        <label for="description">Description:</label> <!-- label untuk input deskripsi -->
        <textarea name="description" required></textarea> <!-- input textarea untuk deskripsi, wajib diisi (required) -->
        <br>
        
        <button type="submit">Add Item</button> <!-- tombol untuk menambahkan item -->
    </form>
    
    <a href="{{ route('items.index') }}">Back to List</a> <!-- link untuk kembali ke daftar item -->
</body>
</html>