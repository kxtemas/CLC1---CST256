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
        if(!($udbs->DoesUserExistByID($userProfile->getUserid()))) return FALSE;
        
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
    
    /**
     * Updates the user's profile on the database
     * @param UserProfileModel $userProfile : The profile to update to
     * @return boolean : TRUE-Profile updated , FALSE-Profile failed to update
     */
    public function UpdateUserProfile(UserProfileModel $userProfile)
    {
        // Check to see if the profile does not exist
        if(!($this->DoesUserProfileExistByProfileModel($userProfile)))
        {
            // Create an empty profile to replace the nonexistent one
            $result = $this->CreateEmptyUserProfile($userProfile->getUserid());
            
            // Check to see if it was not created
            if(!$result) return FALSE;
        }// End of if(!$this->DoesUserProfileExistByProfileModel($userProfile))
        
        // Create an array from the user profile data
        $valuesArray = 
        [
            'UserID' => $userProfile->getUserid(),
            'PhoneNumber' => $userProfile->getPhoneNumber(),
            'DateOfBirth' => $userProfile->getDateOfBirth(),
            'Street' => $userProfile->getStreet(),
            'City' => $userProfile->getCity(),
            'State' => $userProfile->getState(),
            'ZipCode' => $userProfile->getZipCode(),
            'EmploymentStatus' => $userProfile->getEmploymentStatus(),
            'Occupation' => $userProfile->getOccupation(),
            'CompanyName' => $userProfile->getCompanyName(),
            'EducationalBackground' => $userProfile->getEducationalBackground()
        ];
        
        // Update the user's profile
        DB::table('userprofile')->where('UserID', $userProfile->getUserid())->update($valuesArray);
    
        // Check to see if the profile was updated
        $updatedProfile = $this->GetUserProfileByUserID($userProfile->getUserid());
        if($userProfile->Equals($updatedProfile)) return TRUE;
        else return FALSE;
    }
    
    /**
     * Gets the UserProfileModel by the User's ID number.
     * @param int $userID : The User's ID number
     * @return boolean|\App\Models\UserProfileModel 
     * : FALSE-Profile does not exist | The requested UserProfileModel
     */
    public function GetUserProfileByUserID(int $userID)
    {
        // Check to see if the profile does not exist
        if(!($this->DoesUserProfileExistByUserID($userID))) 
        {
            // Create an empty profile to replace the nonexistent one
            $result = $this->CreateEmptyUserProfile($userID);
            
            // Check to see if it was not created
            if(!$result) return FALSE;
        }
        
        // Get the row data from the database
        $row = DB::table('userprofile')->where('UserID',$userID)->first();
        
        // Cast the stdClass Object to an array
        $table = json_decode(json_encode($row), true);
        
        // asign values to varables from the database data
        $userID = $row->UserID;
        $phoneNumber = $row->PhoneNumber;
        $streetAddress = $row->Street;
        $city = $row->City;
        $state = $row->State;
        $zipCode = $row->ZipCode;
        $employmentStatus = $row->EmploymentStatus;
        $occupation = $row->Occupation;
        $companyName = $row->CompanyName;
        $educationalBackground = $row->EducationalBackground;
        
        // Create the UserProfileModel object using the data and return it
        return new UserProfileModel($userID, $phoneNumber,
                                    $streetAddress, $city, $state,
                                    $zipCode, $employmentStatus, $occupation,
                                    $companyName, $educationalBackground);
        
    }

    
}

