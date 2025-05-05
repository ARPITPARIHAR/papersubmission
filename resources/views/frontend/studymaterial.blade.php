@extends('frontend.layouts.app')
@section('meta_title','Study Material | '.env('APP_NAME'))
@section('meta_description','Study Material | '.env('APP_NAME'))
@section('content')

<section class="rlvng_ordrs">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2>Study Material</h2>
				<div class="ordr_fltr">
					<h4>Filters</h4>
					<div class="fltr_inr">
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label>Select Topics</label>
									<select name="">
										<option value="" selected="selected">Select Topics</option>
										<option value="1">Banking</option>
										<option value="2">Audit</option>
										<option value="3">Planning</option>
									</select>
								</div>
							</div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Search</label>
                                    <form action="{{ route('training.search') }}" method="GET">
                                        <input class="form-control" type="search" name="search" placeholder="Search" value="{{ request()->query('search') }}">
                                    </form>
                                </div>
                            </div>


				<div class="ordr_list">

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Topics</th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (\App\Models\Study::all() as $key => $trainingevent)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $trainingevent->title }}</td>
                                        <td>
                                            <a href="{{ route('studymaterial.show', ['id' => $trainingevent->id]) }}">
                                                <img src="{{ asset('images/view.png') }}" alt="view">
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

			</div>

		</div>
	</div>
</section>



@endsection

@section('style')

@endsection
@section('script')

@endsection
