<?php

require __DIR__ . '/RecordInterface.php';

/**
 * Class User - represents a single row selected from database
 */
class User implements RecordInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $surname;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password = null;

    /**
     * @var integer|null
     */
    private $id = null;

    /**
     * User constructor.
     * @param $name
     * @param $surname
     * @param $email
     * @param $password
     * @param null $id
     */
    public function __construct($name, $surname, $email, $password = null, $id = null)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->password = $password;
        $this->id = $id;
    }

    /**
     * @return bool
     */
    public function isValid()
    {
        if (!empty($this->name) && !empty($this->surname)
            && !empty($this->email)) {
            return true;
        }

        return false;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return $this->name . ' ' . $this->surname;
    }
}
