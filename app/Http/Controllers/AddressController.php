<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    //
    public function index()
    {
        $addresses = Address::paginate(15);
        return view("admin.addresses.index", compact("addresses"));
    }
    public function edit($id)
    {
        //
        $address = Address::findOrFail($id);
        return view("admin.addresses.edit", compact("address"));
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
                "keywords" => ["required", Rule::exists("keywords", "id")],
                "body" => "required",
                "price" => ["required", "numeric", "between:0.01,999.99"],
                "stock" => ["required", "numeric", "between:0.01,999.99"],
            ],
            [
                "name.required" => "Product name is required",
                "title.between" =>
                    "Product name between 3 and 255 characters required",
                "body.required" => "Message is required",
                "keywords.required" => "Please check minimum one keyword",
                "price.required" => "Price field is required",
                "price.numeric" => "Price can only contain numbers",
                "price.between" => "Price has to be positive",
                "stock.required" => "Stock field is required",
                "stock.numeric" => "Stock can only contain numbers",
                "stock.between" => "Stock has to be positive",
            ]
        );
        $product = Product::findOrFail($id);
        $input = $request->all();
        //        $input["slug"] = Str::slug($request->name, "-");
        // oude foto verwijderen
        //we kijken eerst of er een foto bestaat
        if ($request->hasFile("photo_id")) {
            $oldPhoto = $product->photo; // de huidige foto van de gebruiker
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
        $product->update($input);
        $product->productcategories()->sync($request->productcategories, true);
        $product->keywords()->sync($request->keywords);
        return redirect()
            ->route("products.index")
            ->with([
                "alert" => [
                    "message" => "Product updated",
                    "type" => "success",
                ],
            ]);
    }
}
