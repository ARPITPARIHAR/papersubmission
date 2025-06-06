@extends('backend.layouts.app')
@section('meta_title',__('Editor'))

@section('page_name',__('Editor'))

@section('page_description',__('Editor'))
@section('name')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}"> <i class="feather icon-home"></i> </a>
    </li>
    <li class="breadcrumb-item"><a href="#!">{{ __('Editor') }}</a>
    </li>
@endsection
@section('content')
<div class="row">
    <div class="col-sm-12">
        <!-- Zero config.table start -->
        <div class="card">
            <div class="card-header row">
                <div class="col-sm-2">
                    <a href="{{ route('editor.create') }}" class="btn btn-sm btn-primary">{{ __('Add Staff') }}</a>
                </div>
            </div>
            <div class="card-block">
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Nmae') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Password') }}</th>
                                <th>{{ __('UserType') }}</th>
                                <th>{{ __('Updated At') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($banners as $key => $banner)
                            <tr>
                                <td>{{ ($key+1) + ($banners->currentPage() - 1) * $banners->perPage() }}</td>

                                <td>{{ $banner->name }}</td>
                                <td>{{ $banner->email }}</td>
                                <td>{{ $banner->password }}</td>
                                <td>{{ $banner->user_type }}</td>

                                <td>{{ date('d-m-Y h:iA', strtotime($banner->updated_at)) }}</td>
                                <td>
                                    <a href="{{ route('editor.edit', encrypt($banner->id)) }}" class="btn btn-sm btn-primary">{{ __('Edit') }}</a>
                                    <a href="{{ route('editor.delete', encrypt($banner->id)) }}" class="btn btn-sm btn-danger">{{ __('Delete') }}</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Nmae') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Password') }}</th>
                                <th>{{ __('UserType') }}</th>
                                <th>{{ __('Updated At') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-5">
                        <div class="dataTables_info" id="simpletable_info" role="status" aria-live="polite"></div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7">
                        <div class="float-sm-right">
                            {{ $banners->appends(request()->input())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('modal')

@endsection
@section('scripts')

@endsection
@section('styles')

@endsection
