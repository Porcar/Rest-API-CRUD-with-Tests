<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    protected $primaryKey = 'ext_id';

    protected $fillable = [
        'ext_id',
        'name',
        'description',
        'quantity',
        'active',
        'deleted_at'       
    ];
}
