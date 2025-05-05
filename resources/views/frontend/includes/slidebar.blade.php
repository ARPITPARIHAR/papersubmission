<section class="main_banner">
    <div class="container-fluid">
        <div class="row">
            <div class="bnr_slide owl-carousel owl-theme">
                @foreach (\App\Models\Slider::take(5)->latest()->get() as $slider)
                <div class="item">
                    <a href="{{ $slider->hyperlink }}" target="_blank">
                        <img src="{{ asset($slider->thumbnail_img) }}" alt="{{ $slider->alt_text }}">
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

