@extends('frontend.layouts.app')
@section('meta_title','Infastructure | '.env('APP_NAME'))
@section('meta_description','Infastructure | '.env('APP_NAME'))
@section('content')




<section class="inner_banner">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 no_padding">
                <div class="inr_bnr">
                    @foreach (\App\Models\Infastructure::all() as $aboutService)
                        <img src="{{ asset($aboutService->thumbnail_img) }}" alt="{{ $aboutService->banner_alt }}">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="head">
                    <h2>Infastructure</h2>
                    @foreach (\App\Models\Infastructure::all() as $aboutService)
                        <p>{{ $aboutService->title }}</p>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>








@endsection

@section('style')

@endsection
@section('script')

@endsection
