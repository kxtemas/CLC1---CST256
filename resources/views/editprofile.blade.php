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
        	<input type="hidden" name="userID" value="<?php // find a way to put the user id here?>">
    		<h2>Login</h2>
    		<table>
    		    <!-- Phone Number -->
    			<tr>
    				<td>Phone Number</td>
    				<td><input type="text" name="phoneNumber"/></td>
    			</tr>
    		    <!-- Date of Birth -->    			
    			<tr>
    				<td>Date of Birth</td>
    				<td><input type="text" name="dateOfBirth"/></td>
    			</tr>
    		    <!-- Street Address -->    			
    			<tr>
    				<td>Street Address</td>
    				<td><input type="text" name="streetAddress"/></td>
    			</tr>
    		    <!-- City -->    			
    			<tr>
    				<td>City</td>
    				<td><input type="text" name="city"/></td>
    			</tr>
    		    <!-- state -->    			
    			<tr>
    				<td>State</td>
    				<td><input type="text" name="state"/></td>
    			</tr>
    		    <!-- Zip Code -->    			
    			<tr>
    				<td>Zip Code</td>
    				<td><input type="text" name="zipCode"/></td>
    			</tr>
     		    <!-- Employment Status -->   			
    			<tr>
    				<td>Employment Status</td>
    				<td><input type="text" name="employmentStatus"/></td>
    			</tr>
    		    <!-- Occupation -->    			
    			<tr>
    				<td>Occupation</td>
    				<td><input type="text" name="occupation"/></td>
    			</tr>
     		    <!-- Company Name -->   			
    			<tr>
    				<td>Company Name</td>
    				<td><input type="text" name="companyName"/></td>
    			</tr>
     		    <!-- Educational Background -->   			
    			<tr>
    				<td>Educational Background</td>
    				<td><input type="text" name="educationalBackground"/></td>
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