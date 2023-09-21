<?php

namespace App\Http\Controllers;

use App\Common\CommonDatatable;
use App\Models\BayarSekarang;
use App\Models\Kelas;
use App\Models\Permintaan;
use App\Models\Spp;
use App\Models\User;
use Illuminate\Http\Request;

class BayarSekarangController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $data = BayarSekarang::with(['user.siswa', 'kelas', 'spp'])->latest()->get();
            return CommonDatatable::create($data);
        }
        return view('bayarsekarang.index');
    }
    // public function indexs()
    // {
    //     $bayarsekarang = BayarSekarang::all();
    //     return response()->json(
    //         [
    //             'status' => true,
    //             'data' => $bayarsekarang,
    //         ]
    //     );
    // }

    public function indexs()
    {
        $userId = auth()->user()->id;
        $bayarsekarangs = BayarSekarang::with(['user.siswa', 'kelas', 'spp'])
        ->where('user_id', $userId)
        ->orderBy('id','desc')->get();
        return response()->json(
            [
                'status' => true,
                'data' => $bayarsekarangs,
            ]
        );
    }

    public function creates(Request $request)
    {
        $data = $request->all();
        $bayarsekarang = BayarSekarang::create($data);
        $bayarsekarang = Permintaan::create($data);

        return response()->json([
            'status' => true,
            'data' => $bayarsekarang,
        ]);
    }
    public function create()
    {
        $users = User::all();
        $kelas = Kelas::all();
        $spps = Spp::all();
        return view('bayarsekarang.create', compact('users', 'kelas', 'spps'));
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $request->validate([
            'user_id' => 'required',
            'kelas_id' => 'required',
            'spp_id' => 'required',
            'bukti_pembayaran' => 'required',
            // 'status' => 'required',
        ]);

        $this->validateReq($request, false);
        if ($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('uploads/bukti_pembayaran/', $fileName);
            $input['bukti_pembayaran'] = $fileName;
        }
        $user = User::find($input['user_id']);
        if (!$user) {
            abort(404);
        }

        $spp = Spp::find($input['spp_id']);
        if (!$spp) {
            abort(404);
        }

        $input['status'] = "Unpaid";

        // return dd(json_encode($input));
        BayarSekarang::create($input);
        Permintaan::create($input);
        return redirect()->route('bayarsekarang.index')->with('success', 'Data berhasil ditambahkan');
    }
    private function validateReq(Request $req, bool $isUpdate)
    {
        if ($isUpdate) {
            $req->validate(
                [
                    'bukti_pembayaran' => 'nullable|image|mimes:jpg,jpeg,png|file|max:1024',
                ]
            );
        } else {
            $req->validate(
                [
                    'bukti_pembayaran' => 'nullable|image|mimes:jpg,jpeg,png|file|max:1024',
                ]
            );
        }
    }
}
