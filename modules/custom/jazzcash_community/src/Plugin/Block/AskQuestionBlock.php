<?php

namespace Drupal\jazzcash_community\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'AskQuestionBlock' block.
 *
 * @Block(
 *  id = "ask_question_block",
 *  admin_label = @Translation("Ask question block"),
 * )
 */
class AskQuestionBlock extends BlockBase
{

  /**
   * {@inheritdoc}
   */
  public function build()
  {

    $values = array('type' => 'forum');

    $node = \Drupal::entityTypeManager()
      ->getStorage('node')
      ->create($values);

    $formObj = \Drupal::entityTypeManager()
      ->getFormObject('node', 'default')
      ->setEntity($node);
    $form = \Drupal::formBuilder()->getForm($formObj);

    //change title (title display and placeholder)      
    $form['title']['widget'][0]['value']['#title_display'] = "invisible";
    $form['title']['widget'][0]['value']['#attributes']['placeholder'] = $this->t('Type here to ask a question');
    //hide access
    $form['actions']['preview']['#access'] = false;

    $form['actions']['submit']['#value'] = $this->t("Submit");

    //set theme
    array_unshift($form['#theme'], 'ask_question_form2');
    return $form;
  }
}
