@extends('backend.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Edit Subcategory</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('categories.subcategories.update', ['category' => encrypt($category->id), 'subcategory' => encrypt($subcategory->id)]) }}" method="POST">
           
                @csrf


 <div class="form-group">
                <label for="category_name">{{ __('Main Category:') }}</label>
                <input type="text" class="form-control" id="category_name" value="{{ $category->name }}" disabled>
            </div>

            <div class="form-group">
                <label for="name">{{ __('Sub Category Name') }}</label>
                <input type="text" class="form-control" name="name" value="{{ $subcategory->name }}" required>
            </div>

            <div class="form-group">
                <label for="serial_no">{{ __('Serial No.') }}</label>
                <input type="number" class="form-control" name="serial_no" value="{{ $subcategory->serial_no }}" required>
            </div>

            <div class="form-group">
                <label for="page_link">{{ __('Page Link') }}</label>
                <input type="url" class="form-control" name="page_link" value="{{ $subcategory->page_link }}">
            </div>

            <div class="form-group">
                <label for="active">{{ __('Active') }}</label>
                <select name="active" class="form-control" required>
                    <option value="1" {{ $subcategory->active ? 'selected' : '' }}>{{ __('Active') }}</option>
                    <option value="0" {{ !$subcategory->active ? 'selected' : '' }}>{{ __('Inactive') }}</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">{{ __('Update Subcategory') }}</button>
        </form>
    </div>
</div>
@endsection
