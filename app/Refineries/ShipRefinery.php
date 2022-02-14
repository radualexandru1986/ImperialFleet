<?php

namespace App\Refineries;

use App\Models\Ship;

class ShipRefinery extends Ship
{
    /**
     * @var string[]
     */
    protected $hidden = ['armament_id', 'created_at', 'updated_at'];

    /**
     *
     *
     * @param array $filters
     * @return mixed
     */
    public static function allShips($filters = [])
    {
        $column = data_get($filters, 'orderBy') ? $filters['orderBy'] : 'name';
        $direction = data_get($filters, 'direction') ? $filters['direction'] : 'asc';

        return parent::select('id', 'name', 'status')->orderBy($column, $direction)->get();
    }

}
