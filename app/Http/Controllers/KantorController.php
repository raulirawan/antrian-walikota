<?php

namespace App\Http\Controllers;

use App\Kantor;
use Illuminate\Http\Request;

class KantorController extends Controller
{
    public function getKantor($id)
    {
        $kantor = Kantor::where('id', $id)->first();

        if($kantor) {
            return response()->json([
                'status' => 'success',
                'data' => $kantor,
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'data' => NULL,
            ]);
        }
    }
}
