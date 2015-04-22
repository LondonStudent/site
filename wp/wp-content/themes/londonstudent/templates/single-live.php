<div class="post__header">
	<h1 class="post__title">Live blog - <?php the_title(); ?></h1>
	<div class="post__meta">
		<p><?php the_time('F jS, Y'); ?> by <a href="<?php echo $url; ?>"><?php echo $url2 ?></a></p>
	</div>
</div>

<div class="post__content">
	<?php
		$repeater = get_field('liveblog_content');
		$order = array();
		foreach( $repeater as $i => $row ) {
			$order[ $i ] = $row['time'];
		}
		array_multisort( $order, SORT_DESC, $repeater );
	?>
	<div class="liveblog__times">
		<span class="liveblog__times__text">Jump to a time:</span>
		<select class="liveblog__times__select" id="liveblog__times__select">
			<?php if( $repeater ): ?>
			<?php foreach( $repeater as $i => $row ) { ?>
				<?php $url = 's-' . $row['time']; ?>
				<?php $time = date('g:ia', $row['time']); ?>
				<option value="<?php echo $url; ?>"><?php echo $time; ?></a></option>
			<?php } ?>
			<?php endif; ?>
		</select>
	</div>
	<?php if( $repeater ): ?>
		<br>
		<?php foreach( $repeater as $i => $row ) { ?>
			<?php
				$timestamp = $row['time'];
				$time = date('g:ia', $timestamp);
				$url = 's-' . $timestamp;
				$author = $row['author'];
				$authorName = get_author_fullname($author['ID']);
				$type = $row['type'];
				$className = 'liveblog__section liveblog__section--' . $type;
			?>
			<section class="<?php echo $className; ?>">
				<a class="anchor-offset" id="s-<?php echo $timestamp; ?>"></a>
				<a class="liveblog__section__time" href="#<?php echo $url; ?>"><?php echo $time; ?></a><!-- - <span class="liveblog__section__author"><?php echo $authorName; ?></span>-->

				<?php if ($type == 'tweet') { ?>
					<?php foreach( $row['tweets'] as $tweet => $tweett ) { ?>
						<?php echo $tweett['tweet']; ?>
					<?php } ?>
				<?php } else if ($type == 'image') { ?>
					<?php foreach( $row['images'] as $image) { ?>
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['description']; ?>">
					<?php } ?>
				<?php } else { ?>
					<?php echo $row['body']; ?>
				<?php } ?>

			</section>
			<hr>
		<?php } ?>
	<?php endif; ?>
	<?php the_content(); ?>
</div>

<script>
	var timeSelect = document.getElementById('liveblog__times__select')
	timeSelect.onchange = function(event) {
		var value = this.options[this.selectedIndex].value
		location.hash = value
	}
</script>
