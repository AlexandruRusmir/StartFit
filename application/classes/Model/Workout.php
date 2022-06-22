<?php defined('SYSPATH') or die('No direct access allowed.');

class Model_Workout extends ORM
{
    public function getID(): int
    {
        return $this->id;
    }

    public function setUserID(string $userID): void
    {
        $this->user_id = $userID;
    }

    public function getUserID(): int
    {
        return $this->user_id;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): int
    {
        return $this->name;
    }
}