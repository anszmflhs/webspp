<?php

namespace App\Http\Controllers;

use App\Common\CommonDatatable;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        return response()->json(
            [
                'status' => true,
                'data' => $kelas,
            ]
        );
    }
    public function store($id)
    {
        $kelas = Kelas::find($id);
        if (!$kelas) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Service Manage Not Found'
                ],
                404
            );
        }
        return response()->json(
            [
                'status' => true,
                'data' => $kelas
            ]
        );
    }
    public function create(Request $request)
    {
        $data = $request->all();
        $rules = [
            'jurusan' => 'required',
        ];

        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return response()->json(
                [
                    'status' => false,
                    'message' => $validator->errors()
                ],
                400
            );
        }

        $kelas = Kelas::create($data);

        return response()->json([
            'status' => true,
            'data' => $kelas,
        ]);
    }
}
