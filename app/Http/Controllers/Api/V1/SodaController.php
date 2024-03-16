<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSodaRequest;
use App\Http\Requests\UpdateSodaRequest;
use App\Http\Resources\SodaResource;
use App\Models\Soda;
use Illuminate\Http\Request;


class SodaController extends Controller
{
    /**
     * GET api/sodas
     */

    public function index(Request $request)
    {
        $name = $request->query('name');
        $brand = $request->query('brand');

        // Query builder with conditions for name and brand
        $query = Soda::query();

        if ($name && $brand) {
            $query->where('name', 'LIKE', '%' . $name . '%')
                ->whereHas('brand', function ($query) use ($brand) {
                    $query->where('name', 'LIKE', '%' . $brand . '%');
                });
        } elseif ($name) {
            $query->where('name', 'LIKE', '%' . $name . '%');
        } elseif ($brand) {
            $query->whereHas('brand', function ($query) use ($brand) {
                $query->where('name', 'LIKE', '%' . $brand . '%');
            });
        }

        // Execute the query
        $sodas = $query->get();

        return SodaResource::collection($sodas);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * POST api/sodas
     */
    public function store(StoreSodaRequest $request)
    {
        $soda = Soda::create($request->validated());
        return SodaResource::make($soda);
    }

    /**
     * GET api/sodas by id
     */
    public function show(Soda $soda)
    {
        return SodaResource::make($soda);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Soda $soda)
    {
        //
    }

    /**
     * PUT PATCH api/sodas
     */
    public function update(UpdateSodaRequest $request, Soda $soda)
    {
        $soda->update($request->validated());
        return SodaResource::make($soda);
    }

    /**
     * DELETE api/sodas
     */
    public function destroy(Soda $soda)
    {
        $soda->delete();
        return response()->noContent();
    }
}
