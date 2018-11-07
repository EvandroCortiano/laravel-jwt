<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Tenant\TenantModels;
use Illuminate\Foundation\Auth\User;

class Category extends Model
{
    use TenantModels;

    protected $fillable = ['name'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function billPays(){
        return $this->hasMany(BillPay::class);
    }

}
