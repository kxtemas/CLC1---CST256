<?php
namespace App\Services;

use App\Models\UserProfileModel;
use Illuminate\Support\Facades\DB;

class ProfileDatabaseServices
{
    
    public function __construct()
    {}
    
    /**
     * Checks to see if the user's profile exists in the database.
     * @param int $userID : The user's ID number
     * @return boolean : TRUE-Exists , FALSE-Doesn't Exist
     */
    public function DoesUserProfileExistByUserID(int $userID)
    {
        // Get user database service
        $udbs = new UserDatabaseService();
        
        // Check to see if the provided user ID is not valid
        if(!$udbs->DoesUserExistByID($userID)) return FALSE;
        
        // Check to see if the user's profile exists
        return DB::table('userprofile')->where('UserID', $userID)->exists(); 
    }
    
    /**
     * Checks to see if the userID in the profile model corlates to a entry in the database.
     * @param UserProfileModel $userProfile
     * @return boolean
     */
    public function DoesUserProfileExistByProfileModel(UserProfileModel $userProfile)
    {
        // Get user database service
        $udbs = new UserDatabaseService();
        
        // Check to see if the provided user ID is not valid
        if(!$udbs->DoesUserExistByID($userProfile->getUserid())) return FALSE;
        
        // Check to see if the user's profile exists
        return DB::table('userprofile')->where('UserID', $userProfile->getUserid())->exists(); 
    }
    
    /**
     * Creates an empty user profile entry in the database if it doesn't exist already.
     * @param int $userID : The user's ID number
     * @return boolean : FALSE-Profile already exists or failed to be created , TRUE-Profile has been made
     */
    public function CreateEmptyUserProfile(int $userID)
    {
        // Check to see if the profile already exists
        if($this->DoesUserProfileExistByUserID($userID)) return FALSE;
        
        // Insert a empty profile by the userID
        DB::table('userprofile')->insert(['UserID' => $userID]);
        
        // Check to see if the profile was made
        if($this->DoesUserProfileExistByUserID($userID)) return TRUE;
        else return FALSE;
    }
    
    
    public function UpdateUserProfile(UserProfileModel $userProfile)
    {
        // Check to see if the profile does not exist
        if(!$this->DoesUserProfileExistByProfileModel($userProfile))
        {
            // Create an empty profile to replace the nonexistent one
            $result = $this->CreateEmptyUserProfile($userProfile->getUserid());
            
            // Check to see if it was not created
            if(!$result) return FALSE;
        }// End of if(!$this->DoesUserProfileExistByProfileModel($userProfile))
            
        
    }
    
    
    public function GetUserProfileByUserID(int $userID)
    {
        // Check to see if the profile does not exist
        if($this->DoesUserProfileExistByUserID($userID)) return FALSE;
        
        
    }
}

