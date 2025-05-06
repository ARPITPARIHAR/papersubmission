@extends('backend.layouts.app')
@section('meta_title', __('Slider'))

@section('page_name', __(' Paper Summary'))

@section('page_description', __('Paper Summary'))
@section('name')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}"> <i class="feather icon-home"></i> </a>
    </li>
    <li class="breadcrumb-item"><a href="#!">{{ __('Submit Paper') }}</a></li>
@endsection
@section('content')
<div class="row">
    <div class="col-sm-12">
        <!-- Zero config.table start -->
        <div class="card">
            <div class="card-header row">
                {{-- <div class="col-sm-2">
                    <a href="{{ route('submitpaper.create') }}" class="btn btn-sm btn-primary">{{ __('Submit Ppaer') }}</a>
                </div> --}}
            </div>
            <div class="card-block">
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Author Name') }}</th>
                                <th>{{ __('Country') }}</th>

                                <th>{{ __('Paper Title') }}</th>
                                <th>{{ __('Journal Name') }}</th>

                                <th>{{ __('Payment Receipt') }}</th>
                                <th>{{ __('Amount') }}</th>

                                <th>{{ __('Updated At') }}</th>
                                <th>{{ __('Actions') }}</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($papers as $key=>$paper)
                            <tr>
                                <td>{{ ($key+1) + ($papers->currentPage() - 1)*$papers->perPage() }}</td>
                                <td>{{ $paper->author_name }}</td>
                                <td>{{ $paper->country}}</td>

                                <td>{{ $paper->paper_title}}</td>
                                <td>{{ $paper->journal_name }}</td>


                                <td>
                                    @if($paper->payment_img)
                                        <a href="{{ ($paper->payment_img) }}" target="_blank">
                                            {{ basename($paper->payment_img) }}
                                        </a>
                                    @else
                                        <span class="text-muted">No PDF</span>
                                    @endif
                                </td>



                                <td>{{ $paper->amount }} {{ $paper->currency }}</td>
                                <a href="{{ route('papers.export') }}" class="btn btn-sm btn-success">
                                    {{ __('Export to CSV') }}
                                </a>

                                <td>{{ date('d-m-Y h:iA', strtotime($paper->updated_at)) }}</td>
                                <td>
                                    {{-- <a href="{{ route('submitpaper.edit', encrypt($paper->id)) }}" class="btn btn-sm btn-primary">{{ __('Edit') }}</a> --}}
                                    <a href="{{ route('submitpaper.delete', encrypt($paper->id)) }}" class="btn btn-sm btn-danger">{{ __('Delete') }}</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Author Name') }}</th>
                                <th>{{ __('Country') }}</th>

                                <th>{{ __('Paper Title') }}</th>
                                <th>{{ __('Journal Name') }}</th>

                                <th>{{ __('Payment Receipt') }}</th>
                                <th>{{ __('Amount') }}</th>
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
                            {{ $papers->appends(request()->input())->links() }}
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
    .custom-badge {
        font-size: 1rem;         /* Smaller text */
        padding: 0.4rem 1rem;    /* Less padding */
        transition: all 0.3s ease;
        border-radius: 0.4rem;   /* Optional: rounded badge */
    }

    .custom-icon {
        font-size: 1.5rem;       /* Smaller icon */
        transition: all 0.3s ease;
    }

    .bg-published {
        background-color: #003366 !important;
        color: #fff !important;
    }

    .bg-published:hover {
        background-color: #001f33 !important;
    }

    .bg-unpublished {
        background-color: #f39c12 !important;
        color: #fff !important;
    }

    .bg-unpublished:hover {
        background-color: #e67e22 !important;
    }
</style>


@endsection
