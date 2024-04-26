<?php

namespace App\Http\Controllers;

use App\Models\Pengembalian;
use Illuminate\Http\Request;

class DashboardCetakController extends Controller
{
    
    public function pengembalian(){
        return view('dashboard.pengembalian.cetak',[
            'pengembalians' => Pengembalian::with(['dpjp','ruang'])->latest()->filter(request(['search','dpjp_id','status']))->get()
        ]);
    }
}
