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
    
        <form action="dologin" method="POST">
        	<input type="hidden" name="_token" value="<?php echo csrf_token()?>">
    		<h2>Login</h2>
    		<table>
    			<tr>
    				<td>User Name: </td>
    				<td><input type="text" name="userName"/></td>
    			</tr>
    
    			<tr>
    				<td>Password:</td>
    				<td><input type="password" name="password"/></td>
    			</tr>
    			
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