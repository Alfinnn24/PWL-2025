<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriModel;
use App\Models\BarangModel;
use Log;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Barang',
            'list' => ['Home', 'Barang']
        ];

        $page = (object) [
            'title' => 'Daftar Barang'
        ];

        $activeMenu = 'barang';
        $kategori = KategoriModel::all();

        return view('barang.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kategori' => $kategori, 'activeMenu' => $activeMenu]);
    }

    // public function list(Request $request)
    // {
    //     $barangs = BarangModel::select('barang_id', 'barang_kode', 'barang_nama', 'kategori_id', 'harga_beli', 'harga_jual')
    //         ->with('kategori');

    //     if ($request->kategori_id) {
    //         $barangs->where('kategori_id', $request->kategori_id);
    //     }

    //     return DataTables::of($barangs)
    //         ->addIndexColumn()
    //         ->addColumn('aksi', function ($barang) {
    //             $btn = '<a href="' . url('/barang/' . $barang->barang_id) . '" class="btn btn-info btn-sm">Detail</a> ';
    //             $btn .= '<a href="' . url('/barang/' . $barang->barang_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
    //             $btn .= '<form class="d-inline-block" method="POST" action="' . url('/barang/' . $barang->barang_id) . '">' .
    //                 csrf_field() . method_field('DELETE') .
    //                 '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
    //             return $btn;
    //         })
    //         ->rawColumns(['aksi'])
    //         ->make(true);
    // }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Barang',
            'list' => ['Home', 'Barang', 'Tambah Barang']
        ];

        $page = (object) [
            'title' => 'Tambah Barang'
        ];

        $activeMenu = 'barang';
        $kategori = KategoriModel::all();

        return view('barang.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kategori' => $kategori, 'activeMenu' => $activeMenu]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|integer|exists:m_kategori,kategori_id',
            'barang_kode' => 'required|string|max:10|unique:m_barang,barang_kode',
            'barang_nama' => 'required|string|max:100',
            'harga_beli' => 'required|integer',
            'harga_jual' => 'required|integer',
        ]);

        BarangModel::create([
            'kategori_id' => $request->kategori_id,
            'barang_kode' => $request->barang_kode,
            'barang_nama' => $request->barang_nama,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
        ]);

        return redirect('/barang')->with('success', 'Data barang berhasil disimpan');
    }

    public function show($id)
    {
        $breadcrumb = (object) [
            'title' => 'Detail Barang',
            'list' => ['Home', 'Barang', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Data Barang'
        ];

        $barang = BarangModel::with('kategori')->find($id);

        $activeMenu = 'barang';

        return view('barang.show', compact('breadcrumb', 'page', 'barang', 'activeMenu'));
    }

    public function edit($id)
    {
        $breadcrumb = (object) [
            'title' => 'Edit Barang',
            'list' => ['Home', 'Barang', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit Data Barang'
        ];

        $barang = BarangModel::find($id);
        $kategori = KategoriModel::all();

        $activeMenu = 'barang';

        return view('barang.edit', compact('breadcrumb', 'page', 'barang', 'kategori', 'activeMenu'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori_id' => 'required',
            'barang_kode' => 'required|unique:m_barang,barang_kode,' . $id . ',barang_id',
            'barang_nama' => 'required',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
        ]);

        $barang = BarangModel::find($id);
        $barang->update($request->all());

        return redirect('barang')->with('success', 'Barang berhasil diperbarui');
    }

    public function destroy($id)
    {
        $barang = BarangModel::find($id);
        if ($barang) {
            $barang->delete();
            return redirect('barang')->with('success', 'Barang berhasil dihapus');
        }
        return redirect('barang')->with('error', 'Barang tidak ditemukan');
    }
     // tugas jobsheet 6
     public function list(Request $request)
     {
         $barang = BarangModel::select('barang_id', 'barang_kode', 'barang_nama', 'kategori_id', 'harga_beli', 'harga_jual')->with('kategori');
 
         if ($request->kategori_id) {
             $barang->where('kategori_id', $request->kategori_id);
         }
 
         return DataTables::of($barang)
             ->addIndexColumn()
             ->addColumn('aksi', function ($barang) {
                 $btn = '<button onclick="modalAction(\'' . url('/barang/' . $barang->barang_id . '/show_ajax') . '\')" class="btn btn-info btn-sm">Detail</button> ';
                 $btn .= '<button onclick="modalAction(\'' . url('/barang/' . $barang->barang_id . '/edit_ajax') . '\')" class="btn btn-warning btn-sm">Edit</button> ';
                 $btn .= '<button onclick="modalAction(\'' . url('/barang/' . $barang->barang_id . '/delete_ajax') . '\')" class="btn btn-danger btn-sm">Hapus</button> ';
                 return $btn;
             })
             ->rawColumns(['aksi'])
             ->make(true);
     }
 
     public function create_ajax()
     {
         $kategori = KategoriModel::select('kategori_id', 'kategori_nama')->get();
 
         return view('barang.create_ajax')->with('kategori', $kategori);
     }
 
     public function store_ajax(Request $request)
     {
         if ($request->ajax() || $request->wantsJson()) {
             $rules = [
                 'kategori_id' => 'required|exists:m_kategori,kategori_id',
                 'barang_kode' => 'required|min:3|unique:m_barang,barang_kode',
                 'barang_nama' => 'required|min:3',
                 'harga_beli' => 'required|numeric|min:1',
                 'harga_jual' => 'required|numeric|min:1',
             ];
 
             $validator = Validator::make($request->all(), $rules);
 
             if ($validator->fails()) {
                 return response()->json([
                     'status' => false,
                     'message' => 'Validasi Gagal',
                     'msgField' => $validator->errors(),
                 ]);
             }
 
             BarangModel::create($request->all());
             return response()->json([
                 'status' => true,
                 'message' => 'Data barang berhasil disimpan'
             ]);
         }
         redirect('/');
     }
 
     public function edit_ajax(string $id)
     {
         $barang = BarangModel::find($id);
         $kategori = KategoriModel::select('kategori_id', 'kategori_nama')->get();
 
         return view('barang.edit_ajax')->with('barang', $barang)->with('kategori', $kategori);
     }
 
     public function update_ajax(Request $request, string $id)
     {
         if ($request->ajax() || $request->wantsJson()) {
             $rules = [
                 'kategori_id' => 'required|exists:m_kategori,kategori_id',
                 'barang_kode' => 'required|min:3|unique:m_barang,barang_kode,' . $id . ',barang_id',
                 'barang_nama' => 'required|min:3',
                 'harga_beli' => 'required|numeric|min:1',
                 'harga_jual' => 'required|numeric|min:1',
             ];
 
             $validator = Validator::make($request->all(), $rules);
 
             if ($validator->fails()) {
                 return response()->json([
                     'status' => false,
                     'message' => 'Validasi Gagal',
                     'msgField' => $validator->errors(),
                 ]);
             }
 
             $check = BarangModel::find($id);
             if ($check) {
                 $check->update($request->all());
                 return response()->json([
                     'status' => true,
                     'message' => 'Data berhasil diupdate'
                 ]);
             } else {
                 return response()->json([
                     'status' => false,
                     'message' => 'Data tidak ditemukan'
                 ]);
             }
         }
         return redirect('/');
     }
 
     public function confirm_ajax(string $id)
     {
         $barang = BarangModel::find($id);
 
         return view('barang.confirm_ajax')->with('barang', $barang);
     }
 
     public function delete_ajax(Request $request, $id)
     {
         if ($request->ajax() || $request->wantsJson()) {
             $check = BarangModel::find($id);
             try {
                $check = BarangModel::find($id);
                if ($check) {
                    $check->delete();
                    return response()->json([
                        'status' => true,
                        'message' => 'Data berhasil dihapus'
                    ]);
                } else {
                    return response()->json([
                        'status' => false,
                        'message' => 'Data tidak ditemukan'
                    ]);
                }
            } catch (\Exception $e) {
                Log::error('Error deleting user: ' . $e->getMessage());
                if (str_contains($e->getMessage(), 'SQLSTATE[23000]')) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Data tidak dapat dihapus karena masih terkait dengan data lain di sistem'
                    ]);
                }
            }
        }
        return redirect('/');
     }
 
     public function show_ajax(string $id)
     {
         $barang = BarangModel::with('kategori')->find($id);
         return view('barang.show_ajax', ['barang' => $barang]);
     }
 }
 