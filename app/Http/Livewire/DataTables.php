<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class DataTables extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $is_active = 1;
    public $tablesearch;

    public $sortAsc = true;
    public $sortField;

    protected $queryString = [
        "tablesearch",
        "is_active",
        "sortAsc",
        "sortField",
    ];

    public function sortBy($fieldname)
    {
        if ($this->sortField == $fieldname) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }
        $this->sortField = $fieldname;
    }

    public function render()
    {
        return view("livewire.data-tables", [
            "users" => User::where(function ($query) {
                $query
                    ->where(
                        "first_name",
                        "like",
                        "%" . $this->tablesearch . "%"
                    )
                    ->orWhere("email", "like", "%" . $this->tablesearch . "%")
                    ->orWhere(
                        "username",
                        "like",
                        "%" . $this->tablesearch . "%"
                    );
            })
                ->where("is_active", $this->is_active)
                ->with(["roles", "photo"])
                ->withTrashed()
                ->when($this->sortField, function ($query) {
                    $query->orderBy(
                        $this->sortField,
                        $this->sortAsc ? "asc" : "desc"
                    );
                })
                ->paginate(5),
        ]);
    }
    public function updatedIsActive()
    {
        $this->resetPage();
    }
}
