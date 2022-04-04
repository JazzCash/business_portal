<?php

namespace Drupal\userrequest\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'BankRequestBlock' block.
 *
 * @Block(
 *  id = "bank_request_block",
 *  admin_label = @Translation("Bank request block"),
 * )
 */
class BankRequestBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
     //   $activeQuery = \Drupal::entityQuery('user')
  //   ->condition('field_account_bank_status', 32)
  //   ->condition('status', true);
  // $activeUids = $activeQuery->execute();
  //   d_limit($activeUids,2);
  //   exit;

    //all active users
    $activeQuery = \Drupal::entityQuery('user')
    ->condition('field_account_bank_status', 32)
    ->condition('status', true);
    $activeUids = $activeQuery->execute();

    $blockQuery = \Drupal::entityQuery('user')
      ->condition('status', true)
      ->condition('field_account_bank_status', 56)
      ->condition('uid', '0', '<>');
    $blockUids = $blockQuery->execute();


    $holdQuery = \Drupal::entityQuery('user')
    ->condition('field_account_bank_status', 34)
    ->condition('status', true);
    $holdUids = $holdQuery->execute();

    $markedQuery = \Drupal::entityQuery('user')
    ->condition('field_account_bank_status', 35)
    ->condition('status', true);

    $markedUids = $markedQuery->execute();
    $build['#attached']['library'][] = 'userrequest/userrequest';
    $build['ticket_status'] = [
      '#theme' => 'bank_request_block',
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
