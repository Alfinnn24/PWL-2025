<!DOCTYPE html> <!-- mendeklarasikan tipe dokumen HTML -->
<html>
<head>
    <title>Edit Item</title> <!-- menetapkan judul halaman -->
</head>
<body>
    <h1>Edit Item</h1> <!-- menampilkan judul -->
    
    <form action="{{ route('items.update', $item) }}" method="POST"> <!-- form untuk update item -->
        @csrf <!-- menambahkan token CSRF untuk keamanan -->
        @method('PUT') <!-- menggunakan metode PUT untuk update data -->
        
        <label for="name">Name:</label> <!-- label untuk input nama -->
        <input type="text" name="name" value="{{ $item->name }}" required> <!-- input untuk nama items -->
        <br>
        
        <label for="description">Description:</label> <!-- label untuk input deskripsi -->
        <textarea name="description" required>{{ $item->description }}</textarea> <!-- textarea untuk deskripsi items -->
        <br>
        
        <button type="submit">Update Item</button> <!-- tombol untuk memperbarui item -->
    </form>
    
    <a href="{{ route('items.index') }}">Back to List</a> <!-- link untuk kembali ke daftar item -->
</body>
</html>