@extends('backend.layouts.app')
@section('meta_title',__(' News'))

@section('page_name',__(' News'))

@section('page_description',__(' News'))
@section('name')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}"> <i class="feather icon-home"></i> </a>
    </li>
    <li class="breadcrumb-item"><a href="#!">{{ __(' News') }}</a>
    </li>
@endsection
@section('content')
@endsection
@section('modal')

@endsection
@section('scripts')

@endsection
@section('styles')

@endsection
