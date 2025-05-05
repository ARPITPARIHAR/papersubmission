@extends('frontend.layouts.app')
@section('meta_title','Placement Services | '.env('APP_NAME'))
@section('meta_description','Placement Services | '.env('APP_NAME'))
@section('content')

<section class="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="head">
                    <h2>Placement Services</h2>

                    @foreach (\App\Models\Placementservice::all() as $placementService)
                        <p>{{ $placementService->brief_description }}</p>
                    @endforeach
                    <a class="btn" href="#">Download PDF</a>
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
