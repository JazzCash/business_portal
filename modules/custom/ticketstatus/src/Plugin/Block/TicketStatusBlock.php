<?php

namespace Drupal\ticketstatus\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'TicketStatusBlock' block.
 *
 * @Block(
 *  id = "ticket_status_block",
 *  admin_label = @Translation("Ticket status block"),
 * )
 */
class TicketStatusBlock extends BlockBase
{

  /**
   * {@inheritdoc}
   */
  public function build()
  {

    $nodes = \Drupal::entityTypeManager()->getStorage('node')
      ->loadByProperties(['type' => 'jazz_complaint']);

    $ticketsDataCount = [
      'solved' => 0,
      'pending' => 0,
      'inprogress' => 0,
      'onhold' => 0
    ];
    foreach ($nodes as $node) {

      $answer = $node->field_complaint_answer->getValue();

      if ($node->field_onhold->value == "1") {
        $ticketsDataCount['onhold'] += 1;
        continue;
      }

      if (isset($answer[0]['value'])) {
        $ticketsDataCount['solved'] += 1;
      } else {
        $ticketsDataCount['pending'] += 1;
        $ticketsDataCount['inprogress'] += 1;
      }
    }
    $build = [];
    $build['#attached']['library'][] = 'ticketstatus/ticketstatus';
    $build['ticket_status'] = [
      '#theme' => 'ticket_status_block',
      '#data' => $ticketsDataCount
    ];

    return $build;
  }
}
