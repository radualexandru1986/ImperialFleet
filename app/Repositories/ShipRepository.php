<?php

namespace App\Repositories;

use App\Contracts\ShipInterface;
use App\Models\Ship;
use Illuminate\Database\Eloquent\Model;

class ShipRepository extends BaseRepository implements ShipInterface
{

    /**
     * @param ShipInterface $ship
     */
    public function __construct(Ship $ship)
    {
       $this->model =  $ship;
    }
    /**
     * Refine the data.
     *
     * @param array $data
     * @return ShipRepository
     */
    public function refine(array $data): static
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Overwrites the parent update in order to attach some data to the pivot table
     *
     * @param int $id
     * @return string|Model
     */
    public function update(int $id): string|Model
    {
        if ($this->data['armaments']) {
            if(!$this->model->find($id)){
                throw new \Exception('The resource is not in the DB');
            }
            $this->model->find($id)->armaments()->sync($this->data['armaments']);
        }
        return parent::update($id);
    }
}
