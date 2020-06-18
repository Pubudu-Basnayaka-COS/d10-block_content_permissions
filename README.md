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
"block content types" and "block content". The "Administer blocks" permission
normally manages these entities on the "Custom block library" pages:
"Block types" and "Blocks".

* For additional information on the module visit:
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

* Configure the user permissions in `Administration » People » Permissions`:

  - Block - Administer blocks

    (Required) Allows management of blocks. **Warning:** This permission grants
    access to block pages not managed by this module. Use the recommended
    modules to restrict the rest. Requirements for this permission have been
    removed for most pages, so it is not required for some use cases. It is
    still required for navigational purposes and the "Blocks" views page.

  - Block Content Permissions - [*type*]: Create new block content

    (Optional) Create block content for a specific type. View on "Blocks" page.

  - Block Content Permissions - [*type*]: Delete any block content

    (Optional) Delete block content for a specific type. View on "Blocks" page.

  - Block Content Permissions - [*type*]: Edit any block content

    (Optional) Edit block content for a specific type. View on "Blocks" page.

  - Block Content Permissions - Administer block content types

    (Optional) Give to **trusted roles only**. Allows management of all block
    content types. The "Field UI" permissions fully manage the displays, fields,
    and form displays.

  - Block Content Permissions - View restricted block content

    (Optional) Allows viewing and searching of block content for all types.
    Disabling this permission restricts the types to ones the user can manage.
    This permission is only used on the "Blocks" views page and will not affect
    the "Create", "Edit" and "Delete" restrictions. The views page requires the
    "Administer blocks" permission.

  - Field UI - Custom block: Administer display

    (Optional) Give to **trusted roles only**. Allows management of displays for
    all block content types.

  - Field UI - Custom block: Administer fields

    (Optional) Give to **trusted roles only**. Allows management of fields for
    all block content types.

  - Field UI - Custom block: Administer form display

    (Optional) Give to **trusted roles only**. Allows management of form display
    for all block content types.

  - System - Use the administration pages and help

    (Optional) Allows use of admin pages during navigation.

  - System - View the administration theme

    (Optional) Allows use of administrative theme for aesthetics.

  - Toolbar - Use the toolbar

    (Optional) Allows use of toolbar during navigation.


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

Current maintainers:
* Joshua Roberson - https://www.drupal.org/u/joshuaroberson
