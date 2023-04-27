<div>
    <input wire:model.debounce.300ms="search" name="search" type="search" class="form-control" placeholder="Search...">
    <div class="row row-cols-4">
        @forelse($searchResults as $searchResult)
            <div class="col">
                <div class="card mb-3">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ $searchResult["artworkUrl100"] ?? "https://via.placeholder.com/60" }}" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $searchResult['artistName'] ?? "No artist" }}</h5>
                                <p class="card-text">{{ $searchResult['trackName'] ?? 'No track' }}</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <video width="100%" controls>
                            <source src="{{ $searchResult['previewUrl'] ?? 'nope' }}">
                        </video>
                    </div>
                </div>
            </div>
            @empty
            <div class="alert alert-info my-3">
                No results found for <strong>{{ $search }}</strong>
            </div>
        @endforelse
    </div>

</div>
