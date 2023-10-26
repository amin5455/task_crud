<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class save_file extends Model
{
    use HasFactory;
    protected $fillable = ['file_name'];
}
