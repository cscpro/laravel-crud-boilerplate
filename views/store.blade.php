@extends('layouts.app')

@section('content')
<ul class="breadcrumb">
	<li><a href="{{ route( 'level.index' ) }}">Unit</a></li>
	@if ( $is_edit )
	<li><a href="{{ route( 'level.show', $level->id ) }}">Edit {{ $level->name }}</a></li>
	@else
	<li><a href="{{ route( 'level.store' ) }}">Create Unit</a></li>
	@endif
</ul>

<form method="post" action="{{ $is_edit ? route( 'level.show', $level->id ) : route( 'level.index' ) }}" class="form-horizontal well">
	<legend>{{ $is_edit ? 'Edit ' . $level->name : 'Create new' }} unit</legend>
	<div class="form-group">
		<label for="level-name" class="col-md-2 control-label">Nama Unit</label>
		<div class="col-md-9">
			<input type="text" class="form-control" name="name" id="level-name" value="{{ old( 'name', $level->name ) }}" required>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-9 col-md-offset-2">
			<button onclick="window.history.go(-1); return false;" class="btn btn-default">Cancel</button>
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
	</div>
	{{ $is_edit ? method_field( 'PUT' ) : '' }}
	{{ csrf_field() }}
</form>

@endsection
