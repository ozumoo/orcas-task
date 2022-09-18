<?php

namespace App\Http\Controllers\API\Users;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    
    public function seed()
    {
        try { 
            $urls = [
                'https://60e1b5fc5a5596001730f1d6.mockapi.io/api/v1/users/users_1',
                'https://60e1b5fc5a5596001730f1d6.mockapi.io/api/v1/users/user_2'
            ];

            UserService::seed($urls);

            return response(["msg" => "data is successfuly seeded"] ,200 );

        } catch(\Illuminate\Database\QueryException $ex){ 
            return response(["msg" => $ex->getMessage() ] , 500); 
        }
    }

    public function search(Request $request)
    {
        $data = UserService::filter($request);

        return response(["data" => $data] , 200);
    }

    public function index()
    {
        return response(
            DB::table('users')->paginate(10), 200
        );
    }

}
