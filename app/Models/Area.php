<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{
    use HasFactory, softDeletes;

    public $fillable = [
        'name',
        'code',
    ];

    public function customers()
    {
        return $this->belongsTo(Customer::class);
    }
}
