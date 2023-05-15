<div class="d-md-flex justify-content-between align-items-center py-2">
    <div class="ff-pm fs-5 w-70 d-flex align-items-center ps-2">
        <img src="{{ $cartitem->photo ? $cartitem->photo->file : "https://via.placeholder.com/50" }}" class="img-container" alt="{{ $cartitem->name }}">
        <div>
            <p class="ps-2 fs-6 m-0">{{ $cartitem->product->name }} <span>{{ $cartitem->shoeSize }}</span></p>
            <p class="ps-2 fs-6 m-0">Price: &euro; {{ $cartitem->product->price }}</p>
        </div>
    </div>
    <div class="ff-pm fs-5 w-10">
        <input class="form-control" type="number" wire:model="quantity" wire:change="calculate({{$cartitem->product->price}})"/>
{{--        <select id="totalQuantity" class="form-select w-auto">--}}
{{--            @for($i=1; $i<= 5; $i++)--}}
{{--                @if($i == $cartitem->quantity)--}}
{{--                    <option selected disabled value="{{ $cartitem->quantity }}">{{ $cartitem->quantity }}</option>--}}
{{--                @else--}}
{{--                    <option value="{{ $i }}">{{ $i }}</option>--}}
{{--                @endif--}}
{{--            @endfor--}}
{{--        </select>--}}
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
        <form action="{{ route("shop.remove",$cartitem->id) }}" method="get">
            @csrf
            @method("POST")
            <button class="btn btn-danger"><i class="bi bi-x-lg"></i></button>
        </form>
    </div>
</div>
