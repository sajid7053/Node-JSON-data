<?php

namespace Drupal\node_json_data\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ApiKeyController extends ControllerBase {
	public function ShowKey() {
    $config =\Drupal::config('node_json_data.apikey');
    $key = $config->get('Api_key');
	  return [
      '#type' => 'markup',
      '#markup' => $this->t('@key',['@key'=>$key])
    ];
  }
}
