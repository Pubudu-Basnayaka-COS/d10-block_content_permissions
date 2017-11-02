<?php

namespace Drupal\block_content_permissions\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

/**
 * Listens to the dynamic route events.
 */
class RouteSubscriber extends RouteSubscriberBase {

  /**
   * The AccessControlHandler class name.
   *
   * @var string
   */
  private $AccessControlHandlerClassName = 'Drupal\block_content_permissions\AccessControlHandler';

  /**
   * {@inheritdoc}
   */
  public function alterRoutes(RouteCollection $collection) {
    // Change access callback for the block content type pages and forms.
    $routeNames = [
      'entity.block_content_type.collection',
      'block_content.type_add',
      'entity.block_content_type.edit_form',
      'entity.block_content_type.delete_form',
    ];
    foreach ($routeNames as $name) {
      if ($route = $collection->get($name)) {
        $route->addRequirements([
          '_custom_access' => $this->AccessControlHandlerClassName . '::blockContentTypeAdministerAccess',
        ]);
        // Remove required "administer blocks" permission.
        // Did not grant access through route for following, use hook:
        // - "entity.block_content_type.edit_form".
        // - "entity.block_content_type.delete_form".
        $this->removePermissionRequirement($route);
      }
    }

    /* Change access callback for the block content collection page. */
    /* "entity.block_content.collection" route name does not work. */

    // Change access callback for the block content add page.
    if ($route = $collection->get('block_content.add_page')) {
      $route->addRequirements([
        '_custom_access' => $this->AccessControlHandlerClassName . '::blockContentAddPageAccess',
      ]);
      // Remove required "administer blocks" permission.
      $this->removePermissionRequirement($route);
    }

    // Change access callback for the block content add forms.
    if ($route = $collection->get('block_content.add_form')) {
      $route->addRequirements([
        '_custom_access' => $this->AccessControlHandlerClassName . '::blockContentAddFormAccess',
      ]);
      // Remove required "administer blocks" permission.
      $this->removePermissionRequirement($route);
    }

    // Change access callback for the block content edit forms.
    // "entity.block_content.edit_form" route name does not work.
    if ($route = $collection->get('entity.block_content.canonical')) {
      $route->addRequirements([
        '_custom_access' => $this->AccessControlHandlerClassName . '::blockContentEditFormAccess',
      ]);
      // Remove required "administer blocks" permission.
      // Did not grant access through route, use hook.
      $this->removePermissionRequirement($route);
    }

    // Change access callback for the block content delete forms.
    if ($route = $collection->get('entity.block_content.delete_form')) {
      $route->addRequirements([
        '_custom_access' => $this->AccessControlHandlerClassName . '::blockContentDeleteFormAccess',
      ]);
      // Remove required "administer blocks" permission.
      // Did not grant access through route, use hook.
      $this->removePermissionRequirement($route);
    }
  }

  /**
   * Remove required "administer blocks" permission from route.
   *
   * @param \Symfony\Component\Routing\Route $route
   *   The Route object.
   */
  private function removePermissionRequirement(Route $route) {
    if ($route->hasRequirement('_permission')) {
      $requirements = $route->getRequirements();
      unset($requirements['_permission']);
      $route->setRequirements($requirements);
    }
  }

}
