@extends('frontend.layouts.app')
@section('meta_title',$management->name.' | '.env('APP_NAME'))
@section('meta_description',$management->name.' | '.env('APP_NAME'))
@section('content')

<section class="about">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="head">
                    <div class="col-md-4">
                        <div class="team_box">
                            <div class="team_imag">
                                <img src="{{ asset($management->thumbnail_img) }}" alt="team">
                            </div>
                            <div class="team_txt">
                                <h3><strong>{{ $management->name }}</strong> {{ $management->designation }}</h3>
                                <span>{{ $management->sub_designation }}</span>
                                <p>{{ $management->brief_description }}</p>
                            </div>
                        </div>
                    </div>
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
