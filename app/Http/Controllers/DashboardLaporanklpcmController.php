<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Dpjp;
use App\Models\klpcm;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class DashboardLaporanklpcmController extends Controller
{
    public function index()
    {
        // Query utama Dpjp tanpa filter tanggal (karena 'tgl_keluar' tidak ada di tabel Dpjp)
        $dpjps = Dpjp::query();
    
        // Terapkan filter dan hitung menggunakan whereHas agar filter benar-benar diterapkan
        $dpjps = $dpjps->withCount([
            'klpcm' => function (Builder $query) {
                $query = $this->applyDateFilter($query); // Terapkan filter tanggal di relasi 'klpcm'
                
                $query->where(function ($query) {
                    $query->where('rm3', '<>', 1)
                          ->where('rm4', '<>', 1)
                          ->where('rm8a', '<>', 1)
                          ->where('rm8b', '<>', 1)
                          ->where('rm9a', '<>', 1)
                          ->where('rm9b', '<>', 1)
                          ->where('rm9c', '<>', 1)
                          ->where('rm9d', '<>', 1)
                          ->where('rm9e', '<>', 1)
                          ->where('rm9f', '<>', 1)
                          ->where('rm9g', '<>', 1)
                          ->where('rm9h', '<>', 1)
                          ->where('rm9l', '<>', 1)
                          ->where('rm15a', '<>', 1);
                });
            },
            'klpcmtidaklengkap' => function (Builder $query) {
                $query = $this->applyDateFilter($query); // Terapkan filter tanggal di relasi 'klpcmtidaklengkap'
                
                $query->where(function ($query) {
                    $query->where('rm3', '<>', 0)
                          ->orWhere('rm4', '<>', 0)
                          ->orWhere('rm8a', '<>', 0)
                          ->orWhere('rm8b', '<>', 0)
                          ->orWhere('rm9a', '<>', 0)
                          ->orWhere('rm9b', '<>', 0)
                          ->orWhere('rm9c', '<>', 0)
                          ->orWhere('rm9d', '<>', 0)
                          ->orWhere('rm9e', '<>', 0)
                          ->orWhere('rm9f', '<>', 0)
                          ->orWhere('rm9g', '<>', 0)
                          ->orWhere('rm9h', '<>', 0)
                          ->orWhere('rm9l', '<>', 0)
                          ->orWhere('rm15a', '<>', 0);
                });
            },
            
        ])
        ->withCount(['klpcms' => function (Builder $query){
            $query = $this->applyDateFilter($query);
        }])
        ->latest()->get();
        return view('dashboard.laporanklpcm.index', [            
            'dpjps' => $dpjps
        ]);
    }
    
    
    private function applyDateFilter($query)
    {
        $date_start = request('date_start') ?: Carbon::now()->startOfMonth();
        $date_end = request('date_end') ?: Carbon::now()->endOfMonth();

        return $query->whereBetween('tgl_keluar', [$date_start, $date_end]);
        }
    public function cetakLaporan()
    {
        return view('dashboard.laporanklpcm.cetaklaporan', [
            'dpjps' => Dpjp::query()
            ->withCount(['klpcms' => function(Builder $query){
                $query = $this->applyDateFilter($query);
            }])
            ->withCount(['klpcm' => function(Builder $query){
                $query = $this->applyDateFilter($query);
                $query->where('rm3', '<>', 1)->Where('rm4', '<>', 1)->Where('rm8a', '<>', 1)->Where('rm8b', '<>', 1)->Where('rm9a', '<>', 1)->Where('rm9b', '<>', 1)->Where('rm9c', '<>', 1)->Where('rm9d', '<>', 1)->Where('rm9e', '<>', 1)->Where('rm9f', '<>', 1)->Where('rm9g', '<>', 1)->Where('rm9h', '<>', 1)->Where('rm9l', '<>', 1)->Where('rm15a', '<>', 1);
            }
            ])
            ->withCount(['klpcmtidaklengkap' => function(Builder $query){
                $query = $this->applyDateFilter($query);
                $query->where(function($query){
                    $query->where('rm3', '<>', 0)->orWhere('rm4', '<>', 0)->orWhere('rm8a', '<>', 0)->orWhere('rm8b', '<>', 0)->orWhere('rm9a', '<>', 0)->orWhere('rm9b', '<>', 0)->orWhere('rm9c', '<>', 0)->orWhere('rm9d', '<>', 0)->orWhere('rm9e', '<>', 0)->orWhere('rm9f', '<>', 0)->orWhere('rm9g', '<>', 0)->orWhere('rm9h', '<>', 0)->orWhere('rm9l', '<>', 0)->orWhere('rm15a', '<>', 0);
                });
            }
            ])
            ->latest()
            ->get()
        ]);
    }
}
