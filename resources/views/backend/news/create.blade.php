@extends('backend.layouts.app')
@section('meta_title',__('Add News'))

@section('page_name',__('Add News'))

@section('page_description',__('Add News'))
@section('name')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}"> <i class="feather icon-home"></i> </a>
    </li>
    <li class="breadcrumb-item"><a href="#!">{{ __('Add News') }}</a>
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
                <form action="{{ route('news.store') }}" method="POST">
                    @csrf
                    {{-- <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Title') }}</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" id="title" value="{{ old('title')}}" placeholder="{{ __('Enter Title') }}" class="form-control @error('title') form-control-danger @enderror">
                           <span class="messages">
                                @error('title')
                                    <p class="text-danger error">{{ $message }}</p>
                                @else
                                    <p class="text-muted">{{ __('') }}</p>
                                @enderror
                            </span>
                        </div>
                    </div> --}}
                     <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('News Title') }}</label>
                        <div class="col-sm-10">
                            <textarea name="news_description" id="news_description" placeholder="{{ __('Enter News') }}" class="form-control @error('news_description') form-control-danger @enderror">{{ old('news_description')}}</textarea>
                            @error('news_description')
                                <p class="text-danger error">{{ $message }}</p>
                            @else
                                <p class="text-muted">{{ __('') }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Newslink') }}</label>
                        <div class="col-sm-10">
                            <input type="text" name="hyperlink" id="hyperlink" value="{{ old('hyperlink')}}" placeholder="{{ __('Enter Hyperlink') }}" class="form-control @error('hyperlink') form-control-danger @enderror">
                            @error('hyperlink')
                            <p class="text-danger error">{{ $message }}</p>
                            @else
                            <p class="text-muted">{{ __('') }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Date') }}</label>
                        <div class="col-sm-10">
                            <input type="date" name="date" id="date" value="{{ old('date') }}" class="form-control @error('date') form-control-danger @enderror">
                            @error('date')
                            <p class="text-danger error">{{ $message }}</p>
                            @else
                            <p class="text-muted">{{ __('') }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Status Column -->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Status') }}</label>
                        <div class="col-sm-10">
                            <select name="status" id="status" class="form-control @error('status') form-control-danger @enderror">
                                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>{{ __('Active') }}</option>
                                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>{{ __('Inactive') }}</option>
                            </select>
                            @error('status')
                            <p class="text-danger error">{{ $message }}</p>
                            @else
                            <p class="text-muted">{{ __('') }}</p>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Image') }}</label>
                        <div class="col-sm-10">
                            <input type="file" name="image" id="image" class="form-control @error('image') form-control-danger @enderror">
                            @error('image')
                                <p class="text-danger error">{{ $message }}</p>
                            @else
                                <p class="text-muted">{{ __('') }}</p>
                            @enderror
                        </div>
                    </div> --}}
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
