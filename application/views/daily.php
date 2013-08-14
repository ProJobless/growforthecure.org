<div class="inner">

<h1>Daily Pledge Report for <?php echo Date('Y-m-d'); ?></h1>

	<?php if($dailyPledges->num_rows() > 0) { ?>
		<table class="daily-pledges">
				<tr>
					<td>Grower</td>
					<td>Style</td>
					<td>Amount</td>
				</tr>
			<?php foreach ($dailyPledges->result() as $row) { ?>
				<tr>
					<td><?php echo $row->firstName . ' ' . $row->lastName; ?></td>
					<td><?php echo $row->styleName; ?></td>
					<td>$<?php echo $row->pledgeAmount; ?></td>
				</tr>
			<?php $totalDaily = $totalDaily + $row->pledgeAmount;
				}
			 ?>
			 <tr>
			 	<td></td>
			 	<td>Total Daily Pledges:</td>
			 	<td>$<?php echo $totalDaily; ?></td>
			</tr>	 	
		</table>
	<?php } else { ?>
		<p>No pledges today.</p>
	<?php } ?>

<br clear="all" />
<br clear="all" />

<div class="left">
<h1>New Campaigns</h1>

	<?php if($newCampaigns->num_rows() > 0) { ?>
		<table class="new-campaigns">
				<tr>
					<td>Grower ID</td>
					<td>New Grower Name</td>
				</tr>
			<?php foreach ($newCampaigns->result() as $row) { ?>
				<tr>
					<td><?php echo $row->growerID;?> </td>
					<td><?php echo $row->firstName . ' ' . $row->lastName;?> </td>
				</tr>
			<?php } ?>
	
		</table>
	<?php } else { ?>
		<p>No new campaigns today.</p>
	<?php } ?>

</div>

<div class="right">
<h1>Ending Campaigns</h1>

	<?php if($endingCampaigns->num_rows() > 0) { ?>
		<table class="new-campaigns">
				<tr>
					<td>Grower ID</td>
					<td>Grower Name</td>
					<td>Pledge Total</td>
				</tr>
			<?php foreach ($endingCampaigns->result() as $row) { ?>
				<tr>
					<td><?php echo $row->growerID; ?></td>
					<td><?php echo $row->firstName . ' ' . $row->lastName; ?> </td>
					<td>$<?php echo $row->pledgeTotal; ?> </td>
				</tr>
			<?php } ?>
	
		</table>
	<?php } else { ?>
		<p>No ending campaigns today.</p>
	<?php } ?>

</div>

<br clear="all" />
<br clear="all" />
<br clear="all" />


</div>