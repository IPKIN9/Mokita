<?php
return [
  'paths' => ['v1/*', '*'],
  'allowed_methods' => ['POST', 'GET', 'DELETE', 'PUT', '*'],
  'allowed_origins' => [config('app.cors'), '*'],
  'allowed_origins_patterns' => [],
  'allowed_headers' => ['*'],
  'exposed_headers' => [],
  'max_age' => 0,
  'supports_credentials' => false,
];
