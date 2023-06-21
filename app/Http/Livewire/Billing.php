<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
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
    public $name;

    public function mount()
    {
        $this->first_name = Auth::user()->first_name;
        $this->last_name = Auth::user()->last_name;
        $this->state = Auth::user()
            ->addresses()
            ->first()->state;
        $this->city = Auth::user()
            ->addresses()
            ->first()->city;
        $this->zip_code = Auth::user()
            ->addresses()
            ->first()->zip_code;
        $this->phone_number = Auth::user()->phone_number;
        $this->email = Auth::user()->email;
        $this->name = Auth::user()
            ->addresses()
            ->first()->name;
    }
    public function submitForm()
    {
        // Validate the form fields
        $validatedData = $this->validate([
            "first_name" => ["required", "between:3,50"],
            "last_name" => ["required", "between:3,50"],
            "state" => ["required", "between:3,42"],
            "city" => ["required", "between:3,85"],
            "zip_code" => ["required", "between:3,20"],
            "phone_number" => ["nullable", "between:3,20"],
            "email" => ["required", "between:3,75"],
        ]);
        Auth::user()
            ->addresses()
            ->first()->state = $this->state;
        Auth::user()
            ->addresses()
            ->first()->city = $this->city;
        Auth::user()
            ->addresses()
            ->first()->zip_code = $this->zip_code;
        Auth::user()->email = $this->email;
        if ($this->phone_number) {
            Auth::user()->phone_number = $this->phone_number;
        }
        Auth::user()
            ->addresses()
            ->save();
        Auth::user()->save();

        if ($validatedData) {
            return redirect()->route("stripe.checkout");
        }
        return back();
    }
    public function render()
    {
        return view("livewire.billing");
    }
}
