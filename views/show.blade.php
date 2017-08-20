@extends('layouts.app')

@section('content')
<ul class="breadcrumb">
	<li><a href="{{ route( 'level.index' ) }}">Unit</a></li>
	<li class="active"><a href="{{ route( 'level.show', $level->id ) }}">{{ $level->name }}</a></li>
</ul>

<div class="text-right pb-3">
	<a href="{{ route( 'level.edit', $level->id ) }}" class="btn btn-primary">Edit this unit</a>
</div>

<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">List Grup Attached - {{ $level->name }}</h3>
	</div>
	<div class="list-group">
		@forelse ( $groups as $group )
		<a href="{{ route( 'group.show', $group->id ) }}" class="list-group-item">
			{{ $group->name }}
		</a>

		@empty
		<div class="text-center list-group-item">
			There was no grup assigned currently.
		</div>

		@endforelse
	</div>
</div>

@endsection
