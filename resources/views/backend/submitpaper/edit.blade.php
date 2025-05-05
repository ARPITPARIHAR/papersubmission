@extends('backend.layouts.app')
@section('meta_title',__('Edit Training'))

@section('page_name',__('Edit Submit Paper'))

@section('page_description',__('Edit Submit Paper'))
@section('name')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}"> <i class="feather icon-home"></i> </a>
    </li>
    <li class="breadcrumb-item"><a href="#!">{{ __('Edit Training') }}</a>
    </li>
@endsection
@section('content')
<div class="row">
    <div class="col-sm-12">
        <!-- Basic Form Inputs card start -->
        <div class="card">
            <div class="card-header">
               @session('success')
               <h5 class="text-success">{{ session('success') }}</h5>
               @else
                <h5>@yield('page_name')</h5>
               @endsession
            </div>
            <div class="card-block">
                <form action="{{ route('submitpaper.update',encrypt($paper->id)) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Author Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="author_name" class="form-control" value="{{ old('author_name', $paper->author_name) }}">
                        </div>
                    </div>

                    {{-- Country --}}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Country</label>
                        <div class="col-sm-10">
                            <input type="text" name="country" class="form-control" value="{{ old('country', $paper->country) }}">
                        </div>
                    </div>

                    {{-- Corresponding Author Email --}}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" class="form-control" value="{{ old('email', $paper->email) }}">
                        </div>
                    </div>

                    {{-- Co-authors --}}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Co-authors</label>
                        <div class="col-sm-10">
                            <input type="text" name="co_authors" class="form-control" value="{{ old('co_authors', $paper->co_authors) }}">
                        </div>
                    </div>

                    {{-- Contact Number --}}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Contact Number</label>
                        <div class="col-sm-10">
                            <input type="text" name="phone" class="form-control" value="{{ old('phone', $paper->phone) }}">
                        </div>
                    </div>

                    {{-- Address --}}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <textarea name="address" class="form-control">{{ old('address', $paper->address) }}</textarea>
                        </div>
                    </div>

                    {{-- Paper ID --}}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Paper ID</label>
                        <div class="col-sm-10">
                            <input type="text" name="paper_id" class="form-control" value="{{ old('paper_id', $paper->paper_id) }}">
                        </div>
                    </div>

                    {{-- Paper Title --}}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Paper Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="paper_title" class="form-control" value="{{ old('paper_title', $paper->paper_title) }}">
                        </div>
                    </div>

                    {{-- Journal Name --}}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Journal Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="journal_name" class="form-control" value="{{ old('journal_name', $paper->journal_name) }}">
                        </div>
                    </div>

                    {{-- Final Manuscript --}}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Final Manuscript (PDF)</label>
                        <div class="col-sm-10">
                            <input type="file" name="manuscript_img" class="form-control">
                            @if($paper->manuscript_img)
                                <small class="text-muted">Current: <a href="{{ $paper->manuscript_img }}" target="_blank">{{ basename($paper->manuscript_img) }}</a></small>
                            @endif
                        </div>
                    </div>

                    {{-- Copyright Form --}}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Copyright Form (PDF)</label>
                        <div class="col-sm-10">
                            <input type="file" name="copyright_img" class="form-control">
                            @if($paper->copyright_img)
                                <small class="text-muted">Current: <a href="{{ $paper->copyright_img }}" target="_blank">{{ basename($paper->copyright_img) }}</a></small>
                            @endif
                        </div>
                    </div>

                    {{-- Payment Receipt --}}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Payment Receipt (PDF)</label>
                        <div class="col-sm-10">
                            <input type="file" name="payment_img" class="form-control">
                            @if($paper->payment_img)
                                <small class="text-muted">Current: <a href="{{ $paper->payment_img }}" target="_blank">{{ basename($paper->payment_img) }}</a></small>
                            @endif
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-8">
                            <div>
                                <button type="submit" class="btn btn-primary float-sm-right">{{ __('Update') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('modal')

@endsection
@section('scripts')
    <script type="text/javascript" src="{{ asset('backend/plugins/i18next/js/i18next.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/plugins/i18next-xhr-backend/js/i18nextXHRBackend.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/plugins/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/plugins/jquery-i18next/js/jquery-i18next.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/plugins/summernote/summernote.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#description').summernote();
        });
    </script>
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote.css') }}">
@endsection
