<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApartmentCategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    //Set the primary key in the table to "ext_id"
    protected $primaryKey = 'ext_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'ext_id',
        'title',
        'description'        
    ];
}
