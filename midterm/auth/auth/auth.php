<?php

// add parameters
function signup(){
	// add the body of the function based on the guidelines of signup.php
	
}

// add parameters
function signin(){
	// add the body of the function based on the guidelines of signin.php
	
}

function signout(){
	// add the body of the function based on the guidelines of signout.php
	if ($_SESSION['logged']=false){
		header('location: ../../index.php');
	}

	$_SESSION['logged']=false;
	session_destroy();
	// redirect the user to the public page.
	header('location: signin.php');
	
}

function is_logged(){
	// check if the user is logged
	//return true|false
}