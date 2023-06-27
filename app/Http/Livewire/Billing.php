<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Billing extends Component
{
    public $first_name;
    public $last_name;
    public $state;
    public $city;
    public $zip_code;
    public $phone_number;
    public $email;
    public $street;

    public function mount()
    {
        $this->first_name = Auth::user()->first_name;
        $this->last_name = Auth::user()->last_name;
        $this->state = Auth::user()->address->country;
        $this->city = Auth::user()->address->city;
        $this->zip_code = Auth::user()->address->zip_code;
        $this->phone_number = Auth::user()->phone_number;
        $this->email = Auth::user()->email;
        $this->street = Auth::user()->address->street;
    }
    public function submitForm()
    {
        // Validate the form fields
        $validatedData = $this->validate(
            [
                "first_name" => ["required", "between:1,50"],
                "last_name" => ["required", "between:1,50"],
                "state" => ["required", "between:1,42"],
                "city" => ["required", "between:1,85"],
                "zip_code" => ["required", "between:1,20"],
                "phone_number" => ["nullable", "between:1,20"],
                "email" => ["required", "between:1,75"],
                "street" => [
                    "required",
                    "between:1,50",
                    "regex:/^(?=.*\d).+$/",
                ],
            ],
            [
                "street.regex" => "Don't forget your House Number",
            ]
        );
        if ($validatedData) {
            Session::put("billingData", $validatedData);
            return redirect()->route("stripe.checkout");
        }
        return back();
    }
    public function render()
    {
        return view("livewire.billing");
    }
}
