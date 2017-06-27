@extends('layouts.app')

@section('content')
	<section class="section">
		@include('account.layouts.partials._stats')
		<div class="container">
			<div class="columns">
				<div class="column is-one-quarter">
					@include('account.layouts.partials._navigation')
				</div>
				<div class="column">
					@include('layouts.partials._flash')
					@yield('account.content')
				</div>
			</div>
		</div>
	</section>
@endsection