<?php

namespace Drupal\block_content_permissions;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Block\BlockManagerInterface;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Controller for the block content permissions.
 */
class AccessControlHandler implements ContainerInjectionInterface {

  /**
   * The condition plugin manager.
   *
   * @var \Drupal\Core\Block\BlockManagerInterface
   */
  protected $manager;

  /**
   * The current user service.
   *
   * @var \Drupal\Core\Session\AccountInterface
   */
  protected $currentUser;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('plugin.manager.block')
    );

  }

  /**
   * Constructs the block content access control handler instance.
   *
   * @param \Drupal\Core\Block\BlockManagerInterface $manager
   *   Plugin manager.
   */
  public function __construct(BlockManagerInterface $manager) {
    $this->manager = $manager;
  }

  /**
   * Returns the service container.
   *
   * This method is marked private to prevent sub-classes from retrieving
   * services from the container through it. Instead,
   * \Drupal\Core\DependencyInjection\ContainerInjectionInterface should be used
   * for injecting services.
   *
   * @return \Symfony\Component\DependencyInjection\ContainerInterface
   *   The service container.
   */
  private function container() {
    return \Drupal::getContainer();
  }

  /**
   * Returns the current user.
   *
   * @return \Drupal\Core\Session\AccountInterface
   *   The current user.
   */
  protected function currentUser() {
    if (!$this->currentUser) {
      $this->currentUser = $this->container()->get('current_user');
    }
    return $this->currentUser;
  }

  /**
   * Access check for the block content type administer pages and forms.
   *
   * @return Drupal\Core\Access\AccessResult
   *    An access result
   */
  public function blockContentTypeAdministerAccess() {
    $account = $this->currentUser();
    return AccessResult::allowedIfHasPermission($account, 'administer block content types');
  }

  /**
   * Access check for the block content administer forms.
   *
   * @return Drupal\Core\Access\AccessResult
   *    An access result
   */
  public function blockContentAdministerAccess() {
    $account = $this->currentUser();
    return AccessResult::allowedIfHasPermission($account, 'administer block content');
  }

}
