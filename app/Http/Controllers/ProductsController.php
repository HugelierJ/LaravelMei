<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Color;
use App\Models\Gender;
use App\Models\Photo;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        $brands = Brand::all();
        $products = Product::withTrashed()
            ->with(["photo", "brand", "productcategories"])
            ->paginate(10);
        return view("admin.products.index", compact("products", "brands"));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
        $product = Product::findOrFail($id);
        return view("admin.products.show", compact("product"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
        $product = Product::findOrFail($id);
        $brands = Brand::all();
        $colors = Color::all();
        $genders = Gender::all();
        $productcategories = ProductCategory::all();
        return view(
            "admin.products.edit",
            compact(
                "product",
                "brands",
                "colors",
                "productcategories",
                "genders"
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
        request()->validate(
            [
                "name" => ["required", "between:3,255"],
                "body" => "required",
                "price" => ["required", "numeric", "between:0.01,999.99"],
                "stock" => ["required", "numeric", "between:0.01,999.99"],
                "gender_id" => ["required", "numeric"],
                "photo_id" => "required",
            ],
            [
                "name.required" => "Product name is required",
                "title.between" =>
                    "Product name between 3 and 255 characters required",
                "body.required" => "Message is required",
                "price.required" => "Price field is required",
                "price.numeric" => "Price can only contain numbers",
                "price.between" => "Price has to be positive",
                "stock.required" => "Stock field is required",
                "stock.numeric" => "Stock can only contain numbers",
                "stock.between" => "Stock has to be positive",
                "gender_id.required" => "Gender should be filled in",
                "photo_id.required" => "Choose a photo",
            ]
        );
        $product = Product::findOrFail($id);
        $input = $request->all();

        // oude foto verwijderen
        //we kijken eerst of er een foto bestaat
        if ($request->hasFile("photo_id")) {
            $oldPhoto = $product->photo;
            $path = request()
                ->file("photo_id")
                ->store("products");
            if ($oldPhoto) {
                unlink(public_path($oldPhoto->file));
                // $oldPhoto->delete();
                $oldPhoto->update(["file" => $path]);
                $input["photo_id"] = $oldPhoto->id;
            } else {
                $photo = Photo::create(["file" => $path]);
                $input["photo_id"] = $photo->id;
            }
        }
        $product->brand_id = $request->brand_id;
        $product->color_id = $request->color_id;
        $product->gender_id = $request->gender_id;
        $product->update($input);
        $product->productcategories()->sync($request->productcategories, true);
        return redirect()
            ->route("products.index")
            ->with([
                "alert" => [
                    "message" => "Product updated",
                    "type" => "success",
                ],
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        //
        request()->validate(
            [
                "name" => ["required", "between:3,255"],
                "body" => "required",
                "price" => ["required", "numeric", "between:0.01,999.99"],
                "stock" => ["required", "numeric", "between:0.01,999.99"],
            ],
            [
                "name.required" => "Product name is required",
                "title.between" =>
                    "Product name between 3 and 255 characters required",
                "body.required" => "Message is required",
                "price.required" => "Price field is required",
                "price.numeric" => "Price can only contain numbers",
                "price.between" => "Price has to be positive",
                "stock.required" => "Stock field is required",
                "stock.numeric" => "Stock can only contain numbers",
                "stock.between" => "Stock has to be positive",
            ]
        );
        $product = new Product();
        $product->name = $request->name;
        $product->gender_id = $request->gender_id;
        $product->slug = $product->name;
        $product->brand_id = $request->brand_id;
        $product->body = $request->body;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->color_id = $request->color_id;
        if ($file = $request->file("photo_id")) {
            $path = request()
                ->file("photo_id")
                ->store("products");

            $photo = Photo::create(["file" => $path]);
            $product->photo_id = $photo->id;
        }
        $product->save();
        /*wegschrijven van meerder productcategorieen in de tussentabel*/
        $product->productcategories()->sync($request->productcategories, true);

        return redirect()
            ->route("products.index")
            ->with([
                "alert" => [
                    "message" => "Product added",
                    "type" => "success",
                ],
            ]);
        //return back()->withInput();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        //
        $productcategories = ProductCategory::all();
        $brands = Brand::all();
        $colors = Color::all();
        $genders = Gender::all();
        return view(
            "admin.products.create",
            compact("productcategories", "brands", "colors", "genders")
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()
            ->route("products.index")
            ->with([
                "alert" => [
                    "message" => "Product Deleted",
                    "type" => "success",
                ],
            ]);
    }

    public function productRestore($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->restore();
        $product->brand->restore();
        return back()->with([
            "alert" => [
                "message" => "Product restored",
                "type" => "success",
            ],
        ]);
    }

    public function productsPerBrand($id)
    {
        $brands = Brand::all();
        $products = Product::where("brand_id", $id)
            ->with(["photo", "brand", "productcategories"])
            ->paginate(10);
        return view("admin.products.index", compact("products", "brands"));
    }

    public function detail(Product $product)
    {
        return view("shop.detail", compact("product"));
    }
}
