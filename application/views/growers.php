<div class="inner">

<h1>Meet the Growers</h1>

<?php echo $copy; ?>

<br /> <br />

<?php 

	foreach ($users as $user) {
		echo'<li><a href="' . base_url() . 'grower/' . $user->userID . '/' . strtolower($user->firstName) . '-' . strtolower($user->lastName) . '">' . $user->firstName . ' ' . $user->lastName . '</a></li>';
	}

?>



</div>