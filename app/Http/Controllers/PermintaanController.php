<?php

namespace App\Http\Controllers;

use App\Common\CommonDatatable;
use App\Common\CommonFunction;
use App\Models\BayarSekarang;
use App\Models\Kelas;
use App\Models\Permintaan;
use App\Models\Siswa;
use App\Models\Spp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PermintaanController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $data = Permintaan::with(['user.siswa', 'kelas', 'spp'])->latest()->get();
            return CommonDatatable::create($data);
        }
        return view('permintaan.index');
    }
    public function create()
    {
        $users = User::all();
        $kelas = Kelas::all();
        $spps = Spp::all();
        return view('permintaan.create', compact('users', 'kelas', 'spps'));
    }
    public function store(Request $request)
    {
        $inputPermintaan = $request->all();
        $request->validate([
            'user_id' => 'required',
            'kelas_id' => 'required',
            'spp_id' => 'required',
            // 'tanggal_bayar' => 'required',
            'bukti_pembayaran' => 'required',
            'status' => 'required',
        ]);
        $user = User::find($inputPermintaan['user_id']);
        if (!$user) {
            abort(404);
        }

        $kelas = Kelas::find($inputPermintaan['kelas_id']);
        if (!$kelas) {
            abort(404);
        }
        $spp = Spp::find($inputPermintaan['spp_id']);
        if (!$spp) {
            abort(404);
        }

        $this->validateReq($request, false);
        if ($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('uploads/bukti_pembayaran/', $fileName);
            $inputPermintaan['bukti_pembayaran'] = $fileName;
        }

        // return dd(json_encode($input));
        Permintaan::create($inputPermintaan);
        return redirect()->route('permintaan.index')->with('success', 'Data berhasil ditambahkan');
    }
    public function edit($id)
    {
        $permintaans = Permintaan::find($id);
        $users = User::all();
        $kelas = Kelas::all();
        $spps = Spp::all();
        return view('permintaan.edit', compact('permintaans', 'users', 'kelas', 'spps'));
    }

    // $inputPermintaan = $request->all();
    // $request->validate([
    //     'user_id' => 'required',
    //     'kelas_id' => 'required',
    //     'spp_id' => 'required',
    //     'tanggal_bayar' => 'required',
    //     'bukti_pembayaran' => 'required',
    //     'status' => 'required',
    // ]);

    // Find the Permintaan record and update it
    // $permintaans = $this->validateFind($id);
    // $this->validateReq($request, true);

    // if ($request->hasFile('photo')) {
    //     $path = 'uploads/bukti_pembayaran/' . $permintaans->bukti_pembayaran;
    //     CommonFunction::deleteImage($path);
    //     $file = $request->file('photo');
    //     $extension = $file->getClientOriginalExtension();
    //     $fileName = time() . '.' . $extension;
    //     $file->move('uploads/bukti_pembayaran/', $fileName);
    //     $inputPermintaan['bukti_pembayaran'] = $fileName;
    // }
    // $this->validateReq($request, true);
    // $permintaans->update($inputPermintaan);

    // $bayarsekarang = BayarSekarang::where('id', $id)->first();
    // if ($bayarsekarang) {
    //     $bayarsekarang->update($inputPermintaan);
    // }

    // return redirect()->route('permintaan.index')->with('success', 'Sukses Update Data');

    public function update(Request $request, permintaan $permintaan, $id)
    {
        $bayarsekarang = BayarSekarang::where('id', $id)->first();;
        if ($bayarsekarang) {
            $bayarsekarang->update($bayarsekarang);
        }
        if (empty($request->file('bukti_pembayaran'))) {
            $permintaan::find($id)->update([
                // 'tanggal_bayar' => $request->tanggal_bayar,
                'status' => $request->status,
            ]);
            return redirect()->route('permintaan.index')->with('success', 'Sukses Update Data');
        }
    }

    public function destroy($id)
    {
        // $bayarsekarang = BayarSekarang::where('id', $id)->first();
        // if ($bayarsekarang) {
        //     $bayarsekarang->update($inputPermintaan);
        // }
        // $permintaan = Permintaan::find($id);
        $bayarsekarang = BayarSekarang::where('id', $id)->first();;
        if ($bayarsekarang) {
            $bayarsekarang->delete($bayarsekarang);
        }
        $permintaan = Permintaan::find($id);
        $path = 'uploads/bukti_pembayaran/' . $permintaan->bukti_pembayaran;
        CommonFunction::deleteImage($path);
        $permintaan->delete();
        return response()->json([
            'message' => 'Data berhasil dihapus'
        ]);
    }
    private function validateFind($id)
    {
        $permintaan = Permintaan::find($id);
        if (!$permintaan) {
            return response()->json([
                'error' => 'Permintaan not found'
            ]);
        }
        return $permintaan;
    }
    private function validateReq(Request $req, bool $isUpdate)
    {
        if ($isUpdate) {
            $req->validate(
                [
                    // 'tanggal_bayar' => 'required|date',
                    'bukti_pembayaran' => 'nullable|image|mimes:jpg,jpeg,png|file|max:1024',
                    'status' => 'required|string|in:paid,unpaid',
                ]
            );
        } else {
            $req->validate(
                [
                    // 'tanggal_bayar' => 'required|date',
                    'bukti_pembayaran' => 'nullable|image|mimes:jpg,jpeg,png|file|max:1024',
                    'status' => 'required|string|in:paid,unpaid',
                ]
            );
        }
    }
}
