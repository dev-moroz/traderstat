=== WP Referral Code ===
Contributors: shalior
Tags: refer code, referral marketing, refer
Requires at least: 4.8
Tested up to: 5.7
Requires PHP: 5.6
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html

this plugin brings referral codes to your wordpress website. many shortcodes are available and its all free

== Description ==
WP Referral code helps you generate a refer code for each of your users and start your version of referral marketing.on user registeration plugin will capture the refer code. WP Referral Code provides a user-friendly "copy refer link box" so that users can easily copy and share their link.

this plugin\'s only dependency is wordpress core you can use it with all plugins out there. the logic after successful referred registeration is up to you though. 2 important hooks will help you with that. check documentation on plugin website for more information.[Documentation](http://shalior.ir/wp-referral-code "Shalior")

several shortcodes are provided to help you get the things where they should be. you can see a list of them on plugin options

All information about referral status of user is on user edit page(Dashboard->Users->selec a user). there you can see how many users he has invited and referred by who.

== Installation ==
note: on activation plugin will create refer codes for all of your users.

== Screenshots ==
1. Options page of plugin
2. Copy link shortcode example

== Changelog ==

= 1.2.0 =
* new feature to remove referral relation in user edit admin page

= 1.1.1 =
* update tested up to version: 5.7
* fix copy box shortcode not rendering in some page builders.

= 1.1.0 =
* New option to set ref code expiration time
* New shortcode to show invited users list in frontend. new hooks to customize list's look.
* New important filter to modify ref code on registration ('wp_referral_code_new_user_ref_code') which makes it possible to capture possible refer code value from registration form or other sources.
* minor bug fixes and performance improvements
* -Many thanks to Stefano (@sdotb) for testing and reviewing plugin

= 1.0.2 =
* this update ensures values in the invited users list are unique.

= 1.0.1 =
* This minor update includes code improvements and some new hooks to make the plugin easier to extend by developers. no breaking changes.
* add new filter 'wp_referral_code_validate_submission' to control wheter refer data should be submited to database.
* new helper function 'wp_referral_code_add_user_to_referrer_invite_list($user_id, $referrer_id)' 

= 1.0.0 =
* First version
