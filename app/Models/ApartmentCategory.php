<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApartmentCategory extends Model
{
    use HasFactory;

    protected $primaryKey = 'ext_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'ext_id',
        'title',
        'description'        
    ];
}
