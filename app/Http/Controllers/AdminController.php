<?php

namespace App\Http\Controllers;

use App\Common\CommonDatatable;
use App\Common\CommonFunction;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:create-admin'])->only(['create','store']);
        $this->middleware(['permission:read-admin'])->only(['index']);
        $this->middleware(['permission:update-admin'])->only(['edit', 'update']);
        $this->middleware(['permission:delete-admin'])->only(['destroy']);
    }
    public function index()
    {
        if (request()->ajax()) {
            $data = Admin::with('user')->latest()->get();
            return CommonDatatable::create($data);
        }
        return view('admin.index');
    }
    public function store(Request $request)
    {
        $inputAdmin = $request->only([
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
            $file->move('uploads/admin/', $fileName);
            $inputAdmin['photo'] = $fileName;
        }
        $inputUser['password'] = Hash::make('11223344');
        $user = User::create($inputUser);
        $user->assignRole($role);

        $inputAdmin['user_id'] = $user->id;
        Admin::create($inputAdmin);
        return redirect()->route('admin.index')->with('success', 'Data berhasil ditambahkan');
    }
    public function create()
    {
        $admin = Admin::all();
        return view('admin.create', compact('admin'));
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
    public function edit($id)
    {
        $admin = Admin::find($id);
        return view('admin.edit', compact('admin'));
    }
    public function update(Request $request, $id)
    {
        $inputAdmin = $request->only([
            'photo',
            'name',
            'contact',
            'hire_date',
            'gender',
            'address',
        ]);
        $admin = $this->validateFind($id);
        $this->validateReq($request, true);

        if ($request->hasFile('photo')) {
            $path = 'uploads/admin/' . $admin->photo;
            CommonFunction::deleteImage($path);
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('uploads/admin/', $fileName);
            $inputAdmin['photo'] = $fileName;
        }
        $admin->update($inputAdmin);
        return redirect()->route('admin.index')->with('success', 'Sukses Update Data');
    }
    public function destroy($id)
    {
        $admin = $this->validateFind($id);
        $path = 'uploads/admin/' . $admin->photo;
        CommonFunction::deleteImage($path);
        $admin->delete();
        return response()->json([
            'message' => 'Data berhasil dihapus'
        ]);
    }
    private function validateFind($id)
    {
        $admin = Admin::find($id);
        if (!$admin) {
            return response()->json([
                'error' => 'Admin not found'
            ]);
        }
        return $admin;
    }
}
