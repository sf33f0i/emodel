<?php

namespace App\Filters;

use Illuminate\Database\Query\Builder;

class OrderFilter extends \App\Filters\QueryFilter
{
    public function status($param)
    {
        return $this->builder->where('status', '=', $param);
    }
    public function search($param){
        return $this->builder->where('email', 'LIKE', "%$param[0]%")
            ->orWhere('id', 'LIKE', "%$param[0]%")
            ->orWhere('name', 'LIKE', "%$param[0]%");
    }
}

