@extends('backend.layouts.app')
@section('meta_title',__('Add Management'))

@section('page_name',__('Add Management'))

@section('page_description',__('Add Management'))

@section('name')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}"> <i class="feather icon-home"></i> </a>
    </li>
    <li class="breadcrumb-item"><a href="#!">{{ __('Add Management') }}</a></li>
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
                <form action="{{ route('management.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" value="{{ old('name')}}" placeholder="{{ __('Enter Name') }}" class="form-control @error('name') form-control-danger @enderror">
                            <span class="messages">
                                @error('name')
                                    <p class="text-danger error">{{ $message }}</p>
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Designation') }}</label>
                        <div class="col-sm-10">
                            <input type="text" name="designation" id="designation" value="{{ old('designation')}}" placeholder="{{ __('Enter Designation') }}" class="form-control @error('designation') form-control-danger @enderror">
                            <span class="messages">
                                @error('designation')
                                    <p class="text-danger error">{{ $message }}</p>
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Sub Designation') }}</label>
                        <div class="col-sm-10">
                            <input type="text" name="sub_designation" id="subdesignation" value="{{ old('sub_designation')}}" placeholder="{{ __('Enter Sub Designation') }}" class="form-control @error('sub_designation') form-control-danger @enderror">
                            <span class="messages">
                                @error('sub_designation')
                                    <p class="text-danger error">{{ $message }}</p>
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Brief Description') }}</label>
                        <div class="col-sm-10">
                            <textarea name="brief_description" id="brief_description" placeholder="{{ __('Enter Brief Description') }}" class="form-control @error('brief_description') form-control-danger @enderror">{{ old('brief_description')}}</textarea>
                            <span class="messages">
                                @error('brief_description')
                                    <p class="text-danger error">{{ $message }}</p>
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Thumbnail Img') }}</label>
                        <div class="col-sm-10">
                            <input type="file" name="thumbnail_img" id="thumbnail_img" class="form-control @error('thumbnail_img') form-control-danger @enderror">
                            <span class="messages">
                                @error('thumbnail_img')
                                    <p class="text-danger error">{{ $message }}</p>
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-8">
                            <button type="submit" class="btn btn-primary float-sm-right">{{ __('Save') }}</button>
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
            $('#brief_description').summernote({
                height: 200,                 // set the height of the editor
                minHeight: null,             // set the minimum height of the editor
                maxHeight: null,             // set the maximum height of the editor
                focus: true                  // set focus to the editable area after initializing Summernote
            });
        });
    </script>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote.css') }}">
@endsection
