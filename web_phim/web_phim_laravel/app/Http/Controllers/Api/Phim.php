<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ApiPhim;

class Phim extends Controller
{
    public function index(ApiPhim $api)
    {
        // return "api hi thien";
        $Phim = $api->index();
        $data = [
            'status' => 200,
            'data' => $Phim
        ];
        return response()->json($data, 200);
    }
}
