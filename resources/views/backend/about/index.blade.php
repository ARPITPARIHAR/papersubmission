@extends('backend.layouts.app')
@section('meta_title', __('About'))

@section('page_name', __('About'))

@section('page_description', __('About'))

@section('name')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}"> <i class="feather icon-home"></i> </a>
    </li>
    <li class="breadcrumb-item"><a href="#!">{{ __('About') }}</a></li>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <!-- Zero config.table start -->
        <div class="card">
            <div class="card-header row">
                <div class="col-sm-2">
                    <a href="{{ route('about.create') }}" class="btn btn-sm btn-primary">{{ __('Add About') }}</a>
                </div>
            </div>
            <div class="card-block">
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Brief Description') }}</th>
                                <th>{{ __('Updated At') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($abouts as $key => $about)
                            <tr>
                                <td>{{ ($key + 1) + ($abouts->currentPage() - 1) * $abouts->perPage() }}</td>

                                <td>{!! $about->brief_description !!}</td>


                                <td>{{ date('d-m-Y h:iA', strtotime($about->updated_at)) }}</td>
                                <td>
                                    <a href="{{ route('about.edit', encrypt($about->id)) }}" class="btn btn-sm btn-primary">{{ __('Edit') }}</a>
                                    <a href="{{ route('about.delete', encrypt($about->id)) }}" class="btn btn-sm btn-danger">{{ __('Delete') }}</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Brief Description') }}</th>
                                <th>{{ __('Updated At') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-5">
                        <div class="dataTables_info" id="simpletable_info" role="status" aria-live="polite">
                            Showing {{ $abouts->firstItem() }} to {{ $abouts->lastItem() }} of {{ $abouts->total() }} entries
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7">
                        <div class="float-sm-right">
                            {{ $abouts->appends(request()->input())->links() }}
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
<style>
    .brief-description {
        max-height: 3em; /* Limit to approximately 3 lines */
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
</style>
@endsection
