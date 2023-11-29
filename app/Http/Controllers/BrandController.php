<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class BrandController extends Controller
{
    //
    public function AllBrand(){
        $brands = Brand::latest()->paginate(10);
      
        return view('admin.brand.index',compact('brands'));
       
    }

    
    public function AddBrand(Request $request)
{
    $validated = $request->validate([
        'brand_name' => 'required|unique:brands|max:255',
        'brand_image' => 'required|mimes:jpg,jpeg,png',
    ], [
        'brand_name.required' => 'Please input brand name.',
        'brand_name.max' => 'Brand name must be less than 255 characters.',
        'brand_image.mimes' => 'The file must be of type: jpg, jpeg, or png.',
    ]);

    try {
        $brand_image = $request->file('brand_image');
        $image_name = hexdec(uniqid()) . '.' . $brand_image->getClientOriginalExtension();
        $up_loc = 'image/brand/';
        $brand_image->move($up_loc, $image_name);

        Brand::create([
            'brand_name' => $request->brand_name,
            'brand_image' => $up_loc . $image_name,
        ]);

        return redirect()->back()->with('success', 'Brand inserted successfully.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
    }
}
}
