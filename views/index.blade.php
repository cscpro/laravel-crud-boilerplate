@extends('layouts.app')

@section('content')
<ul class="breadcrumb">
	<li><a href="{{ url( '/' ) }}">Home</a></li>
	<li class="active"><a href="{{ route( 'level.index' ) }}">Unit</a></li>
</ul>

<div class="text-right pb-3">
	<a href="{{ route( 'level.create' ) }}" class="btn btn-primary">Create new Unit</a>
</div>

<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">List Unit</h3>
	</div>
	<div class="list-group">
		@forelse ( $level as $level )
		<a href="{{ route( 'level.show', $level->id ) }}" class="list-group-item">
			{{ $level->name }}
		</a>

		@empty
		<div class="text-center list-group-item">
			There was no unit currently.
		</div>

		@endforelse
	</div>
</div>

@endsection
