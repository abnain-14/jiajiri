<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreeProfile extends Model
{
    use HasFactory;
    protected $table = 'freeprofile';
    protected $primaryKey = 'id';
    protected $fillable = ['about_me', 'resume', 'contact'];
}
