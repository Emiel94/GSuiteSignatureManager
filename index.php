<?php
require __DIR__ . '/vendor/autoload.php';

use Moometric\mooSignature;
// Update with your GSuite domain and admin email address
$admin_email = "edwin.dewit@ivido.nl";
$domain = "ivido.nl";
$sigPath = __DIR__ . "signatures/";
$serviceAccountPath = __DIR__ . "/local_vars/";

$mooSig = new mooSignature($domain, $admin_email);

// OPTIONAL - Setting the service account path and signature path if not using default location
//$mooSig->addSettingServiceAccountPath($serviceAccountPath);
//$mooSig->addsettingSignaturePath($sigPath);

// Setting test and preview mode so no changes are written
// For pushing to live: set addSettingRunTestMode to False
$mooSig->addSettingRunTestMode(False);
$mooSig->addSettingPreviewSignature(True); // Set to False if you do not want to see a preview

// Setting the default signature
$mooSig->addSettingSetTemplate("ividoSignature.html");
// All users from gsuite
//$mooSig->addSettingGetUsersFromGsuite(True);

// For testing purposes. Comment the line to change all users
$mooSig->addSettingFilterEmailsToUpdate(["$admin_email"]);

$mooSig->updateSignatures();