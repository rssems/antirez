<?php get_header(); ?>
	<div id="content">
		<div itemscope="itemscope" itemtype="http://schema.org/Blog" style="display: none;">
			<meta content="schema blog" itemprop="name">
		</div>
		<section id="newslist">
      	<?php if (have_posts()) : ?>
      	<?php while (have_posts()) : the_post(); ?>
			<article data-news-id="post-<?php the_ID(); ?>" itemprop="blogPost" itemscope="itemscope" itemtype="http://schema.org/BlogPosting">
				<meta content="<?php the_permalink() ?>" itemprop="url">

				<h2 itemprop="name">
					<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
				</h2>

				<small>
					<!-- <a class="downarrow disabled" href="#down">▼</a> -->
					<a href="<?php comments_link(); ?>">
					   <?php comments_number( 'no comments', 'one comment', '% comments' ); ?>
					</a>
				</small>

				<div class="article" id="<?php the_ID(); ?>">
					<span class="avatar">
						<?php echo get_avatar( get_the_author_email(), '48' ); ?>
					</span>
					<span class="info">
						<span class="username" itemprop="author" itemscope="itemscope" itemtype="http://schema.org/Person">
							<meta content="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>" itemprop="url">
							<a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><span itemprop="name"><?php the_author(); ?></span></a>
						</span>
						<time datetime="<?php the_time('c') ?>" itemprop="datePublished"><?php echo time_ago(); ?></time>
					</span>
					<pre itemprop="description"><?php echo content(150); ?></pre>
				</div>
			</article>
     	 <?php endwhile; ?>

     	 <div class="more">[ <?php posts_nav_link(' | ','« Previous Page','Next Page »'); ?> ]</div>
     	 <?php else : ?>
       		 404 - Not Found
     	 <?php endif; ?>
		</section>
	</div><!-- /content -->
<?php get_footer(); ?>