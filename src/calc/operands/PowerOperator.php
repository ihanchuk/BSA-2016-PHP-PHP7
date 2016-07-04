<?php

namespace calc\operands;
use calc\base\ActionInterface;
use  calc\base\OperandInfo as infoTrait;

class PowerOperator implements ActionInterface
{
    protected $operandSign = "**";

    use infoTrait;

    public function make(array $operands) : float
    {
        return pow($operands[0],$operands[1]);
    }

}