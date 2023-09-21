<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use Illuminate\Http\Request;

class SppController extends Controller
{
    public function index()
    {
        $spp = Spp::all();
        return response()->json(
            [
                'status' => true,
                'data' => $spp,
            ]
        );
    }
}
