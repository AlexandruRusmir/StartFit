<?php defined('SYSPATH') or die('No direct access allowed.');

class Model_Animation extends ORM
{
    public function getID(): int
    {
        return $this->id;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setURL(string $url): void
    {
        $this->url = $url;
    }

    public function getURL(): string
    {
        return $this->url;
    }
}
