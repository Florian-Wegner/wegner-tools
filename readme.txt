=== Plugin Name ===
Contributors: Florian Wegner @vonwegner
Donate link: https://github.com/sponsors/Florian-Wegner
Tags: wegner, tools, toolbox, 
Requires at least: 5.2
Tested up to: 5.9
Stable tag: 1.0.2
Requires PHP: 7.2
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

A small plugin to enable and disable multiple code snippets / tool via checkboxes. There are possibilities to extend and reconfigure the DIVI THEME.

== Description ==

The following options are available:

WP Security
- Backend themes and plugins - disallow editing
- Hide Usernames from Classes
- Hide WordPress Version in Sourcecode Head
- Protect your blog from malicious URL requests with a plugin
- Disable WordPress Embeds
- Disable XML-RPC interface
- Disable XPingback

DIVI THEME
- Image Auto-Update Alt & Title
- Feed include Divi Projects (RSS-FEED)
- Rename projects with user-defined strings

=Image Auto-Update Alt & Title=
If an image is subsequently changed in the frontend editor, the changes are automatically applied to the database & media.

=Feed include Divi Projects (RSS-FEED)=
For some projects you want the DIVI projects to appear in the RSS feed. This setting makes it possible.

=Rename projects with user-defined strings=
Activate the checkbox and enter the new singular and plural name as well as the slug (how the URL should be built). It is also possible to change the category and tag.

== Usage ==

Install Pluigin as usual and go to 'Settings → Wegner Tools' and enable Code Snippets with the checkbox.

== Frequently asked questions ==

= Is the plugin compatible with WP Multisite? =

Yes, different settings can be used for each sub-site.

= Can I use the plugin without DIVI THEME? =

Yes, then the corresponding functions simply have no use.

== Bug reporting ==
On GitHub we collect all found bugs to fix them for the next version.
[https://github.com/Florian-Wegner/wegner-tools/issues](https://github.com/Florian-Wegner/wegner-tools/issues "Bug reporting on GitHub")

== Screenshots ==

1. Under Settings, you will find the plugin settings page. Simple check activates the function (default).

== Changelog ==

= 1.0.2 =
- Revision of the scripts and fixing of a forwarding error

= 1.0.1 =
- Fixed a bug that prevented the deactivation and activation of the plugin in the manager. 

= 1.0.0 =
- New README file
- Add function prefix to avoid collisions with other plugins.

= 0.8 =
- First functional version of the program 

== Upgrade Notice ==

= 1.0.2 =
- An error has occurred, which redirects all DIVI pages to the home page

= 1.0.1 =
If the plugin no longer displays links in the manager, we recommend an update

= 1.0.0 =
To avoid errors with other plugins, we strongly recommend not to use BETA version (>=0.9.9).