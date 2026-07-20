Extended Table Syntax 4 for DokuWiki
====================================

A maintained, PHP 8 compatible fork of Satoshi Sahara's Extended Table Syntax 3
plugin. It implements extended (MediaWiki-style) table syntax in DokuWiki while
preserving the existing table markup and `exttable` CSS class.

Installation
------------

Install the release archive with DokuWiki's Extension Manager, or place the
plugin in `lib/plugins/extab4`. Do not keep `exttab3` enabled at the same time,
because both plugins register the same table syntax.

Compatibility fixes
-------------------

* Uses the `extab4` DokuWiki plugin identifier and installation directory.
* Avoids undefined-variable warnings when closing table elements.
* Handles missing or existing HTML `class` attributes without undefined-array-key warnings.
* Avoids PHP 8's optional-before-required parameter compatibility issue.

Syntax
------

https://www.mediawiki.org/wiki/Help:Tables

| markup | description |
|:--     |:--          |
|<code>{&#124;</code>  | table start |
|<code>{+</code>       | table caption |
|<code>{-</code>       | table row |
|<code>!</code>        | table header |
|<code>&#124;</code>   | table data |
|<code>&#124;}</code>  | table end |

----
Licensed under the GNU Public License (GPL) version 2

More information about the original plugin is available:
  * https://www.dokuwiki.org/plugin:exttab3

Maintained fork:
  * https://github.com/lenehey/dw-plugin-extab4

(c) 2014-2021 Satoshi Sahara \<sahara.satoshi@gmail.com>
