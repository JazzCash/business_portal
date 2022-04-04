<?php

namespace Drupal\jazzcash_community\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class AskQuestionForm.
 */
class AskQuestionForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'ask_question_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['#theme'] = 'ask_question_form';

    $form['title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Type here to ask a question'),
      '#title_display' => 'invisible',
      '#maxlength' => 64,
      '#size' => 64,
      '#weight' => '0',
      '#attributes' => [
        'placeholder' => $this->t('Type here to ask a question'),
      ]
    ];
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
    // Display result.
    foreach ($form_state->getValues() as $key => $value) {
      \Drupal::messenger()->addMessage($key . ': ' . ($key === 'text_format'?$value['value']:$value));
    }
  }

}
