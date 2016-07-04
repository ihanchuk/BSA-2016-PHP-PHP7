<?php

namespace calc\app;

use calc\base\ActionInterface;

class Calculator {
    protected $operands;
    public  $logger;

    public function __construct($log)
    {
        $this->logger = $log;
    }

    public function setOperands(array $operands) : bool
    {

        if(count($operands) != 2) {
            throw new \LogicException("There must be exactly 2 elements in operands array!");
        }

        $this->operands = $operands;
        return true;
    }

    public function getResult(ActionInterface $operator) : float
    {
        $operationDate = date("Y/m/d H:i:s");
        $result =  $operator->make($this->operands);

        $this->logger->logMessage([
            "time"=>$operationDate,
            "result" =>$result,
            "op1" =>$this->operands[0],
            "op2" =>$this->operands[1],
            "action"=>$operator->getSign()
        ]);

        return $result;
    }
}