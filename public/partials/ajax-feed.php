<?php
/**
 * Created by PhpStorm.
 * User: shramee
 * Date: 01/07/17
 * Time: 3:56 PM
 */

$feed_man = Social_Star_Rating_Feed::instance();

/*
	array( date, rating, icon, name, content, link )
 */
$reviews = $feed_man->reviews( $links );

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
	echo $feed_man->healthy_hearing_html( $links );
	?>
</div>
</body>
</html>
