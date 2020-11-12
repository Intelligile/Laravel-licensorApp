<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Licensee extends Model
{
    use HasFactory;
    protected $fillable = ['username', 'email', 'password'];


    public function products()
    {

        return $this->belongsToMany(Product::class);
    }
}
