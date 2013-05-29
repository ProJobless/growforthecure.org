<div class="inner">

<h1>Meet the Growers</h1>

<?php echo $copy; ?>

<br /> <br />

<?php 

	foreach ($users as $user) {
		echo'<li><a href="' . base_url() . 'grower/' . strtolower($user->firstName) . '-' . strtolower($user->lastName) . '/' . $user->userID .'">' . $user->firstName . ' ' . $user->lastName . '</a></li>';
	}

?>



</div>