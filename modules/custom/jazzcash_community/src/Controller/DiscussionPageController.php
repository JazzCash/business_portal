<?php

namespace Drupal\jazzcash_community\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\NodeInterface;

/**
 * Class DiscussionPageController.
 */
class DiscussionPageController extends ControllerBase
{

  /**
   * Discussion.
   *
   * @return string
   *   Return Hello string.
   */
  public function discussion(NodeInterface $node)
  {
    //title,
    //author
    //image
    //date/time
    //body
    //comments count
    //like/unlike button
    //likes count
    //share button
    //comment form
    // comments list
    //comments pagination

    $title = $node->getTitle();
    $body = $node->body->getValue();
    $likedList = array_map(function ($e) {
      return $e['target_id'];
    }, $node->field_liked_by->getValue());

    $owner = $node->getOwner();
    $ownerName = $owner->getDisplayName();
    $time = $node->getCreatedTime();
    $comments = $node->comment_forum;
    $comments_count = $comments->comment_count;
    $date_formatter = \Drupal::service('date.formatter');
    $request_time = \Drupal::time()->getRequestTime();
    $_comments = [];


    $cids = \Drupal::entityQuery('comment')
      ->condition('entity_id', $node->id())
      ->condition('entity_type', 'node')
      ->sort('cid', 'DESC')
      ->execute();

    foreach ($cids as $cid) {
      $comment = \Drupal\comment\Entity\Comment::load($cid);
      $_comments[$comment->id()] =  [
        'node' => $node,
        "subject" => $comment->subject->value,
        "body" => $comment->comment_body->value,
        "field_name" => $comment->field_name->value,
        "thread" => $comment->thread->value,
        "changed" => $comment->changed->value,
        "changed_foramted" => $date_formatter->formatDiff(+$comment->changed->value, $request_time, [
          'granularity' => 2,
          'return_as_object' => TRUE,
        ])->toRenderable(),
        "created" => $comment->created->value,
        "created_formated" => $date_formatter->formatDiff(+$comment->created->value, $request_time, [
          'granularity' => 2,
          'return_as_object' => TRUE,
        ])->toRenderable(),
        "hostname" => $comment->hostname->value,
        "hompage" => $comment->homepage->value,
        "mail" => $comment->mail->value,
        "name" => $comment->name->value,
        "entity_id" => $comment->entity_id->value,
        "pid" => $comment->pid->value,
        "uid" => $comment->uid->value,
        "status" => $comment->status->value,
        "owner_id" => $comment->getOwnerId(),
        "ownerName" => $comment->getOwner()->getDisplayName(),
      ];
    }

    $build = [];

    $build['#attached']['library'][] = 'jazzcash_community/jazzcash_community';
    $values = array(
      'entity_type'  => 'node',
      'entity_id'    => $node->id(),
      'field_name'   => 'comment_forum',
      'comment_type' => 'comment_forum',
      'pid' => NULL,
    );

    $comment = \Drupal::entityTypeManager()->getStorage('comment')->create($values);
    $formHTML  = \Drupal::service('entity.form_builder')->getForm($comment);
    $formHTML['subject']['#access'] = false;
    $formHTML['actions']['preview']['#access'] = false;

    $build['discussion_page'] =  [
      '#theme' => 'discussion_page',
      '#data' => [
        'nid' => $node->id(),
        'comment_form' =>  $formHTML,
        'title' => $node->getTitle(),
        'body' => $node->body->value,
        'likedList' => $likedList,
        'ownerName' => $owner->getDisplayName(),
        'owner' => $owner,
        'date_time' => $time,
        'date_time_formated' => $date_formatter->formatDiff(+$time, $request_time, [
          'granularity' => 2,
          'return_as_object' => TRUE,
        ])->toRenderable(),
        'comments' => $_comments,
        'comments_count' => $comments_count
      ]
    ];
    return $build;
  }

  /**
   * Discussion.
   *
   * @return string
   *   Return Hello string.
   */
  public function discussionLike(NodeInterface $node)
  {
    $currentUser = \Drupal::currentUser();
    $uid = $currentUser->id();
    $likedList = array_map(function ($e) {
      return $e['target_id'];
    }, $node->field_liked_by->getValue());

    $likedList = array_unique($likedList);

    $op = "";

    if (($searchedIndex = array_search($uid, $likedList)) !== false) {
      unset($likedList[$searchedIndex]);
      $op = "removedLike";
    } else {
      $likedList[] = $uid;
      $op = "liked";
    }
    $node->field_liked_by->setValue($likedList);
    $node->save();
    return new \Drupal\Core\Ajax\AjaxResponse([
      "op" => $op,
      "count" => count($likedList)
    ]);
  }
}
