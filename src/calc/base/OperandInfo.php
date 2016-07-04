<?php

namespace calc\base;


trait OperandInfo
{
    public function getSign() :string {
        return $this->operandSign;
    }
}