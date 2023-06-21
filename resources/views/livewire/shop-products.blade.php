<div class="col p-0 card my-3 position-relative" style="width: 18rem;">
    <div class="position-absolute top-0 start-0 bg-danger text-white p-2 rounded">
        {{ $product->brand->name }}
    </div>
    <a href="{{ route('products.detail',$product->slug) }}"><img alt="{{ $product->name }}" class="card-img-top" src="{{ $product->photo ? $product->photo->file : "https://via.placeholder.com/200x250.png" }}"></a>
    <div class="card-body d-flex flex-column justify-content-between">
        <div>
            <a href=""><i class="bi bi-star text-warning"></i></a>
            <a href=""><i class="bi bi-star text-warning"></i></a>
            <a href=""><i class="bi bi-star text-warning"></i></a>
            <a href=""><i class="bi bi-star text-warning"></i></a>
            <a href=""><i class="bi bi-star text-warning"></i></a>
            <h5 class="card-title pt-2 ff-pm ">{{ $product->name }}</h5>
            <p class="card-text ff-pr ">{{ Str::limit($product->body,100) }}</p>
        </div>
        <div class="d-flex justify-content-between align-items-baseline">
            <a class="btn btn-custom ff-pr " href="{{ route('products.detail',$product->slug) }}">More Info</a>
            <p class="ff-psb ">&euro; {{ number_format($product->price) }}</p>
        </div>
    </div>
</div>
