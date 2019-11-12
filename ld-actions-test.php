<?php
require 'vendor/autoload.php';
$client = new LaunchDarkly\LDClient('sdk-b51a7317-4913-418a-a383-677326fd2b72');
$builder = (new LaunchDarkly\LDUserBuilder('radek-test-user'))
  ->firstName('Radek')
  ->lastName('Lewandowski')
  ->custom(['groups' => 'beta_testers']);

$user = $builder->build();

//$variation = $client->variationDetail('api.billing_level_period_garage', $user);
$variation = $client->variationDetail('radeks-test-flag', $user);

if ($client->variation('radeks-test-flag', $user, false)) {
  // application code to show the feature
  echo 'Showing your feature to ' . $user->getKey() . '\n';
} else {
  // the code to run if the feature is off
  echo 'Not showing your feature to ' . $user->getKey() . '\n';
}

echo 'value: ' . $variation->getValue();

?>
