<?php

namespace App\Tenant;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;


class TenantScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        if(\Tenant::getTenant()){
            $userId = \Tenant::getTenant()->id;
            $builder->where('user_id', $userId);
        }
    }
}
