@extends('frontend.layouts.app')
@section('meta_title',$page->meta_title.' | '.env('APP_NAME'))
@section('meta_description',$page->meta_description.' | '.env('APP_NAME'))

@section('content')
@if ($page->header_img)
<section class="inner_banner">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 no_padding">
				<div class="inr_bnr">
					<img src="{{($page->header_img)}}" alt="{{ $page->title }}">
				</div>
			</div>
		</div>
	</div>
</section>
@endif
<section class="about">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="head">
					<h2>{{ $page->title }}</h2>
                    <p>{!! $page->brief_description !!}</p>
                    <img src="{{($page->thumbnail_img)}}" alt="{{ $page->title }}">
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
