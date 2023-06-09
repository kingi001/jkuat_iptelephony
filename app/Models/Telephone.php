<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telephone extends Model
{
    protected $table="trialexcel";
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'ccode',
        'extnumber',
        'owerassigned',
        'deptname'
    ];
    public function campus()
    {
        return $this->belongsTo('App\Models\Campus', 'ccode', 'ccode');
    }
    public function department()
    {
        return $this->belongsTo('App\Models\Department', 'deptname', 'deptname');
    }
    use HasFactory;
}
