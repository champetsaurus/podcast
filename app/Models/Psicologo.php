<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Psicologo extends Model
{
    use HasFactory;
    protected $table = 'psicologo';
    protected $guarded = ['id'];
    public $timestamps = false;
}
