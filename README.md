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

Authorship and acknowledgments
-----------------------------

Extended Table Syntax 4 (extab4) is maintained by **lenehey**. It is a
compatibility fork of **Extended Table Syntax 3 (exttab3)** by **Satoshi Sahara**;
nearly all of the original implementation is his work. The extab4 maintenance
work addresses PHP compatibility and integration issues while retaining the
original table syntax and behavior.

Thank you to Satoshi Sahara and the original plugin's contributors. The original
source credits, copyright notices, and GPL version 2 license are preserved.

* Original plugin: https://www.dokuwiki.org/plugin:exttab3
* Upstream source: https://github.com/ssahara/dw-plugin-exttable
* extab4 support and bug reports: https://github.com/lenehey/dw-plugin-extab4/issues

The Extension Manager credit identifies both the fork's maintainer and the
original author. Please report extab4 issues to the fork's issue tracker rather
than to the upstream author's email address.

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
