<?php

session_start();
include_once 'config/config.php';

$db = new Uploady\Database();
$utils = new Uploady\Utils();
$user = new Uploady\User($db, $utils);
$auth = new Uploady\Auth($db, $utils);
$settings = new Uploady\Settings($db);
$localization = new Uploady\Localization($db);
$role = new Uploady\Role($db, $user);

$st = $settings->getSettings();

$current_url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

if (isset($_SESSION)) {

    $username = isset($_SESSION['username']) ? $_SESSION['username'] : null;

    if (!isset($_SESSION['user_role'])) {
        $_SESSION['user_role'] = 2;
    }

    if ($username != null) {
        if (isset($_SESSION['loggedin'])) {
            $data = $user->get($username);

            if (!isset($_SESSION['user_id'])) {
                $_SESSION["user_id"] = hash("sha1", $data->user_id);
            }
        }

        if (!isset($_SESSION['current_ip'])) {
            $_SESSION['current_ip'] = $utils->sanitize($_SERVER['REMOTE_ADDR']);
        }

        if (!(isset($_SESSION['csrf']))) {
            $auth->generateSessionToken();
        }

        if ($user->isTwoFAEnabled($username) == true) {
            if (!isset($_SESSION['OTP']) || $_SESSION['OTP'] != true) {
                if (!strpos($current_url, "auth.php")) {
                    $utils->redirect($utils->siteUrl("/auth.php"));
                }
            }
        }

        if (isset($_SESSION['isHuman'])) {
            if ($_SESSION['isHuman'] == false) {
                $utils->redirect($utils->siteUrl('/logout.php'));
            }
        }
    }

    if (!isset($_SESSION['loggedin'])) {
        if (
            !strpos($current_url, "login.php") &&
            !strpos($current_url, "signup.php") &&
            !strpos($current_url, "auth.php")
        ) {
            if (!$settings->getSettingValue("public_upload")) {
                $utils->redirect($utils->siteUrl('/login.php'));
            }
        }
    }

    if (strpos($current_url, "profile/")) {
        if (!isset($_SESSION['loggedin'])) {
            $utils->redirect($utils->siteUrl('/login.php'));
        }
    }
}

$language = $_GET['lang'] ?? $localization->getLanguage();
$direction = $localization->getLanguageByCode($language)->language_direction;
$theme = $_GET['theme'] ?? $_SESSION['theme'] ?? 'light';

$dir = "dir=\"{$direction}\" lang=\"{$language}\"";

if ($theme == 'dark') {
    $_SESSION['theme'] = 'dark';
    $theme = 'dark';
} else {
    $_SESSION['theme'] = 'light';
    $theme = 'light';
}

$localization->setLanguage($language);
$lang = $localization->loadLangauge($localization->getLanguage());

$page = 'session';
