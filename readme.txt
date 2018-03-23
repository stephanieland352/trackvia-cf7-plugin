=== Plugin Name ===
Contributors: Stephanie Land
Tags: contact form 7, cf7, trackvia
Requires at least: 4.7.2
Stable tag: 1.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Contact form 7 TRACKVIA integration.

== Description ==

This plugin adds integration for TrackVia to contact form 7. With this plugin it is possible to submit a contact for to an external TrackVia.

Per contact form you could enable TrackVia integration. The submission of the contact form is then submitted to the TrackVia REST api. That is why you should also enter an TrackVia viewid and an TrackVia action. The data in the form should then match the data for the api. E.g. if you push a first_name to the api your field should be called first_name.

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/plugin-name` directory, or install the plugin through the WordPress plugins screen directly.
1. Activate the plugin through the 'Plugins' screen in WordPress
1. Use the Settings->TrackVia screen to configure the plugin
1. Enable TrackVia on per form basis.


== Screenshots ==

1. This screenshot shows the settings screen
2. This screenshot shows the screen for enabling and setting up TrackVia integration at a contact form.

== Changelog ==

= 1.1 =
* Added message to bottom of Contact Form 7 Email that tells whether trackvia transmission was a success or not
= 1.0 =
* Initial commit
