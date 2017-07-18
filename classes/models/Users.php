<?php

require __DIR__ . '/CrudInterface.php';
require __DIR__ . '/User.php';

/**
 * Class Users
 *
 * !!!! Important - This class implements an interface. This might be new for you. Check out how interfaces work, but generally it says,
 * which method should be implemented.
 */
class Users implements CrudInterface
{
    /**
     * @var Database $database
     */
    private $database;

    /**
     * Users constructor.
     * @param Database $database
     */
    public function __construct(Database $database)
    {
        $this->database = $database->getDatabaseConnection();
    }

    /**
     * @return User[]|false
     */
    public function getList()
    {
        $stmt = $this->database->query("SELECT * FROM users");

        if (!$stmt) {
            return false;
        }

        $userObjects = [];

        while ($row = $stmt->fetch()) {
            $userObjects[] = new User(
                $row['name'],
                $row['surname'],
                $row['email'],
                $row['password'],
                $row['id']
            );
        }

        return $userObjects;
    }

    /**
     * @param $id
     * @return User|false
     */
    public function getById($id)
    {
        try {
            $query = $this->database->prepare("SELECT * FROM users WHERE id = :id");

            $query->bindParam(':id', $id, PDO::PARAM_INT);

            $query->execute();

            $user = $query->fetch();
        } catch (PDOException $e) {
            throw $e;
        }

        if ($user) {
            return new User(
                $user['name'],
                $user['surname'],
                $user['email'],
                $user['password'],
                $user['id']
            );
        }

        return false;
    }

    /**
     * @param RecordInterface $record
     * @return string
     * @throws Exception
     */
    public function create(RecordInterface $record)
    {
        if (!$record instanceof User) {
            throw new Exception('');
        }

        try {
            $query = $this->database->prepare(
                "INSERT INTO users (name, surname, email, password, created_at) VALUES (:name, :surname, :email, :password, :created_at)"
            );

            $name = $record->getName();
            $surname = $record->getSurname();
            $email = $record->getEmail();
            $password = $record->getPassword();
            $created_at = date("Y-m-d H:i:s");

            $query->bindParam(':name', $name);
            $query->bindParam(':surname', $surname);
            $query->bindParam(':email', $email);
            $query->bindParam(':password', $password);
            $query->bindParam(':created_at', $created_at);

            $query->execute();

            return $this->database->lastInsertId();
        } catch (PDOException $e) {
            throw $e;
        }
    }

    /**
     * @param RecordInterface $record
     * @return bool
     * @throws Exception
     */
    public function update(RecordInterface $record)
    {
        if (!$record instanceof User) {
            throw new Exception('');
        }

        if (!$record->getId()) {
            throw new Exception('Not existing user');
        }

        try {
            $password = $record->getPassword();

            if ($password) {
                $query = $this->database->prepare("UPDATE users SET password = :password WHERE id = :id");

                $query->bindParam(':password', $password);
                $query->bindParam(':id', $id);

                $query->execute();
            }

            $query = $this->database->prepare(
                "UPDATE users SET name = :name, surname = :surname, email = :email, updated_at = :updated_at WHERE id = :id"
            );

            $id = $record->getId();
            $name = $record->getName();
            $surname = $record->getSurname();
            $email = $record->getEmail();
            $updated_at = date("Y-m-d H:i:s");

            $query->bindParam(':name', $name);
            $query->bindParam(':surname', $surname);
            $query->bindParam(':email', $email);
            $query->bindParam(':updated_at', $updated_at);
            $query->bindParam(':id', $id);

            return $query->execute();
        } catch (PDOException $e) {
            throw $e;
        }
    }

    /**
     * @param RecordInterface $record
     * @return bool
     * @throws Exception
     */
    public function delete(RecordInterface $record)
    {
        if (!$record instanceof User) {
            throw new Exception('');
        }

        if (!$record->getId()) {
            throw new Exception('Not existing user');
        }

        try {
            $query = $this->database->prepare("DELETE FROM users WHERE id = :id");

            $id = $record->getId();

            $query->bindParam(':id', $id, PDO::PARAM_INT);

            return $query->execute();
        } catch (PDOException $e) {
            throw $e;
        }
    }
}
