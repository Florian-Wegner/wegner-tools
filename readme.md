# WP Crontrol

Contributors: Florian Wegner @vonwegner
Donate link: https://github.com/sponsors/Florian-Wegner
Tags: wegner, tools, toolbox,
Requires at least: 5.2
Tested up to: 5.9
Stable tag: 1.0.1
Requires PHP: 7.2
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

## Description

A small plugin to enable and disable multiple code snippets / tool via checkboxes. There are possibilities to extend and reconfigure the DIVI THEME.
The following options are available:

_WP Security_

-   Backend themes and plugins - disallow editing
-   Hide usernames from classes & hide WordPress version in source code header
-   Protect your blog from malicious URL requests with a plugin
-   Disable embeddings in WordPress
-   Disable XML-RPC interface

_DIVI THEME_

-   Image Auto-Update Alt & Title
-   Feed include Divi Projects (RSS-FEED)
-   Rename projects with user-defined strings

_Image Auto-Update Alt & Title_
If an image is subsequently changed in the frontend editor, the changes are automatically applied to the database & media.

_Feed include Divi Projects (RSS-FEED)_
For some projects you want the DIVI projects to appear in the RSS feed. This setting makes it possible.

_Rename projects with user-defined strings_
Activate the checkbox and enter the new singular and plural name as well as the slug (how the URL should be built). It is also possible to change the category and tag.

### Usage

Go to the `Settings → Wegner Tools` and Activate code snippets with the check box.

## Frequently asked questions

_Is the plugin compatible with WP Multisite?_
Yes, different settings can be used for each sub-site.

_Can I use the plugin without DIVI THEME?_
Yes, then the corresponding functions simply have no use.

## Bug reporting

On GitHub we collect all found bugs to fix them for the next version.

## Changelog

### 1.0.1

-   Fixed a bug that prevented the deactivation and activation of the plugin in the manager.

### 1.0.0

-   New README file
-   Add function prefix to avoid collisions with other plugins.

### 0.8

-   First functional version of the program

## Upgrade Notice

### 1.0.1

If the plugin no longer displays links in the manager, we recommend an update

### 1.0.0

To avoid errors with other plugins, we strongly recommend not to use BETA version (>=0.9.9).
