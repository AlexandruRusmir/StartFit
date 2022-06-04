<?php defined('SYSPATH') or die('No direct access allowed.');

class Model_Role extends Model_Auth_Role
{
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setDescription(string $description): void
    {
        $this->description =  $description;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}