<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    protected $table = "campuses";
    protected $fillable=["cid","ccode","cname","addedby"];
    protected $primarykey = "ccode";
    public $timestamps = false ;
    use HasFactory;
}
