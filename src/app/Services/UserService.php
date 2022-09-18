<?php

namespace App\Services;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class UserService {

    public static function seed(array $urls) : void
    {
        $data = self::prepare($urls);

        self::sync($data);
    }

    public static function filter(Request $request) : collection
    {
        $filteredData = [];

        if (request()->has('email')) {
            $filteredData = DB::table('users')->where('email','LIKE','%'.$request->email.'%')->get();
        } elseif (request()->has('firstname')) {
            $filteredData = DB::table('users')->where('firstname','LIKE','%'.$request->firstname.'%')->get();
        } elseif (request()->has('lastname')) {
            $filteredData = DB::table('users')->where('lastname','LIKE','%'.$request->lastname.'%')->get();
        } else {
            $filteredData =  collect("No filter match the cretiria");
        }

        return $filteredData;
    }

    private static function prepare(array $urls) : Collection
    {
        $userSchemeOne = Http::get($urls[0])->collect();
        $userSchemeTwo = Http::get($urls[1])->collect();

        $allUsers  = collect($userSchemeOne->merge($userSchemeTwo)); 

        return $allUsers;
    }


    private static function sync(collection $data) : void 
    {
        $userData = [];

        foreach ($data as $user)
        {
            if(!DB::table('users')->where('email', $user['email'])->exists()) {
                $user = collect($user);
                $userData['firstName'] = $user->has('firstName') ? $user['firstName'] : $user['fName'] ;
                $userData['lastName'] = $user->has('lastName') ? $user['lastName'] : $user['lName'] ;
                $userData['avatar' ] = $user->has('avatar') ? $user['avatar'] : $user['picture'] ;
                $userData['email'] = $user['email'];
                DB::table('users')->insert($userData); 
            }
            continue;
        }

    }

}