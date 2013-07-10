<div class="inner">

<h1>News and Events</h1>

<p class="data-copy"><?php echo $copy; ?></p>

	<?php 
	foreach ($stories as $story) {
			echo '<p class="news-headline"><img src="' . base_url() . 'artwork/styles/anchor.png" width="25px" style="padding-right:10px;margin-bottom:-10px;" />' . $story->headline . '</p>';
			echo '<p class="news-story">' . $story->copy . '</p>';

			if ($story->link) {
				// echo strpos($story->link, 'http://');
				$link = $story->link;
				if (strpos($link, 'http://') !== 0) {
					$link = 'http://' . $link;
				}
				// echo $link;
				echo '<p class="news-link">For more information &rarr; <a href="' . $link . '" target="_blank">' . $link . '</a></p>';
			}
		}
?>


</div>