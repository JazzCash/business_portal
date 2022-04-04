<?php

namespace Drupal\forumsadmin\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\node\NodeInterface;

/**
 * Class ForumEditForm.
 */
class ForumEditForm extends FormBase
{

  /**
   * {@inheritdoc}
   */
  public function getFormId()
  {
    return 'forum_edit_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state)
  {
    $node = \Drupal::routeMatch()->getParameter('node');

    $title = $node->getTitle();
    $body = $node->body->getValue();
    $taxonomy_forums = $node->taxonomy_forums->getValue();

    $vid = 'forums';
    $terms = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadTree($vid);
    foreach ($terms as $term) {
      $term_data[] = array(
        'id' => $term->tid,
        'name' => $term->name
      );
    }

    $options = ['' => '-Select-'];
    foreach ($terms as $term) {
      $options[$term->tid] = $term->name;
    }
    
    $form['title'] = [
      '#title' => $this->t("Title"),
      '#type' => 'textfield',
      '#default_value' => $title,
      '#required' => true,
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


    $form['taxonomy_forums'] = [
      '#type' => 'select',
      '#required' => true,
      '#options' => $options,
      '#default_value' => isset($taxonomy_forums[0]['target_id']) ? $taxonomy_forums[0]['target_id'] : '',
    ];
    
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Save'),
      '#button_type' => 'primary',
      '#required' => true,
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
    $title = $form_state->getValue('title');
    $body = $form_state->getValue('body');
    if(isset($body['value']))
    {
      $body = $body['value'];
    }else{
      $body = '';
    }
    $taxonomy_forums = $form_state->getValue('taxonomy_forums');
    
    $node = \Drupal::routeMatch()->getParameter('node');
    
    $node->setTitle($title);
    $node->body->setValue($body);
    $node->taxonomy_forums->setValue($taxonomy_forums);
    $node->save();
    \Drupal::messenger()->addMessage("Node updated successfully");
  }
}
