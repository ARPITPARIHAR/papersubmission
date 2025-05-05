@extends('backend.layouts.app')

@section('meta_title', __('Manage Subcategories'))
@section('page_name', __('Manage Subcategories'))
@section('page_description', __('Add and manage subcategories for a category'))

@section('name')
<li class="breadcrumb-item">
    <a href="{{ route('dashboard') }}"> <i class="feather icon-home"></i> </a>
</li>
<li class="breadcrumb-item"><a href="{{ route('categories.index') }}">{{ __('Manage Categories') }}</a></li>
<li class="breadcrumb-item"><a href="#!">{{ __('Manage Subcategories') }}</a></li>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>@yield('page_name')</h5>
            </div>
            <div class="card-block">
                <!-- Subcategory Form -->
                <form action="{{ route('categories.subcategories.store', $category->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="category_name">{{ __('Main Category:') }}</label>
                        <!-- Show the Main Category Name dynamically here -->
                        <input type="text" class="form-control" id="category_name" value="{{ $category->name }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="name">{{ __('Sub Category Name') }}</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Sub Category Name" required>
                    </div>
                    <div class="form-group">
                        <label for="serial_no">{{ __('Serial No.') }}</label>
                        <input type="number" name="serial_no" id="serial_no" class="form-control" placeholder="Serial No." required>
                    </div>

                    <div class="form-group">
                        <label for="active">{{ __('Active') }}</label>
                        <select name="active" id="active" class="form-control">
                            <option value="1">{{ __('Active') }}</option>
                            <option value="0">{{ __('Inactive') }}</option>
                        </select>
                    </div>

                    <!-- New Page Link Field -->
                    <div class="form-group">
                        <label for="page_link">{{ __('Page Link') }}</label>
                        <input type="url" name="page_link" id="page_link" class="form-control" placeholder="Page Link (URL)">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                        <a href="{{ route('categories.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                    </div>
                </form>

                <!-- Main Category -->
                <h5>{{ __('Main Category:') }} {{ $category->name }}</h5>

                <!-- Subcategories Table -->
                <div class="table-responsive mt-4">
                    <table class="table table-bordered">
                        <thead>
                            <tr>

                                <th>{{ __('Sub Category Name') }}</th>
                                <th>{{ __('Serial No.') }}</th>
                                <th>{{ __('Page Link') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Edit') }}</th>
                                <th>{{ __('Delete') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($subcategories as $subcategory)
                            <tr>
                           <!-- Display the main category name -->
                                <td>{{ $subcategory->name }}</td>
                                <td>{{ $subcategory->serial_no }}</td>
                                <td><a href="{{ $subcategory->page_link }}" target="_blank">{{ $subcategory->page_link }}</a></td> <!-- Display the page link -->
                                <td>{{ $subcategory->active ? __('Active') : __('Inactive') }}</td>
                                <td>
                                    <a href="{{ route('categories.subcategories.edit', ['category' => encrypt($category->id), 'subcategory' => encrypt($subcategory->id)]) }}" class="btn btn-primary">Edit</a>
                                </td>
                                <td>


                                    <a href="{{ route('categories.subcategories.destroy', ['category' => encrypt($category->id), 'subcategory' => encrypt($subcategory->id)]) }}"
                                        class="btn  btn-danger">{{ __('Delete') }}</a>
                                     </a>


                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">{{ __('No subcategories found.') }}</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
