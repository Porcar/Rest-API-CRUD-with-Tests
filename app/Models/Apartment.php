<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Apartment extends Model
{
    use HasFactory;
    use SoftDeletes;

    //Set the primary key in the table to "ext_id"
    protected $primaryKey = 'ext_id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [           
        'name',
        'description',
        'quantity',
        'active',
        'deleted_at'       
    ];

    //This will make the "id" field in the table autoincrement and assign that value to the AP- primary key.
    public static function boot()
    {
        parent::boot();
        self::creating(function ($apartment) {            
            $apartment->id = $apartment->max('id') + 1;           
            $apartment->ext_id = 'AP-' . $apartment->id;            
        });
    }
}
