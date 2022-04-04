<?php

namespace Drupal\jazz_help_article\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class DefaultController.
 */
class DefaultController extends ControllerBase
{

  /**
   * Article.
   *
   * @return string
   *   Return Hello string.
   */
  public function article()
  {

    $searchQuery = \Drupal::request()->query->get('s');


    $build = [];

    $nodeLimit = 4;
    $vid = 'help_articles';
    $terms = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadTree($vid);
    $terms_data = [];



    foreach ($terms as $_term) {
      $term = \Drupal\taxonomy\Entity\Term::load($_term->tid);
      $term_data = array(
        'id' => $_term->tid,
        'name' => $_term->name,
        'icon' => $term->field_help_article_icon->entity->url(),
        'nodes' => [],
      );

      $query = \Drupal::entityQuery('node')
        ->condition('status', 1)
        ->condition('type', "help_articles")
        ->condition('field_help_article_type', $_term->tid);

      $nids = $query->execute();
      $nodes = \Drupal\node\Entity\Node::loadMultiple($nids);
      $count = 0;
      foreach ($nodes as $node) {
        $nodeTitle = $node->getTitle();
        $in_search = $searchQuery ? (strpos($nodeTitle, $searchQuery) !== false) : true;
        if ($in_search) {
          $term_data["nodes"][$node->id()] = [
            'id' => $node->id(),
            "title" => $nodeTitle,
          ];
        }
        $count++;
        if (!$searchQuery && $count >= $nodeLimit) {
          break;
        }
      }
      $terms_data[] = $term_data;
    }


    $build['output'] = [
      '#theme' => 'jazz_help_article_block',
      '#data' => $terms_data,
      '#searchQuery' => $searchQuery
    ];
    // $build['jazz_help_article_block']['#markup'] = 'Implement JazzHelpArticleBlock.';

    return $build;
  }
}
