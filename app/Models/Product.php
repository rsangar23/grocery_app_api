<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public $timestamps = false;

    protected $table = 'grocery_list';

    protected $fillable = [
        'pr_name',
        'pr_quantity',

    ];

    public static function getAll(){
        return self::select('pr_name',
        'pr_quantity')->where('id',1)->get();
    }
}
