@extends('backend.layouts.app')
@section('meta_title',__('Pages'))

@section('page_name',__('Paper'))

@section('page_description',__('Paper'))
@section('name')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}"> <i class="feather icon-home"></i> </a>
    </li>
    <li class="breadcrumb-item"><a href="#!">{{ __('Paper') }}</a>
    </li>
@endsection
@section('content')



<div class="row">
    <div class="col-sm-12">

        <div class="card">
            <div class="card-header row">
                {{-- <div class="col-sm-2">
                    <a href="{{ route('admin.pages.create') }}" class="btn btn-sm btn-primary">{{ __('Add Page') }}</a>
                </div> --}}
            </div>
            <div class="card-block">
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Papertitle') }}</th>
                                <th>{{ __('Journalname') }}</th>
                                <th>{{ __('Manuscript Image') }}</th>
                                 @if(auth()->user()->user_type == 'admin')
                                <th>{{ __('Copyright Image') }}</th>
                                 @endif
                                @if(auth()->user()->user_type == 'admin')
                                <th>{{ __('Payment Image') }}</th>
                            @endif



                                <th>{{ __('Publishing URL') }}</th>
                                <th>{{ __('Publishing Status') }}</th>
                                <th>{{ __('Published By') }}</th>
                                <th>{{ __('Updated At') }}</th>
                                {{-- <th>{{ __('Actions') }}</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($papers as $key => $paper)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $paper->paper_title }}</td>
                                    <td>{{ $paper->journal_name }}</td>
                                    <td>
                                        @if($paper->manuscript_img)
                                            <a href="{{ ($paper->manuscript_img) }}" target="_blank">
                                                {{ basename($paper->manuscript_img) }}
                                            </a>
                                        @else
                                            <span class="text-muted">No PDF</span>
                                        @endif
                                    </td>
                                    @if(auth()->user()->user_type == 'admin')
    <td>
        @if($paper->copyright_img)
            <a href="{{ $paper->copyright_img }}" target="_blank">
                {{ basename($paper->copyright_img) }}
            </a>
        @else
            <span class="text-muted">No PDF</span>
        @endif
    </td>

    <td>
        @if($paper->payment_img)
            <a href="{{ $paper->payment_img }}" target="_blank">
                {{ basename($paper->payment_img) }}
            </a>
        @else
            <span class="text-muted">No PDF</span>
        @endif
    </td>
@endif



                                    <td>
                                        <form action="{{ route('url.publish', $paper->id) }}" method="POST">
                                            @csrf
                                            <input type="url" name="publishing_url" class="form-control form-control-sm mb-2" placeholder="Enter URL"
                                                   value="{{ $paper->publishing_url }}" required>
                                            <button class="btn btn-sm btn-success w-100" type="submit">Submit</button>
                                        </form>
                                    </td>



                                    <td>
                                        @if($paper->publishing_url)
                                            <!-- Published Badge with Larger Size, Navy Blue, and Tooltip -->
                                            <span class="badge bg-published custom-badge" data-bs-toggle="tooltip" data-bs-placement="top" title="This paper has been published">
                                                <i class="fas fa-check-circle custom-icon"></i> Published
                                            </span>
                                        @else
                                            <!-- Unpublished Badge with Larger Size, Yellow, and Tooltip -->
                                            <span class="badge bg-unpublished custom-badge" data-bs-toggle="tooltip" data-bs-placement="top" title="This paper is not yet published">
                                                <i class="fas fa-times-circle custom-icon"></i> Unpublished
                                            </span>
                                        @endif
                                    </td>
                                    <td>{{ $paper->published_by ?? 'N/A' }}</td>

                                    <td>{{ date('d-m-Y h:iA', strtotime($paper->updated_at)) }}</td>
                                    {{-- <td>
                                        <a href="{{ route('paper.delete', encrypt($paper->id)) }}" class="btn btn-sm btn-danger">{{ __('Delete') }}</a>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                               <th>#</th>
                                <th>{{ __('Papertitle') }}</th>
                                <th>{{ __('Journalname') }}</th>
                                <th>{{ __('Manuscript Image') }}</th>
                                 @if(auth()->user()->user_type == 'admin')
                                <th>{{ __('Copyright Image') }}</th>
                                 @endif
                                @if(auth()->user()->user_type == 'admin')
                                <th>{{ __('Payment Image') }}</th>
                            @endif



                                <th>{{ __('Publishing URL') }}</th>
                                <th>{{ __('Publishing Status') }}</th>
                                <th>{{ __('Published By') }}</th>
                                <th>{{ __('Updated At') }}</th>
                                {{-- <th>{{ __('Actions') }}</th> --}}
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
    <link rel="stylesheet" href="{{ asset('backend/plugins/switchery/css/switchery.min.css') }}">

@endsection
<style>
.custom-badge {
    font-size: 2.75rem;  /* Adjust text size */
    padding: 1rem 2rem;
    transition: all 0.3s ease; /* Smooth transition for hover */
}

.custom-icon {
    font-size: 3rem;  /* Adjust the size of the icon */
    transition: all 0.3s ease; /* Smooth transition for hover */
}

.bg-published {
    background-color: #003366 !important;  /* Navy Blue background */
    color: #fff !important;  /* White text color */
}

.bg-published:hover {
    background-color: #001f33 !important;  /* Darker shade on hover */
}

.bg-unpublished {
    background-color: #f39c12 !important;  /* Yellow background */
    color: #fff !important;  /* White text color */
}

.bg-unpublished:hover {
    background-color: #e67e22 !important;  /* Darker shade on hover */
}
</style>
