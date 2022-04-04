<?php

namespace Drupal\register_iap\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'FooterBlock' block.
 *
 * @Block(
 *  id = "footer_block",
 *  admin_label = @Translation("Footer register integrate payment block"),
 * )
 */
class FooterBlock extends BlockBase
{

  /**
   * {@inheritdoc}
   */
  public function build()
  {
    $build = [];
    $build['#attached']['library'][] = 'register_iap/jazz_footer_left';
    $query = \Drupal::entityQuery('node')
      ->condition("type", "jazz_footer_left_section");
    $nids = $query->execute();
    $nodes = \Drupal\node\Entity\Node::loadMultiple($nids);
    foreach ($nodes as $node) {
      $links_paras = $node->field_jazz_footer_left_link->referencedEntities();
      $social_paras = $node->field_jazz_footer_left_social->referencedEntities();
      $links_data = [];
      $social_data = [];
      foreach($links_paras as $para)
      {
        $links_data[] = [
          'href' => $para->field_link->value,
          'label' => $para->field_link_t->value,  
        ];
      }

      foreach($social_paras as $para)
      {
        $social_data[] = [
          'href' => $para->field_social_icon_link->value,
          'icon' => $para->field_social_icon->entity?$para->field_social_icon->entity->url():null,  
        ];
      }
      $content[] = [
        'id' => $node->id(),
        'title' => $node->title->value,
        'body' => $node->field_jazz_footer_left_body->value,
        'image' => $node->field_jazz_footer_left_image->entity ? $node->field_jazz_footer_left_image->entity->url() : null,
        'social' => $social_data,
        'links' => $links_data
      ];
    }


    $build['content'] = [
      '#theme' => 'footer_block',
      '#data' => $content
    ];

    return $build;
  }
}
