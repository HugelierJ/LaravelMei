<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SearchDropDown extends Component
{
    public $search; // two way binding met het input veld.
    public $searchResults = [];

    /* Lifecycle Hook(s)*/
    /* Search is de name vanop de input in de form */
    public function updatedSearch()
    {
        $response = Http::get(
            "https://itunes.apple.com/search/?term=" .
                $this->search .
                "&limit=10"
        );
        $this->searchResults = $response->json()["results"];
        //        dump($this->searchResults);
    }

    public function render()
    {
        //        dd($response->json());
        return view("livewire.search-drop-down");
    }
}
