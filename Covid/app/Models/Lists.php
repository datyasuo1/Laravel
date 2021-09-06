<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lists extends Model
{
    use HasFactory;

    protected $table = 'list';
    protected $primaryKey = 'id';
    protected $guarded = [];
    public $timestamps=false;
}
