<?php

namespace Drupal\jazzcash_community\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class CommunityController.
 */
class CommunityController extends ControllerBase {

  /**
   * Community.
   *
   * @return string
   *   Return Hello string.
   */
  public function community() {


    return [
      '#type' => 'markup',
      '#markup' => $this->t('Implement method: community')
    ];
  }

}
