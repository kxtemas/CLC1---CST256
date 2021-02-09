<?php 
use Illuminate\Support\Facades\Auth;
use App\Services\ProfileDatabaseServices;
use App\Services\UserDatabaseService;
use phpDocumentor\Reflection\Types\Integer;

// Get the currently signed in user
$userID = auth()->id();

// Check to see if the edit profile button was pressed
if(isset($_POST['EditButton']))
{
    redirect('editprofile');
}

// Check to see if there is a url paramater for userID
if(isset($_GET['id']))
{
    // Check to see if the parameter is an int
    if(is_int($_GET['id']))
    {
        // Set the parameter to the 
        $userID = $_GET['id'];
    }
}

$userID = (int)$userID;

// Get the user profile data
$pdbs = new ProfileDatabaseServices();
$profile = $pdbs->GetUserProfileByUserID($userID);

// Get the user's username
$udbs = new UserDatabaseService();
$username = $udbs->GetUsernameByID($userID);

?>

@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html>
	<head>
        <meta charset="ISO-8859-1">
        <title>Profile</title>
    </head>
    <body>
    <h2><?php echo "authID: " . auth()->id(); ?></h2>
    <h2><?php echo "authID is int: " . is_int(auth()->id()); ?></h2>
		<table>
			<!-- Name -->
			<tr>
				<td>Name</td>
				<td><?php echo $username; ?></td>
			</tr>
			<!-- Phone Number -->
			<tr>
				<td>Phone Number</td>
				<td><?php echo $profile->getPhoneNumber(); ?></td>
			</tr>
			<!-- Street Address --> 
			<tr>
				<td>Street Address</td>
				<td><?php echo $profile->getStreet(); ?></td>
			</tr>
			<!-- City -->
			<tr>
				<td>City</td>
				<td><?php echo $profile->getCity(); ?></td>
			</tr>
			<!-- State -->
			<tr>
				<td>State</td>
				<td><?php echo $profile->getState(); ?></td>
			</tr>
			<!-- Zip Code -->
			<tr>
				<td>Zipcode</td>
				<td><?php echo $profile->getZipCode(); ?></td>
			</tr>
			<!-- Employment Status -->
			<tr>
				<td>Employment Status</td>
				<td><?php echo $profile->getEmploymentStatus(); ?></td>
			</tr>
			<!-- Occupation -->
			<tr>
				<td>Occupation</td>
				<td><?php echo $profile->getOccupation(); ?></td>
			</tr>
			<!-- Company Name -->
			<tr>
				<td>Company Name</td>
				<td><?php echo $profile->getCompanyName(); ?></td>
			</tr>
			<!-- Educational Background -->
			<tr>
				<td>Educational Background</td>
				<td><?php echo $profile->getEducationalBackground(); ?></td>
			</tr>
			<!-- Edit button -->
			<?php //if($userID == auth()->id())
			{?>
    			<tr>
    				<form method="post">
    					<input type="submit" name="EditButton" value="EditButton"/>
    				</form>
    			</tr>
			<?php 
			}?>
		</table>
    </body>
</html>

@endsection