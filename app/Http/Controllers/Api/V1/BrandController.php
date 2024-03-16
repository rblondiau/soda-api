<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Http\Resources\BrandResource;
use App\Models\Brand;
use Illuminate\Http\Request;


class BrandController extends Controller
{
    /**
     * GET api/brands
     */

    public function index(Request $request)
    {
        $name = $request->query('name');

        // If 'name' parameter is provided, filter by name
        $brand = $name ? Brand::where('name', 'LIKE', '%' . $name . '%')->get() : Brand::all();

        return BrandResource::collection($brand);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * POST api/brands
     */
    public function store(StoreBrandRequest $request)
    {
        $brand = Brand::create($request->validated());
        return BrandResource::make($brand);
    }

    /**
     * GET api/brands by id
     */
    public function show(Brand $brand)
    {
        return BrandResource::make($brand);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * PUT PATCH api/brands
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $brand->update($request->validated());
        return BrandResource::make($brand);
    }

    /**
     * DELETE api/brands
     */
    public function destroy(Brand $brand)
    { {
            $brand->delete();
            return response()->noContent();
        }
    }
}
