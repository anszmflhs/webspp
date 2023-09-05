<?php

namespace App\Http\Controllers;

use App\Common\CommonDatatable;
use App\Common\CommonFunction;
use App\Http\Controllers\Controller;
use App\Models\Petugas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['permission:create-petugas'])->only(['create','store']);
        // $this->middleware(['permission:read-petugas'])->only(['index']);
        // $this->middleware(['permission:update-petugas'])->only(['edit', 'update']);
        // $this->middleware(['permission:delete-petugas'])->only(['destroy']);
    }
    public function index()
    {
        if (request()->ajax()) {
            $data = Petugas::with('user')->latest()->get();
            return CommonDatatable::create($data);
        }
        return view('petugas.index');
    }
    public function store(Request $request)
    {
        $inputPetugas = $request->only([
            'photo',
            'name',
            'contact',
            'hire_date',
            'gender',
            'address',
            'user_id'
        ]);
        $inputUser = $request->all();
        // return dd(json_encode($request->all()));

        $role = $request->input('role');
        $this->validateReq($request, false);
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('uploads/petugas/', $fileName);
            $inputPetugas['photo'] = $fileName;
        }
        $inputUser['password'] = Hash::make('11223344');
        $user = User::create($inputUser);
        $user->assignRole($role);

        $inputPetugas['user_id'] = $user->id;
        Petugas::create($inputPetugas);
        return redirect()->route('petugas.index')->with('success', 'Data berhasil ditambahkan');
    }
    public function create()
    {
        $petugas = Petugas::all();
        return view('petugas.create', compact('petugas'));
    }
    public function edit($id)
    {
        $petugas = Petugas::find($id);
        return view('petugas.edit', compact('petugas'));
    }
    public function update(Request $request, $id)
    {
        $inputPetugas = $request->only([
            'photo',
            'name',
            'contact',
            'hire_date',
            'gender',
            'address',
        ]);
        $petugas = $this->validateFind($id);
        $this->validateReq($request, true);

        if ($request->hasFile('photo')) {
            $path = 'uploads/petugas/' . $petugas->photo;
            CommonFunction::deleteImage($path);
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('uploads/petugas/', $fileName);
            $inputPetugas['photo'] = $fileName;
        }
        $petugas->update($inputPetugas);
        return redirect()->route('petugas.index')->with('success', 'Sukses Update Data');
    }
    public function destroy($id)
    {
        $petugas = $this->validateFind($id);
        $path = 'uploads/petugas/' . $petugas->photo;
        CommonFunction::deleteImage($path);
        $petugas->delete();
        return response()->json([
            'message' => 'Data berhasil dihapus'
        ]);
    }
    private function validateFind($id)
    {
        $petugas = Petugas::find($id);
        if (!$petugas) {
            return response()->json([
                'error' => 'Petugas not found'
            ]);
        }
        return $petugas;
    }
    private function validateReq(Request $req, bool $isUpdate)
    {
        if ($isUpdate) {
            $req->validate(
                [
                    'photo' => 'nullable|image|mimes:jpg,jpeg,png|file|max:1024',
                    'name' => 'required|string|max:255',
                    'contact' => 'required|string|max:20',
                    'hire_date' => 'required|date',
                    'gender' => 'required|string|in:L,P',
                    'address' => 'nullable|string',
                ]
            );
        } else {
            $req->validate(
                [
                    'photo' => 'nullable|image|mimes:jpg,jpeg,png|file|max:1024',
                    'name' => 'required|string|max:255',
                    'contact' => 'required|string|max:20',
                    'hire_date' => 'required|date',
                    'gender' => 'required|string|in:L,P',
                    'address' => 'nullable|string',
                ]
            );
        }
    }
}
