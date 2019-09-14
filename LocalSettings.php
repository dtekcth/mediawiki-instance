<?php

# This file was automatically generated by the MediaWiki 1.31.0
# installer. If you make manual changes, please keep track in case you
# need to recreate them later.
#
# See includes/DefaultSettings.php for all configurable settings
# and their default values, but don't forget to make changes in _this_
# file, not there.
#
# Further documentation for configuration settings may be found at:
# https://www.mediawiki.org/wiki/Manual:Configuration_settings

# Protect against web entry
if ( !defined( 'MEDIAWIKI' ) ) {
	exit;
}

require_once("./sensitiveSettings.php");
// Allow PDF uploads
$wgFileExtensions[] = 'pdf';

// Namespace for archived pages
define("NS_ARCHIVED", 3000);
$wgExtraNamespaces[NS_ARCHIVED] = "Archived";
define("NS_ARCHIVED_TALK", 3001);
$wgExtraNamespaces[NS_ARCHIVED_TALK] = "Archived_Talk";

// Namespace for public pages
define("NS_PUBLIC", 3002);
$wgExtraNamespaces[NS_PUBLIC] = "Public";
define("NS_PUBLIC_TALK", 3003);
$wgExtraNamespaces[NS_PUBLIC_TALK] = "Public_Talk";

// Make this namespace public using the `Whitelist Namespaces` extension
require_once("extensions/WhitelistNamespaces.php");
$egNamespaceReadWhitelist = Array(NS_PUBLIC);


## Uncomment this to disable output compression
# $wgDisableOutputCompression = true;

$wgSitename = "DTEK-wiki";

## The URL base path to the directory containing the wiki;
## defaults for all runtime URL paths are based off of this.
## For more information on customizing the URLs
## (like /w/index.php/Page_title to /wiki/Page_title) please see:
## https://www.mediawiki.org/wiki/Manual:Short_URL
$wgScriptPath = "";
$wgScriptExtension = ".php";
$wgArticlePath = "/wiki/$1";

## The protocol and server name to use in fully-qualified URLs
$wgServer = "https://wiki.dtek.se";

## The URL path to static resources (images, scripts, etc.)
$wgResourceBasePath = $wgScriptPath;

## The URL path to the logo.  Make sure you change this from the default,
## or else you'll overwrite your logo when you upgrade!
$wgLogo = "$wgResourceBasePath/resources/assets/logo.svg";

## UPO means: this is also a user preference option

$wgEnableEmail = true;
$wgEnableUserEmail = false; # UPO

$wgEmergencyContact = "wiki@dtek.se";
$wgPasswordSender = "wiki@dtek.se";

$wgEnotifUserTalk = false; # UPO
$wgEnotifWatchlist = true; # UPO
$wgEmailAuthentication = true;


# MySQL specific settings
$wgDBprefix = "";

# MySQL table options to use during installation or update
$wgDBTableOptions = "ENGINE=InnoDB, DEFAULT CHARSET=binary";

## Shared memory settings
$wgMainCacheType = CACHE_ACCEL;
$wgMemCachedServers = [];

## To enable image uploads, make sure the 'images' directory
## is writable, then set this to true:
$wgEnableUploads = true;
$wgUseImageMagick = true;
$wgGenerateThumbnailOnParse = false;
$wgImageMagickConvertCommand = "/usr/bin/convert";

# InstantCommons allows wiki to use images from https://commons.wikimedia.org
$wgUseInstantCommons = false;

# Periodically send a pingback to https://www.mediawiki.org/ with basic data
# about this MediaWiki instance. The Wikimedia Foundation shares this data
# with MediaWiki developers to help guide future development efforts.
$wgPingback = false;

## If you use ImageMagick (or any other shell command) on a
## Linux server, this will need to be set to the name of an
## available UTF-8 locale
$wgShellLocale = "C.UTF-8";

## Set $wgCacheDirectory to a writable directory on the web server
## to make your wiki go slightly faster. The directory should not
## be publically accessible from the web.
#$wgCacheDirectory = "$IP/cache";

# Site language code, should be one of the list in ./languages/data/Names.php
$wgLanguageCode = "en";


# Changing this will log out all existing sessions.
$wgAuthenticationTokenVersion = "1";


## For attaching licensing metadata to pages, and displaying an
## appropriate copyright notice / icon. GNU Free Documentation
## License and Creative Commons licenses are supported so far.
$wgRightsPage = ""; # Set to the title of a wiki page that describes your license/copyright
$wgRightsUrl = "";
$wgRightsText = "";
$wgRightsIcon = "";

# Path to the GNU diff3 utility. Used for conflict resolution.
$wgDiff3 = "/usr/bin/diff3";

# The following permissions were set based on your choice in the installer
$wgGroupPermissions['*']['createaccount'] = true;
$wgGroupPermissions['*']['edit'] = false;
$wgGroupPermissions['*']['read'] = false;

$wgWhitelistRead = array ("Special:CreateAccount");

## Default skin: you can change the default skin. Use the internal symbolic
## names, ie 'vector', 'monobook':
$wgDefaultSkin = "vector";

# Enabled skins.
# The following skins were automatically enabled:
wfLoadSkin( 'MonoBook' );
wfLoadSkin( 'Timeless' );
wfLoadSkin( 'Vector' );


# Enabled extensions. Most of the extensions are enabled by adding
# wfLoadExtensions('ExtensionName');
# to LocalSettings.php. Check specific extension documentation for more details.
# The following extensions were automatically enabled:
wfLoadExtension( 'CategoryTree' );
wfLoadExtension( 'Cite' );
wfLoadExtension( 'CiteThisPage' );
wfLoadExtension( 'ConfirmEdit' );
wfLoadExtension( 'Gadgets' );
wfLoadExtension( 'ImageMap' );
wfLoadExtension( 'InputBox' );
wfLoadExtension( 'Interwiki' );
wfLoadExtension( 'LocalisationUpdate' );
wfLoadExtension( 'MultimediaViewer' );
wfLoadExtension( 'ParserFunctions' );
wfLoadExtension( 'PdfHandler' );
wfLoadExtension( 'Poem' );
wfLoadExtension( 'Renameuser' );
wfLoadExtension( 'ReplaceText' );
wfLoadExtension( 'SpamBlacklist' );
wfLoadExtension( 'SyntaxHighlight_GeSHi' );
wfLoadExtension( 'TitleBlacklist' );


# End of automatically generated settings.
# Add more configuration options below.

#Default user options:
$wgDefaultUserOptions['riched_disable']               = false;
$wgDefaultUserOptions['riched_start_disabled']        = false;
$wgDefaultUserOptions['riched_use_toggle']            = true;
$wgDefaultUserOptions['riched_use_popup']             = false;
$wgDefaultUserOptions['riched_toggle_remember_state'] = true;
$wgDefaultUserOptions['riched_link_paste_text']       = true;

//To enable us to "delete" users via the extension UserMerge. Available at Special:UserMerge.
wfLoadExtension( 'UserMerge' );
$wgGroupPermissions['bureaucrat']['usermerge'] = true;

error_reporting(0);
ini_set('display_errors', 0);

$wgShowExceptionDetails = true;
$wgShowDBErrorBacktrace = true;
$wgShowSQLErrors = true;

function abortOnBadDomain($user, &$message) {
	global $wgRequest;
	$allowedDomains = array( "student.chalmers.se" );
	$email = $user->getEmail();
	$emailSplitList = explode("@", $email, 2);

	if ( isset( $emailSplitList[1] ) ) {
		foreach( $allowedDomains as $domain ) {
			if ( $emailSplitList[1] === $domain ) {
				return true;
			}
		}
	}
	$message = "You need a whitelisted email address";

	return false;
}
$wgHooks['AbortNewAccount'][] = 'abortOnBadDomain';

// =======================================================================
// =======================================================================
// This configuration is for getting the visualeditor and parsoid to work
// =======================================================================
// =======================================================================

wfLoadExtension( 'VisualEditor' );

// Enable by default for everybody
$wgDefaultUserOptions['visualeditor-enable'] = 1;

$wgVisualEditorNamespaces = array_merge( $wgContentNamespaces, array( NS_USER, NS_CATEGORY ) );

// Optional: Set VisualEditor as the default for anonymous users
// otherwise they will have to switch to VE
$wgDefaultUserOptions['visualeditor-editor'] = "visualeditor";

// Don't allow users to disable it
//$wgHiddenPrefs[] = 'visualeditor-enable';

// OPTIONAL: Enable VisualEditor's experimental code features
//$wgDefaultUserOptions['visualeditor-enable-experimental'] = 1;

$wgVirtualRestConfig['modules']['parsoid'] = array(
    // URL to the Parsoid instance
    'url' => 'http://parsoid:8000',
);

//============================
// Parsoid for private wikis
//============================

// This feature requires a non-locking session store. The default session store will not work and
// will cause deadlocks (connection timeouts from Parsoid) when trying to use this feature. Only required for MediaWiki 1.26.x and earlier!
$wgSessionsInObjectCache = true;

// Forward users' Cookie: headers to Parsoid. Required for private wikis (login required to read).
// If the wiki is not private (i.e. $wgGroupPermissions['*']['read'] is true) this configuration
// variable will be ignored.
//
// WARNING: ONLY enable this on private wikis and ONLY IF you understand the SECURITY IMPLICATIONS
// of sending Cookie headers to Parsoid over HTTP. For security reasons, it is strongly recommended
// that $wgVirtualRestConfig['modules']['parsoid']['url'] be pointed to localhost if this setting is enabled.
$wgVirtualRestConfig['modules']['parsoid']['forwardCookies'] = true;

/*
// Load external mediawiki extensions from docker volume
if ($handle = opendir("/var/www/html/external_extensions")) {
    while (false !== ($entry = readdir($handle))) {
		echo "$entry\n";
		copy("/var/www/html/external_extensions" . $entry, "/var/www/html/external_extensions" . $entry);
    }

    closedir($handle);
}
 */


// =======================================================================
// =======================================================================
// END OF configuration for getting the visualeditor and parsoid to work
// =======================================================================
// =======================================================================
//

// Enables different displaytitles than pagename
$wgAllowDisplayTitle = true;

$wgLocaltimezone = "Europe/Stockholm";
