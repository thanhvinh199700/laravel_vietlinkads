<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\BrandService;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandsController extends Controller {

    protected $brandService;




    public function __construct(BrandService $brandService){
        $this->brandService = $brandService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $brand = $this->brandService->getBrands($request->all());
        return view('brand.index', ['brands' => $brand]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'inputBrandname' => 'required|unique:brand,brand_name',
        ]);
        $this->brandService->createBrand($request->all());
        return redirect('brand')->with('success_message', 'add brand sucess');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand) {
        $brands = $this->brandService->getBrand($brand->id);
        return view('brand.edit', ['brand' => $brands]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, brand $brand) {
        $this->BrandService->updateBrand($request->all(), $brand);
        return redirect('brand')->with('success_message', 'update brand sucess');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(brand $brand) {
        try {        
            $this->brandService->deleteBrand($brand);
            return redirect('brand')->with('success_message', 'delete brand sucess');
        } catch (\Exception $e) {
            return redirect('brand')->with('error_message', $e->getMessage());
        }
    }

}
