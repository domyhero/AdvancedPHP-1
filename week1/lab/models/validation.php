<?php 

function isValidEmail($email) {
	if (filter_var($email, FILTER_VALIDATE_EMAIL) !== false ) {
		return true;
	}

	return false;
}

function isValidZIP($zip) {
	$zipREGEX = '/^[0-9]{5}$/';

	if ( !preg_match($zipREGEX, $zip) ) {
		return false;
	}

	return true;
}

function isValidDate($birthday) {
	return (bool)strtotime($birthday);
	}


?>