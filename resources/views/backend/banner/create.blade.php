@extends('backend.layouts.app')
@section('meta_title',__('Add Pdf'))

@section('page_name',__('Add Pdf'))

@section('page_description',__('Add Pdf'))
@section('name')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}"> <i class="feather icon-home"></i> </a>
    </li>
    <li class="breadcrumb-item"><a href="#!">{{ __('Add Pdf') }}</a>
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
                <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Subcategory') }}</label>
                        <div class="col-sm-10">
                            @php
                                $subcategories = \App\Models\Subcategory::all(); // Fetch subcategories
                            @endphp
                            <select name="subcategory_id" id="subcategory_id" class="form-control @error('subcategory_id') form-control-danger @enderror" onchange="setSubcategoryName()">
                                <option value="">{{ __('Select Subcategory') }}</option>
                                @foreach($subcategories as $subcategory)
                                    <option value="{{ $subcategory->id }}" {{ old('subcategory_id') == $subcategory->id ? 'selected' : '' }} data-name="{{ $subcategory->name }}">
                                        {{ $subcategory->name }}
                                    </option>
                                @endforeach
                            </select>
                            <input type="hidden" name="subcategory_name" id="subcategory_name" value="{{ old('subcategory_name') }}">
                            <span class="messages">
                                @error('subcategory_id')
                                    <p class="text-danger error">{{ $message }}</p>
                                @enderror
                            </span>
                        </div>
                    </div>

                    <script>
                        function setSubcategoryName() {
                            // Get selected option from the dropdown
                            var selectedOption = document.getElementById('subcategory_id').selectedOptions[0];

                            // Get the name from the 'data-name' attribute of the selected option
                            var subcategoryName = selectedOption.getAttribute('data-name');

                            // Set the hidden input field with the selected subcategory name
                            document.getElementById('subcategory_name').value = subcategoryName;
                        }
                    </script>






                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Pdf') }}</label>
                        <div class="col-sm-10">
                            <input type="file" name="logo" id="logo" class="form-control @error('logo') form-control-danger @enderror" accept=".pdf">
                            @error('logo')
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
