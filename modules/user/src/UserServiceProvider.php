<?php

namespace Drupal\user;

use Drupal\Core\DependencyInjection\ContainerBuilder;
use Drupal\Core\DependencyInjection\ServiceModifierInterface;

class UserServiceProvider implements ServiceModifierInterface {

  /**
   * {@inheritdoc}
   */
  public function alter(ContainerBuilder $container) {
    if ($container->hasParameter('user.tempstore.expire')) {
      @trigger_error('The container parameter "user.tempstore.expire" is deprecated. Use "tempstore.expire" instead. See https://www.drupal.org/node/2935639.', E_USER_DEPRECATED);
      $container->setParameter('tempstore.expire', $container->getParameter('user.tempstore.expire'));
    }
  }

}
