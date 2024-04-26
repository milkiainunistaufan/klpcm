<?php

namespace App\Models;

use App\Models\Pengembalian;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ruang extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, function($query,$search){
            return $query->where('nama_ruang', 'like', '%'.$search.'%');
        });
    }
    public function pengembalians()
    {
        return $this->hasMany(Pengembalian::class);
    }
}
