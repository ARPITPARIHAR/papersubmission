@extends('backend.layouts.app')

@section('meta_title',__('Edit Team Member'))

@section('page_name',__('Edit Team Member'))

@section('page_description',__('Edit Team Member'))

@section('name')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}"> <i class="feather icon-home"></i> </a>
    </li>
    <li class="breadcrumb-item"><a href="#!">{{ __('Edit Team Member') }}</a></li>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                @if(session()->has('success'))
                    <h5 class="text-success">{{ session('success') }}</h5>
                @else
                    <h5>@yield('page_name')</h5>
                @endif
            </div>
            <div class="card-block">
                <form action="{{ route('teammembers.update', encrypt($team->id)) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                 
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" value="{{ old('name', $team->name) }}" placeholder="{{ __('Enter Name') }}" class="form-control @error('name') form-control-danger @enderror">
                            @error('name')
                                <p class="text-danger error">{{ $message }}</p>
                            @else
                                <p class="text-muted">{{ __('') }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Designation') }}</label>
                        <div class="col-sm-10">
                            <input type="text" name="designation" id="designation" value="{{ old('designation', $team->designation) }}" placeholder="{{ __('Enter Designation') }}" class="form-control @error('designation') form-control-danger @enderror">
                            @error('designation')
                                <p class="text-danger error">{{ $message }}</p>
                            @else
                                <p class="text-muted">{{ __('') }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Qualification') }}</label>
                        <div class="col-sm-10">
                            <input type="text" name="qualification" id="qualification" value="{{ old('qualification', $team->qualification) }}" placeholder="{{ __('Enter Qualification') }}" class="form-control @error('qualification') form-control-danger @enderror">
                            @error('qualification')
                                <p class="text-danger error">{{ $message }}</p>
                            @else
                                <p class="text-muted">{{ __('') }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Phone Number') }}</label>
                        <div class="col-sm-10">
                            <input type="text" name="phonenumber" id="phonenumber" value="{{ old('phonenumber', $team->number) }}" placeholder="{{ __('Enter Phone Number') }}" class="form-control @error('phonenumber') is-invalid @enderror">
                            @error('phonenumber')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                        <div class="col-sm-10">
                            <input type="text" name="mail" id="mail" value="{{ old('mail', $team->mail) }}" placeholder="{{ __('Enter Email') }}" class="form-control @error('mail') form-control-danger @enderror">
                            @error('mail')
                                <p class="text-danger error">{{ $message }}</p>
                            @else
                                <p class="text-muted">{{ __('') }}</p>
                            @enderror
                        </div>
                    </div>
                    {{-- Other fields and file upload --}}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Thumbnail Image') }}</label>
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
