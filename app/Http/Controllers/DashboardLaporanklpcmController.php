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

        return view('dashboard.laporanklpcm.index', [
            'dpjps' => Dpjp::query()
            ->withCount(['klpcms' => function(Builder $query){
                    $query = $this->applyDateFilter($query);
            }])
            ->withCount(['klpcm' => function(Builder $query){
                $query = $this->applyDateFilter($query);
                $query->where(function($query){
                    $query->where('rm3', '<>', 1)->Where('rm4', '<>', 1)->Where('rm8a', '<>', 1)->Where('rm8b', '<>', 1)->Where('rm9a', '<>', 1)->Where('rm9b', '<>', 1)->Where('rm9c', '<>', 1)->Where('rm9d', '<>', 1)->Where('rm9e', '<>', 1)->Where('rm9f', '<>', 1)->Where('rm9g', '<>', 1)->Where('rm9h', '<>', 1)->Where('rm9l', '<>', 1)->Where('rm15a', '<>', 1);
                });
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
    private function applyDateFilter($query) {
        if(request('date_start') && request('date_end')) {
            $date_start = request('date_start');
            $date_end = request('date_end');
            return $query->whereBetween('tgl_keluar', [$date_start, $date_end]);
        } else {
            $currentMonth = Carbon::now()->month;
            $currentYear = Carbon::now()->year;
            return $query->whereBetween('tgl_keluar', [
                Carbon::createFromDate($currentYear, $currentMonth, 1)->startOfMonth(),
                Carbon::createFromDate($currentYear, $currentMonth, 1)->endOfMonth()
            ]);
        }  
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
