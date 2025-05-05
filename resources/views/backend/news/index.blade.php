@extends('backend.layouts.app')
@section('meta_title', __('News Description'))

@section('page_name', __('News Description'))

@section('page_description', __('News Description'))

@section('name')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}"> <i class="feather icon-home"></i> </a>
    </li>
    <li class="breadcrumb-item"><a href="#!">{{ __('News Description') }}</a></li>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <!-- Zero config.table start -->
        <div class="card">
            <div class="card-header row">
                <div class="col-sm-2">
                    <a href="{{ route('news.create') }}" class="btn btn-sm btn-primary">{{ __('Add News Description') }}</a>
                </div>
            </div>
            <div class="card-block">
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('News Title ') }}</th>
                                <th>{{ __('News LInk') }}</th>
                                <th>{{ __('Updated At') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($news as $key => $single_news)
                            <tr>
                                <td>{{ ($key + 1) + ($news->currentPage() - 1) * $news->perPage() }}</td>
                                <td>{{ $single_news->news_description }}</td>
                                <td>{{ $single_news->hyperlink }}</td>
                                <td>{{ date('d-m-Y h:iA', strtotime($single_news->updated_at)) }}</td>
                                <td>
                                    <a href="{{ route('news.edit', encrypt($single_news->id)) }}" class="btn btn-sm btn-primary">{{ __('Edit') }}</a>
                                    <a href="{{ route('news.delete', encrypt($single_news->id)) }}" class="btn btn-sm btn-danger">{{ __('Delete') }}</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>{{ __('News Description') }}</th>
                                <th>{{ __('Hyper LInk') }}</th>
                                <th>{{ __('Updated At') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-5">
                        <div class="dataTables_info" id="simpletable_info" role="status" aria-live="polite">
                            Showing {{ $news->firstItem() }} to {{ $news->lastItem() }} of {{ $news->total() }} entries
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7">
                        <div class="float-sm-right">
                            {{ $news->appends(request()->input())->links() }}
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
