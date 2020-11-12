<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;
    protected $fillable =['product_key','descriptif_name','description','price'];


    public function licensees(){

        return $this->belongsToMany(Licensee::class);

    }

}
