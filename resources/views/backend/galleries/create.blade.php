@extends('backend.layouts.app')
@section('meta_title',__('Add Gallery'))

@section('page_name',__('Add Gallery'))

@section('page_description',__('Add Gallery'))
@section('name')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}"> <i class="feather icon-home"></i> </a>
    </li>
    <li class="breadcrumb-item"><a href="#!">{{ __('Add Gallery') }}</a>
    </li>
@endsection
@section('content')
<div class="row">
    <div class="col-sm-12">
        <!-- Basic Form Inputs card start -->
        <div class="card">
            <div class="card-header">
                @if(session('success'))
                    <h5 class="text-success">{{ session('success') }}</h5>
                @else
                    <h5>@yield('page_name')</h5>
                @endif
            </div>
            <div class="card-block">
                <form action="{{ route('galleries.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Title') }}</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="{{ __('Enter Title') }}" class="form-control @error('title') form-control-danger @enderror">
                            @error('title')
                                <p class="text-danger error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div id="image-fields">
                        <div class="form-group row image-field">
                            <label class="col-sm-2 col-form-label">{{ __('Images') }}</label>
                            <div class="col-sm-10">
                                <input type="file" name="images[]" class="form-control @error('images') form-control-danger @enderror">
                                @error('images')
                                    <p class="text-danger error">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-8">
                            <button type="button" id="add-more" class="btn btn-secondary">{{ __('Add More') }}</button>
                            <button type="submit" class="btn btn-primary float-sm-right">{{ __('Save') }}</button>
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

            // Add more image fields
            $('#add-more').click(function() {
                var newField = $('.image-field').first().clone();
                newField.find('input').val('');
                newField.appendTo('#image-fields');
            });
        });
    </script>
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote.css') }}">
@endsection
