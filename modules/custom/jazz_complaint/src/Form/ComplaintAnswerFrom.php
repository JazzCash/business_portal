<?php

namespace Drupal\jazz_complaint\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class ComplaintAnswerFrom.
 */
class ComplaintAnswerFrom extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'complaint_answer_from';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $nid = \Drupal::routeMatch()->getParameter('node');
    $node = \Drupal::entityTypeManager()->getStorage('node')->load($nid);

    $answer = $node->field_complaint_answer->value;

    $form['answer'] = array(
      '#title' => t('Answer'),
      '#type' => 'textarea',
      '#rows' => 10,
      '#cols' => 60,
      '#resizable' => TRUE,
      '#default_value' => $answer,
    );
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    foreach ($form_state->getValues() as $key => $value) {
      // @TODO: Validate fields.
    }
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $answer = $form_state->getValue('answer');
    
    $nid = \Drupal::routeMatch()->getParameter('node');

    $node = \Drupal::entityTypeManager()->getStorage('node')->load($nid);
    
    $node->field_complaint_answer->setValue($answer);
    $node->save();
    \Drupal::messenger()->addMessage("Node updated successfully");
  }

}
