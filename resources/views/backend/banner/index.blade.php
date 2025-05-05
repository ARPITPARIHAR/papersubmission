@extends('backend.layouts.app')
@section('meta_title',__('Banners'))

@section('page_name',__('Add Pdf'))

@section('page_description',__('Add Pdf'))
@section('name')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}"> <i class="feather icon-home"></i> </a>
    </li>
    <li class="breadcrumb-item"><a href="#!">{{ __('Add Pdf') }}</a>
    </li>
@endsection
@section('content')
<div class="row">
    <div class="col-sm-12">
        <!-- Zero config.table start -->
        <div class="card">
            <div class="card-header row">
                <div class="col-sm-2">
                    <a href="{{ route('banner.create') }}" class="btn btn-sm btn-primary">{{ __('Add Pdf') }}</a>
                </div>
            </div>
            <div class="card-block">
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Category') }}</th>
                                <th>{{ __('Pdf') }}</th>

                                <th>{{ __('Updated At') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($banners as $key=>$banner)
                            <tr>
                                <td>{{ ($key+1) + ($banners->currentPage() - 1)*$banners->perPage() }}</td>
                                <td>{{ $banner->subcategory_name }}</td>

   <td>
                @if($banner->thumbnail_img)
                    <a href="{{ ($banner->thumbnail_img) }}" target="_blank">
                        {{ basename($banner->thumbnail_img) }}
                    </a>
                @else
                    <span class="text-muted">No PDF</span>
                @endif
            </td>


                                <td>{{ date('d-m-Y h:iA',strtotime($banner->updated_at)) }}</td>
                                <td>
                                    <a href="{{ route('banner.edit',encrypt($banner->id)) }}" class="btn btn-sm btn-primary">{{ __('Edit') }}</a>
                                    <a href="{{ route('banner.delete',encrypt($banner->id)) }}" class="btn btn-sm btn-danger">{{ __('Delete') }}</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Category') }}</th>

                             <th>{{ __('pdf') }}</th>
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
