<?php

namespace App\Models;

use App\Models\Area;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    public $fillable = [
        'area_id',
        'code',
        'name',
        'age',
    ];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
