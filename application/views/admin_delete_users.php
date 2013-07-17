<div class="inner hall-admin">

<p class="">Use this page to remove a user from the system. This will remove all traces of the user including userIDs, pledges, team affiliations etc...</p>

<br />


<div>


<p class="sub-head">User List</p>

<ul>
	<?php
	if ($users) { 
		foreach ($users as $user) {

			echo '<li class="">' . $user->firstName . ' ' . $user->lastName . ' (' . $user->emailAddress . ') <a href="' . base_url() . 'admin/remove/' . $user->userID . '/" class="demote">Completely remove user.</a></li>';
		}
	} else {
		echo '<li>No Users?.</li>';
	}
	?>
</ul>

</div>



</div>