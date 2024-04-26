<?php

namespace App\Models;

use App\Models\klpcm;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dpjp extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('dokter', 'like', '%'.$search.'%');
        });
    }

    public function klpcms()
    {
        return $this->hasMany(klpcm::class);
    }

    public function klpcm()
    {
        return $this->hasMany(klpcm::class);
    }
    public function klpcmtidaklengkap()
    {
        return $this->hasMany(klpcm::class);
    }


}
