<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index(UserDataTable $dataTable)
    {
        // $user = UserModel::find(1);
        // $user = UserModel::where('level_id', 1)->first();
        // $user = UserModel::firstWhere('level_id', 1);

        // $user = UserModel::findOr(1, ['username', 'nama'],function (){
        //    abort(404); 
        // });
        // $user = UserModel::findOr(20, ['username', 'nama'],function (){
        //     abort(404); 
        //  });

        // $user = UserModel::findOrfail(1);
        // $user = UserModel::where('username', 'manager9')->firstOrFail();
        // $user = UserModel::where('level_id', 2)->count();
        // dd($user);

        // $user = UserModel::firstOrCreate([
        //     'username' => 'manager',
        //     'nama' => 'Manager',
        // ]);

        // $user = UserModel::firstOrCreate([
        //     'username' => 'manager22',
        //     'nama' => 'Manager Dua Dua',
        //     'password' => Hash::make('12345'),
        //     'level_id' => 2
        // ]);

        // $user = UserModel::firstOrNew([
        //         'username' => 'manager',
        //         'nama' => 'Manager',
        //     ]);

        // $user = UserModel::firstOrNew([
        //     'username' => 'manager33',
        //     'nama' => 'Manager Tiga Tiga',
        //     'password' => Hash::make('12345'),
        //     'level_id' => 2
        // ]);
        // $user->save();
        // return view('user', ['data' => $user]);

        // $user = UserModel::create([
        //     'username' => 'manager55',
        //     'nama' => 'Manager55',
        //     'password' => Hash::make('12345'),
        //     'level_id' => 2
        // ]);

        // $user->username = 'manager56';

        // $user->isDirty();
        // $user->isDirty('username');
        // $user->isDirty('nama');
        // $user->isDirty('nama', 'username');

        // $user->isClean();
        // $user->isClean('username');
        // $user->isClean('nama');
        // $user->isClean('nama', 'username');        

        // $user->save();

        // $user->isDirty();
        // $user->isClean();
        // dd($user->isDirty());

        // $user = UserModel::create([
        //     'username' => 'manager11',
        //     'nama' => 'Manager11',
        //     'password' => Hash::make('12345'),
        //     'level_id' => 2
        // ]);

        // $user->username = 'manager12';

        // $user->save();

        // $user->wasChanged();
        // $user->wasChanged('username');
        // $user->wasChanged('username', 'level_id');
        // $user->wasChanged('nama');
        // dd($user->wasChanged('nama', 'username'));


        // $user = UserModel::all();
        // return view('user', ['data' => $user]);

        // $user = UserModel::with('level')->get();
        // dd($user);

        // $user = UserModel::with('level')->get();
        // return view('user', ['data' => $user]);
        return $dataTable->render('user.user');

    }

    public function create()
    {
        return view('user_tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'level_id' => 'required|exists:m_level,level_id',
            'username' => 'required|string|max:20',
            'nama' => 'required|string|max:100',
            'password' => 'required|string',
        ]);

        UserModel::create([
            'level_id' => $request->level_id,
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index')->with('success', 'User berhasil dibuat');
    }

    public function edit($id)
    {
        $user = UserModel::find($id);
        return view('user.form', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = UserModel::find($id);

        $user->username = $request->username;
        $user->nama = $request->nama;
        $user->password = Hash::make('$request->password');
        $user->level_id = $request->level_id;

        $user->save();

        return redirect('/users');
    }

    public function destroy($id)
    {
        $user = UserModel::find($id);
        $user->delete();
        
        return redirect('/users');
    }
}