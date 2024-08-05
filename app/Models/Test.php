<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
    // protected $table="demo";
    // protected $primaryKey = "tests_id";
    protected $fillable = ["id","name"];
    protected $hidden = ["id"];
    // public $timestamps = false;
}
