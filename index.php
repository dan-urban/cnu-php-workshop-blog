<?php

require __DIR__ . '/config/config.inc.php';
require __DIR__ . '/classes/library/Database.php';
require __DIR__ . '/classes/models/Users.php';

$db = new Database($host, $db_name, $user, $pass, $charset);

$users = new Users($db);
$userObjects = $users->getList();

if (isset($_GET['action']) && isset($_GET['id'])) {
    $user = $users->getById($_GET['id']);

    if (!$user) {
        throw new Exception('User does not exist');
    }

    switch ($_GET['action']) {
        case 'delete':
            $users->delete($user);
            break;
        default:
            throw new Exception('Not allowed action');
            break;
    }

    header('Location: index.php');
}

include __DIR__ . '/templates/menu.php';
include __DIR__ . '/templates/users/users-list.php';
