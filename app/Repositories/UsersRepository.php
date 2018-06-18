<?php namespace App\Repositories;

use App\Repositories\EloquentBaseRepository;
use DB;
use App\Models\User;

class UsersRepository extends EloquentBaseRepository
{
    public function mytasks($id)
    {
        return $this->model->with('activetasks')->where('id', $id)->first();
    }

    public function myactiveprojects($id)
    {
        return $this->model->with('projects')->where('id', $id)->first();
    }

    public function myteam($id)
    {
        $users = DB::select('select member_id, my_id from team_user where my_id = ? or member_id = ?', [$id,$id]);
        $data = array();
        foreach ($users as $user) {
            if ($user->my_id <> $id) {
                $data[]=$user->my_id;
            }
            if ($user->member_id <> $id) {
                $data[]=$user->member_id;
            }            
        }
        $data=array_unique($data);
        return User::whereIn('id',$data)->get();
    }

}
