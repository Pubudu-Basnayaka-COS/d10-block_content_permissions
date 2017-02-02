<?php

namespace Drupal\block_content_permissions\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
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
    $routeNames = array(
      'entity.block_content_type.collection',
      'block_content.type_add',
      'entity.block_content_type.edit_form',
      'entity.block_content_type.delete_form',
    );
    foreach ($routeNames as $name) {
      if ($route = $collection->get($name)) {
        $route->addRequirements(array(
          '_custom_access' => $this->AccessControlHandlerClassName . '::blockContentTypeAdministerAccess',
        ));
      }
    }

    // Change access callback for the block content type pages and forms.
    $routeNames = array(
      'block_content.add_page',
      'block_content.add_form',
      'entity.block_content.canonical',
      'entity.block_content.delete_form',
    );
    foreach ($routeNames as $name) {
      if ($route = $collection->get($name)) {
        $route->addRequirements(array(
          '_custom_access' => $this->AccessControlHandlerClassName . '::blockContentAdministerAccess',
        ));
      }
    }
  }

}
