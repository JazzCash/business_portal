<?php

namespace Drupal\jazz_guides_blog\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class BlogsFilterForm.
 */
class BlogsFilterForm extends FormBase
{

  /**
   * {@inheritdoc}
   */
  public function getFormId()
  {
    return 'blogs_filter_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state)
  {
    $form['#attached']['library'][] = 'jazz_guides_blog/style';
    $nids = \Drupal::entityQuery('node')
    // ->condition('field_blog_type', '27')
    ->condition('type', 'blogs')
    ->execute();
    $nodes =  \Drupal\node\Entity\Node::loadMultiple($nids);

    $options = ['' => "Select"];
    $optionsAll = [
      "Guides" => [
        '' => 'select'
      ],
      "Popular Topics" => [
        '' => 'select'
      ]
    ];
    foreach ($nodes as $node) {
      $title = $node->getTitle();
      $blog_type = $node->field_blog_type->referencedEntities()[0]->getName();
      $optionsAll[$blog_type][$title] = $title;
      $options[$title] = $title;
    }

    $form['guides'] = [
      '#type' => 'select',
      '#title' => "Guides filter",
      '#options' => $optionsAll['Guides'],
      '#attributes' => [
        'id' => 'guides-filter',
        'class' => ['blogs-change-target-value'],
        'data-target' => "[name='title-guides']",
      ]
    ];

    $form['popular'] = [
      '#type' => 'select',
      '#title' => "Popular filter",
      '#options' => $optionsAll['Popular Topics'],
      '#attributes' => [
        'id' => 'popular-filter',
        'data-target' => "[name='title-popular']",
        'class' => ['blogs-change-target-value']
      ]
    ];


    $form['morearticles'] = [
      '#type' => 'select',
      '#title' => "More filter",
      '#options' => $options,
      '#attributes' => [
        'id' => 'morearticles-filter',
        'data-target' => "[name='title-morearticles']",
        'class' => ['blogs-change-target-value']
      ]

    ];

    $form['submit'] = [
      '#markup' => "<a id='blogs-filter-submit' class='button btn-info btn'>Submit</a>"
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
    // Display result.
    foreach ($form_state->getValues() as $key => $value) {
      \Drupal::messenger()->addMessage($key . ': ' . ($key === 'text_format' ? $value['value'] : $value));
    }
  }
}
