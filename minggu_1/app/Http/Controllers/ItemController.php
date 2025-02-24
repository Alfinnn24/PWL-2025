<?php

namespace App\Http\Controllers; // mendefinisikan namespace untuk controller

use App\Models\Item; // mengimpor model Item untuk berinteraksi dengan database
use Illuminate\Http\Request; // mengimpor Request untuk menangani input pengguna

class ItemController extends Controller // mendefinisikan kelas ItemController yang merupakan turunan dari Controller
{
    public function index() // method untuk menampilkan daftar item
    {
        $items = Item::all(); // mengambil semua data item dari database
        return view('items.index', compact('items')); // mengirim data ke tampilan 'items.index'
    }

    public function create() // method untuk menampilkan form tambah item
    {
        return view('items.create'); // menampilkan tampilan 'items.create'
    }

    public function store(Request $request) // method untuk menyimpan item baru ke database
    {
        $request->validate([ // memvalidasi input sebelum menyimpan ke database
            'name' => 'required', // 'name' harus diisi
            'description' => 'required', // 'description' harus diisi
        ]);

        Item::create($request->only(['name', 'description'])); // menyimpan item baru hanya dengan atribut yang diizinkan
        return redirect()->route('items.index')->with('success', 'Item added successfully.'); // redirect ke halaman index dengan pesan sukses
    }

    public function show(Item $item) // method untuk menampilkan detail item tertentu
    {
        return view('items.show', compact('item')); // mengirim data item ke tampilan 'items.show'
    }

    public function edit(Item $item) // method untuk menampilkan form edit item
    {
        return view('items.edit', compact('item')); // mengirim data item ke tampilan 'items.edit'
    }

    public function update(Request $request, Item $item) // method untuk memperbarui data item
    {
        $request->validate([ // memvalidasi input sebelum update
            'name' => 'required', // 'name' harus diisi
            'description' => 'required', // 'description' harus diisi
        ]);

        $item->update($request->only(['name', 'description'])); // mengupdate item hanya dengan atribut yang diizinkan
        return redirect()->route('items.index')->with('success', 'Item updated successfully.'); // redirect ke halaman index dengan pesan sukses
    }

    public function destroy(Item $item) // method untuk menghapus item dari database
    {
        $item->delete(); // menghapus item dari database
        return redirect()->route('items.index')->with('success', 'Item deleted successfully.'); // redirect ke halaman index dengan pesan sukses
    }
}