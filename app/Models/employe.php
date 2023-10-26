<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employe extends Model
{
    protected $table = 'employe';
    protected $primaryKey = 'id';
    protected $fillable = ['name','email','address','mobile'];
    use HasFactory;
}
