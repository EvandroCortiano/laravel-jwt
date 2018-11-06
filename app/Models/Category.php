<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Tenant\TenantModels;

class Category extends Model
{
    use TenantModels;

    protected $fillable = ['name'];

}
