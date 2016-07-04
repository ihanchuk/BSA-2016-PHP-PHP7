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

    public function getResult(ActionInterface $operator)
    {
        $logInfo = [];

        try {
            $result = $operator->make($this->operands);
        } catch (\Throwable $err){
            $errorMessage = "Failed because of: ".$err->getMessage();
            $result = $errorMessage;

            print("<div style='border:1px solid red;padding:5px;'>{$errorMessage}</div>");

        } finally{
            $logInfo["result"] = $result;
            $logInfo["time"] = date("Y/m/d H:i:s");
            $logInfo["op1"] =$this->operands[0];
            $logInfo["op2"] =$this->operands[1];
            $logInfo["action"] =$operator->getSign();

            $this->logger->logMessage($logInfo);
        }
        return $result;
    }

}