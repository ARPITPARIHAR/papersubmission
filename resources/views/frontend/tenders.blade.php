@extends('frontend.layouts.app')
@section('meta_title','Tenders | '.env('APP_NAME'))
@section('meta_description','Tenders | '.env('APP_NAME'))
@section('content')
<section class="inner_banner">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 no_padding">
                <div class="inr_bnr">
                    <img src="{{ asset('frontend/images/banner_inner.jpg') }}" alt="Tender">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="rlvng_ordrs">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2>Tenders Details</h2>

				<div class="ordr_list">
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>

                    <tr>
                        <th>S.No.</th>
                        <th>Months</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (\App\Models\Tender::where('category_id', 0)->get() as $key => $category)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $category->title }}</td>
                            <td>
                                <a href="{{ route('tender.show', ['id' => encrypt($category->id)]) }}">
                                    <img src="{{ asset('images/view.png') }}" alt="view">
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection

@section('style')
@endsection
@section('script')
@endsection
