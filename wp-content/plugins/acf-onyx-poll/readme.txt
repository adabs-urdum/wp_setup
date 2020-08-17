=== ACF Onyx Poll ===
Contributors: andremacola
Tags: poll, polls, onyx, aop, acf, advanced
Requires at least: 4.7
Tested up to: 5.5
Requires PHP: 7.0
Stable tag: 1.1.2
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Create polls widgets, blocks and modals based on regular Wordpress and acf (advanced custom fields) functionalities.

== Description ==

***This plugin requires [ADVANCED CUSTOM FIELD PRO](https://www.advancedcustomfields.com/pro/) installed.***

Plugin for polls based on regular Wordpress and acf (advanced custom fields) functionalities using **WP REST API** and ***Javascript*** methods.

The main goal of ACF Onyx Poll is to be **totally free, lightweight and simple**. No fancy, colorful and polluted options or donate screens.

This plugin is based on [Twitter](https://twitter.com) poll cards style.

= Features =

✔ **Gutemberg Block** with live preview
✔ Include poll with a shortcode (ommit the ID to get the latest poll) `[onyx-poll id=XX class="left|right|full"]`
✔ One click to vote
✔ Works with cache plugins
✔ Multiple polls per page
✔ Support for images
✔ Native widget for sidebar
✔ Multiple style options `[onyx-poll class="twitter|standard"]`
✔ Show poll in a modal
✔ Show poll results on widget after expired
✔ Highlight choosed choice in results area
✔ Limit vote by device or time
✔ Poll activation/expiration schedule
✔ Results in percentage, numbers or both
✔ Show/Hide results
✔ Customize css with css variables
✔ Disable all plugin CSS and use your own
✔ Custom columns on Wordpress data table admin area
✔ Translations support

= Observations =

- This plugin does not support Internet Explorer Browser. One of the goals of this plugin is to be js/css lightweight and jQuery free.

- ACF Onyx Poll [register fields via php](https://www.advancedcustomfields.com/resources/register-fields-via-php/) to be able to use Wordpress translation functions for field labels. So you won't be able to view/edit the fields inside ACF Custom Fields Settings.

- To enable a better/faster **CRON** you need to manually set your host cronjob to get *https://domain.tld/wp-json/onyx/polls/cron* endpoint or disable WP-Cron `define('DISABLE_WP_CRON', true);` inside your wp-config and manually create the cron in your host/server

	- **Option 1**: To run every hour set the cron: <br> `0 * * * * wget -q -O - https://domain.tld/wp-json/onyx/polls/cron > /dev/null 2>&1`

	- **Option 2**: if you disable the default WP-Cron: <br> `0 * * * * wget -q -O - https://domain.com/wp-cron.php?doing_wp_cron > /dev/null 2>&1`

== Installation ==

From your WordPress dashboard

1. **Visit** Plugins > Add New
2. **Search** for "ACF Onyx Poll"
3. **Activate** ACF Onyx Poll from your Plugins page
4. **Click** on the new menu item "Polls" and create your first Poll!

== Frequently Asked Questions ==

= Do I need ACF PRO Installed? =

Yes, Advanced Custom Fields PRO is mandatory

= How to add a poll to a post? =

* If Gutenberg is active, you can use the **ACF Onyx Poll Block** with live preview
* Or..use the shortcode `[onyx-poll]` to get the latest poll
* To add a specific poll, assign the option **ID** with the requested poll to the shortcode: `[onyx-poll id=XX]`
* You can align the poll container with the option **class** in the shortcode: `[onyx-poll class=left]`. Available options are `left, right, full`
* Is it possible to combine style and aligment. Ex: `[onyx-poll class="standard left"]`

= How to add a poll to a sidebar? =

* To include a **widget**, your theme need to support it. Go to Appereance > Widgets and select **Poll** widget from *ACF Onyx Poll*

= Is it possible to use my own CSS? =

Yes, go to the settings poll menu. You can do some customization by overriding some CSS variables inside your css file.

`
.onyx-poll {
	--pollWidgetWidth: 400px;
	--borderColor: #dbe9f5;
	--boxShadow: 0 4px 12px 6px rgba(31,70,88,0.04);
	--modalBorderRadius: 4px;
	--questionColor: #333;
	--choiceColor: #333;
	--buttonColor: #333;
	--choiceHoverBG: #f5f5f5;
	--choiceBarColor: #e0e0e0;
	--choiceBorderRadius: 100px;
	--closeBorderRadius: 100px;
	--loaderBorderColor: rgb(209, 226, 240);
	--loaderBG: #a3caec;
}
`

= What kind of logs and user data this plugin saves in database? =

At the database side, ACF Onyx Poll uses the default ACF/Wordpress structure to store data (the meta fields). Nothing to worry about here.

For privacy, ACF Onyx Poll **does not store** any user data like ip address, usernames etc...

The only things the plugin saves in the user's browser is some cookies to check the user choice for specific poll, if the modal was previously showed/closed and a timer. You can check the cookies by looking for `onyx_poll_limit_XX, onyx_poll_modal and onyx_poll_choice_XX`.

= What about browsers support? =

All modern browsers will be fine: Chrome, Firefox, Safari and Microsoft Edge (legacy and chromium based).

This plugin will not work with any Internet Explorer version.

== Screenshots ==

1. Admin List Screen.
2. Creating a poll.
3. Example of poll widget/modal
4. Showing poll results.

== Changelog ==

= 1.1.2 =
*Release Date - 11 Aug 2020*

* TESTED: WordPress 5.5
* FIXED: Rest API method permission_callback typo

= 1.1.1 =
*Release Date - 30 May 2020*

* HOTFIX: Some filters were causing fatal errors in some themes and conflicting with certain plugins

= 1.1.0 =
*Release Date - 30 May 2020*

* NEW Gutenberg Onyx Poll Block with live preview (no more shortcodes :))
* Shortcode is now available to copy on the pool table list
* Fix some php notices (again :))
* CSS adjustments
* JS adjustments
* Languages updates

= 1.0.1 =
*Release Date - 29 May 2020*

* Added native sidebar widget
* Added new bar style
* Update en language source pot file.
* Fix results view bug when only numbers or percentage option is selected
* Fix some php notices
* Fix css flex alignment
* Fix click event bug

= 1.0 =
*Release Date - 27 May 2020*

* Initial release

== Upgrade Notice ==
