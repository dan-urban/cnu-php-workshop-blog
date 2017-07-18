<?php
    if (isset($userObjects) && count($userObjects) > 0) {
?>
<table>
    <tr>
        <th>Id</th>
        <th>Username / E-mail</th>
        <th>Name</th>
        <th>Surname</th>
    </tr>
<?php
        /**
         * @var User $user
         */
        foreach ($userObjects as $key => $user) {
?>
    <tr>
        <td><?php echo htmlspecialchars($user->getId()); ?></td>
        <td><?php echo htmlspecialchars($user->getEmail()); ?></td>
        <td><?php echo htmlspecialchars($user->getName()); ?></td>
        <td><?php echo htmlspecialchars($user->getSurname()); ?></td>
        <td><a href="edit-user.php?id=<?php echo htmlspecialchars($user->getId()); ?>">Edit</a></td>
        <td><a href="index.php?action=delete&amp;id=<?php echo htmlspecialchars($user->getId()); ?>" onclick="return confirm('Are you sure?')">Delete</a></td>
    </tr>
<?php
        }
?>
</table>
<?php
    } else {
?>
    <p>There are no users in the database.</p>
<?php
    }
?>