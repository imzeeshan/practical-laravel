<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller {

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index() {
        $users = \Modules\User\Entities\User::paginate(10);
        return view('user::index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create() {
        return view('user::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id) {
        return view('user::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id) {
        $user = \Modules\User\Entities\User::find($id);
        return view('user::edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id) {
        $user = \Modules\User\Entities\User::find($id);

        if ($request->get('name'))
            $user->name = $request->get('name');

        if ($request->get('email'))
            $user->email = $request->get('email');

        if ($request->get('password'))
            $user->password = bcrypt($request->get('password'));

        $user->save();

        return Redirect::route('user.index')->with('message', 'User updated!');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id) {
        $user = \Modules\User\Entities\User::find($id);
        $user->delete();

        return Redirect::route('user.index')->with('message', 'User deleted!');
    }

}
