@extends('backend/layouts/default')

{{-- Page title --}}
@section('title')
View Model {{ $model->model_tag }} ::
@parent
@stop

{{-- Page content --}}
@section('content')

<div class="row header">
    <div class="col-md-12">
    	<a href="{{ route('update/model', $model->id) }}" class="btn btn-default pull-right"><i class="icon-plus-sign icon-white"></i> Update Model</a>
		<h3 class="name">History for {{ $model->name }} </h3>
	</div>
</div>

<div class="user-profile">
<div class="row profile">
<div class="col-md-9 bio">


                            <!-- checked out models table -->
							@if (count($model->assets) > 0)
                           <table id="example">
							<thead>
								<tr role="row">
                                        <th class="col-md-3">Name</th>
                                        <th class="col-md-3">Asset Tag</th>
                                        <th class="col-md-3">User</th>
                                        <th class="col-md-2">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

									@foreach ($model->assets as $modelassets)
									<tr>
										<td><a href="{{ route('view/hardware', $modelassets->id) }}">{{ $modelassets->name }}</a></td>
										<td><a href="{{ route('view/hardware', $modelassets->id) }}">{{ $modelassets->asset_tag }}</a></td>
										<td>
										@if ($modelassets->assigneduser)
										<a href="{{ route('view/user', $modelassets->assigned_to) }}">
										{{ $modelassets->assigneduser->fullName() }}
										</a>
										@endif
										</td>
										<td>
										@if ($modelassets->assigned_to != 0)
											<a href="{{ route('checkin/hardware', $modelassets->id) }}" class="btn-flat info">Checkin</a>
										@else
											<a href="{{ route('checkout/hardware', $modelassets->id) }}" class="btn-flat success">Checkout</a>
										@endif
										</td>

									</tr>
									@endforeach


                                </tbody>
                            </table>

                            @else
                            <div class="col-md-6">
								<div class="alert alert-info alert-block">
									<i class="icon-info-sign"></i>
									@lang('general.noresults')
								</div>
							</div>
                            @endif

                        </div>


                    <!-- side address column -->
                    <div class="col-md-3 col-xs-12 address pull-right">
                    <h6>More Info:</h6>
                       		<ul>


								@if ($model->manufacturer)
								<li>Manufacturer: {{ $model->manufacturer->name }}</li>
								@endif

								@if ($model->modelno)
								<li>Model No.: {{ $model->modelno }}</li>
								@endif

								@if ($model->depreciation)
								<li>Depreciation: {{ $model->depreciation->name }} ({{ $model->depreciation->months }} months)</li>
								@endif

								@if ($model->eol)
								<li>EOL: {{ $model->eol }} months</li>
								@endif

							</ul>



							<ul>
								<li><br><br /></li>
							</ul>

                    </div>
@stop