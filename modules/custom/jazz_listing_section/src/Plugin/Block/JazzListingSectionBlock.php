<?php

namespace Drupal\jazz_listing_section\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'JazzListingSectionBlock' block.
 *
 * @Block(
 *  id = "jazz_listing_section_block",
 *  admin_label = @Translation("Jazz listing section block"),
 * )
 */
class JazzListingSectionBlock extends BlockBase
{

  /**
   * {@inheritdoc}
   */
  public function build()
  {


    $build = [];
    $build['#attached']['library'][] = 'jazz_listing_section/jazz_listing';

    // $build['#theme'] = 'jazz_listing_section_block';
    // $build['jazz_listing_section_block']['#markup'] = 'Implement JazzListingSectionBlock.';

    $current_path = \Drupal::service('path.current')->getPath();
    $current_alias = \Drupal::service('path.alias_manager')->getAliasByPath($current_path);
    $query = \Drupal::entityQuery('node')
      ->condition("type", "jazz_pricing_list");

    $nids = $query->execute();
    $nodes = \Drupal\node\Entity\Node::loadMultiple($nids);
    $listing = [];
    foreach ($nodes as $node) {
      $is_allowed = false;
      $allowed_pages_terms = $node->field_pricing_list_allowed_page->referencedEntities();
      foreach ($allowed_pages_terms as $term) {

        $allowed_page = $term->label();
        $alias_check = \Drupal::service('path.matcher')->matchPath($current_alias, $allowed_page);
        $path_check = \Drupal::service('path.matcher')->matchPath($current_path, $allowed_page);
        if ($alias_check || $path_check) {
          $is_allowed = true;
          break;
        }
      }
      if ($is_allowed) {
        // $listing[$node->id()] = [
        //   '#markup' => "<div class='price-listing-item'><h3>" . $node->getTitle() . "</h3>" . $node->body->value . '</div>'
        // ];

        $context = [];
        if (\Drupal::currentUser()->hasPermission('access contextual links')) {
          $context['context']['#type'] = 'contextual_links_placeholder';
          $context['context']['#id'] = "node:node=".$node->id();
        }
        $build[] = [
          '#theme' => 'jazz_listing_section',
          '#data' => [
            'node' => $node,
            'context' => $context
          ],
        ];
      }
    }

    $build['listing'] = $listing;

    return $build;
  }
}
