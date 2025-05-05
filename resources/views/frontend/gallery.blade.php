@extends('frontend.layouts.app')

@section('meta_title', 'Our Gallery | ' . env('APP_NAME'))
@section('meta_description', 'Our Gallery | ' . env('APP_NAME'))

@section('content')
<section class="gallery">
    <div class="container">
        <div class="row">
            <div class="head">
                <h2>Our Gallery</h2>
            </div>

    @foreach(\App\Models\Gallery::all() as $item)
                <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                    <a href="{{ route('gallery.detail', $item->slug) }}">
                        <div class="glry_box">
                            @php
                                $images = json_decode($item->image_paths, true); // Ensure it's an array
                            @endphp
                            @if(is_array($images) && count($images) > 0)
                                <div class="glry_imag">
                                           <img class="example-image" src="{{ ($images[0]) }}" alt="{{ $item->title }}" />

                                </div>
                            @endif
                            <h4 class="gallery-title">{{ $item->title }}</h4>

                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

@section('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
<script>
    // Initialize lightbox
    lightbox.option({
      'resizeDuration': 200,
      'wrapAround': true
    });
</script>
@endsection

<style>

.gallery-title {
    font-size: 20px;
    font-weight: bold;
    color: #ff6600; /* Change to your preferred color */
    text-transform: uppercase;
    text-align: center;
    margin-top: 10px;
    letter-spacing: 1px;
    transition: 0.3s;
}

.gallery-title:hover {
    color: #cc5500; /* Darker shade on hover */
    text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
}
</style>
