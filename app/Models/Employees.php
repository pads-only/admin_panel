<?php

namespace App\Models;

use Database\Factories\EmployeesFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    /** @use HasFactory<EmployeesFactory> */
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'email', 'companies_id', 'phone'];

    public function companies()
    {
        return $this->belongsTo(Companies::class);
    }
}
