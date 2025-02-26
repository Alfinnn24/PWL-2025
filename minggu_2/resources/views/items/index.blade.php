<!DOCTYPE html> <!-- mendeklarasikan tipe dokumen HTML -->
<html>
<head>
    <title>Item List</title> <!-- menetapkan judul halaman -->
</head>
<body>
    <h1>Items</h1> <!-- menampilkan judul utama -->
    
    @if(session('success')) <!-- mengecek apakah ada pesan sukses dalam sesi -->
        <p>{{ session('success') }}</p> <!-- menampilkan pesan jika sesi sukses -->
    @endif
    
    <a href="{{ route('items.create') }}">Add Item</a> <!-- link untuk menambahkan item baru -->
    
    <ul>
        @foreach ($items as $item) <!-- melakukan perulangan untuk item dalam daftar -->
            <li>
                {{ $item->name }} - <!-- menampilkan nama item -->
                <a href="{{ route('items.edit', $item) }}">Edit</a> <!-- link untuk mengedit item -->
                
                <form action="{{ route('items.destroy', $item) }}" method="POST" style="display:inline;"> <!-- form untuk menghapus item -->
                    @csrf <!-- menambahkan token CSRF untuk keamanan -->
                    @method('DELETE') <!-- menggunakan method DELETE -->
                    <button type="submit">Delete</button> <!-- button untuk menghapus item -->
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>