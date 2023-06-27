<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        $addresses = Address::with(["user"])->paginate(15);
        return view("admin.addresses.index", compact("addresses"));
    }
    public function create()
    {
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
        return redirect()
            ->route("products.index")
            ->with([
                "alert" => [
                    "message" => "Product updated",
                    "type" => "success",
                ],
            ]);
    }
    public function store()
    {
    }
    public function destroy()
    {
    }
}
