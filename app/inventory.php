<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inventory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uid', 'mac', 'manufacturer', 'model', 'serial', 'product', 'vendor', 'dateIssued',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    /*protected $hidden = [
        'uid', 'mac', 'model', 'serial', 'product'
    ];*/
}
