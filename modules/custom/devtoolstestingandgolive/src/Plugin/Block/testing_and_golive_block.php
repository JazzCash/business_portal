<?php

namespace Drupal\devtoolstestingandgolive\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Developer tools testing and golive block' Block.
 *
 * @Block(
 *   id = "testingandgolive_block",
 *   admin_label = @Translation("Developer tools testing and golive block module"),
 *   category = @Translation("Developer tools testing and golive block module"),
 * )
 */
class testing_and_golive_block extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {

    $output = [];

    $nids = \Drupal::entityQuery('node')->condition('type', 'testing_and_go_live')->execute();
    $nodes =  \Drupal\node\Entity\Node::loadMultiple($nids);
    foreach ($nodes as $node) {


        $content[] = [
            'id' => $node->id(),
            'title' => $node->title->value,
            'body' => $node->body->value,
            // 'columna_izq' => $node->field_columna_izq->value,
            // 'columna_completa' => $node->field_columna_completa->value,
            //'image' => $node->field_setup_and_integration_img->entity ? $node->field_setup_and_integration_img->entity->url() : null,
            // 'landing_two_columns_image_mobile' => $node->field_landing_two_columns_img_m ?? null,
            // 'landing_two_columns_images_thumbnail' => $paras,
            // 'landing_two_columns_file' => $node->field_landing_two_columns_file->referencedEntities()[0] ?? null,
        ];
    }

    // s($content);
    // exit;

   // print_r($content);

    $output['content'] = [
        '#theme' => 'dev_tools_testing_and_golive',
        '#data' => [
            'content' => $content
        ],
        '#attached' =>
            array(
                'library' =>
                    array('devtoolstestingandgolive/global-styling')
            ),
    ];

    return $output;


  }

}