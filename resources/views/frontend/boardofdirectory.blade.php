@extends('frontend.layouts.app')
@section('meta_title','Board Of directors | '.env('APP_NAME'))
@section('meta_description','Board Of directors | '.env('APP_NAME'))
@section('content')
<section class="core_team">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="head">
					<h2>Board Of Directors</h2>
				</div>
			</div>
			@foreach (\App\Models\Boarddirectory::all() as $boardMember)
			<div class="col-md-6">
				<div class="cr-tm_box">
					<div class="row align-items-center justify-content-center">
						<div class="col-md-3">
							<div class="cr_tm_imag">
                                <img src="{{asset($boardMember->thumbnail_img)}}" alt="cr_tm">
							</div>
						</div>
						<div class="col-md-9">
							<div class="cr_tm_txt">
								<h3><strong>{{ $boardMember->title }}</strong> {{ $boardMember->name }}</h3>
								<span>{{ $boardMember->designation }}</span>
								<p>{{ $boardMember->brief_description }}</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>
@endsection

@section('style')
@endsection

@section('script')
@endsection
