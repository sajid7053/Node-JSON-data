<?php

namespace Drupal\node_json_data\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Component\Serialization\Json;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiKeyController extends ControllerBase {
  public function ShowKey($apikey,$nodeid) {
    $response = new JsonResponse();
    $config =\Drupal::config('node_json_data.apikey');
    $key = $config->get('Api_key');
    $node = Node::load($nodeid);
    $data = array(
      'apikey' => $key,
      'node' => array(
        'title' => $node->get('title')->getValue(),
        'body' => $node->get('body')->getValue(),
      )
    );
	
    $response->setData($data);

    return $response;

  }
}
