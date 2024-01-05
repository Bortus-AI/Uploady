<?php

include_once '../../session.php';

$language = new Uploady\Localization($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $lang = $_POST['lang'];

    if (isset($_POST['update_general'])) {
        $data = [];

        foreach ($_POST as $key => $value) {
            if (strpos($key, "general_") !== false) {
                $key = str_replace("general_", "", $key);
                $data[$key] = $value;
            }
        }

        $language->updateLanguage("general", $data, $lang);
    }

    if (isset($_POST['update_navbar'])) {
        $data = [];

        foreach ($_POST as $key => $value) {
            if (strpos($key, "navbar_") !== false) {
                $key = str_replace("navbar_", "", $key);
                $data[$key] = $value;
            }
        }

        $language->updateLanguage("navbar", $data, $lang);
    }

    if (isset($_POST['update_theme'])) {
        $data = [];

        foreach ($_POST as $key => $value) {
            if (strpos($key, "theme_") !== false) {
                $key = str_replace("theme_", "", $key);
                $data[$key] = $value;
            }
        }

        $language->updateLanguage("theme", $data, $lang);
    }

    $utils->redirect(SITE_URL . "/admin/languages/edit.php?message=language_updated&lang=$lang");
}
