<?php defined('SYSPATH') or die('No direct access allowed.');

class Model_Exercise extends ORM
{
    protected $_has_many = [
        'categories' => [
            'model' => 'category',
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

    public function setGifURL(string $gifURL): void
    {
        $this->gif_URL = $gifURL;
    }

    public function getGifURL(): string
    {
        return $this->gif_URL;
    }

    public function setDefaultDuration(int $defaultDuration): void
    {
        $this->default_duration = $defaultDuration;
    }

    public function getDefaultDuration(): int
    {
        return $this->default_duration;
    }

    public function setDefaultBreakTime(int $defaultBreakTime): void
    {
        $this->default_break_time = $defaultBreakTime;
    }

    public function getDefaultBreakTime(): int
    {
        return $this->default_break_time;
    }
}
