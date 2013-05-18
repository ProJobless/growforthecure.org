<h1>Meet the Growers</h1>

<?php 

	foreach ($users as $user) {
		echo '<li><a href="/grower/' . $user->userID . '/' . strtolower($user->firstName) . '-' . strtolower($user->lastName) . '">' . $user->firstName . ' ' . $user->lastName . '</a></li>';
	}

?>