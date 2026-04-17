<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    /** @use HasFactory<\Database\Factories\EmployeesFactory> */
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'email', 'companies_id', 'phone'];


    public function companies()
    {
        return $this->belongsTo(Companies::class);
    }
}
