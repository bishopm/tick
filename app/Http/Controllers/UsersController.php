<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use App\Repositories\UsersRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * @var UserRepository
     */
    private $user;

    public function __construct(UsersRepository $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index()
    {
        return $this->user->all();
    }

    public function show($id)
    {
        return User::with('project')->find($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        return $this->user->create($request->all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  User $user
     * @param  Request $request
     * @return Response
     */
    public function update(User $user, Request $request)
    {
        return $this->user->update($user, $request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     * @return Response
     */
    public function destroy(User $user)
    {
        $this->user->destroy($user);
        return "Done!";
    }
}
