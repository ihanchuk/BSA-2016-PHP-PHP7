<?php
namespace calc\operands;
use calc\base\ActionInterface;
use  calc\base\OperandInfo as infoTrait;

class AddOperator implements ActionInterface
{
    protected $operandSign = "+";

    use infoTrait;

    public function make(array $operands)
    {
        return array_sum($operands);
    }

}