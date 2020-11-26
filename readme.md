# tsml_debug

The tsml_debug plugin is a companion pluging for the the [12 Step Meeting List](https://wordpress.org/plugins/12-step-meeting-list/) plugin. Without the 12 Step Meeting List plugin, this plugin doesn't do anything.

For sites that havbe the 12 Step Meeting List plugin, this plugin allows the site admin to enable public access to a page the support people can use to get more information about the site. The URL for the "public" page will include a security key, to make it harder for others to find the page. Also, this "public" page will automatically switch to admin only after 7 days, so these public pages won't be accessible after the support issue is completed

The public page includes the following information/features:
- Shows current theme name and version
- Lists active Plugins
- Shows version numbers for WordPress, PHP, and the 12 Step Meeting List Plugin
- Shows cached Addresses, human readable and serialized
- Links to a JSON Feed and CSV file of the published meetings

With this information, it may be easier for support people to figure out what's happening when people ask questions about their sites, especially if the questions are around addresses not working.

## Todo

There is more work to be done:
- Way to delete individual addresses from the cache
- Way to add an address to the cache
- Maybe a way to delete the entire address cache (if so, please use sparingly)
- Maybe a way to delete the meeting cache file
- Way to email support with the address, without copy/paste of the URL
- Add/update help text on the debug page
- Add additional tabs with useful information/features

And of course, additional testing, both around security, and how it works on different sites with different themes
