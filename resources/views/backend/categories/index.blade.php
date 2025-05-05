@extends('backend.layouts.app')

@section('meta_title', __('Manage Categories'))
@section('page_name', __('Manage Categories'))
@section('page_description', __('List and manage all top menu categories'))

@section('name')
<li class="breadcrumb-item">
    <a href="{{ route('dashboard') }}"> <i class="feather icon-home"></i> </a>
</li>
<li class="breadcrumb-item"><a href="#!">{{ __('Manage Categories') }}</a></li>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>@yield('page_name')</h5>
                <a href="{{ route('categories.create') }}" class="btn btn-primary float-right">{{ __('Add New') }}</a>
            </div>
            <div class="card-block">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Category') }}</th>
                                <th>{{ __('Serial No.') }}</th>
                                {{-- <th>{{ __('Status') }}</th> --}}
                                <th>{{ __('Actions') }}</th>
                              <th>{{ __('Sub Category') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $key => $category)
                            <tr>
                                <td>{{ ($key + 1) + ($categories->currentPage() - 1) * $categories->perPage() }}</td>

                                <td>{{ $category->name }}</td>
                                <td>{{ $category->serial_no }}</td>
                                {{-- <td>
                                    <form action="{{ route('categories.toggle', $category->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-{{ $category->active ? 'success' : 'danger' }}">
                                            {{ $category->active ? __('Active') : __('Inactive') }}
                                        </button>
                                    </form>
                                </td> --}}
                                <td>
                                    <a href="{{ route('categories.edit',  encrypt($category->id)) }}" class="btn btn-sm btn-primary">{{ __('Edit') }}</a>
                                    <a href="{{ route('categories.destroy', encrypt($category->id))}}"class="btn btn-sm btn-danger">{{ __('Delete') }}</a>

                                    </a>
                                </td>

<td>
                                <a href="{{ route('categories.subcategories', $category->id) }}" class="btn btn-sm btn-info">{{ __('View Sub Categories') }}</a>
                            </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">{{ __('No categories found.') }}</td>
                            </tr>
                            @endforelse

                            <tr>
                                <th>#</th>
                                <th>{{ __('Category') }}</th>
                                <th>{{ __('Serial No.') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Actions') }}</th>
                              <th>{{ __('Sub Category') }}</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
