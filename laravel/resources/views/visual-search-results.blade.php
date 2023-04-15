<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Visual Search Results') }}</div>

                <div class="card-body">
                    <div class="row">
                        @foreach ($nearest_neighbors as $neighbor)
                            <div class="col-md-4">
                                <?php $imageData = base64_encode(file_get_contents($neighbor)); ?>
                                <img src="data:image/jpeg;base64,{{ $imageData }}" alt='' class="img-thumbnail">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Visual Search Results') }}</div>

                <div class="card-body">
                    <div class="row">
                        @foreach ($nearest_neighbors as $neighbor)
                            <div class="col-md-4">

                                <img src="{{ asset($neighbor) }}" alt='' class="img-thumbnail">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
