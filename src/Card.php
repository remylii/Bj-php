<?php
namespace Bj;

class Card
{
    const SYMBOLS = ['Spade', 'Club', 'Heart', 'Diamond'];

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

        $this->validate();
    }

    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->{$name};
        }

        throw new \ReflectionException();
    }

    public function info(): string
    {
        return $this->symbol . 'の' . $this->number;
    }

    private function validate()
    {
        if (0 >= $this->number || $this->number > 13) {
            throw new \InvalidArgumentException();
        }

        if (!in_array($this->symbol, self::SYMBOLS, true)) {
            throw new \InvalidArgumentException();
        }
    }
}
