CONTENTS OF THIS FILE
---------------------

* Introduction
* Requirements
* Recommended Modules
* Installation
* Configuration
* Troubleshooting
* Maintainers


INTRODUCTION
------------

The Block Content Permissions module adds permissions for administering
"block content types" and "block content" on the "Custom block library" pages:
"Block types" and "Blocks".

* **Administer block content types:**
  Manage types and fields on "Block types" related pages.
* **[*type*]: Create new block content:**
  Add and view block content of a specific type.
* **[*type*]: Delete any block content:**
  Delete and view block content of a specific type.
* **[*type*]: Edit any block content:**
  Edit and view block content of a specific type.
* **View restricted block content:**
  View all types of block content, ignoring view restrictions.

This module removes the required "Administer blocks" permission from most pages.

* **2920739** - Remove "Administer blocks" permission from view page:
  https://www.drupal.org/project/block_content_permissions/issues/2920739

* **1975064** - Add permissions to core:
  https://www.drupal.org/node/1975064

* For a full description of the module visit:
  https://www.drupal.org/project/block_content_permissions

* To submit bug reports, suggest features, or track changes visit:
  https://www.drupal.org/project/issues/block_content_permissions


REQUIREMENTS
------------

This module requires no modules outside of Drupal core.


RECOMMENDED MODULES
-------------------

* Block Region Permissions:
  Adds permissions for administering the "Block layout" pages.
  https://www.drupal.org/project/block_region_permissions


INSTALLATION
------------

Install this module as you would normally install a contributed Drupal module.
Visit https://www.drupal.org/node/1897420 for further information.



CONFIGURATION
-------------

Configure permissions: Administration » People » Permissions.

Enable the "Block - Administer blocks" permission. **Warning:** This permission
grants access to block pages not managed by this module. Use the recommended
modules to further restrict access.

The "Blocks" page list is consolidated to manageable items. To override this
behavior, enable the "View restricted block content" permission, which will not
override the "Create", "Edit" and "Delete" restrictions.

Enable permissions for specific types:
* Block Content Permissions - [*type*]: Create new block content
* Block Content Permissions - [*type*]: Delete any block content
* Block Content Permissions - [*type*]: Edit any block content

Enable permissions for **trusted roles** (optional):
* Block Content Permissions - Administer block content types
* Field UI - Custom block: Administer display
* Field UI - Custom block: Administer fields
* Field UI - Custom block: Administer form display

Enable permissions for theme and navigation (optional):
* System - Use the administration pages and help
* System - View the administration theme
* Toolbar - Use the toolbar


TROUBLESHOOTING
---------------

List of pages that should deny access depending on permissions.

"Block types" pages ("Administer block content types" permission):
* **List:**
  /admin/structure/block/block-content/types
* **Add:**
  /admin/structure/block/block-content/types/add
* **Edit:**
  /admin/structure/block/block-content/manage/[*type*]
* **Delete:**
  /admin/structure/block/block-content/manage/[*type*]/delete

"Block types" pages ("Field UI" permissions):
* **Manage form display:**
  /admin/structure/block/block-content/manage/[*type*]/form-display
* **Manage display:**
  /admin/structure/block/block-content/manage/[*type*]/display
* **Manage fields:**
  /admin/structure/block/block-content/manage/[*type*]/fields
* **Add field:**
  /admin/structure/block/block-content/manage/[*type*]/fields/add-field
* **Field settings:**
  /admin/structure/block/block-content/manage/[*type*]/fields/block_content.[*type*].field_[*field*]/storage
* **Edit field:**
  /admin/structure/block/block-content/manage/[*type*]/fields/block_content.[*type*].field_[*field*]
* **Delete field:**
  /admin/structure/block/block-content/manage/[*type*]/fields/block_content.[*type*].field_[*field*]/delete

"Blocks" pages ("Create", "Delete", "Edit" and "View" permissions):
* **List:**
  /admin/structure/block/block-content
* **Add:**
  /block/add
* **Add type:**
  /block/add/[*type*]
* **Edit:**
  /block/[*block_content_id*]
* **Delete:**
  /block/[*block_content_id*]/delete


MAINTAINERS
-----------

* Joshua Roberson - https://www.drupal.org/u/joshuaroberson
