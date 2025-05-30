<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriModel;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Barryvdh\DomPDF\Facade\Pdf;



class KategoriController extends Controller
{
    public function index()
    {
        $activeMenu = 'kategori';

        $breadcrumb = (object) [
            'title' => 'Data Kategori',
            'list' => ['Home', 'Kategori']
        ];

        $page = (object) [
            'title' => 'Daftar Kategori yang Tersedia'
        ];

        $kategori = KategoriModel::all();

        return view('kategori.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'kategori' => $kategori
        ]);
    }

    // public function list(Request $request)
    // {
    //     $kategori = KategoriModel::select('kategori_id', 'kategori_kode', 'kategori_nama');

    //     return DataTables::of($kategori)
    //         ->addIndexColumn()
    //         ->addColumn('aksi', function ($row) {
    //             $btn = '<a href="' . url('/kategori/' . $row->kategori_id) . '" class="btn btn-info btn-sm">Detail</a> ';
    //             $btn .= '<a href="' . url('/kategori/' . $row->kategori_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
    //             $btn .= '<form class="d-inline-block" method="POST" action="' . url('/kategori/' . $row->kategori_id) . '">'
    //                 . csrf_field() . method_field('DELETE') .
    //                 '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button>
    //             </form>';

    //             return $btn;
    //         })
    //         ->rawColumns(['aksi'])
    //         ->make(true);
    // }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Kategori',
            'list' => ['Home', 'Kategori', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah kategori baru',
        ];

        $activeMenu = 'kategori';

        return view('kategori.create', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_kode' => 'required|string|max:10|unique:m_kategori,kategori_kode',
            'kategori_nama' => 'required|string|max:100'
        ]);

        KategoriModel::create([
            'kategori_kode' => $request->kategori_kode,
            'kategori_nama' => $request->kategori_nama
        ]);

        return redirect('/kategori')->with('success', 'Data kategori berhasil disimpan!');
    }

    public function show(string $id)
    {
        $breadcrumb = (object) [
            'title' => 'Detail Kategori',
            'list' => ['Home', 'Kategori', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail kategori',
        ];

        $activeMenu = 'kategori';

        $kategori = KategoriModel::find($id);

        return view('kategori.show', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'kategori' => $kategori
        ]);
    }

    public function edit(string $id)
    {
        $breadcrumb = (object) [
            'title' => 'Edit Kategori',
            'list' => ['Home', 'Kategori', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit kategori',
        ];

        $activeMenu = 'kategori';

        $kategori = KategoriModel::find($id);

        return view('kategori.edit', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'kategori' => $kategori
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'kategori_kode' => 'required|string|max:10|unique:m_kategori,kategori_kode,' . $id . ',kategori_id',
            'kategori_nama' => 'required|string|max:100'
        ]);

        KategoriModel::find($id)->update([
            'kategori_kode' => $request->kategori_kode,
            'kategori_nama' => $request->kategori_nama
        ]);

        return redirect('/kategori')->with('success', 'Data kategori berhasil diubah!');
    }

    public function destroy(string $id)
    {
        $check = KategoriModel::find($id);
        if (!$check) {
            return redirect('/kategori')->with('error', 'Data kategori tidak ditemukan');
        }

        try {
            KategoriModel::destroy($id);
            return redirect('/kategori')->with('success', 'Data kategori berhasil dihapus!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/kategori')->with('error', 'Data kategori gagal dihapus karena masih terkait dengan data lain.');
        }
    }

    public function list(Request $request)
    {
        $kategori = KategoriModel::select('kategori_id', 'kategori_kode', 'kategori_nama');

        if ($request->kategori_id) {
            $kategori->where('kategori_id', $request->kategori_id);
        }

        return DataTables::of($kategori)
            ->addIndexColumn()
            ->addColumn('aksi', function ($kategori) {
                $btn = '<button onclick="modalAction(\'' . url('/kategori/' . $kategori->kategori_id . '/show_ajax') . '\')" class="btn btn-info btn-sm">Detail</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/kategori/' . $kategori->kategori_id . '/edit_ajax') . '\')" class="btn btn-warning btn-sm">Edit</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/kategori/' . $kategori->kategori_id . '/delete_ajax') . '\')" class="btn btn-danger btn-sm">Hapus</button> ';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create_ajax()
    {
        return view('kategori.create_ajax');
    }

    public function store_ajax(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'kategori_kode' => 'required|string|max:10|unique:m_kategori,kategori_kode',
                'kategori_nama' => 'required|string|max:100'
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi Gagal',
                    'msgField' => $validator->errors(),
                ]);
            }

            KategoriModel::create($request->all());

            return response()->json([
                'status' => true,
                'message' => 'Data kategori berhasil disimpan'
            ]);
        }

        return redirect('/kategori');
    }

    public function edit_ajax(string $id)
    {
        $kategori = KategoriModel::find($id);
        return view('kategori.edit_ajax', compact('kategori'));
    }

    public function update_ajax(Request $request, $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'kategori_kode' => 'required|string|max:10|unique:m_kategori,kategori_kode,' . $id . ',kategori_id',
                'kategori_nama' => 'required|string|max:100'
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi gagal.',
                    'msgField' => $validator->errors()
                ]);
            }

            $kategori = KategoriModel::find($id);
            if (!$kategori) {
                return response()->json([
                    'status' => false,
                    'message' => 'Data tidak ditemukan'
                ]);
            }

            $kategori->update($request->all());

            return response()->json([
                'status' => true,
                'message' => 'Data berhasil diperbarui'
            ]);
        }

        return redirect('/kategori');
    }

    public function show_ajax($id)
    {
        $kategori = KategoriModel::find($id);
        if (!$kategori) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan.'
            ]);
        }
        return view('kategori.show_ajax', compact('kategori'));
    }

   // Menampilkan halaman konfirmasi penghapusan data kategori
public function confirm_ajax(string $id)
{
    $kategori = KategoriModel::find($id);  // Ambil data kategori berdasarkan id
    return view('kategori.confirm_ajax', compact('kategori'));  // Tampilkan modal konfirmasi
}

// Menghapus data kategori melalui AJAX
public function delete_ajax(Request $request, $id)
{
    if ($request->ajax() || $request->wantsJson()) {
        $kategori = KategoriModel::find($id);  // Cari kategori berdasarkan id

        if ($kategori) {
            $kategori->delete();  // Hapus data kategori
            return response()->json([
                'status' => true,
                'message' => 'Data berhasil dihapus'  // Response sukses
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Data tidak ditemukan'  // Response gagal jika data tidak ditemukan
        ]);
    }

    return redirect('/kategori');  // Redirect jika bukan request AJAX
}

// Menampilkan form untuk impor data kategori
public function import()
{
    return view('kategori.import'); // Menampilkan form import kategori
}

// Menangani impor data kategori via AJAX
public function import_ajax(Request $request)
{
    if ($request->ajax() || $request->wantsJson()) {
        $rules = [
            'file_kategori' => ['required', 'mimes:xlsx', 'max:1024']
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi Gagal',
                'msgField' => $validator->errors()
            ]);
        }

        $file = $request->file('file_kategori');
        $reader = IOFactory::createReader('Xlsx');
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load($file->getRealPath());
        $sheet = $spreadsheet->getActiveSheet();
        $data = $sheet->toArray(null, false, true, true);
        $insert = [];

        if (count($data) > 1) {
            foreach ($data as $baris => $value) {
                if ($baris > 1) {
                    $insert[] = [
                        'kategori_kode' => $value['A'],
                        'kategori_nama' => $value['B'],
                        'created_at' => now(),
                    ];
                }
            }

            if (count($insert) > 0) {
                KategoriModel::insertOrIgnore($insert);
            }

            return response()->json([
                'status' => true,
                'message' => 'Data berhasil diimport'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Tidak ada data yang diimport'
            ]);
        }
    }

    return redirect('/');
}

public function export_excel(){
    // Ambil data barang yang akan di-export
     $kategori = KategoriModel::select(
         'kategori_kode',
         'kategori_nama',
     )
     ->orderBy('kategori_id')
     ->get();

     // Load library Excel
     $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
     $sheet = $spreadsheet->getActiveSheet(); // Ambil sheet yang aktif

     // Set header kolom
     $sheet->setCellValue('A1', 'No');
     $sheet->setCellValue('B1', 'Kode Kategori');
     $sheet->setCellValue('C1', 'Nama Kategori');

     // Bold header
     $sheet->getStyle('A1:C1')->getFont()->setBold(true);

     $no = 1; // Nomor data dimulai dari 1
     $baris = 2; // Baris data dimulai dari baris ke-2

     foreach ($kategori as $key => $value) {
         $sheet->setCellValue('A' . $baris, $no);
         $sheet->setCellValue('B' . $baris, $value->kategori_kode);
         $sheet->setCellValue('C' . $baris, $value->kategori_nama);

         $baris++;
         $no++;
     }

     foreach (range('A', 'C') as $columnID) {
         $sheet->getColumnDimension($columnID)->setAutoSize(true); // Set auto size untuk kolom
     }

     $sheet->setTitle('Data Kategori'); // Set title sheet

     $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
     $filename = "Data Kategori " . date('Y-m-d H:i:s') . ".xlsx";

     // Header untuk download file Excel
     header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
     header("Content-Disposition: attachment;filename=\"{$filename}\"");
     header("Cache-Control: max-age=0");
     header("Cache-Control: max-age=1");
     header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
     header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
     header("Cache-Control: cache, must-revalidate");
     header("Pragma: public");

     $writer->save('php://output');
     exit;
     // End function export_excel
 }
 public function export_pdf()
 {
     $kategori = KategoriModel::select( 'kategori_kode', 'kategori_nama')
         ->orderBy('kategori_kode')
         ->get();

     // use Barryvdh\DomPDF\Facade\Pdf;
     $pdf = Pdf::loadView('kategori.export_pdf', ['kategori' => $kategori]);
     $pdf->setPaper('a4', 'portrait'); // set ukuran kertas dan orientasi
     $pdf->setOption('isRemoteEnabled', true); // set true jika ada gambar dari url
     $pdf->render();

     return $pdf->stream('Data Kategori ' . date('Y-m-d H:i:s') . '.pdf');
 }
    // public function index(){
        // $data = [
        //     'kategori_kode' => 'SNK',
        //     'kategori_nama' => 'Snack/Makanan Ringan',
        //     'created_at' => now(),
        // ];
        // DB::table('m_kategori')->insert($data);
        // return 'Insert data baru berhasil ditambahkan';

        //  $row = DB::table('m_kategori')
        // ->where('kategori_kode','SNK')->update(['kategori_nama' => 'Cemilan']);
        // return "Update data baru berhasil. Jumlah data yang diupdate:" .$row. "baris";

        // $row = DB::table('m_kategori')
        // ->where('kategori_kode','SNK')->delete();
        // return "Delete data berhasil. Jumlah data yang dihapus:".$row. "baris";

        // $data = DB::select('select * from m_kategori');
        // return view('kategori', ['data' => $data]);


    // }
}           