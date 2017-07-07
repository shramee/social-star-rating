<?php

/**
 * Fired during plugin activation
 *
 * @link       http://shramee.me
 * @since      1.0.0
 *
 * @package    Social_Star_Rating
 * @subpackage Social_Star_Rating/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Social_Star_Rating
 * @subpackage Social_Star_Rating/includes
 * @author     Shramee <shramee.srivastav@gmail.com>
 */
class Social_Star_Rating_Feed {

	/** @var Social_Star_Rating_Feed Instance */
	private static $instance;

	/**
	 * Get instance of feed handler
	 * @since    1.0.0
	 */
	public static function instance() {
		if ( ! self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	public function healthy_hearing_html( $links ) {
		$transient_name = "social_star_reviews_healthyhearing";

		$html = 0&&get_transient( $transient_name );

		if ( ! $html ) {

			$html = str_replace(
				'class="panel-section reviews"',
				'id="panel-reviews" class="panel-section reviews"',
				file_get_contents( $links['healthyhearing'] )
			);

			/*
			$html = str_replace(
				[ '<script', '<html', '<body', '<link', '<img' ],
				'<dummy',
				str_replace(
					[ '</html', '</body', '</script', ],
					'</dummy',
					$html
				)
			);
			*/

			$dom = new DOMDocument();
			$dom->loadHTML( $html );

			$html = $dom->saveHTML( $dom->getElementById( 'panel-reviews' ) );

			set_transient( $transient_name, $html, DAY_IN_SECONDS );
		}

		return $html;
	}

	public function reviews( $links ) {
		$transient_name = 'social_star_get_reviews';

		$reviews =
			$this->get_reviews( 'google', $links ) +
			$this->get_reviews( 'yelp', $links ) +
			$this->get_reviews( 'facebook', $links );

		return $reviews;
	}

	/**
	 * Gets reviews from specific site methods
	 *
	 * @param string $site
	 * @param array $links
	 *
	 * @return array
	 */
	protected function get_reviews( $site, $links ) {
		$method = "{$site}_reviews";

		if ( method_exists( $this, $method ) ) {
			$transient_name = "social_star_reviews_$site";

			$reviews = get_transient( $transient_name );

			if ( ! $reviews ) {
				$reviews = $this->$method( $links );
				set_transient( $transient_name, $reviews, DAY_IN_SECONDS );
			}

			return $reviews;
		}
	}

	/**
	 * @param array $links Links of profiles
	 *
	 * @return array Google reviews
	 */
	protected function google_reviews( $links ) {
		$google_api = 'https://maps.googleapis.com/maps/api/place/details/json?reference=CmRRAAAAFnvcd1bBWCzAiANqzstaMcwl60Imya7pgTjvaLCZLrNQwhfi6Y98xGM7qWPPzau-MoXJfaDWrch38Pm1uqTCENMoe3KbQ5q01sw1REy6T0K-klLfkNuET4dUm2QGneg2EhAWx_ZKArSiziixSDqtc2A_GhQpaTmcoZKGuCRSi3uFnelRGLdiPA&sensor=true&key=AIzaSyAW5Gk_T97Sdhm8C2BQxjAhEW4mTUKLxUU';
		$g_response = $this->get_json( $google_api );
		$reviews    = array();

		foreach ( $g_response['result']['reviews'] as $review ) {
			$reviews[] = array(
				'date'    => $review['time'],
				'rating'  => $review['rating'],
				'icon'    => 'google',
				'name'    => $review['author_name'],
				'content' => $review['text'],
				'link'    => $links['google'],
			);
		}

		return $reviews;
	}

	public function get_json( $url ) {
		$content = file_get_contents( $url );
		if ( $content ) {
			$json = json_decode( $content, 'assoc' );

			return $json;
		}
	}

	/**
	 * @return array Yelp reviews
	 */
	protected function yelp_reviews() {
		/*
		 Array (
			[0] => Array (
				[date] => 1499116211
				[rating] => 5
				[icon] => yelp
				[name] => Brian S.
				[content] => This is a great practice that provides the personal care I need. I never felt pressured to get hearing aids and they even let me try them out for a month!...
				[link] => https://www.yelp.com/biz/hearcare-audiology-and-hearing-aid-centers-fort-wayne?hrid=TPB5qTDtjs6kBCisEOCBPw&adjust_creative=n1I1UVBBYOGyo62PdW3ufA&utm_campaign=yelp_api_v3&utm_medium=api_v3_business_reviews&utm_source=n1I1UVBBYOGyo62PdW3ufA
			)
		)
		*/
		$response = $this->query_yelp_reviews();
		if ( $response && ! empty( $response['reviews'] ) ) {
			$reviews = array();

			foreach ( $response['reviews'] as $review ) {
				$reviews[] = array(
					'date'    => strtotime( $review['time_created'] ),
					'rating'  => $review['rating'],
					'icon'    => 'yelp',
					'name'    => $review['user']['name'],
					'content' => $review['text'],
					'link'    => $review['url'],
				);
			}

			return $reviews;
		}

		return [];
	}

	/**
	 * @return array Queried yelp reviews
	 */
	protected function query_yelp_reviews() {
		$tkn = $this->yelp_token();

		// Send Yelp API Call
		$curl = curl_init();
		$url  = 'https://api.yelp.com/v3/businesses/hearcare-audiology-and-hearing-aid-centers-fort-wayne/reviews';
		curl_setopt_array( $curl, array(
			CURLOPT_URL            => $url,
			CURLOPT_RETURNTRANSFER => true,  // Capture response.
			CURLOPT_ENCODING       => "",  // Accept gzip/deflate/whatever.
			CURLOPT_MAXREDIRS      => 10,
			CURLOPT_TIMEOUT        => 30,
			CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST  => "GET",
			CURLOPT_HTTPHEADER     => array(
				"authorization: Bearer " . $tkn,
				"cache-control: no-cache",
			),
		) );
		$response = json_decode( curl_exec( $curl ), 'assoc' );
		curl_close( $curl );

		return $response;
	}

	/**
	 * @return string Yelp API token
	 */
	protected function yelp_token() {
		$tkn = get_transient( 'social_star_get_yelp_token' );

		if ( ! $tkn ) {
			$ch = curl_init( 'https://api.yelp.com/oauth2/token' );
			curl_setopt_array( $ch, array(
				CURLOPT_POST           => true,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_USERPWD        => ':',
				CURLOPT_HTTPHEADER     => array( 'Content-Type: application/x-www-form-urlencoded' ),
				CURLOPT_POSTFIELDS     => http_build_query( array(
					'grant_type'    => 'client_credentials',
					'client_id'     => 'n1I1UVBBYOGyo62PdW3ufA',
					'client_secret' => 'EZzX0EWKiXv46EayQULhNImWl3wJ3oAMSEKTuCWsPaRHXxPzbMYTGCdjD8IY0vhd',
				) ),
			) );
			$response = json_decode( curl_exec( $ch ) );
			curl_close( $ch );
			$tkn = $response->access_token;
			set_transient( 'social_star_get_yelp_token', $tkn, $response->expires_in - time() );
		}

		return $tkn;
	}

	/**
	 * @return array Facebook reviews
	 */
	protected function facebook_reviews( $links ) {
		$tkn      = 'EAAGOv7MCKuYBAEIokbXgmgHB3TPDem9ZA41rd9FgRMBmsebqzcZA7zJGYKOcIl5absuMasp5psR42eQxEqLPOq0gKXm03snEhJYbZAkkievbQrm5wQAReh1N4BasNNNVfvfRC55LEa4qcuF3EBJBs02LGi1uUUsKZByF5H5g6QZDZD';
		$response = $this->get_json( "https://graph.facebook.com/v2.9/HearCareAudiology/ratings?access_token=$tkn" );

		$reviews = array();

		foreach ( $response['data'] as $review ) {
			$reviews[] = array(
				'date'    => strtotime( $review['created_time'] ),
				'rating'  => $review['rating'],
				'icon'    => 'facebook',
				'name'    => $review['reviewer']['name'],
				'content' => $review['review_text'],
				'link'    => $links['facebook'],
			);
		}

		return $reviews;
	}

}
