<?php
namespace Bj;

class CardEntity
{
    protected $symbol;
    protected $number;
    protected $score;
    protected $label;

    public function __construct(string $symbol, int $number)
    {
        $this->symbol = $symbol;
        $this->number = $number;

        switch ($number) {
            case 1:
                $this->label = 'A';
                $this->score = 1;
                break;
            case 11:
                $this->label = 'J';
                $this->score = 10;
                break;
            case 12:
                $this->label = 'Q';
                $this->score = 10;
                break;
            case 13:
                $this->label = 'K';
                $this->score = 10;
                break;
            default:
                $this->label = (string)$number;
                $this->score = $number;
                break;
        }
    }

    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->{$name};
        }
    }
}
