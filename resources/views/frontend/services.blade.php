@extends('frontend.layouts.app')
@section('meta_title','Contact Us | '.env('APP_NAME'))
@section('meta_description','Contact Us | '.env('APP_NAME'))
@section('content')

<section class="hm_abt">
    <div class="container-fluid">
        @foreach(\App\Models\Branch::all() as $branch)
        <div class="row align-items-center mb-4">
            <div class="col-12">
                <h2 class="text-center">{{ $branch->title }}</h2> <!-- शीर्षक सबसे ऊपर -->
            </div>
            <div class="col-md-6 no_padding">
                <div class="hm_abt_imag">
                    <img src="{{ ('' . $branch->header_image) }}" alt="{{ $branch->title }}" class="img-fluid">
                </div>
            </div>
            <div class="col-md-6">
                <div class="hm_abt_txt">
                    <p>{{ $branch->brief_description }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>


@endsection
@section('style')
@endsection
@section('script')
@endsection
