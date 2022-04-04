<?php

namespace Drupal\jazz_payroll_section_banner\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'JazzPayrollSectionBanner' block.
 *
 * @Block(
 *  id = "jazz_payroll_section_banner",
 *  admin_label = @Translation("Jazz payroll section banner"),
 * )
 */
class JazzPayrollSectionBanner extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['#attached']['library'][] = 'jazz_payroll_section_banner/jazz_pyroll_banner';

    $query = \Drupal::entityQuery('node')
      ->condition("type", "jazz_payrolls_banner_section");
    $nids = $query->execute();
    $nodes = \Drupal\node\Entity\Node::loadMultiple($nids);
    foreach ($nodes as $node) {
      $content[] = [
        'id' => $node->id(),
        'title' => $node->title->value,
        'link1' => $node->field_payroll_banner_link_1->value,
        'link2' => $node->field_payroll_banner_link_2->value,
        'image' => $node->field_payroll_banner_image->entity ? $node->field_payroll_banner_image->entity->url() : null,
    ];
    }

     $build['content'] = [
      '#theme' => 'jazz_payroll_section_banner',
      '#data' => [
          'content' => $content
      ],
  ];

    return $build;
  }

}
