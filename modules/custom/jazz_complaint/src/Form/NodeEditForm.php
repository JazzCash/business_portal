<?php

namespace Drupal\jazz_complaint\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\node\NodeInterface;

/**
 * Class NodeEditForm.
 */
class NodeEditForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'node_edit_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $nid = \Drupal::routeMatch()->getParameter('node');
    $node = \Drupal::entityTypeManager()->getStorage('node')->load($nid);

    $title = $node->title->value;
    $company_name = $node->field_jcomplaint_company_name->value;
    $phone = $node->field_jcomplaint_phone->value;
    $message = $node->field_type_your_messages->value;

    $form['Title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Title'),
      '#default_value' => $title,
    ];
    $form['companyname'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Company Name'),
      '#default_value' => $company_name,
    ];
    $form['phone'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Phone Number'),
      '#default_value' => $phone,
    ];
    $form['nessage'] = array(
      '#title' => t('Message'),
      '#type' => 'textarea',
      '#rows' => 10,
      '#cols' => 60,
      '#resizable' => TRUE,
      '#default_value' => $message,
    );
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Save'),
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
    $title = $form_state->getValue('title');
    $company_name = $form_state->getValue('companyname');
    $phone = $form_state->getValue('phone');
    $nessage = $form_state->getValue('nessage');
    
    $node = \Drupal::routeMatch()->getParameter('node');
    
    $node->setTitle($title);
    $node->field_jcomplaint_company_name->setValue($company_name);
    $node->field_jcomplaint_phone->setValue($phone);
    $node->field_type_your_messages->setValue($nessage);
    $node->save();
    \Drupal::messenger()->addMessage("Node updated successfully");
  }

}
