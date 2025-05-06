@extends('backend.layouts.app')
@section('meta_title',__('Room'))

@section('page_name',__('Room'))

@section('page_description',__('Room'))
@section('name')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}"> <i class="feather icon-home"></i> </a>
    </li>
    <li class="breadcrumb-item"><a href="#!">{{ __('Room') }}</a>
    </li>
@endsection
@section('content')
<div class="row">
    <div class="col-sm-12">
        <!-- Basic Form Inputs card start -->
        <div class="card">
            <div class="card-header">
               @session('success')
               <h5 class="text-success">{{ session('success') }}</h5>
               @else
                <h5>@yield('page_name')</h5>
               @endsession
            </div>
            <div class="card-block">
                <form action="{{ route('rooms.store') }}" method="POST"  enctype="multipart/form-data">
                    @csrf
                 <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Thumbnail Img') }}</label>
                        <div class="col-sm-10">
                            <input type="file" name="thumbnail_img" id="thumbnail_img" class="form-control @error('thumbnail_img') form-control-danger @enderror">
                            @error('thumbnail_img')
                                <p class="text-danger error">{{ $message }}</p>
                            @else
                                <p class="text-muted">{{ __('') }}</p>
                            @enderror
                        </div>
                    </div>
                  <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Detail') }}</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" id="title" value="{{ old('title')}}" placeholder="{{ __('Enter Detail') }}" class="form-control @error('title') form-control-danger @enderror">
                           <span class="messages">
                                @error('title')
                                    <p class="text-danger error">{{ $message }}</p>
                                @else
                                    <p class="text-muted">{{ __('') }}</p>
                                @enderror
                            </span>
                        </div>
                    </div>

                <div class="form-group row">
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-8">
                            <div>
                                <button type="submit" class="btn btn-primary float-sm-right">{{ __('Save') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('modal')

@endsection
@section('scripts')
    <script type="text/javascript" src="{{ asset('backend/plugins/i18next/js/i18next.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/plugins/i18next-xhr-backend/js/i18nextXHRBackend.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/plugins/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/plugins/jquery-i18next/js/jquery-i18next.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/plugins/summernote/summernote.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#description').summernote();
        });
    </script>
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote.css') }}">
@endsection
