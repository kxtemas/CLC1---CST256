<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Integer;
use App\Models\UserProfileModel;
use App\Services\UserDatabaseService;
use App\Services\ProfileDatabaseServices;

class ProfileControler extends Controller
{
    /**
     * Reference code from Actitvy 2 (to be removed)
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index(Request $request)
    {
        // Usage of path method
        $path = $request->path();
        echo 'Path Method:' . $path;
        echo '<br>';
        
        // Usage of is method
        $method = $request->isMethod('get') ? "GET" : "POST";
        echo 'GET or POST Method: '.$method;
        echo '<br>';
        
        $firstName = $request->input('firstname');
        $lastName = $request->input('lastname');
        echo "Your name is: " . $firstName . " " . $lastName;
        echo '<br>';
        
        // Usage of url method
        $url = $request->url();
        echo 'URL method: '.$url;
        echo '<br>';
        
        $data = ['firstName' => $firstName, 'lastName' => $lastName];
        return view('thatswhoami')->with($data);
    }
    
    public function update(Request $request)
    {
        // Get services
        $udbs = new UserDatabaseService();
        $updbs = new ProfileDatabaseServices();
        
        // Check to see if the method is POST
        if($request->isMethod('POST'))
        {
            // Get data from http request
            $userID = $request->input('userID');
            $phoneNumber = $request->input('phoneNumber');
            $streetAddress = $request->input('streetAddress');
            $city = $request->input('city');
            $state = $request->input('state');
            $zipCode = $request->input('zipCode');
            $employmentStatus = $request->input('employmentStatus');
            $occupation = $request->input('occupation');
            $companyName = $request->input('companyName');
            $educationalBackground = $request->input('educationalBackground');
            
            // Check to see if the userID is valid user in the database
            if($udbs->DoesUserExistByID($userID))
            {
                // Create the UserProfileModel object using resevied data
                $userProfile = new UserProfileModel($userID, $phoneNumber, 
                                                    $streetAddress, $city, $state, 
                                                    $zipCode, $employmentStatus, $occupation, 
                                                    $companyName, $educationalBackground);
                
                // Update the database with profile
                $result = $updbs->UpdateUserProfile($userProfile);
                
                // Check to see if the profile was updated
                if($result)
                {
                    echo "Success";
                    return view('profile');
                }
                else
                {
                    echo "Fail";
                    return back();
                }
            }// End of if(is_int($userID) && $userID > 0)
        }// End of if($request->isMethod('POST'))
    } // End of function
}

