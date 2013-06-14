<p>We are sorry, but we don't recognize the user you were looking for.</p>
<p>Could you be looking for someone below?</p>

<ul>
<?php 

	foreach ($users as $user) {
		echo '<li><a href="' . base_url() . 'grower/' . strtolower($user->firstName) . '-' . strtolower($user->lastName) . '/' . $user->userID . '">' . $user->firstName . ' ' . $user->lastName . '</a></li>';
	}

?>
</ul>