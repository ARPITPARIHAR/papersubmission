@extends('backend.layouts.app')
@section('meta_title',__('Edit Slider'))

@section('page_name',__('Edit Editor'))

@section('page_description',__('Edit Editor'))
@section('name')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}"> <i class="feather icon-home"></i> </a>
    </li>
    <li class="breadcrumb-item"><a href="#!">{{ __('Edit editor') }}</a>
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
                <form action="{{ route('editor.update', encrypt($banner->id)) }}" method="POST" >
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="title" value="{{ old('name') ?? $banner->name }}" placeholder="{{ __('Enter Name') }}" class="form-control @error('title') form-control-danger @enderror">
                            @error('title')
                                <p class="text-danger error">{{ $message }}</p>
                            @else
                                <p class="text-muted">{{ __('') }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" id="email" value="{{ old('email', $banner->email) }}" placeholder="{{ __('Enter Email') }}" class="form-control @error('email') form-control-danger @enderror">
                            @error('email')
                                <p class="text-danger error">{{ $message }}</p>
                            @else
                                <p class="text-muted">{{ __('') }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Password') }}</label>
                        <div class="col-sm-10">
                            <input type="text" name="password" id="password" value="{{ old('password') ?? $banner->password }}" placeholder="{{ __('Enter Password') }}" class="form-control @error('password') form-control-danger @enderror">
                            @error('password')
                                <p class="text-danger error">{{ $message }}</p>
                            @else
                                <p class="text-muted">{{ __('') }}</p>
                            @enderror
                        </div>
                    </div>



                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('User Type') }}</label>
                        <div class="col-sm-10">
                            <select name="user_type" class="form-control @error('user_type') is-invalid @enderror">
                                <option value="">Select User Type</option>
                                <option value="admin" {{ old('user_type', $banner->user_type) == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="staff" {{ old('user_type', $banner->user_type) == 'staff' ? 'selected' : '' }}>Staff</option>
                                <option value="author" {{ old('user_type', $banner->user_type) == 'author' ? 'selected' : '' }}>Author</option>
                                <option value="c.a." {{ old('user_type', $banner->user_type) == 'c.a.' ? 'selected' : '' }}>C.A.</option>
                            </select>
                            @error('user_type')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-8">
                            <div>
                                <button type="submit" class="btn btn-primary float-sm-right">{{ __('Update') }}</button>
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
