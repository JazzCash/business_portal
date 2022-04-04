<?php

namespace Drupal\simple_redirect\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Render\Element\PathElement;

/**
 * Class SimpleRedirectForm.
 *
 * @package Drupal\simple_redirect\Form
 */
class SimpleRedirectForm extends EntityForm {

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    $simple_redirect = $this->entity;
    $form['label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Title'),
      '#maxlength' => 255,
      '#default_value' => $simple_redirect->label(),
      '#description' => $this->t("Title of the redirect action."),
      '#required' => TRUE,
    ];

    $form['id'] = [
      '#type' => 'machine_name',
      '#default_value' => $simple_redirect->id(),
      '#machine_name' => [
        'exists' => '\Drupal\simple_redirect\Entity\SimpleRedirect::load',
      ],
      '#disabled' => !$simple_redirect->isNew(),
    ];

    /* You will need additional form elements for your custom properties. */
    $form['from'] = array(
      '#type' => 'path',
      '#title' => $this->t('From'),
      '#default_value' => $simple_redirect->getFrom(),
      '#required' => TRUE,
      '#description' => $this->t('From url - example "/node/1"'),
      '#convert_path' => PathElement::CONVERT_NONE,
    );
    $form['to'] = array(
      '#type' => 'path',
      '#title' => $this->t('To'),
      '#default_value' => $simple_redirect->getTo(),
      '#required' => TRUE,
      '#description' => $this->t('To url - example "/node/2"'),
      '#convert_path' => PathElement::CONVERT_NONE,
    );

    return $form;
  }

  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
    $fromUrl = rtrim($form_state->getValue('from'));
    $toUrl = rtrim($form_state->getValue('to'));

    if ($fromUrl == $toUrl) {
      $form_state->setErrorByName('to', $this->t('You are redirecting to the same page!'));
    }
    if ($fromUrl == '<front>') {
      $form_state->setErrorByName('from', $this->t('Redirection not allowed from the front page.'));
    }
    if (strpos($fromUrl, '#') !== FALSE) {
      $form_state->setErrorByName('from', $this->t('The anchor fragments are not allowed.'));
    }
    if (substr($fromUrl, 0, 1) != '/' && \Drupal::pathValidator()->isValid($fromUrl)) {
      $form_state->setErrorByName('from', $this->t('The path should start with slash (/).'));
    }
    $simpleRedirects = \Drupal::entityTypeManager()
      ->getStorage('simple_redirect')
      ->loadByProperties(['from' => $fromUrl]);
    if (count($simpleRedirects) > 0) {
      $simpleRedirect = array_shift($simpleRedirects);
      if ($this->entity->isNew() || $simpleRedirect->id() != $this->entity->id()) {
        $form_state->setErrorByName('from', $this->t('From path %from is already being configured. <a href="@edit-page">Click here to edit</a>',
          [
            '%from' => $fromUrl,
            '@edit-page' => $simpleRedirect->toUrl('edit-form')->toString()
          ]));
      }
    }
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $simple_redirect = $this->entity;
    $status = $simple_redirect->save();

    switch ($status) {
      case SAVED_NEW:
        \Drupal::messenger()->addStatus($this->t('Created the %label Simple Redirect.', [
          '%label' => $simple_redirect->label(),
        ]));
        break;

      default:
        \Drupal::messenger()->addStatus($this->t('Saved the %label Simple Redirect.', [
          '%label' => $simple_redirect->label(),
        ]));
    }
    $form_state->setRedirectUrl($simple_redirect->toUrl('collection'));
  }

}
