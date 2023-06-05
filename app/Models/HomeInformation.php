<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeInformation extends Model
{
    use HasFactory;
    // can array []
    protected $guarded = [];
    // one by one
    // protected $fillable = [
    //     'short_title',
    //     'long_title'
    // ];
}
