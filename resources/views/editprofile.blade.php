<?php 
use Illuminate\Support\Facades\Auth;
use App\Services\ProfileDatabaseServices;

// Check to see if a user is not logged in
if(!Auth::check()) redirect('home');


// Get the currently signed in user
$userID = Auth::id();

// Get the user profile data
$pdbs = new ProfileDatabaseServices();
$profile = $pdbs->GetUserProfileByUserID($userID);

?>



@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html>
	<!-- TODO: create edit profile page -->
    <head>
        <meta charset="ISO-8859-1">
        <title>Edit Profile</title>
    </head>
    <body>
    
        <form action="doeditprofile" method="POST">
        	<input type="hidden" name="userID" value="<?php echo $profile->getUserid(); ?>">
    		<h2>Login</h2>
    		<table>
    		    <!-- Phone Number -->
    			<tr>
    				<td>Phone Number</td>
    				<td><input type="text" name="phoneNumber" 
    						value="<?php echo $profile->getPhoneNumber(); ?>"/></td>
    			</tr>
    		    <!-- Street Address -->
    			<tr>
    				<td>Street Address</td>
    				<td><input type="text" name="streetAddress" 
    						value="<?php echo $profile->getStreet(); ?>"/></td>
    			</tr>
    		    <!-- City -->
    			<tr>
    				<td>City</td>
    				<td><input type="text" name="city" 
    						value="<?php echo $profile->getCity(); ?>"/></td>
    			</tr>
    		    <!-- State -->    			
    			<tr>
    				<td>State</td>
    				<td><input type="text" name="state" 
    						value="<?php echo $profile->getState(); ?>"/></td>
    			</tr>
    		    <!-- Zip Code -->    			
    			<tr>
    				<td>Zipcode</td>
    				<td><input type="text" name="zipCode" 
    						value="<?php echo $profile->getZipCode(); ?>"/></td>
    			</tr>
     		    <!-- Employment Status -->   			
    			<tr>
    				<td>Employment Status</td>
    				<td><input type="text" name="employmentStatus" 
    						value="<?php echo $profile->getEmploymentStatus(); ?>"/></td>
    			</tr>
    		    <!-- Occupation -->    			
    			<tr>
    				<td>Occupation</td>
    				<td><input type="text" name="occupation" 
    						value="<?php echo $profile->getOccupation(); ?>"/></td>
    			</tr>
     		    <!-- Company Name -->   			
    			<tr>
    				<td>Company Name</td>
    				<td><input type="text" name="companyName" 
    						value="<?php echo $profile->getCompanyName(); ?>"/></td>
    			</tr>
     		    <!-- Educational Background -->   			
    			<tr>
    				<td>Educational Background</td>
    				<td><input type="text" name="educationalBackground" 
    						value="<?php echo $profile->getEducationalBackground(); ?>"/></td>
    			</tr>
    			
    			<!-- Submit Button -->
    			<tr>
    				<td colspan="2" align="center">
    					<input type="submit" value="Submit"/>
    				</td>
    			</tr>
    		</table>
    	</form>
    
    </body>
</html>

@endsection