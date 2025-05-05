@extends('backend.layouts.app')

@section('meta_title', __('Create Menu Item'))
@section('page_name', __('Create Menu Item'))
@section('page_description', __('Add a new menu item with various properties'))

@section('name')
<li class="breadcrumb-item">
    <a href="{{ route('dashboard') }}"> <i class="feather icon-home"></i> </a>
</li>
<li class="breadcrumb-item"><a href="#!">{{ __('Create Menu Item') }}</a></li>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>@yield('page_name')</h5>
            </div>
            <div class="card-block">
                 <form action="{{ route('pagemanager.store') }}" method="POST">
                    @csrf
                    <!-- Filename -->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Filename') }}</label>
                        <div class="col-sm-6">
                            <input type="text" name="filename" value="{{ old('filename') }}" class="form-control @error('filename') form-control-danger @enderror">
                            @error('filename')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Link Name -->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Link Name') }}</label>
                        <div class="col-sm-6">
                            <input type="text" name="link_name" value="{{ old('link_name') }}" class="form-control @error('link_name') form-control-danger @enderror">
                            @error('link_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Page Title -->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Page Title') }}</label>
                        <div class="col-sm-6">
                            <input type="text" name="page_title" value="{{ old('page_title') }}" class="form-control @error('page_title') form-control-danger @enderror">
                            @error('page_title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Keyword -->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Keyword') }}</label>
                        <div class="col-sm-6">
                            <input type="text" name="keyword" value="{{ old('keyword') }}" class="form-control @error('keyword') form-control-danger @enderror">
                            @error('keyword')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                        <div class="col-sm-6">
                            <textarea name="description" class="form-control @error('description') form-control-danger @enderror">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Heading -->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Heading') }}</label>
                        <div class="col-sm-6">
                            <input type="text" name="heading" value="{{ old('heading') }}" class="form-control @error('heading') form-control-danger @enderror">
                            @error('heading')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Serial No. -->
                  
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Content') }}</label>
                        <div class="col-sm-6">
                            <textarea name="content" class="form-control @error('content') form-control-danger @enderror">{{ old('content') }}</textarea>
                            @error('content')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <!-- Submit Button -->
                    <div class="form-group row">
                        <div class="col-sm-6 offset-sm-2">
                            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
