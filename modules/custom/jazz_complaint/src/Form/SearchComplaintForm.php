<?php

namespace Drupal\jazz_complaint\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class SearchComplaintForm.
 */
class SearchComplaintForm extends FormBase
{

  /**
   * {@inheritdoc}
   */
  public function getFormId()
  {
    return 'search_complaint_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state)
  {
    $form['#theme'] = "search_complaint_form";

    $form['search'] = [
      '#type' => 'textfield',
      '#title' => $this->t('search'),
      '#maxlength' => 64,
      '#size' => 64,
      '#weight' => '0',
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
  public function validateForm(array &$form, FormStateInterface $form_state)
  {
    foreach ($form_state->getValues() as $key => $value) {
      // @TODO: Validate fields.
    }
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    $search = $form_state->getValue("search");
    $query = \Drupal::entityQuery('node')
      ->condition('field_complaint_ticket', $search);
    $nids = $query->execute();
    if(count($nids))
    {
      $nid = reset($nids);
      $form_state->setRedirect('jazz_complaint.submit_complaint_controller_view_complaint', ['node'=>$nid]);
    }else{
      $form_state->setRedirect('jazz_complaint.submit_complaint_controller_submit_complaint');
      \Drupal::messenger()->addMessage("Unable to find your complaint #$search", 'error');
    }
  }
}
