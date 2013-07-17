<div class="inner who">

<p>We are sorry, but we don't recognize the user or team you were looking for. A list of all of the registered users and teams on the site appears below. The user or team you are searching for may be there.</p>

<br />

<div style="width:48%;float:left;">
<p class="sub-head">Users</p>

<ul>
<?php 

	foreach ($users as $user) {
		echo '<li><a href="' . base_url() . 'grower/' . strtolower($user->firstName) . '-' . strtolower($user->lastName) . '/' . $user->userID . '">' . $user->firstName . ' ' . $user->lastName . '</a></li>';
	}

?>
</ul>

</div>

<div style="width:48%;float:right;">

<p class="sub-head">Teams</p>

<ul>
<?php 

	foreach ($teams as $team) {
		echo '<li><a href="' . base_url() . 'teams/' . strtolower($team->teamName) . '/' . $team->teamID . '">Team ' . $team->teamName . '</a></li>';
	}

?>
</ul>

</div>

<br clear="all" />
<br />
<br />


</div>