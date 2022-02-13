<?php

namespace App\Http\Controllers;

use App\Contracts\ShipInterface;
use App\Http\Requests\StoreShip;
use App\Models\Ship;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

class ShipController extends Controller
{
    /**
     * @return Collection
     */
    public  function all(): Collection
    {
        return Ship::with();
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
    public function edit($id, StoreShip $request, ShipInterface $ship): JsonResponse
    {
        $updatedShip = $ship->refine($request->validated())->edit($id);

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
