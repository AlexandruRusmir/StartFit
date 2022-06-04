<?php defined('SYSPATH') or die('No direct access allowed.');

class Model_Category extends ORM
{
    protected $_has_many = [
        'exercises' => [
            'model' => 'exercise',
            'through' => 'categories_exercises'
        ]
    ];

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
}
