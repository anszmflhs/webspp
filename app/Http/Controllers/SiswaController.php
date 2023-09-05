<?php

namespace App\Http\Controllers;

use App\Common\CommonDatatable;
use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Pembayaran;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SiswaController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $data = Siswa::with('user','kelas')->latest()->get();
            return CommonDatatable::create($data);
        }
        return view('siswa.index');
    }
    public function create()
    {
        $siswa = Siswa::all();
        $kelas = Kelas::all();
        return view('siswa.create', compact('siswa', 'kelas'));
    }

    public function store(Request $request)
    {
        $inputSiswa = $request->only([
            'user_id',
            'name',
            'nisn',
            'nis',
            'kelas_id',
            'alamat',
            'no_telp',
        ]);
        $inputUser = $request->all();
        $role = $request->input('role');

        $inputUser['password'] = Hash::make('11223344');
        $user = User::create($inputUser);
        $user->assignRole($role);

        $inputSiswa['user_id'] = $user->id;
        Siswa::create($inputSiswa);
        return redirect()->route('siswa.index')->with('success', 'Data berhasil ditambahkan');
    }
    public function edit($id)
    {
        $siswas = Siswa::find($id);
        $kelas = Kelas::all();
        return view('siswa.edit', compact('siswas', 'kelas'));
    }
    public function update(Request $request, $id)
    {
        $inputSiswa = $request->only([
            'name',
            'nisn',
            'nis',
            'kelas_id',
            'alamat',
            'no_telp',
        ]);
        $siswa = $this->validateFind($id);
        $this->validateReq($request, true);

        $siswa->update($inputSiswa);
        return redirect()->route('siswa.index')->with('success', 'Sukses Update Data');
    }
    public function destroy($id)
    {
        $siswas = Siswa::find($id);
        $siswas->delete();
        return response()->json([
            'message' => 'Data berhasil dihapus'
        ]);
    }
    private function validateFind($id)
    {
        $siswa = Siswa::find($id);
        if (!$siswa) {
            return response()->json([
                'error' => 'Siswa not found'
            ]);
        }
        return $siswa;
    }
    private function validateReq(Request $req, bool $isUpdate)
    {
        if ($isUpdate) {
            $req->validate(
                [
                    'name' => 'required|string|max:255',
                    'nisn' => 'required|string|max:10',
                    'nis' => 'required|string|max:10',
                    'alamat' => 'required|string|max:255',
                    'no_telp' => 'required|string|max:20',
                ]
            );
        } else {
            $req->validate(
                [
                    'name' => 'required|string|max:255',
                    'nisn' => 'required|string|max:10',
                    'nis' => 'required|string|max:10',
                    'alamat' => 'required|string|max:255',
                    'no_telp' => 'required|string|max:20',
                ]
            );
        }
    }
}
