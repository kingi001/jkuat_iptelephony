<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'depts';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'ccode',
        'deptcode',
        'ownerassigned',
        'deptname'
    ];
    public function scopeDistinctDepartments($query)
    {
        return $query->select('deptname', 'id')->distinct()->pluck('deptname', 'id');
    }

    public function campus()
    {
        return $this->belongsTo('App\Models\Campus', 'ccode', 'ccode');
    }
    use HasFactory;
}
