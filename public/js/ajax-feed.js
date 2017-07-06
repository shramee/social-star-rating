/**
 * Created by shramee on 01/07/17.
 */

jQuery( function ( $ ) {
	var
		$revs = $( '.reviews' );

	function outputReviews( reviews ) {

		reviews = reviews.sort( function ( a, b ) {
			return b.date - a.date;
		} );

		for ( var i = 0; i < reviews.length; i ++ ) {
			var
				rev = reviews[i],
				$rev = $( '<div class="review"></div>' ),
				starsHtml = '';

			for ( var j = 0; j < 5; j ++ ) {
				if ( j < rev.rating ) {
					starsHtml += '<i class="star golden"></i>';
				} else {
					starsHtml += '<i class="star gray"></i>';
				}
			}

			var date = new Date( rev.date * 1000 );

			$rev
				.append(
					'<header>' +
					'<date>' + date.getFullYear() + '-' + (
					date.getMonth() + 1
					) + '-' + date.getDate() + '</date>' +
					'<div class="rating">' + starsHtml + '</div>' +
					'</header>'
				)
				.append( rev.content ? '<div class="content">' + rev.content + '</div>' : '' )
				.append(
					'<footer>' +
					'<i class="icon ' + rev.icon + '"></i>' +
					'<div class="name">' + rev.name + '</div>' +
					'<a class="view" href="' + rev.link + '">View review</a>' +
					'</footer>'
				);

			$revs.append( $rev );
		}
	}

	var $healthyhearing = $( '#healthyhearing-html' );
	$healthyhearing.find( '.reviews' ).find( '.well' ).each( function () {
		var
			$t = $( this ),
			$author = $t.find( '.author' ),
			date = $author.html().match( /<br>[0-9]{2}\/[0-9]{2}\/[0-9]{4}&nbsp;/ )[0].replace( '<br>', '' ).replace( '&nbsp;', '' ),
			dateO;

		date = date ? date.split( '/' ) : [];
		dateO = new Date( date[2] + '-' + date[0] + '-' + date[1] );
		reviews.push( {
			rating: $author.find( '.hh-icon-full-star' ).length,
			date: dateO.getTime() / 1000,
			content: $t.find( 'p.quote' ).text(),
			icon: 'healthyhearing',
			name: $author.find( '[itemprop="name"]' ).text(),
			link: links.healthyhearing,
		} );
	} );
	outputReviews( reviews );

} );