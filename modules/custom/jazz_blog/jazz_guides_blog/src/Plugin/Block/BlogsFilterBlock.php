<?php

namespace Drupal\jazz_guides_blog\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'BlogsFilterBlock' block.
 *
 * @Block(
 *  id = "blogs_filter_block",
 *  admin_label = @Translation("Blogs filter block"),
 * )
 */
class BlogsFilterBlock extends BlockBase
{

  /**
   * {@inheritdoc}
   */
  public function build()
  {
    $form = \Drupal::formBuilder()->getForm('Drupal\jazz_guides_blog\Form\BlogsFilterForm');
    return $form;
  }
}
