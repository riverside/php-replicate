<?php
require 'vendor/autoload.php';

$request = new \PhpReplicate\Request('r8_5TReulG6fHhYlGLccdINmmZKpeTqda14B8cNl');

$account = new \PhpReplicate\Account($request);
$collection = new \PhpReplicate\Collection($request);
$model = new \PhpReplicate\Model($request);
$training = new \PhpReplicate\Training($request);

//$response = $model->list();
$response = $model->get('replicateXXX', 'hello-world');
//$response = $model->search('flux');
//$response = $account->get();
//$response = $collection->list();
//$response = $collection->get('flux-fine-tunes');
//$response = $training->list();
//$response = $training->get('qm4a3wwhk9rgm0chge6syev0a0'); //qm4a3wwhk9rgm0chge6syev0a0, pa2m7xpy4hrgp0chgdrsc11gjc,0515p0cxm9rgp0chg2nb7tnvwc

echo '<pre>';
print_r($response->getBody());
print_r($response->getHeaders());
print_r($response->getHttpCode());
echo '<br>';
var_dump($response->getError());
echo $response->getMethod();
echo '<br>';
echo $response->getUrl();
echo '</pre>';