<?php get_header(); ?>
<?php
    if(isset($_GET['author_name'])) :
        $curauth = get_userdatabylogin($author_name);
    else :
        $curauth = get_userdata(intval($author));
    endif;
?>

<?php
    // Determine which gravatar to use for the user
    $GLOBALS['defaultgravatar'] = $template_path . '/favicon.ico';
    $email = $curauth->user_email;
    $grav_url = "http://www.gravatar.com/avatar.php?gravatar_id=".md5($email). "&default=".urlencode($GLOBALS['defaultgravatar'] )."&size=48";
?>



<div id="content">
    <div class="userinfo">
        <span class="avatar">
            <img src="<?php echo $grav_url; ?>" width="48" height="48" alt="<?php echo $curauth->nickname; ?>" />
        </span>
        <h2><?php echo $curauth->nickname; ?></h2>
        <pre></pre>
        <ul>
            <li>
                <p><?php the_author_meta( ‘description’ ); ?></p>
            </li>
            <li>
                <b>created </b><?php echo $curauth->user_registered; ?>
            </li>
            <li>
                <b>posted news </b><?php the_author_posts(); ?>
            </li>
            <li>
                <a href="<?php echo get_option('home'); ?>?feed=rss2&author=<?php echo $curauth->ID; ?>">user url</a>
            </li>
        </ul>
    </div>
</div>
<?php get_footer(); ?>