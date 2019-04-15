<?php
if ( ! defined( 'MEDIAWIKI' ) )
  die();
/*

 Purpose:       Have certain namespaces whitelisted so 
                that they can be read, regardless of
                if the user has permission to read.

                For example, a public namespace, on
                a private wiki.

 @author n:en:User:Bawolff <http://en.wikinews.org/wiki/User:Bawolff>

 This program is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or 
 (at your option) any later version.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License along
 with this program; if not, write to the Free Software Foundation, Inc.,
 59 Temple Place - Suite 330, Boston, MA 02111-1307, USA.
 http://www.gnu.org/copyleft/gpl.html

 To install, add following to LocalSettings.php
   require_once("extensions/WhitelistNamespaces.php");
   $egNamespaceReadWhitelist = Array();
 
 Note, the order of those lines are important
 
 changing the $egNamespaceReadWhitelist = Array(); to be an array of namespaces
 you want to whitelist. ex: 
   $egNamespaceReadWhitelist = Array(NS_TALK, NS_MAIN, NS_HELP);
 for main help and talk namespaces.
 
 
Note: the UserGetRights hook is useful if the wiki is world readable.
In such a case the $egNamespaceActionWhitelist array defines the
permissions offered to anonymous users in this namespace. Eg:
$egNamespaceActionWhitelist = array('read', 'edit', 'createpage', 'createtalk');
Default right is read which must be safe.
However non-world-readable wikis have not be tested extensively.

Remember that 'createpage' right is given automagically with 'edit'

*/

// default. overide it in LocalSettings.php
$egNamespaceReadWhitelist = Array();
// default. overide it in LocalSettings.php
$egNamespaceActionWhitelist = Array('read');

$wgHooks['userCan'][] = 'efExtensionWhitelistNamespaces';
$wgHooks['UserGetRights'][] = 'efWhitelistedNamespaces';

$wgExtensionCredits['other'][] = array(
  'name' => 'Whitelist Namespaces',
  'description' => 'Allows an entire namespace to be read-whitelisted',
  'url' => 'http://www.mediawiki.org/wiki/Extension:Whitelist_Namespaces',
  'author' => array('Bawolff', 'Drzraf'),
  'version' => '0.3'
);
 
 
function efExtensionWhitelistNamespaces(&$title, &$user, $action, &$result) {
  global $egNamespaceReadWhitelist, $egNamespaceActionWhitelist;
  if (in_array($action, $egNamespaceActionWhitelist, true)) {
    if( in_array($title->getNamespace(), $egNamespaceReadWhitelist, true)) {
      $result = true;
      return false;
    }
  }
  return true;
}

// There was (abandonned) plans to introduce $ns as a
// 3rd parameter during 1.19 cycle, see 3da36a9103
function efWhitelistedNamespaces( $user, &$aRights ) {
  global $egNamespaceReadWhitelist, $egNamespaceActionWhitelist;
  $ns = RequestContext::getMain()->getTitle()->getNamespace();
  if($user->isAnon() && $ns && in_array( $ns, $egNamespaceReadWhitelist, true ) ) {
    $aRights = array_merge($aRights, $egNamespaceActionWhitelist);
  }
  return true;
}
