<?php

namespace App\Services;

use App\Models\Brand;
use DB;

class BrandService {

    public function getBrands() {
        $brand = DB::table('brand')->get();
        return $brand;
    }

    public function createBrand(array $data) {
         Brand::create([
                    "brand_name" => $data['inputBrandname'],
                    "status" => $data['radioStatus'],
                    "trash" => $data['radioTrash'],
        ]);
    }

    public function getBrand($brand_id) {
        $brands = Brand::find($brand_id);
        return $brands;
    }

    public function updateBrand(array $data,$brand) {
        $dt = date('Y-m-d H:i:s');
        $brand->update([
            "brand_name" => $data['inputBrandname'],
            "status" => $data['radioStatus'],
            "trash" => $data['radioTrash'],
            "updated_at" => $dt
        ]);
    }

    public function deleteBrand($brand) {
        if ($brand->productChildren()->exists()) {
            throw new \Exception('There may be product that should not be deleted');
        }
        $brand->delete();
    }

}
