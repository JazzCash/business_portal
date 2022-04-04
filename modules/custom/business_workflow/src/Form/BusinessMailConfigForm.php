<?php

namespace Drupal\business_workflow\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class BusinessMailConfigForm.
 */
class BusinessMailConfigForm extends ConfigFormBase
{

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames()
  {
    return [
      'business_workflow.businessmailconfig',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId()
  {
    return 'business_mail_config_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state)
  {
    $config = $this->config('business_workflow.businessmailconfig');

    $form['message'] = array(
      '#type' => 'text_format',
      '#title' => t('Message'),
      '#default_value' => $config->get('message'),
      '#required' => true,
    );

    $form['emails'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Emails'),
      '#description' => $this->t('Enter email seperated by new line'),
      '#default_value' => $config->get('emails'),
    ];

    $days = array_map(function ($e) {
      return ($e == 0 || $e > 1 ? $e . ' days' : $e . ' day');
    }, range(1, 31));
    $form['days'] = [
      '#type' => 'select',
      '#title' => $this->t('Days'),
      '#description' => $this->t('Select days after which user will be notified'),
      '#options' => $days,
      '#default_value' => $config->get('days'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    parent::submitForm($form, $form_state);

    $mailsString = $form_state->getValue('emails');
    $message = $form_state->getValue('message')['value'];
    $mails = explode("\n", $mailsString);

    $mails = array_reduce($mails, function ($carry, $item) {
      $item = trim($item);
      if (filter_var($item, FILTER_VALIDATE_EMAIL)) {
        $carry[] = $item;
      }
      return $carry;
    }, []);
    $mails = array_unique($mails);
    $this->config('business_workflow.businessmailconfig')
      ->set('emails', join("\n", $mails))
      ->set('message', $message)
      ->set('days', $form_state->getValue('days'))
      ->save();
  }
}
