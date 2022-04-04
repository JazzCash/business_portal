<?php

namespace Drupal\jazz_manage_account_status\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

/**
 * Class StatusUpdateForm.
 */
class StatusUpdateForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'status_update_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    // $uid = \Drupal::routeMatch()->getParameter('user');
    $tid = \Drupal::routeMatch()->getParameter('term');
    $term = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->load($tid);

    $name = $term->label();
    // $user = \Drupal\user\Entity\User::load($uid); 
  //  if($tid == '32')
  //  {
  //   $user->set('field_status', '32');
  //   $user->set("status", 1);
  //   $user->save();
  //   //  exit;
  //  }

  $user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());
  $uid = $user->id();
  $uname = $user->getUsername();
    

     $form['id'] = [
      '#title' => $this->t("ID"),
      '#type' => 'textfield',
      '#default_value' => $uid,
      '#required' => true,
      '#attributes' => ['disabled' => 'disabled']
    ];

    $form['name'] = [
      '#title' => $this->t("Id"),
      '#type' => 'textfield',
      '#default_value' => $uname,
      '#required' => true,
      '#attributes' => ['disabled' => 'disabled']
    ];

    $form['term'] = [
      '#title' => $this->t("Status"),
      '#type' => 'textfield',
      '#default_value' => $name,
      '#required' => true,
      '#attributes' => ['disabled' => 'disabled']
    ];
    

     $form['message'] = array(
      '#title' => t('Message'),
      '#type' => 'textarea',
      '#rows' => 10,
      '#cols' => 60,
      '#resizable' => TRUE,
      '#required' => true,
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
    $uid = \Drupal::routeMatch()->getParameter('user');
    $user = \Drupal\user\Entity\User::load($uid); 
    $message = $form_state->getValue('message');
    $user->set('field_account_status_message', $message);
    $tid = \Drupal::routeMatch()->getParameter('term');
    $user->set('field_account_status', $tid);
    
    $user->save();
    \Drupal::messenger()->addMessage("Status updated successfully");
    $url = Url::fromUserInput('/admin/manage-account-status');
    $form_state->setRedirectUrl($url);
  }

}
