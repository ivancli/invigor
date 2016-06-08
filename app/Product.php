<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 8/06/2016
 * Time: 9:30 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        "name", "price", "picture", "description"
    ];
}