<?php

namespace App\Http\Controllers;

use App\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
	/**
	* Instantiate a new controller instance.
	*
	* @return void
	*/
	public function __construct()
	{
		$this->middleware( 'auth' );
		$this->middleware( 'auth.isAdmin' );
	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function index()
	{
		$level = Level::all();
		return view( 'level.index', compact( 'level' ) );
	}

	/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function create()
	{
		$is_edit = false;
		$level = new Level;
		return view( 'level.store', compact( 'is_edit', 'level' ) );
	}

	/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
	public function store(Request $request)
	{
		$this->validate( $request, [
			'name' => 'required|unique:levels,name',
		] );

		$level = new Level;
		return $this->storeUpdate( $request, $level );
	}

	/**
     * Store a newly created resource in storage.
	 * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Level  $level
     * @return \Illuminate\Http\Response
     */
	public function storeUpdate( Request $request, Level $level, $is_edit = false ) {
		// store
		$level->name = $request->name;
		$level->save();

		// redirect
		$msg = $is_edit ? 'updated' : 'created';
		\Session::flash( 'message', "Successfully $msg the unit!" );
		\Session::flash( 'alert-class', 'success' );
		return redirect()->route( 'level.show', $level->id );
	}

	/**
     * Display the specified resource.
     *
     * @param  \App\Level  $level
     * @return \Illuminate\Http\Response
     */
	public function show(Level $level)
	{
		$groups = $level->grup;
		return view( 'level.show', compact( 'level', 'groups' ) );
	}

	/**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Level  $level
     * @return \Illuminate\Http\Response
     */
	public function edit(Level $level)
	{
		$is_edit = true;
		return view( 'level.store', compact( 'is_edit', 'level' ) );
	}

	/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Level  $level
     * @return \Illuminate\Http\Response
     */
	public function update(Request $request, Level $level)
	{
		$this->validate( $request, [
			'name' => 'required|unique:levels,name,' . $level->name . ',name',
		] );

		return $this->storeUpdate( $request, $level, true );
	}

	/**
     * Remove the specified resource from storage.
     *
     * @param  \App\Level  $level
     * @return \Illuminate\Http\Response
     */
	public function destroy(Level $level)
	{
		//
	}
}

