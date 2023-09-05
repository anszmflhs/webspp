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
            'tanggal_bayar' => 'required',
            // 'status' => 'required',
        ]);
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
}
