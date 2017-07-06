<?php
/**
 * Created by PhpStorm.
 * User: shramee
 * Date: 01/07/17
 * Time: 3:56 PM
 */


/*
	array( date, rating, icon, name, content, link )
 */
$reviews = Social_Star_Rating_Feed::instance()->reviews( $links );

$rev_json = json_encode( $reviews );

?>
<!DOCTYPE html>
<html>
<head>
	<link href="<?php echo SSRATEURL ?>/public/css/ajax-feed.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>
		var reviews = <?php echo $rev_json ?>;
		var links = <?php echo json_encode( $links ) ?>;
	</script>
	<script src="<?php echo SSRATEURL ?>/public/js/ajax-feed.js"></script>
</head>
<body>
<div class="reviews"></div>
<?php
//print_r( $reviews );
?>
<div id="healthyhearing-html" style="display: none;">
	<?php
	echo
	str_replace(
		[ '<script', '<html', '<body', '<link', '<img' ],
		'<dummy',
		str_replace(
			[ '</html', '</body', '</script', ],
			'</dummy',
			file_get_contents( $links['healthyhearing'] )
		)
	);
	?>
</div>
</body>
</html>
