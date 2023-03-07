<?php

namespace App;

use Exception;

class Quiz
{
    protected Questions $questions;
    protected $currentQuestion = 1;

    public function __construct()
    {
        $this->questions = new Questions();
    }

    public function addQuestion(Question $question): void
    {
        $this->questions->add($question);
    }

    public function begin()
    {
        return $this->nextQuestion();
    }

    public function nextQuestion()
    {
        return $this->questions->next();
    }

    public function questions(): Questions
    {
        return $this->questions;
    }

    public function isComplete(): bool
    {
        return count($this->questions->answered()) === $this->questions->count();
    }

    /**
     * @throws Exception
     */
    public function grade(): float|int
    {
        if (!$this->isComplete()) {
            throw new Exception('This quiz has not yet been completed.');
        }

        $correct = count($this->questions->solved());

        return ($correct / $this->questions->count()) * 100;
    }
}
