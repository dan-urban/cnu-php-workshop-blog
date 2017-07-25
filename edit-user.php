<?php

include __DIR__ . '/config/config.inc.php';
include __DIR__ . '/classes/library/Database.php';
include __DIR__ . '/classes/models/Users.php';

$db = new Database($host, $db_name, $user, $pass, $charset);

$users = new Users($db);

$storedUser = null;

if (isset($_GET['id'])) {
    $storedUser = $users->getById($_GET['id']);

    if (!$storedUser) {
        throw new Exception('User does not exist');
    }

    $formElementsValues = [
        'id' => $storedUser->getId(),
        'name' => $storedUser->getName(),
        'surname' => $storedUser->getSurname(),
        'email' => $storedUser->getEmail(),
    ];
}

if (isset($_POST['submit'])) {
    $user = new User(
        $_POST['name'],
        $_POST['surname'],
        $_POST['email'],
        !empty($_POST['password']) ? sha1($_POST['password']) : null, // sha1 is a hash function for encrypting passwords.
        $storedUser->getId()
    );

    $users->update($user);

    /**
     * The header function with Location and filename will redirect the user to the specified file.
     * It is used because we don't want the user to insert multiple records while hiting the refresh button in browser, so we redirect him,
     * which will make the POST data to be forgotten.
     */
    header('Location: index.php');
}

include __DIR__ . '/templates/menu.php';
include __DIR__ . '/templates/users/users-form.php';
