@extends('frontend.layouts.app')
@section('meta_title','Team Member | '.env('APP_NAME'))
@section('meta_description','Team Member | '.env('APP_NAME'))
@section('content')

<section class="hm_team tm_mmbr">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="head">
                    <h2>Team Members</h2>
                </div>
            </div>
            @foreach (\App\Models\Team::all() as $team)
            <div class="col-md-4">
                <div class="team_box">
                    <div class="team_imag">
                        <img src="{{ asset($team->thumbnail_img) }}" alt="team">
                    </div>
                    <div class="team_txt">
                        <h3>{{ $team->designation }}</h3>
                        <span>Name:<b> {{ $team->name }}</b></span>
                        <span>Qualification:<b> {{ $team->qualification }}</b></span>
                        <span>Contact:<b> {{ $team->number }}</b></span>
                        <span>Email:<b> {{ $team->mail }}</b></span>
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
