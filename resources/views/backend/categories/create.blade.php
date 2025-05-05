@extends('backend.layouts.app')

@section('meta_title', __('Create Category'))
@section('page_name', __('Create Category'))
@section('page_description', __('Add a new top menu category'))

@section('name')
<li class="breadcrumb-item">
    <a href="{{ route('dashboard') }}"> <i class="feather icon-home"></i> </a>
</li>
<li class="breadcrumb-item"><a href="#!">{{ __('Create Category') }}</a></li>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>@yield('page_name')</h5>
            </div>
            <div class="card-block">
                 <form action="{{ route('categories.store') }}" method="POST"> 
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Category Name') }}</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="{{ __('Enter Category Name') }}" class="form-control @error('name') form-control-danger @enderror">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Page Link') }}</label>
                        <div class="col-sm-10">
                            <input type="text" name="page_link" value="{{ old('page_link', '#') }}" placeholder="{{ __('Enter Page Link') }}" class="form-control @error('page_link') form-control-danger @enderror">
                            @error('page_link')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Active') }}</label>
                        <div class="col-sm-10">
                            <input type="checkbox" name="active" value="1" {{ old('active') ? 'checked' : '' }}>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Serial No.') }}</label>
                        <div class="col-sm-10">
                            <input type="number" name="serial_no" value="{{ old('serial_no', 0) }}" class="form-control @error('serial_no') form-control-danger @enderror">
                            @error('serial_no')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 text-right">
                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                            <a href="{{ route('categories.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
