<div class="d-md-flex justify-content-between align-items-center py-2">
    <div class="ff-pm fs-5 w-70 d-flex align-items-center ps-2">
        <img src="{{ $cartitem->product->photo ? $cartitem->product->photo->file : "https://via.placeholder.com/50" }}" class="img-container" alt="{{ $cartitem->name }}">
        <div>
            <p class="ff-pm ps-2 fs-6 m-0">{{ $cartitem->product->name }} </p>
            <p class="ff-pm ps-2 fs-6 m-0"> size: {{ $cartitem->shoesize }}</p>
            <p class="ff-pm ps-2 fs-6 m-0">Price: &euro; {{ $cartitem->product->price }}</p>
        </div>
    </div>
    <hr class="text-white d-block d-md-none">
    <div class="ff-pm fs-5">
        <div class="d-flex align-items-center justify-content-md-evenly">
            <p class="ff-pm fs-6 m-0 me-auto d-block d-md-none">
                Amount:
            </p>
            <input class="form-control w-50 me-md-1" type="number" wire:model="quantity" wire:change="calculate({{$cartitem->product->price}})"/>
        </div>
    </div>
    <div class="ff-pm fs-5 w-10 d-flex justify-content-end">
        <p class="fs-6 m-0">&euro;
            @if($total)
                {{ $total }}
            @else
                0
            @endif
        </p>
    </div>
    <div class="ff-pm fs-5">
        <form action="{{ route("shop.remove",$cartitem->id) }}" method="POST">
            @csrf
            @method("DELETE")
            <button class="btn btn-danger"><i class="bi bi-x-lg"></i></button>
        </form>
    </div>
    <hr class="text-white d-block d-md-none">
</div>

