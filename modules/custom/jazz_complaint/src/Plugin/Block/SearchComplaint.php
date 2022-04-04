<?php

namespace Drupal\jazz_complaint\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'SearchComplaint' block.
 *
 * @Block(
 *  id = "search_complaint",
 *  admin_label = @Translation("Jazz Complaint search"),
 * )
 */
class SearchComplaint extends BlockBase
{

  /**
   * {@inheritdoc}
   */
  public function build()
  {
    $build = [];
    $form = \Drupal::formBuilder()->getForm('Drupal\jazz_complaint\Form\SearchComplaintForm');
    return $form;
  }
}
