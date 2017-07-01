<?php

$links = array(
	'google' => 'http://google.com/my-clinic',
	'facebook' => 'http://facebook.com/my-clinic',
	'yelp' => 'http://yelp.com/my-clinic',
	'healthyhearing' => 'http://healthyhearing.com/my-clinic',
);

$mail = array(
	'to' => 'shramee.srivastav@gmail.com',
	'subject' => 'Message from a reviewer',
);
?>
<html>
<head>
	<link rel="stylesheet" href="<?php echo SSRATEURL ?>/admin/css/ajax-rate.css">
</head>

<body class="en">

<div class="rate-wrap">
	<p class="gray">Help us. Help others. You’re invited to review:</p>

	<div id="brand"><?php bloginfo( 'name' ) ?></div>

	<div class="blue-large">
		<p>
			Please take a moment to review your experience with us. Your feedback not only helps us, it
			helps other potential patients.
		</p>
	</div>

	<div class="stars">
		<a href="#popup-share" class="star"><span>Great</span></a>
		<a href="#popup-share" class="star"><span>Good</span></a>
		<a href="#popup-contact" class="star"><span>Okay</span></a>
		<a href="#popup-contact" class="star"><span>Subpar</span></a>
		<a href="#popup-contact" class="star"><span>Bad</span></a>
	</div>

	<div class="powered">
		Powered by <a href="http://www.audiologyplus.com/">AudiologyPlus.com</a>
	</div>
</div>

<div class="popup gray-bg" id="popup-share" aria-hidden="true">
	<a href="#" aria-hidden="true" class="close">×</a>
	<header>
		<div class="blue-large">
			<p>Please take a moment to share your experience with us on one of these review sites.</p>
		</div>
	</header>
	<section>
		<div id="links">
			<ul>
				<li>
					<a id="google" href="#popup-google">Google</a>
				</li>
				<li>
					<a id="facebook" href="#popup-facebook">Facebook</a>
				</li>
				<li>
					<a id="yelp" href="#popup-yelp">
						Yelp
						<span class="footer">Login w/ <i class="fb-blue"></i></span>
					</a>
				</li>
				<li>
					<a id="healthyhearing" href="#popup-healthyhearing">
						Healthy Hearing
						<span class="footer" data-notice="No login required"></span>
					</a>
				</li>
			</ul>

		</div>
	</section>
</div>

<div class="popup share" id="popup-google">

	<a href="#popup-share" aria-hidden="true" class="close">×</a>

	<header>
		<h3 class="social-title" id="popup-google-label">Google</h3>
	</header>

	<section>
		<div class="guide guide-review google">

			<p>If you don’t already have a Google account, you should—use it to read and post reviews, as well as access
				other Google products like Gmail.</p>
			<p>From our Google listing:</p>
			<ul>
				<li><p>If prompted, sign up or log in</p></li>
				<li><p>Leave your rating and feedback</p></li>
				<li>Click <strong>post</strong> to share with others.</li>
			</ul>

		</div>

		<p style="font-size:small;text-align:center;color:#aaa;"><em>Note: This website is not affiliated with or
				endorsed by Google.</em></p>

	</section>

	<footer>
		<a class="link google" target="_blank" title="Click to review us on Google"
			 href="<?php echo $links['google'] ?>">
			Click to review us on Google
		</a>
	</footer>

</div>

<div class="popup share" id="popup-facebook">

	<a href="#popup-share" aria-hidden="true" class="close">×</a>

	<header>
		<h3 class="social-title" id="popup-facebook-label">Facebook</h3>
	</header>

	<section>
		<div class="guide guide-review facebook">

			<p>Facebook lets us stay connected with our customers, fans and friends—and now lets you review
				businesses.</p>
			<p>From our Facebook page:</p>
			<ul>
				<li>“Like” our page if you want to stay connected with us</li>
				<li>Find the “Reviews” widget in the body of the page and rate us</li>
				<li>Log in or sign up if you haven’t already to complete the process</li>
			</ul>

		</div>

		<p style="font-size:small;text-align:center;color:#aaa;"><em>Note: This website is not affiliated with or
				endorsed by Facebook.</em></p>

	</section>

	<footer>
		<a class="link facebook" target="_blank" title="Click to review us on Facebook"
			  href="<?php echo $links['facebook'] ?>">
			Click to review us on Facebook
		</a>
	</footer>
</div>

<div class="popup share" id="popup-yelp">

	<a href="#popup-share" aria-hidden="true" class="close">×</a>

	<header>
		<h3 class="social-title" id="popup-yelp-label">Yelp</h3>
	</header>

	<section>
		<div class="guide guide-review yelp">

			<p><strong>Yelp filters reviews. Unless you already use Yelp or plan to in the future, please <a
						href="#popup-share" data-toggle="popup" data-dismiss="popup">choose another site</a></strong>. If
				you do use Yelp, you can post a review in one step. You can also sign up with your Facebook account.</p>
			<p>On our listing, just:</p>
			<ul>
				<li>Click “Write a Review”</li>
				<li>Rate your experience with us, leaving as much descriptive feedback as possible to help us as well as
					other potential customers
				</li>
				<li>Click “Signup and Post” to complete the process</li>
			</ul>

		</div>

		<p style="font-size:small;text-align:center;color:#aaa;"><em>Note: This website is not affiliated with or
				endorsed by Yelp.</em></p>

	</section>

	<footer>
		<a class="link yelp" target="_blank" title="Click to review us on Yelp"
			 href="<?php echo $links['yelp'] ?>">
			Click to review us on Yelp
		</a>
	</footer>
</div>

<div class="popup share" id="popup-healthyhearing">

	<a href="#popup-share" aria-hidden="true" class="close">×</a>

	<header>
		<h3 class="social-title" id="popup-healthyhearing-label">Healthy
			Hearing</h3>
	</header>

	<section>
		<div class="guide guide-review healthyhearing">

			<p>The mission of Healthy Hearing is to use the power of the internet to provide education about hearing
				loss and its implications. They collect ratings and reviews of Audiologists and other hearing specialists
				in the US. <strong>You do not need an account to leave a review.</strong></p>

			<p>From our listing:</p>
			<ul>
				<li>Click ‘Write a Review’</li>
				<li>Provide your rating and feedback</li>
				<li>Press ‘Submit’ to finish</li>
			</ul>

		</div>

		<p style="font-size:small;text-align:center;color:#aaa;"><em>Note: This website is not affiliated with or
				endorsed by Healthy Hearing.</em></p>

	</section>

	<footer>
		<a class="link healthyhearing" target="_blank" title="Click to review us on Healthy Hearing"
			 href="<?php echo $links['healthyhearing'] ?>">
			Click to review us on Healthy Hearing
		</a>
	</footer>
</div>

<div class="popup" id="popup-contact">
	<a href="#" aria-hidden="true" class="close">×</a>

	<header>
		<div class="blue-large">
			<p>We strive for 100% customer satisfaction. If we fell short, please tell us how so we can make amends.</p>
		</div>
	</header>
	<section>
		<form method="POST"
					class="contact-form" id="form_contact">

			<?php
			$name = esc_attr( filter_input( INPUT_POST, 'name' ) );
			$phone = esc_attr( filter_input( INPUT_POST, 'phone' ) );
			$email = esc_attr( filter_input( INPUT_POST, 'email' ) );
			$message = esc_html( filter_input( INPUT_POST, 'message' ) );

			if ( $name ) {
				if ( $phone && $email && $message ) {
					$success = wp_mail(
						$mail['to'],
						$mail['subject'],
						"You got a new message from a reviewer.
Name:
$name
Phone :
$phone
Email :
$email
Message :
$message
						" );
					if ( $success ) {
						?>
						<h3>Message recieved</h3>
						<p>We will get in touch soon...</p>
						<?php
					} else {
						?>
						<h3>Could not deliver the message</h3>
						<p>We are not able to send the message at the moment, please try mailing us on <?php echo "<a href='mailto:$mail[to]'>$mail[to]</a>" ?>...</p>
						<?php
					}
				} else {
					?>
					<h3>Could not deliver the message</h3>
					<p>We are not able to send the message at the moment, please try mailing us on <?php echo "<a href='mailto:$mail[to]'>$mail[to]</a>" ?>...</p>
					<?php
				}
			} else {
				?>
				<div id="form-contact">
					<fieldset>
						<div class="name field text_field" id="field-name">
							<label class="field-label" for="name">YourName</label>
							<input type="text" id="name" name="name" placeholder="Your Name" required="required">
						</div>
						<div class="phone field text_field" id="field-phone">
							<label class="field-label" for="phone">Phone</label>
							<input type="text" id="phone" name="phone" placeholder="Phone" required="required">
						</div>
						<div class="email field email_field" id="field-email">
							<label class="field-label" for="email">Email</label>
							<input type="email" id="email" name="email" placeholder="Email" required="required">
						</div>
						<div class="message field text_area" id="field-message">
							<label class="field-label" for="message">Message</label>
							<textarea name="message" class="message" placeholder="Message" required="required"></textarea>
						</div>
					</fieldset>
				</div>
				<?php
			} ?>

			<div class="footer">
				<input class="submit" name="commit" type="submit" value="Send Message">
			</div>

		</form>

	</section>

	<footer>
		If you do not wish to address your concerns here and prefer to post a review,
		<a href="#popup-share" data-toggle="popup" data-dismiss="popup">click here</a>.
	</footer>
</div>

<!-- End #super-container -->
<span id="spinny"></span>
</body>
</html>