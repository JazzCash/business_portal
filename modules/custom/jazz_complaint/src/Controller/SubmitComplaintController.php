<?php

namespace Drupal\jazz_complaint\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class SubmitComplaintController.
 */
class SubmitComplaintController extends ControllerBase
{

  /**
   * Submit_complaint.
   *
   * @return string
   *   Return Hello string.
   */
  public function submit_complaint()
  {
    $user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());
    $values = array('type' => 'jazz_complaint');

    $node = \Drupal::entityTypeManager()
      ->getStorage('node')
      ->create($values);

    $formObj = \Drupal::entityTypeManager()
      ->getFormObject('node', 'default')
      ->setEntity($node);



    $form  = \Drupal::formBuilder()->getForm($formObj);
   

    
    if($user->field_full_name->value)
    {
      // $form['title']['#access'] = false;
      $form['title']['widget'][0]['value']['#value'] = $user->field_full_name->value;
    }
   


    //add template 
    array_unshift($form['#theme'], "submit_complaint_form");
    $form['actions']['submit']['#submit'][] = "nodeSubmitRedirectToComplaint";

    return $form;
  }



  /**
   * View_complaint.
   *
   * @return string
   *   Return Hello string.
   */
  public function view_complaint($node)
  {
    $ticket = $node->field_complaint_ticket->value;
    $answer = $node->field_complaint_answer->getValue();

    return [
      '#theme' => 'jazz_complaint_submit',
      '#data' => [
        'ticket' => $ticket,
        'answer' => $answer
      ]
    ];
  }
}



