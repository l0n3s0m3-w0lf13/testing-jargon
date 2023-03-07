<?php

namespace App;

class Question
{
    protected $body, $solution, $answer;

    public function __construct($body, $solution)
    {
        $this->body = $body;
        $this->solution = $solution;
    }

    public function answer($answer): bool
    {
        $this->answer = $answer;

        return $this->solved();
    }

    public function answered(): bool
    {
        return isset($this->answer);
    }

    public function solved(): bool
    {
        return $this->answer === $this->solution;
    }
}
