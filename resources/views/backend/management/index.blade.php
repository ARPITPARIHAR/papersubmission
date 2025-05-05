@extends('backend.layouts.app')
@section('meta_title',__('Management'))

@section('page_name',__('Management'))

@section('page_description',__('Management'))
@section('name')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}"> <i class="feather icon-home"></i> </a>
    </li>
    <li class="breadcrumb-item"><a href="#!">{{ __('Management') }}</a>
    </li>
@endsection
@section('content')
<div class="row">
    <div class="col-sm-12">
        <!-- Zero config.table start -->
        <div class="card">
            <div class="card-header row">
                <div class="col-sm-2">
                    <a href="{{ route('management.create') }}" class="btn btn-sm btn-primary">{{ __('Add Management') }}</a>
                </div>
            </div>
            <div class="card-block">
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>#</th>

                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Thumbnail') }}</th>
                                <th>{{ __('Designation') }}</th>
                                <th>{{ __('Sub Designation') }}</th>
                                <th>{{ __('Brief description') }}</th>

                                <th>{{ __('Updated At') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($managements as $key=>$management)
                            <tr>
                                <td>{{ ($key+1) + ($managements->currentPage() - 1)*$managements->perPage() }}</td>

                                <td>{{ $management->name }}</td>
                                <td><img src="{{ asset($management->thumbnail_img) }}" width="90"></td>
                                <td>{{ $management->designation }}</td>
                                <td>{{ $management->sub_designation }}</td>
                                <td>{{ $management->brief_description	 }}</td>

                                <td>{{ date('d-m-Y h:iA',strtotime($management->updated_at)) }}</td>
                                <td>
                                    <a href="{{ route('management.edit',encrypt($management->id)) }}" class="btn btn-sm btn-primary">{{ __('Edit') }}</a>
                                    <a href="{{ route('management.delete',encrypt($management->id)) }}" class="btn btn-sm btn-danger">{{ __('Delete') }}</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>

                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Thumbnail') }}</th>
                                <th>{{ __('Designation') }}</th>
                                <th>{{ __('Sub Designation') }}</th>
                                <th>{{ __('Brief description') }}</th>
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
                            {{ $managements->appends(request()->input())->links() }}
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
