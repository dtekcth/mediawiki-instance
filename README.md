Datas Mediawiki
=======

Setup
-----

To setup your own instance of our mediawiki:

1. clone this repo
```
git clone https://github.com/dtekcth/mediawiki-instance.git
```
2. Initialize submodules by running
```bash
git submodule update --init --recursive
```

This should give you something like

```bash
Submodule 'extensions/UserMerge' (https://github.com/wikimedia/mediawiki-extensions-UserMerge.git) registered for path 'extensions/UserMerge'
Submodule 'extensions/VisualEditor' (https://github.com/wikimedia/mediawiki-extensions-VisualEditor.git) registered for path 'extensions/VisualEditor'
Cloning into '/[folder]/mediawiki-instance/extensions/UserMerge'...
Cloning into '/[folder]/mediawiki-instance/extensions/VisualEditor'...
Submodule path 'extensions/UserMerge': checked out 'f6b8e05583e2c7a07f918381f9772b456259b625'
Submodule path 'extensions/VisualEditor': checked out '6854ea0e7a0a8248c2c27498c9fd0cab5462c9c4'
Submodule 'lib/ve' (https://gerrit.wikimedia.org/r/p/VisualEditor/VisualEditor.git) registered for path 'extensions/VisualEditor/lib/ve'
Cloning into '/[folder]/mediawiki-instance/extensions/VisualEditor/lib/ve'...
Submodule path 'extensions/VisualEditor/lib/ve': checked out 'a64ba1cc623865eaaeafad0c74926eab59b79ac5'
```

3. The `sensitiveSettings.php.template` needs to be moved to
`sensitiveSettings.php` and the variables configure properly.
   * The `$wgSMTP` is optional and is needed if the wiki should be able to send
     email. This is useful for verifying emailaddress.
   * The database settings need to be configured accoring to the settings you
     enter during the web-configuration phase later on
     Note: if these settings are changed from the default in the template you also need to change them
     in `docker-compose.yml`
   * The `$wgSecretKey` needs to be a 64character long random string. Mediawiki
     uses this for cryptography so make sure this isn't leaked
   * The `$wgUpgradeKey` is used during the web-configuration phase later on

4. Start the containers with `docker-compose up -d`

5. go to `localhost:8081/mw-config` to configure the wiki, follow the
   instructions

6. This is as far as this guide will take you. Becuase of how the LocalSettings
   are configured you need to change the domain from `wiki.dtek.se` in order to
   make it work on another domain. At the moment it redirects you to the
   actually instance setup there. If you need to have more information about
   this contact @hallavad
