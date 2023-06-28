<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $brands = Brand::withTrashed()->paginate(10);
        return view("admin.brands.index", compact("brands"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("admin.brands.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //        Brand::create($request->all());
        //        return redirect()->route('brands.index');
        $request->validate([
            "name" => "required",
            "description" => "required",
        ]);

        $brand = Brand::create($request->all());

        return redirect()->route("brands.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $brand = Brand::findOrFail($id);
        return view("admin.brands.edit", compact("brand"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $brand = Brand::findOrFail($id);
        $brand->update($request->all());
        return redirect()->route("admin.brands");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $brand = Brand::findOrFail($id);
        $products = Product::where("brand_id", $id)->get();
        foreach ($products as $product) {
            $product->delete();
        }
        $brand->delete();

        return back()->with([
            "alert" => [
                "message" =>
                    "Brand Deleted, along with products containing the brand",
                "type" => "success",
            ],
        ]);
    }

    public function brandRestore($id)
    {
        Brand::onlyTrashed()
            ->where("id", $id)
            ->restore();
        Product::onlyTrashed()
            ->where("brand_id", $id)
            ->restore();
        return back()->with([
            "alert" => [
                "message" =>
                    "Brand restored, along with products containing the brand",
                "type" => "success",
            ],
        ]);
    }
}
