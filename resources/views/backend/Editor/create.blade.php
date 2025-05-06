@extends('backend.layouts.app')
@section('meta_title',__('Add Staff'))

@section('page_name',__('Add Staff'))

@section('page_description',__('Add Staff'))
@section('name')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}"> <i class="feather icon-home"></i> </a>
    </li>
    <li class="breadcrumb-item"><a href="#!">{{ __('Add Staff') }}</a>
    </li>
@endsection
@section('content')
<div class="row">
    <div class="col-sm-12">
        <!-- Basic Form Inputs card start -->

        <div class="card-block">
            <form action="{{ route('editor.store') }}" method="POST">
                @csrf

                <!-- Name -->
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter Staff Name"
                               class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">{{ __('Gmail') }}</label>
                    <div class="col-sm-10">
                        <input type="email" name="email"  placeholder="Enter Email Address"
                               class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Password -->
              <!-- Password -->
<div class="form-group row">
    <label class="col-sm-2 col-form-label">{{ __('Password') }}</label>
    <div class="col-sm-10 position-relative">
        <input type="password" name="password" id="password" placeholder="Enter Password"
               class="form-control @error('password') is-invalid @enderror">

        </span>
        @error('password')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">{{ __('Confirm Password') }}</label>
    <div class="col-sm-10">
        <div class="input-group">
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password"
                   class="form-control">
            <div class="input-group-append">
                <span class="input-group-text" style="cursor:pointer;" onclick="togglePassword('password_confirmation', this)">
                    <i class="fas fa-eye"></i>
                </span>
            </div>
        </div>
    </div>
</div>



                <!-- User Type -->
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">{{ __('User Type') }}</label>
                    <div class="col-sm-10">
                        <select name="user_type" class="form-control @error('user_type') is-invalid @enderror">
                            <option value="">Select User Type</option>
                            <option value="admin" {{ old('user_type') == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="staff" {{ old('user_type') == 'staff' ? 'selected' : '' }}>Staff</option>
                            <option value="author" {{ old('user_type') == 'author' ? 'selected' : '' }}>Author</option>
                            <option value="author" {{ old('user_type') == 'author' ? 'selected' : '' }}>C.A.</option>
                        </select>
                        @error('user_type')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Submit -->
                <div class="form-group row">
                    <div class="col-sm-12 text-right">
                        <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                    </div>
                </div>
            </form>

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
    <script>
        function togglePassword(id, element) {
            const input = document.getElementById(id);
            const icon = element.querySelector('i');

            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = "password";
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>

@endsection
@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote.css') }}">
@endsection
