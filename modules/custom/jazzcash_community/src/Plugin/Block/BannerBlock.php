<?php

namespace Drupal\jazzcash_community\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'BannerBlock' block.
 *
 * @Block(
 *  id = "jazzcash_community_banner_block",
 *  admin_label = @Translation("Jazzcash community block"),
 * )
 */
class BannerBlock extends BlockBase
{

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration()
  {
    return [] + parent::defaultConfiguration();
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state)
  {
    $form['body'] = [
      '#type' => 'text_format',
      '#title' => $this->t('Body'),
      '#default_value' => $this->configuration['body']['value'],
      '#weight' => '0',
    ];
    $form['image'] = [
      '#type' => 'managed_file',
      '#title' => $this->t('Image'),
      '#default_value' => [$this->configuration['image']],
      '#weight' => '0',
      '#upload_location' => 'public://'
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state)
  {
    $this->configuration['body'] = $form_state->getValue('body');
    $this->configuration['image'] = $form_state->getValue('image')[0];


    $file = \Drupal\file\Entity\File::load($this->configuration['image']);
    if ($file) {

      $file->setPermanent();
      $user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());
      $file->setOwner($user);
      $file->save();
    }
    // Save.
  }

  /**
   * {@inheritdoc}
   */
  public function build()
  {

    $file = \Drupal\file\Entity\File::load($this->configuration['image']);
    $uri = $file->getFileUri(); 
    $url = \Drupal\Core\Url::fromUri(file_create_url($uri))->toString();

    $body = $this->configuration['body']['value'];
    
    $build = [];
    $build['#theme'] = 'jazzcash_community_banner_block';
    $build['#content']['title'] = $this->configuration['label'];
    $build['#content']['body'] = $body;
    $build['#content']['image'] = $url;

    return $build;
  }
}
