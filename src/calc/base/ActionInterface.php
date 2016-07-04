<?php

namespace calc\base;

interface ActionInterface{
    public function make(array $operands);
}