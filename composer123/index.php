<?php
require 'vendor/autoload.php';

use App\controlers\homecontroller;
use Guzzle\Plugin\ErrorResponse;
$data = New homecontroller(); 

$data->hello();
?>