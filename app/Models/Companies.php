<?php

namespace App\Models;

use Database\Factories\CompaniesFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    /** @use HasFactory<CompaniesFactory> */
    use HasFactory;

    protected $fillable = ['name', 'email', 'logo', 'website'];
}
