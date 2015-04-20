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
	<ul>
		<?php if( $repeater ): ?>
		<?php foreach( $repeater as $i => $row ) { ?>
			<?php $url = 's-' . $row['time']; ?>
			<?php $time = date('g:ia', $row['time']); ?>
			<li><a href="#<?php echo $url; ?>"><?php echo $time; ?></a></li>
		<?php } ?>
		<?php endif; ?>
	</ul>
	<?php if( $repeater ): ?>
		<br>
		<?php foreach( $repeater as $i => $row ) { ?>
			<?php
				$body = $row['body'];
				$timestamp = $row['time'];
				$time = date('g:ia', $timestamp);
				$url = 's-' . $timestamp;
				$author = $row['author'];
				$authorName = get_author_fullname($author['ID']);
			?>
			<section class="liveblog__section">
				<a class="anchor-offset" id="s-<?php echo $timestamp; ?>"></a>
				<span class="liveblog__section__time"><?php echo $time; ?></span> - <span class="liveblog__section__author"><?php echo $authorName; ?></span> - <a href="#<?php echo $url; ?>">Permalink</a>
				<?php echo $body; ?>
			</section>
			<hr>
		<?php } ?>
	<?php endif; ?>
	<?php the_content(); ?>
</div>
