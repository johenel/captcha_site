<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->status ? $request->status : 'activated';

        $filters = new \stdClass();
        $filters->status = $status;

        $users = new Users();

        $users = $this->filterStatus($users, $filters);

        $response = [];

        $paginate = 2;

        if($request->page > 1) {
            $count = $users->count() - ($paginate * intval($request->page));
        } else {
            $count = $users->count();
        }

        $response['count'] = $count;
        $response['users'] = $users->with('activationRequests')->paginate($paginate);
        $response['status'] = $status;

        return view('pages.admin.users', $response);
    }

    private function filterStatus($users, $filters)
    {
        $status = 0;

        switch ($filters->status) {
            case 'activated':
                $status = 1;
        }

        return $users->where('is_activated', $status);
    }
}
