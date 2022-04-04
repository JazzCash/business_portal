<?php

namespace Drupal\business_workflow\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class RegsiterController.
 */
class RegsiterController extends ControllerBase
{

  /**
   * Main.
   *
   * @return string
   *   Return Hello string.
   */
  public function main()
  {
    $entity = \Drupal::entityTypeManager()->getStorage('user')->create(array());
    $formObject = \Drupal::entityTypeManager()
      ->getFormObject('user', 'register')
      ->setEntity($entity);
    $form = \Drupal::formBuilder()->getForm($formObject);
    $form['#theme'] = 'custom_register_form';
    $form['#attached']['library'][] = 'business_workflow/register-steps';
    
    //get icons
    $paragraph_type = \Drupal\paragraphs\Entity\ParagraphsType::load("online_payment_gateway");
    $icon_url = $paragraph_type->getIconUrl();
    $form['field_online_payment_gateway']['#icon'] = $icon_url;

    $paragraph_type = \Drupal\paragraphs\Entity\ParagraphsType::load("corporate_collections");
    $icon_url = $paragraph_type->getIconUrl();
    $form['field_corporate_collections']['#icon'] = $icon_url;

    // $this->step2Alter($form);
    $this->step3Alter($form);
    // $this->step4Alter($form);
    
    
    
    return $form;


    // $form['#attributes']['class'][] = 'custom_register';
    // $groups_names = array_keys($form['#fieldgroups']);
    // foreach ($groups_names as $key => $name) {
    //   if ($form['#fieldgroups'][$name]->parent_name === '') {
    //     $form[$name]['#attached'] = [];
    //     $form[$name]['#attributes']['class'][] = 'register-step';
    //     if ($key == 0) {
    //       $form[$name]['#attributes']['class'][] = 'active';
    //     }
    //     // d_limit($form[$name]);
    //   }
    // }

    // //alter based on steps
    // $this->step2Alter($form);
    // $this->step3Alter($form);
    // $this->step4Alter($form);


    return $form;
  }

  public function step2Alter(&$form)
  {
    foreach ($form['#fieldgroups']['group_products_to_make_your_life']->children as $cid) {
      //by reference
      $child = $form[$cid];
      if (isset($child['widget'][0]['#paragraph_type'])) {
        $paragraph_type = \Drupal\paragraphs\Entity\ParagraphsType::load($child['widget'][0]['#paragraph_type']);
        $icon_url = $paragraph_type->getIconUrl();

        // $form[$cid]['widget']['#prefix'] .= "<h1>Hello</h1><pre>";
        // $form[$cid]['widget']['#suffix'] = "<h1>Bye</h1></pre>".$form[$cid]['widget']['#suffix'];
        // d_limit($form[$cid]['widget']);
        //prefix
        // $prefix = "<div class='product-selection'><img src='" . $icon_url . "' /><a>Select this</a></div></div><div class='card p-1 product-form'>";
        $prefix = "<div class='product-wrapper'>
            <div class='product-selection'>
              <img src='" . $icon_url . "' /><a class='select-product'>Select this</a>
            </div>
        <div class='p-1 product-form'>
        ";
        $form[$cid]['widget']['#prefix'] .= $prefix;

        // //suffix
        $suffix = "</div></div>" . $form[$cid]['widget']['#suffix'];
        $form[$cid]['widget']['#suffix'] = $suffix;
      }
    }
  }

  public function step3Alter(&$form)
  {
    foreach ($form['field_company_type']['widget']['#options'] as $tid => $markup) {
      $term = \Drupal\taxonomy\Entity\Term::load($tid);
      if (!$term) {
        unset($form['field_company_type']['widget'][$tid]);
        continue;
      }
      $title = $term->getName();
      $description = $term->getDescription();
      $m = "<div><i class='type-of-company-icon'></i><h3>$title</h3><p>$description</p></div>";
      $form['field_company_type']['widget']['#prefix'] = "<div class='company-type-wrapper'>";
      $form['field_company_type']['widget']['#suffix'] = "</div>";
      $form['field_company_type']['widget'][$tid]['#title'] = $m;
    }

    return;


    $companyDetailSidebar = [];
    foreach ($form['#fieldgroups']['group_enter_details_of_your_comp']->children as $cid) {
      $child = &$form[$cid];
      if ($child['#type'] == 'details') {
        // d_limit($child);
        $title = $child['#title'];
      } else {
        $title = $child['widget']['#title'];
      }
      $companyDetailSidebar[] = "<li id='$cid' class='company-detail-sidebar-item'>
      <div>$title</div>
      </li>";
      $child['#attributes']['class'][] = "company-detail-item";
      $child['widget']['#prefix'] = '<div data-item-name="' . $cid . '">';
      $child['widget']['#suffix'] = '</div>';

      // $child['widget']['#prefix'] = $child['widget']['#prefix'] . '<div data-item-name="'.$cid.'" class="">';
      // $child['widget']['#suffix'] = '</div></div>' . $child['widget']['#prefix'];
    }

    $title = $form['group_enter_details_of_your_comp']['#title'];
    $form['group_enter_details_of_your_comp']['#title'] = '';
    $form['group_enter_details_of_your_comp']['#prefix'] = "<h1>$title</h1>
    <div class='company-detail'>
    <ul class='company-detail-sidebar'>" . implode('', $companyDetailSidebar) . "</ul>
    <div class='company-detail-body'>";
    $form['group_enter_details_of_your_comp']['#suffix'] = "</div></div>";
  }

  public function step4Alter(&$form)
  {
    $uploadFilesList = [];
    foreach ($form['#fieldgroups']['group_resolution_of_board_of_dir']->children as $cid) {
      $child = &$form[$cid];
      $title = $child['widget']['#title'];
      $uploadFilesList[] = "<li id='$cid' class='resolution-board-sidebar-item'>
      <div>$title</div>
      </li>";
      $child['#attributes']['class'][] = "resolution-board-item";
      $child['widget']['#prefix'] = $child['widget']['#prefix'] . '<div class="custom-drop-container" data-item-name="' . $cid . '"><div class="custom-drop">Upload files</div>';
      $child['widget']['#suffix'] .= '</div>';
    }
    // return;
    $title = $form['group_resolution_of_board_of_dir']['#title'];
    $form['group_resolution_of_board_of_dir']['#title'] = '';
    $form['group_resolution_of_board_of_dir']['#prefix'] = "<h1>$title</h1>
    <div class='resolution-board'>
    <ul class='resolution-board-sidebar'>" . implode('', $uploadFilesList) . "</ul>
    <div class='resolution-boardl-body'>";
    $form['group_resolution_of_board_of_dir']['#suffix'] = "</div></div>";
  }
}
