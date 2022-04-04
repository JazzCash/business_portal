<?php

namespace Drupal\simple_redirect;

use Drupal\Core\Config\Entity\ConfigEntityListBuilder;
use Drupal\Core\Entity\EntityInterface;

/**
 * Provides a listing of Simple Redirect entities.
 */
class SimpleRedirectListBuilder extends ConfigEntityListBuilder {

  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['label'] = $this->t('Title');
    $header['id'] = $this->t('Machine name');
    $header['from'] = $this->t('From');
    $header['to'] = $this->t('To');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    $row['label'] = $entity->label();
    $row['id'] = $entity->id();
    // You probably want a few more properties here...
    $row['from'] = $entity->getFrom();
    $row['to'] = $entity->getTo();
    return $row + parent::buildRow($entity);
  }

}
