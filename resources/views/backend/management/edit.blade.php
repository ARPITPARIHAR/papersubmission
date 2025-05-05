@extends('backend.layouts.app')
@section('meta_title',__('Edit Management'))

@section('page_name',__('Edit  Management'))

@section('page_description',__('Edit Management'))
@section('name')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}"> <i class="feather icon-home"></i> </a>
    </li>
    <li class="breadcrumb-item"><a href="#!">{{ __('Edit Management') }}</a>
    </li>
@endsection
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
               @session('success')
                    <h5 class="text-success">{{ session('success') }}</h5>
               @else
                    <h5>@yield('page_name')</h5>
               @endsession
            </div>
            <div class="card-block">
                <form action="{{ route('boardofdirectories.update',encrypt($management->id)) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" value="{{ old('name') ?? $management->name}}" placeholder="{{ __('Enter Name') }}" class="form-control @error('name') form-control-danger @enderror">
                            <span class="messages">
                                @error('name')
                                    <p class="text-danger error">{{ $message }}</p>
                                @else
                                    <p class="text-muted">{{ __('') }}</p>
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Designation') }}</label>
                        <div class="col-sm-10">
                            <input type="text" name="designation" id="designation" value="{{ old('designation') ?? $management->designation }}" placeholder="{{ __('Enter Designation') }}" class="form-control @error('designation') form-control-danger @enderror">
                            @error('designation')
                                <p class="text-danger error">{{ $message }}</p>
                            @else
                                <p class="text-muted">{{ __('') }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Sub Designation') }}</label>
                        <div class="col-sm-10">
                            <input type="text" name="sub_designation" id="subdesignation" value="{{ old('sub_designation') ?? $management->sub_designation }}" placeholder="{{ __('Enter Sub Designation') }}" class="form-control @error('sub_designation') form-control-danger @enderror">
                            @error('sub_designation')
                                <p class="text-danger error">{{ $message }}</p>
                            @else
                                <p class="text-muted">{{ __('') }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Brief Description') }}</label>
                        <div class="col-sm-10">
                            <textarea name="brief_description" id="brief_description" placeholder="{{ __('Enter Brief Description') }}" class="form-control @error('brief_description') form-control-danger @enderror">{{ old('brief_description') ?? $management->brief_description }}</textarea>
                            @error('brief_description')
                                <p class="text-danger error">{{ $message }}</p>
                            @else
                                <p class="text-muted">{{ __('') }}</p>
                            @enderror
                        </div>
                    </div>
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
                        <div class="col-sm-4"></div>
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
            $('#brief_description').summernote({
                height: 200,
                minHeight: 100,
                maxHeight: 300,
                focus: true
            });
        });
    </script>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote.css') }}">
@endsection
