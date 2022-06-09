<?php

namespace App\Filters;

use Illuminate\Database\Query\Builder;

class ProductFilter extends \App\Filters\QueryFilter
{
    public function width($param)
    {
        return $this->builder->where('width', '=', $param);
    }

    public function height($param)
    {
        return $this->builder->where('height', '=', $param);
    }

    public function materials($param)
    {
        return $this->builder->whereHas('components', function (\Illuminate\Database\Eloquent\Builder $query) use ($param) {
            $query->where('components.id', '=', $param);
        });
    }

    public function materials2($param)
    {
        return $this->builder->whereHas('components', function (\Illuminate\Database\Eloquent\Builder $query) use ($param) {
            $query->where('components.id', '=', $param);
        });
    }

    public function sort($param)
    {
        if ($param[0] == 'price2') {
            $param[1] = 'desc';
            $param[0] = 'price';
        } else {
            $param[1] = 'asc';
        }
        return $this->builder->orderBy("$param[0]", "$param[1]");
    }
    public function query($param){
        $param = join(',',$param);
        return $this->builder->whereHas('components', function (\Illuminate\Database\Eloquent\Builder $query) use ($param) {
            $query->where('components.materials', 'LIKE', '%'.$param.'%');
        })->orWhere('name', '=', $param);
    }
}
