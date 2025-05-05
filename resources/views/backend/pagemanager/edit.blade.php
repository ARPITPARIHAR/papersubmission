@extends('backend.layouts.app')

@section('meta_title', __('Edit Menu Item'))
@section('page_name', __('Edit Menu Item'))
@section('page_description', __('Edit an existing menu item'))

@section('name')
<li class="breadcrumb-item">
    <a href="{{ route('dashboard') }}"> <i class="feather icon-home"></i> </a>
</li>
<li class="breadcrumb-item"><a href="#!">{{ __('Edit Menu Item') }}</a></li>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>@yield('page_name')</h5>
            </div>
            <div class="card-block">
                <form action="{{ route('menu.update', $menu->id) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- This is important for updating the record -->

                    <!-- Filename -->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Filename') }}</label>
                        <div class="col-sm-6">
                            <input type="text" name="filename" value="{{ old('filename', $menu->filename) }}" class="form-control @error('filename') form-control-danger @enderror">
                            @error('filename')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Link Name -->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Link Name') }}</label>
                        <div class="col-sm-6">
                            <input type="text" name="link_name" value="{{ old('link_name', $menu->link_name) }}" class="form-control @error('link_name') form-control-danger @enderror">
                            @error('link_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Page Title -->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Page Title') }}</label>
                        <div class="col-sm-6">
                            <input type="text" name="page_title" value="{{ old('page_title', $menu->page_title) }}" class="form-control @error('page_title') form-control-danger @enderror">
                            @error('page_title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Keyword -->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Keyword') }}</label>
                        <div class="col-sm-6">
                            <input type="text" name="keyword" value="{{ old('keyword', $menu->keyword) }}" class="form-control @error('keyword') form-control-danger @enderror">
                            @error('keyword')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                        <div class="col-sm-6">
                            <textarea name="description" class="form-control @error('description') form-control-danger @enderror">{{ old('description', $menu->description) }}</textarea>
                            @error('description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Heading -->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Heading') }}</label>
                        <div class="col-sm-6">
                            <input type="text" name="heading" value="{{ old('heading', $menu->heading) }}" class="form-control @error('heading') form-control-danger @enderror">
                            @error('heading')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Serial No. -->
                   
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Content') }}</label>
                        <div class="col-sm-10">
                            <textarea name="content" class="form-control @error('content') form-control-danger @enderror">{{ old('content', $menu->content) }}</textarea>
                            @error('content')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <!-- Submit Button -->
                    <div class="form-group row">
                        <div class="col-sm-6 offset-sm-2">
                            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
