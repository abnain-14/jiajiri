<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobRequest extends Model
{
    use HasFactory;
    protected $table = 'jobrequest';
    protected $primaryKey = 'id';
    protected $fillable = ['job_title', 'amount', 'job_description' ,'job_qualification'];
}

