=== Hotel Booking ===
Contributors: MotoPress
Donate link: https://motopress.com/
Tags: hotel booking, reservation, hotel, booking engine, booking, booking calendar, booking system
Requires at least: 4.7
Tested up to: 6.5
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

The #1 Hotel Booking and Vacation Rental Plugin for WordPress. Online payments, seasons, rates, free or paid extras, coupons, taxes & fees.

== Description ==
Manage your hotel booking services. Perfect for hotels, villas, guest houses, hostels, and apartments of all sizes.

== Installation ==

1. Upload the MotoPress plugin to the /wp-content/plugins/ directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.

== Copyright ==

Hotel Booking plugin, Copyright (C) 2016, MotoPress https://motopress.com/
Hotel Booking plugin is distributed under the terms of the GNU GPL.

== Changelog ==

= 4.11.2, May 9 2024 =
* Minor bugfixes and improvements.

= 4.11.1, May 3 2024 =
* Removed whitespace characters from AJAX requests.
* Fixed an issue with serializeJSON() at checkout.
* Fixed time zone issues.
* Fixed an issue where blocked dates for linked accommodations weren't displaying in the admin calendar.
* Fixed a cost calculation issue for properties with variable pricing during search and booking.
* Fixed an issue with adding a rate through REST API.

= 4.11.0, Apr 23 2024 =
* Added hooks for overwriting prices in the core API.

= 4.10.3, Apr 18 2024 =
* Fixed an issue with admin-created accommodation blocking rules.
* Fixed an issue with setting priority for booking rules.
* Fixed an issue with retrieving booked services data in the REST API.

= 4.10.2, Apr 1 2024 =
* Fixed an issue where higher-priority booking rules in the list were not overriding lower-priority ones.

= 4.10.1, Mar 27 2024 =
* Fixed an issue where the Klarna payment method was still displayed as an option within Stripe even if it was disabled in the plugin settings.

= 4.10.0, Mar 22 2024 =
* Added the ability to link selected accommodations, enabling automatic blocking of linked accommodations when one is booked.

--------

[See the previous changelogs here](https://motopress.com/products/hotel-booking/#release-notes).
