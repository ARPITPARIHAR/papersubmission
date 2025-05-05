@extends('backend.layouts.app')

@section('meta_title', __('Menu List'))
@section('page_name', __('Menu List'))
@section('page_description', __('Manage all menu items'))

@section('name')
<li class="breadcrumb-item">
    <a href="{{ route('dashboard') }}"> <i class="feather icon-home"></i> </a>
</li>
<li class="breadcrumb-item"><a href="#!">{{ __('Menu List') }}</a></li>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>@yield('page_name')</h5>
                <a href="{{ route('pagemanager.create') }}" class="btn btn-primary btn-sm">{{ __('Add New Menu Item') }}</a>
            </div>
            <div class="card-block">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('Filename') }}</th>
                            <th>{{ __('Page Name') }}</th>
                            <th>{{ __('Serial No.') }}</th>
                            <th>{{ __('Top Serial No.') }}</th>
                            <th>{{ __('Bottom Serial No.') }}</th>
                            <th>{{ __('Top Menu') }}</th>
                            <th>{{ __('Bottom Menu') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($menus as $menu)
                        <tr>
                            <td>{{ $menu->filename }}</td>
                            <td>{{ $menu->page_name }}</td>
                            <td>{{ $menu->serial_no }}</td>
                            <td>{{ $menu->top_serial_no }}</td>
                            <td>{{ $menu->bottom_serial_no }}</td>
                            <td>{{ $menu->top_menu }}</td>
                            <td>{{ $menu->bottom_menu }}</td>
                            <td>
                                <a href="{{ route('pagemanager.edit', $menu->id) }}" class="btn btn-warning btn-sm">{{ __('Edit') }}</a>

                                <form action="{{ route('pagemanager.destroy', $menu->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('{{ __('Are you sure you want to delete this item?') }}')">{{ __('Delete') }}</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tr>
                        <th>#</th>
                        <th>{{ __('Filename') }}</th>
                        <th>{{ __('Page Name') }}</th>
                        <th>{{ __('Serial No.') }}</th>
                        <th>{{ __('Top Serial No.') }}</th>
                        <th>{{ __('Bottom Serial No.') }}</th>
                        <th>{{ __('Top Menu') }}</th>
                        <th>{{ __('Bottom Menu') }}</th>
                        <th>{{ __('Actions') }}</th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

{{ $menus->links() }}  <!-- Pagination links -->
@endsection
