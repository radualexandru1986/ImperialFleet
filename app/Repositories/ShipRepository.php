<?php

namespace App\Repositories;

use App\Contracts\ShipInterface;

class ShipRepository extends BaseRepository implements ShipInterface
{
    /**
     * Refine the data.
     *
     * @param array $data
     */
    public function refine(array $data)
    {
        $this->data = $data;

        return $this;
    }
}
