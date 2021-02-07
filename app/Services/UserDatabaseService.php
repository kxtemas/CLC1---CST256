<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\User;

class UserDatabaseService
{

    public function __construct()
    {}
    
    /**
     * Checks the users table for the user with the id number from the parameter.
     * @param int $userID : The user id to check for
     * @return boolean : TRUE-User exists , FALSE-User doesn't exist
     */
    public function DoesUserExistByID(int $userID)
    {
        return DB::table('users')->where('id',$userID)->exists();
    }
    
    
}

