<!-- COMMENTS.PHP -->
<?php // Ne pas supprimer ces lignes
if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) die ('Ne pas t&eacute;l&eacute;charger cette page directement, merci !');
if (!empty($post->post_password)) { // s'il y a un mot de passe
	if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // et ça ne fonctionne pas avec le cookie
?>

<h2><?php _e('Prot&eacute;g&eacute; par mot de passe'); ?></h2>
<p><?php _e('Entrer le mot de passe pour voir les commentaires'); ?></p>

<?php return;
	}
}

	/* Cette variable est là comme alternative au fond d'écran des commentaires */

$oddcomment = 'alt';

?>

<!-- Vous pouvez faires des modifs à partir de là -->

<div class="cadre_commentaires">

<?php if ($comments) : ?>
	<h3 id="comments"><?php comments_number('Pas de commentaire', 'Un commentaire', '% commentaires' );?> pour “<?php the_title(); ?>”</h3>

<ol class="commentlist">
<?php foreach ($comments as $comment) : ?>

	<li class="<?php echo $oddcomment; ?>" id="comment-<?php comment_ID() ?>">

		<div class="commentmetadata">
			<strong><?php comment_author_link() ?></strong>, <?php _e('le'); ?> <a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('j F, Y') ?> <?php _e('&agrave;');?> <?php comment_time() ?></a> <?php _e('a écrit &#58;'); ?> <?php edit_comment_link('Éditer le commentaire','',''); ?>
			<?php if ($comment->comment_approved == '0') : ?>
			<em><?php _e('Votre commentaire est en cours de mod&eacute;ration'); ?></em>
			<?php endif; ?>
		</div>

		<?php comment_text() ?>
	</li>

<?php /* Change tous les autres commentaires à une classe différente */
	if ('alt' == $oddcomment) $oddcomment = '';
	else $oddcomment = 'alt';
?>

<?php endforeach; /* fin de chaque commentaire */ ?>
	</ol>

<?php else : // affiché si aucun commentaire ?>

<?php if ('open' == $post->comment_status) : ?>
	<!-- Si les commentaires sont ouverts, mais sans aucun commentaire -->
	<?php else : // Les commentaires sont fermés ?>

	<!-- Si les commentaires sont fermés -->
<!--<p class="nocomments">Les commentaires sont fermés !</p>-->

	<?php endif; ?>
<?php endif; ?>

</div>

<?php if ('open' == $post->comment_status) : ?>

		<h3 id="respond">Laissez un commentaire</h3>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>Vous devez etre <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">connecté</a> pour laisser un commentaire.</p>

<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" role="form" class="form-horizontal">
<?php if ( $user_ID ) : ?>

<p>Connecté en tant que <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="D&eacute;connect&eacute; de ce compte">Déconnection &raquo;</a></p>

<?php else : ?>

	<div class="form-group">
		<label for="author" class="col-sm-3 control-label">Nom <?php if ($req) echo "*"; ?></label>
		<div class="col-sm-9">
			<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="40" tabindex="1" class="form-control" placeholder="Nom <?php if ($req) echo "*"; ?>" />
		</div>
	</div>

	<div class="form-group">
		<label for="email" class="col-sm-3 control-label">email (ne sera pas publié) <?php if ($req) echo "*"; ?></label>
		<div class="col-sm-9">
			<input type="email" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="40" tabindex="2" class="form-control" placeholder="email (ne sera pas publié) <?php if ($req) echo "*"; ?>"/>
		</div>
	</div>

	<div class="form-group">
		<label for="url" class="col-sm-3 control-label">Site Web</label>
		<div class="col-sm-9">
			<input type="url" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="40" tabindex="3" class="form-control" placeholder="Site web"/>
		</div>
	</div>


<?php endif; ?>
	<div class="form-group">
		<label for="comment" class="col-sm-3 control-label">Message</label>
		<div class="col-sm-9">
			<textarea name="comment" id="comment" tabindex="4" class="form-control" rows="4"></textarea>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-12">
			<button name="submit" type="submit" class="btn btn-primary pull-right" tabindex="5">Submit</button>
			<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
		</div>
	</div>

	<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // Si l'enregistrement est requis et que l'utilisateur n'est pas connecté ?>

<?php endif; // Si vous supprimez cete ligne, le ciel vous tombera sur la tête ?>

<!-- fin COMMENTS.PHP -->