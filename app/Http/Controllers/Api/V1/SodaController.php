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
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $name = $request->query('name');

        // If 'name' parameter is provided, filter by name
        $sodas = $name ? Soda::where('name', 'LIKE', '%' . $name . '%')->get() : Soda::all();

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
     * Store a newly created resource in storage.
     */
    public function store(StoreSodaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
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
     * Update the specified resource in storage.
     */
    public function update(UpdateSodaRequest $request, Soda $soda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Soda $soda)
    {
        //
    }
}
