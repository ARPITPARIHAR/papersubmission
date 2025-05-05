@extends('backend.layouts.app')

@section('meta_title', __('Contact Queries'))

@section('page_name', __('Contact Queries'))

@section('page_description', __('Contact Queries'))

@section('name')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}"> <i class="feather icon-home"></i> </a>
    </li>
    <li class="breadcrumb-item"><a href="#!">{{ __('Contact Queries') }}</a></li>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-block">
                <div class="dt-responsive table-responsive">
                    <table id="contact-table" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __(' Name') }}</th>

                                <th>{{ __('Subject') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Message') }}</th>
                                <th>{{ __('Actions') }}</th> <!-- Added Actions column -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $key => $contact)
                            <tr>
                                <td>{{ $contacts->firstItem() + $key }}</td>

                                <td>{{ $contact->name }}</td>

                                <td>{{ $contact->subject }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->message }}</td>
                                <td>
                                    <form action="{{ route('contacts.delete', encrypt($contact->id)) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this contact?')">
                                            {{ __('Delete') }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>{{ __(' Name') }}</th>

                                <th>{{ __('Subject') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Message') }}</th>
                                <th>{{ __('Actions') }}</th> 
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="col-md-12 d-flex justify-content-end mt-3">
                    <nav aria-label="Page navigation">
                        {{ $contacts->appends(request()->query())->links('pagination::bootstrap-5') }}
                    </nav>
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
<script>
    // Any additional scripts can be added here
</script>
@endsection

@section('styles')
<style>
    /* Any additional styles can be added here */
</style>
@endsection
