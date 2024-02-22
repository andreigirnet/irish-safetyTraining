<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'course_name', 'status', 'certificate_id', 'product_id', 'paidToTrainer'];
}
