<?php
/**
 * Plugin Name: Slack Toolkit
 * Description: Provides tools to integrate with Slack
 */

namespace HM\Slack;

function escape( $text ) {
	$replacements = array(
		'&' => '&amp;',
		'<' => '&lt;',
		'>' => '&gt;',
	);
	return strtr( $text, $replacements );
}

function link( $url, $text = null ) {
	if ( $text ) {
		return sprintf( '<%s|%s>', $url, escape( $text ) );
	}
	else {
		return sprintf( '<%s>', $url );
	}
}

function message( $data ) {
	$url = HM_SLACK_INCOMING_URL;
	$args = array(
		'body' => json_encode( $data ),
	);
	wp_remote_post( $url, $args );
}
