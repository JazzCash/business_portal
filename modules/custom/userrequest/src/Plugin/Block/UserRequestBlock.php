<?php

namespace Drupal\userrequest\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'UserRequestBlock' block.
 *
 * @Block(
 *  id = "user_request_block",
 *  admin_label = @Translation("User request block"),
 * )
 */
class UserRequestBlock extends BlockBase
{

  /**
   * {@inheritdoc}
   */
  public function build()
  {
  //   $activeQuery = \Drupal::entityQuery('user')
  //   ->condition('field_status', 32)
  //   ->condition('status', true);
  // $activeUids = $activeQuery->execute();
  //   d_limit($activeUids,2);
  //   exit;

    //all active users
    $activeQuery = \Drupal::entityQuery('user')
    ->condition('field_status', 32)
    ->condition('status', true);
    $activeUids = $activeQuery->execute();

    $blockQuery = \Drupal::entityQuery('user')
      ->condition('status', true)
      ->condition('field_status', 56)
      ->condition('uid', '0', '<>');
    $blockUids = $blockQuery->execute();


    $holdQuery = \Drupal::entityQuery('user')
    ->condition('field_status', 34)
    ->condition('status', true);
    $holdUids = $holdQuery->execute();

    $markedQuery = \Drupal::entityQuery('user')
    ->condition('field_status', 35)
    ->condition('status', true);

    $markedUids = $markedQuery->execute();
    $build['#attached']['library'][] = 'userrequest/userrequest';
    $build['ticket_status'] = [
      '#theme' => 'user_request_block',
      '#data' => [
        'active' => $activeUids,
        'block' => $blockUids,
        'hold' => $holdUids,
        'marked' => $markedUids
      ]
    ];

    return $build;
  }
}
