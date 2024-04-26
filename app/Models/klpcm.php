<?php

namespace App\Models;

use App\Models\Dpjp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class klpcm extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters){


        $query->when($filters['search'] ?? false, function($query, $search){
            return $query
            ->where('pasien','like', '%'. $search.'%')
            ->where(function($query){
                $query->where('cara_bayar','umum');
            })
            ->orWhere('no_rm','like', '%'. $search.'%')
            ->where(function($query){
                $query->where('cara_bayar','umum');
            })
            ->orWhere('kelamin', 'like', '%'.$search.'%')
            ->where(function($query){
                $query->where('cara_bayar','umum');
            });
        });

        $query->when($filters['dpjp_id'] ?? false, function($query, $dpjp_id){
            return $query
            ->where('dpjp_id', $dpjp_id)
            ->where(function($query){
                $query->where('cara_bayar','umum');
            });
        });

    }
    public function scopeBpjs($query, array $filters){


        $query->when($filters['search'] ?? false, function($query, $search){
            return $query
            ->where('pasien','like', '%'. $search.'%')
            ->where(function($query){
                $query->where('cara_bayar','bpjs');
            })
            ->orWhere('no_rm','like', '%'. $search.'%')
            ->where(function($query){
                $query->where('cara_bayar','bpjs');
            })
            ->orWhere('kelamin', 'like', '%'.$search.'%')
            ->where(function($query){
                $query->where('cara_bayar','bpjs');
            });
        });

        $query->when($filters['dpjp_id'] ?? false, function($query, $dpjp_id){
            return $query
            ->where('dpjp_id', $dpjp_id)
            ->where(function($query){
                $query->where('cara_bayar','bpjs');
            });
        });

    }

    public function dpjp()
    {
        return $this->belongsTo(Dpjp::class);
    }
}
