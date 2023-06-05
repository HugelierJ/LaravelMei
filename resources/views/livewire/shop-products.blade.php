<div class="row row-cols-1 justify-content-center row-cols-md-2 row-cols-lg-4 row-cols-xxl-5 gap-4">
    @foreach ($products as $product)

        <div class="col p-0 card my-3" style="width: 18rem;">
            <a href="{{ route('products.detail',$product->slug) }}"><img alt="{{ $product->name }}" class="card-img-top"
                                                                         src="{{ $product->photo ? $product->photo->file : "https://via.placeholder.com/200x250.png" }}"></a>
            <div class="card-body">
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
                    <p class="ff-psb ">&euro; {{ $product->price }}</p>
                </div>
            </div>
        </div>
    @endforeach

</div>
