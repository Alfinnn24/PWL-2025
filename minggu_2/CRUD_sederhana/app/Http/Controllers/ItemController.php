<?php // tag pembuka php

namespace App\Http\Controllers; // mendeklarasikan namespace untuk Controller

use App\Models\Item; // import model Item
use Illuminate\Http\Request; // import class Request dari Laravel

class ItemController extends Controller // mendeklarasikan kelas ItemController yang meng-extend Controller
{
    public function index() // method untuk menampilkan daftar item
    {
        $items = Item::all(); // mengambil semua data item dari database
        return view('items.index', compact('items')); // mengembalikan tampilan 'items.index' dengan data items
    }

    public function create() // method untuk menampilkan form tambah item
    {
        return view('items.create'); // mengembalikan tampilan 'items.create'
    }

    public function store(Request $request) // method untuk menyimpan data item baru
    {
        $request->validate([ // validasi input dari request
            'name' => 'required', // name harus diisi
            'description' => 'required', // description harus diisi
        ]);
         
        // Item::create($request->all());
        // return redirect()->route('items.index'); 

        // hanya masukkan atribut yang diizinkan
        Item::create($request->only(['name', 'description'])); // menyimpan hanya atribut name dan description
        return redirect()->route('items.index')->with('success', 'Item added successfully.'); // redirect dengan pesan sukses
    }

    public function show(Item $item) // method untuk menampilkan detail item tertentu
    {
        return view('items.show', compact('item')); // mengembalikan tampilan 'items.show' dengan data item
    }

    public function edit(Item $item) // method untuk menampilkan form edit item tertentu
    {
        return view('items.edit', compact('item')); // mengembalikan tampilan 'items.edit' dengan data item
    }

    public function update(Request $request, Item $item) // method untuk memperbarui data item tertentu
    {
        $request->validate([ // validasi input dari request
            'name' => 'required', // name harus diisi
            'description' => 'required', // description harus diisi
        ]);
         
        // $item->update($request->all()); 
        // return redirect()->route('items.index'); 

        // hanya masukkan atribut yang diizinkan
        $item->update($request->only(['name', 'description'])); // memperbarui hanya atribut name dan description
        return redirect()->route('items.index')->with('success', 'Item updated successfully.'); // redirect dengan pesan sukses
    }

    public function destroy(Item $item) // method untuk menghapus item tertentu
    {
        // return redirect()->route('items.index'); 
        $item->delete(); // menghapus item dari database
        return redirect()->route('items.index')->with('success', 'Item deleted successfully.'); // redirect dengan pesan sukses
    }
}