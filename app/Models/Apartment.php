<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;   

    protected $primaryKey = 'ext_id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [ 
        'ext_id',             
        'name',
        'description',
        'quantity',
        'active',
        'deleted_at'       
    ];

    //Assign the AP- id with autoincrements.
    /*
    public static function boot()
    {
        parent::boot();

        static::created(function($apartment) {
            $apartment->ext_id = 'AP-' . $apartment->id;
            $apartment->save();
        });
    }
    */
}
