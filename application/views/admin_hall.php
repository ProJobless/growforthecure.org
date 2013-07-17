<div class="inner hall-admin">


<p>Use this simple tool to move Growers from the ranks of the common grower to Hall of Fame status. They will recieve a badge on their profile page and be recognized on the Hall of Fame page. And if necessary, they can always be sent down in the ranks again.</p>

<p>Simply click the Promote or Demote link next to the name and they will be moved into the appropriate section.</p>

<br />


<div class="left" style="width:48%;">


<p class="sub-head">The Hall of Fame</p>

<ul>
	<?php
	if ($hall) { 
		foreach ($hall as $user) {

			echo '<li class=""><a href="' . base_url() . 'grower/' . strtolower($user->firstName) . '-' . strtolower($user->lastName) . '/' . $user->userID .'">' . $user->firstName . ' ' . $user->lastName . '</a><a href="' . base_url() . 'admin/hall_status/' . $user->userID . '/0" class="demote">Demote from Hall &rarr;</a></li>';
		}
	} else {
		echo '<li>No one is worthy of the Hall.</li>';
	}
	?>
</ul>

</div>

<div class="right" style="width:48%;">

<p class="sub-head">Unworthy of the Hall.</p>
<ul>
	<?php 
	if ($nothall) {
		foreach ($nothall as $notuser) {

		echo '<li class=""><a href="' . base_url() . 'admin/hall_status/' . $notuser->userID . '/1" class="promote">&larr; Promote to Hall</a> <a href="' . base_url() . 'grower/' . strtolower($notuser->firstName) . '-' . strtolower($notuser->lastName) . '/' . $notuser->userID .'">' . $notuser->firstName . ' ' . $notuser->lastName . '</a></li>';
		}
	} else {
		echo '<li>Everyone is in the Hall.</li>';
	}
	?>
</ul>

</div>


</div>