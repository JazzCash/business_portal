<?php

namespace Drupal\jazz_manage_blog\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

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
    $body = $node->body->value;
    $shortdescription = $node->field_short_description->value;

    $form['Title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Aliquip Voco'),
      '#default_value' => $title,
    ];
    $form['short'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Short Description'),
      '#maxlength' => 64,
      '#size' => 64,
      '#weight' => '0',
      '#default_value' => $shortdescription,
    ];
    $form['body'] = array(
      '#settings' => array(
        // 'rows' => 20,
      ),
      '#type' => 'text_format',
      '#title' => t('My field'),
      '#rows' => 20,
      '#default_value' => isset($body[0]['value']) ? $body[0]['value'] : NULL,
      '#format' => $body[0]['format'],
      '#required' => true,
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
    $body = $form_state->getValue('body');
    if(isset($body['value']))
    {
      $body = $body['value'];
    }else{
      $body = '';
    }
    $short = $form_state->getValue('short');
    
    $node = \Drupal::routeMatch()->getParameter('node');
    
    $node->setTitle($title);
    $node->body->setValue($body);
    $node->field_short_description->setValue($short);
    $node->save();
    \Drupal::messenger()->addMessage("Node updated successfully");
  }

}
