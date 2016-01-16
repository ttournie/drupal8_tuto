<?php
/**
 * @file
 * Contains \Drupal\hello_world\Access\HelloWorldAccessCheck.
 */

namespace Drupal\hello_world\Access;

use Drupal\Core\Routing\Access\AccessInterface;
use Drupal\Core\Session\AccountInterface;
use Symfony\Component\Routing\Route;
use Symfony\Component\HttpFoundation\Request;
use Drupal\Core\Access\AccessResult;

class HelloWorldAccessCheck implements AccessInterface {

  // Deny access for non super user.
  public function access(AccountInterface $account) {
    if (!$account->id() == 1) {
      return AccessResult::forbidden();
    }
    return AccessResult::allowed();
  }
}
