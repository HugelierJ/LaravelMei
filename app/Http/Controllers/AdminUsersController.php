<?php

namespace App\Http\Controllers;

use App\Events\UsersSoftDelete;
use App\Http\Requests\UsersRequest;
use App\Models\Gender;
use App\Models\Photo;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AdminUsersController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::with(["roles", "photo"])
            ->orderByDesc("id")
            ->withTrashed()
            ->paginate(20);

        return view("admin.users.index", compact("users"));
        //of
        //return view('admin.users.index',compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $genders = Gender::all();
        $roles = Role::all();
        return view("admin.users.create", compact("roles", "genders"));
    }

    /**
     * Store a newly created resource in img.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            "first_name" => ["string", "between:2,50", "regex:/^[A-Za-z]+$/"],
            "last_name" => ["string", "between:2,50", "regex:/^[A-Za-z]+$/"],
            "username" => ["string", "between:2,50", "regex:/^[A-Za-z0-9]+$/"],
            "email" => ["email", "between:2,50", "unique:users"],
            "phone_number" => ["numeric"],
            "gender_id" => ["string"],
            "photo_id" => ["file"],
            "roles" => ["required", Rule::exists("roles", "id")],
        ]);
        $user = new User();
        $user->username = $request->username;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->is_active = $request->is_active;
        $user->email = $request->email;
        if (isset($request->phone_number)) {
            $user->phone_number = $request->phone_number;
        }
        $user->password = Hash::make($request->password);
        if ($file = $request->file("photo_id")) {
            $path = request()
                ->file("photo_id")
                ->store("users");
            $photo = Photo::create(["file" => $path]);
            //update photo_id (FK in users table)
            $input["photo_id"] = $user->photo_id = $photo->id;
        }
        $user->gender_id = $request->gender;
        $user->save();
        /*wegschrijven van meerder rollen in de tussentabel*/
        $user->roles()->sync($request->roles, false);
        //return redirect('admin/users');
        return redirect()
            ->route("users.index")
            ->with([
                "alert" => [
                    "message" => "User added",
                    "type" => "success",
                ],
            ]);
        //return back()->withInput();
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
        //        $user = User::find($id); //find zal altijd worden uitgevoerd. Gevaar: de id MOET bestaan.
        //        if(!$user){
        //            throw new ModelNotFoundException();
        //        }

        $user = User::findOrFail($id);
        $genders = Gender::all();
        $roles = Role::all();
        return view("admin.users.edit", compact("user", "roles", "genders"));
    }

    /**
     * Update the specified resource in img.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            "first_name" => ["string", "between:2,50", "regex:/^[A-Za-z]+$/"],
            "last_name" => ["string", "between:2,50", "regex:/^[A-Za-z]+$/"],
            "username" => ["string", "between:2,50", "regex:/^[A-Za-z0-9]+$/"],
            "email" => ["email", "between:2,50"],
            "phone_number" => ["numeric"],
            "gender_id" => ["string"],
            "photo_id" => ["file"],
            "roles" => ["required", Rule::exists("roles", "id")],
        ]);
        $user = User::findOrFail($id);
        if (trim($request->password) == "") {
            $input = $request->except("password");
        } else {
            $input = $request->all();
            $input["password"] = Hash::make($request["password"]);
        }
        // oude foto verwijderen
        //we kijken eerst of er een foto bestaat
        if ($request->hasFile("photo_id")) {
            $oldPhoto = $user->photo; // de huidige foto van de gebruiker
            $path = request()
                ->file("photo_id")
                ->store("users");
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
        if ($request->phone_number) {
            $user->phone_number = $request->phone_number;
        }
        $user->update($input);
        $user->roles()->sync($request->roles, true);
        return redirect("/admin/users")->with("status", "User updated!");
    }

    /**
     * Remove the specified resource from img.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::findOrFail($id);
        UsersSoftDelete::dispatch($user);
        $user->delete();
        return redirect()
            ->route("users.index")
            ->with([
                "alert" => [
                    "message" => "User Deleted",
                    "type" => "success",
                ],
            ]);
    }
    public function userRestore($id)
    {
        User::onlyTrashed()
            ->where("id", $id)
            ->restore();

        return redirect()
            ->route("users.index")
            ->with([
                "alert" => [
                    "message" => "User Restored",
                    "type" => "success",
                ],
            ]);
    }
}
