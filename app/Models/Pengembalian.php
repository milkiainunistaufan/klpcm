<?php

namespace App\Models;

use App\Models\Dpjp;
use App\Models\Ruang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengembalian extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('no_rm','like', '%'. $search.'%')
            ->orWhere('pasien', 'like', '%'. $search.'%')
            ->orWhere('kelamin', 'like', '%'. $search.'%');
        });
        $query->when($filters['dpjp_id'] ?? false, function($query, $dpjp_id){
            return $query->wherehas('dpjp', function($query) use($dpjp_id) {
                $query->where('dpjp_id', $dpjp_id);
            });
        });

        $query->when($filters['status'] ?? false, function($query, $status){
            return $query->where('status',$status);
        });
    }
    
    public function dpjp()
    {
        return $this->belongsTo(Dpjp::class);
    }
    public function ruang()
    {
        return $this->belongsTo(Ruang::class);
    }
}
