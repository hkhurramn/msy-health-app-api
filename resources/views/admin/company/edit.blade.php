@extends('admin.dashboard')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
	<div class="row">
		@if(count($errors) > 0)
		  <ul>
		    @foreach($errors->all() as $error)
		      <li class="alert alert-danger">{{$error}}</li>
		    @endforeach
		  </ul>
		@endif
		<div class="col-md-12 col-sm-12">
			<div class="x_panel border-none">
				<div class="x_title d-flex justify-content-between">
					<h2>Update Company</h2>
				</div>

				<div class="x_content">
					<form class="form-horizontal form-label-left" method="post" action="{{ route('companies.update',$company->id) }}">
						@csrf
						@method('PUT')
						<div class="form-group row">
							<label class="col-form-label col-md-3 col-sm-3  label-align">Name<span
                          class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-6">
								<input type="text" class="form-control @error('cName') is-invalid @enderror" name="cName" value="{{ old('cName', $company->name) }}" required>
								@error('cName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-md-3 col-sm-3  label-align">Phone<span
                          class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-6">
								<input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone', $company->phone) }}" required>
								@error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-md-3 col-sm-3  label-align">Master Email<span
                          class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-6">
								<input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $company->key_contact_email) }}" required>
								@error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-md-3 col-sm-3  label-align">Add multiple CC Email Addresses (Separate with comma)</label>
							<div class="col-md-6 col-sm-6 col-xs-6">
								<input type="text" class="form-control @error('cc_email_addresses') is-invalid @enderror" name="cc_email_addresses" value="{{ old('cc_email_addresses', $company->cc_email_addresses) }}">
								@error('cc_email_addresses')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-md-3 col-sm-3  label-align">Country<span
                          class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-6">
								<select class="form-control" name="country_id" required>
									<option value="">Choose Country</option>
									@foreach($countries as $country)
										<option value="{{$country->id}}" {{($country->id === $company->country_id)?'selected':''}}>{{$country->name}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-md-3 col-sm-3  label-align">Address<span
                          class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-6">
								<textarea class="form-control" name="address" rows="2" required>{{ old('address', $company->address) }}</textarea>
							</div>
						</div>
						<div class="ln_solid"></div>
						<div class="form-group row">
							<div class="col-md-9 offset-md-3">
								
								<input type="submit" value="Update" class="btn btn-success">
							</div>
						</div>

					</form>
				</div>
                
            </div>

		</div>
	</div>
</div>
<!-- /page content -->


@endsection