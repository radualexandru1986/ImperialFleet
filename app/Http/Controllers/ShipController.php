<?php

namespace App\Http\Controllers;

use App\Contracts\ShipInterface;
use App\Http\Requests\StoreShip;
use App\Http\Requests\UpdateShip;
use App\Models\Ship;
use App\Refineries\ShipRefinery;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ShipController extends Controller
{

    /**
     * Returns all ships.
     *
     * @return Collection
     */
    public  function all(Request $request)
    {
        return ShipRefinery::allShips($request->get('filters'));
    }


    /**
     * Finds and returns a specific Ship
     *
     * @param $id
     * @return mixed
     */
    public function view($id): mixed
    {
        return ShipRefinery::with('armaments')->find($id);
    }

    /**
     * Store a resource;
     *
     * @param StoreShip $request
     * @param ShipInterface $ship
     */
    public function store(StoreShip $request, ShipInterface $ship): JsonResponse
    {
        $newShip = $ship->refine($request->validated())->store();

        return response()->json([
            "success" => (bool)$newShip,
        ]);
    }

    /**
     * Update a resource
     *
     * @param $id
     * @param StoreShip $request
     * @param ShipInterface $ship
     * @return JsonResponse
     */
    public function update($id, UpdateShip $request, ShipInterface $ship): JsonResponse
    {

        $updatedShip = $ship->refine($request->validated())->update($id);

        return response()->json([
            "success" => (bool)$updatedShip,
        ]);
    }

    /**
     * Finds and deletes a resource
     *
     * @param $id
     * @param ShipInterface $ship
     * @return JsonResponse
     */
    public function delete($id, ShipInterface $ship): JsonResponse
    {
        $result = $ship->delete($id);

        return response()->json([
            "success" => (bool)$result,
        ]);
    }
}
