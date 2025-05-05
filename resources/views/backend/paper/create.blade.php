@extends('backend.layouts.app')
@section('meta_title',__('Add Page'))

@section('page_name',__('Add Page'))

@section('page_description',__('Add Page'))
@section('name')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}"> <i class="feather icon-home"></i> </a>
    </li>
    <li class="breadcrumb-item"><a href="#!">{{ __('Add Page') }}</a>
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
                <form action="{{ route('admin.pages.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Select Page') }}</label>
                        <div class="col-sm-10">
                            <select name="page" class="form-control @error('page') form-control-danger @enderror">
                                <option value="">{{ __('Select Parent Page') }}</option>
                                @foreach ($pages as $page)
                                    <option value="{{ $page->id }}" @selected($page->id==old('page'))>{{ $page->name }}</option>
                                @endforeach
                            </select>
                            <span class="messages">
                                @error('page')
                                    <p class="text-danger error">{{ $message }}</p>
                                @else
                                    <p class="text-muted">{{ __("Leave it blank if you don't want to insert it on any page.") }}</p>
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" value="{{ old('name')}}" placeholder="{{ __('Enter Page Name') }}" class="form-control @error('name') form-control-danger @enderror">
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
                        <label class="col-sm-2 col-form-label">{{ __('Title') }}</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" id="title" value="{{ old('title')}}" placeholder="{{ __('Enter Page Title') }}" class="form-control @error('title') form-control-danger @enderror">
                           <span class="messages">
                                @error('title')
                                    <p class="text-danger error">{{ $message }}</p>
                                @else
                                    <p class="text-muted">{{ __('If you want to give a title other than your name then') }}</p>
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Meta Title') }}</label>
                        <div class="col-sm-10">
                            <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title')}}" placeholder="{{ __('Enter Meta Title') }}" class="form-control @error('meta_title') form-control-danger @enderror">
                            @error('meta_title')
                                <p class="text-danger error">{{ $message }}</p>
                            @else
                                <p class="text-muted">{{ __('') }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Meta Description') }}</label>
                        <div class="col-sm-10">
                            <input type="text" name="meta_description" id="meta_description" value="{{ old('meta_description')}}" placeholder="{{ __('Enter Meta Description') }}" class="form-control @error('meta_description') form-control-danger @enderror">
                            @error('meta_description')
                                <p class="text-danger error">{{ $message }}</p>
                            @else
                                <p class="text-muted">{{ __('') }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Brief Description') }}</label>
                        <div class="col-sm-10">
                            <textarea name="brief_description" id="brief_description" placeholder="{{ __('Enter Brief Description') }}" class="form-control @error('brief_description') form-control-danger @enderror">{{ old('brief_description')}}</textarea>
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
                        <label class="col-sm-2 col-form-label">{{ __('Header Img') }}</label>
                        <div class="col-sm-10">
                            <input type="file" name="header_img" id="header_img" class="form-control @error('header_img') form-control-danger @enderror">
                            @error('header_img')
                                <p class="text-danger error">{{ $message }}</p>
                            @else
                                <p class="text-muted">{{ __('') }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                        <div class="col-sm-10">
                            <textarea name="description" id="description" placeholder="{{ __('Enter Description') }}" class="form-control @error('description') invalid @enderror">{{ old('description')}}</textarea>
                            @error('description')
                                <p class="text-danger error">{{ $message }}</p>
                            @else
                                <p class="text-muted">{{ __('') }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Serial No.') }}</label>
                        <div class="col-sm-6">
                            <input type="number" name="serial_no" value="{{ old('serial_no', 0) }}" class="form-control @error('serial_no') form-control-danger @enderror">
                            @error('serial_no')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Top Menu -->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Top Menu') }}</label>
                        <div class="col-sm-6">
                            <input type="checkbox" name="top_menu" value="1" {{ old('top_menu') ? 'checked' : '' }}>
                        </div>
                    </div>

                    <!-- Top Serial No. -->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Top Serial No.') }}</label>
                        <div class="col-sm-6">
                            <input type="number" name="top_serial_no" value="{{ old('top_serial_no', 0) }}" class="form-control @error('top_serial_no') form-control-danger @enderror">
                            @error('top_serial_no')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Bottom Menu -->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Bottom Menu') }}</label>
                        <div class="col-sm-6">
                            <input type="checkbox" name="bottom_menu" value="1" {{ old('bottom_menu') ? 'checked' : '' }}>
                        </div>
                    </div>

                    <!-- Bottom Serial No. -->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Bottom Serial No.') }}</label>
                        <div class="col-sm-6">
                            <input type="number" name="bottom_serial_no" value="{{ old('bottom_serial_no', 0) }}" class="form-control @error('bottom_serial_no') form-control-danger @enderror">
                            @error('bottom_serial_no')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Bottom Position -->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Bottom Position') }}</label>
                        <div class="col-sm-6">
                            <select name="bottom_position" class="form-control @error('bottom_position') form-control-danger @enderror">
                                <option value="None" {{ old('bottom_position') == 'None' ? 'selected' : '' }}>{{ __('None') }}</option>
                                <option value="Left" {{ old('bottom_position') == 'Left' ? 'selected' : '' }}>{{ __('Left') }}</option>
                                <option value="Right" {{ old('bottom_position') == 'Right' ? 'selected' : '' }}>{{ __('Right') }}</option>
                            </select>
                            @error('bottom_position')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Left Menu -->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Left Menu') }}</label>
                        <div class="col-sm-6">
                            <input type="checkbox" name="left_menu" value="1" {{ old('left_menu') ? 'checked' : '' }}>
                        </div>
                    </div>

                    <!-- Left Position -->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Left Position') }}</label>
                        <div class="col-sm-6">
                            <select name="left_position" class="form-control @error('left_position') form-control-danger @enderror">
                                <option value="None" {{ old('left_position') == 'None' ? 'selected' : '' }}>{{ __('None') }}</option>
                                <option value="Top" {{ old('left_position') == 'Top' ? 'selected' : '' }}>{{ __('Top') }}</option>
                                <option value="Bottom" {{ old('left_position') == 'Bottom' ? 'selected' : '' }}>{{ __('Bottom') }}</option>
                            </select>
                            @error('left_position')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Left Serial No. -->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Left Serial No.') }}</label>
                        <div class="col-sm-6">
                            <input type="number" name="left_serial_no" value="{{ old('left_serial_no', 0) }}" class="form-control @error('left_serial_no') form-control-danger @enderror">
                            @error('left_serial_no')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Right Menu -->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Right Menu') }}</label>
                        <div class="col-sm-6">
                            <input type="checkbox" name="right_menu" value="1" {{ old('right_menu') ? 'checked' : '' }}>
                        </div>
                    </div>

                    <!-- Right Position -->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Right Position') }}</label>
                        <div class="col-sm-6">
                            <select name="right_position" class="form-control @error('right_position') form-control-danger @enderror">
                                <option value="None" {{ old('right_position') == 'None' ? 'selected' : '' }}>{{ __('None') }}</option>
                                <option value="Top" {{ old('right_position') == 'Top' ? 'selected' : '' }}>{{ __('Top') }}</option>
                                <option value="Bottom" {{ old('right_position') == 'Bottom' ? 'selected' : '' }}>{{ __('Bottom') }}</option>
                            </select>
                            @error('right_position')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Right Serial No. -->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Right Serial No.') }}</label>
                        <div class="col-sm-6">
                            <input type="number" name="right_serial_no" value="{{ old('right_serial_no', 0) }}" class="form-control @error('right_serial_no') form-control-danger @enderror">
                            @error('right_serial_no')
                                <p class="text-danger">{{ $message }}</p>
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
