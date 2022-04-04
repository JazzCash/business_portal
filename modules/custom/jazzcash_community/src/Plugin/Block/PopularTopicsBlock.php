<?php

namespace Drupal\jazzcash_community\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'PopularTopicsBlock' block.
 *
 * @Block(
 *  id = "popular_topics_block",
 *  admin_label = @Translation("Popular topics block"),
 * )
 */
class PopularTopicsBlock extends BlockBase
{

  /**
   * {@inheritdoc}
   */
  public function build()
  {
    $vid = 'forums';
    $_terms = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadTree($vid);
    $terms_ids = array_map(function ($e) {
      return $e->tid;
    }, $_terms);
    $terms = \Drupal\taxonomy\Entity\Term::loadMultiple($terms_ids);

    $terms_data = [];
    foreach ($terms as $tid => $term) {
      $terms_data[] = [
        'tid' => $tid,
        'name' => $term->getName(),
        'icon' => $term->field_jazzchas_forum_icon->entity ? $term->field_jazzchas_forum_icon->entity->url() : null
      ];
    }

    $build = [];
    $build['#theme'] = 'popular_topics_block';
    $build['#attached']['library'][] = 'jazzcash_community/jazzcash_community';
    $build['#data'] = $terms_data;
    return $build;
  }
}
