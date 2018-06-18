<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use App\Repositories\UsersRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        $user = User::with('projects')->find($id);
        $user->team = $this->user->myteam($id);
        return $user;
    }

    public function login(Request $request)
    {
        $user=User::where('email',$request->email)->first();
        if (Hash::check($request->password, $user->password)){
            $user->team = $this->user->myteam($user->id);
            return $user;
        } else {
            return "Error";
        }
    }

    public function team($userid) {
        return $this->user->myteam($userid);
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
