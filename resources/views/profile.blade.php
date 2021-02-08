<?php 
use Illuminate\Support\Facades\Auth;
use App\Services\ProfileDatabaseServices;
use App\Services\UserDatabaseService;

// Get the currently signed in user
$userID = Auth::id();

// Get the user profile data
$pdbs = new ProfileDatabaseServices();
$profile = $pdbs->GetUserProfileByUserID($userID);

// Get the user's username
$udbs = new UserDatabaseService();
$username = $udbs->GetUsernameByID($userID);

// TODO: Make it be able to view any user not just the currently signed in user.
?>


@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html>
	<!-- TODO: create edit profile page -->
    <head>
        <meta charset="ISO-8859-1">
        <title>Profile</title>
    </head>
    <body>
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
			<!-- Date of Birth --> 
			<tr>
				<td>Date of Birth</td>
				<td><?php echo $profile->getDateOfBirth(); ?></td>
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
			
			
		</table>
    </body>
</html>

@endsection