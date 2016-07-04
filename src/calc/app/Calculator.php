<?php
declare(strict_types=1);
namespace calc\app;

use calc\base\ActionInterface;

class Calculator {
    protected $operands;
    public  $logger;
    public $display;

    public function setOperands(array $operands) : bool
    {

        if(count($operands) != 2) {
            throw new \LogicException("There must be exactly 2 elements in operands array!");
            die();
        }

        if( !is_numeric($operands[0]) || !is_numeric($operands[1]) ) {
            throw new \LogicException("Both operands must be only numbers!!!!");
            die();
        }

        $this->operands = $operands;

        return true;
    }

    public function getResult(ActionInterface $operator) : array
    {
        $data =  [];
        try {
            $res = $operator->make($this->operands);
        } catch (\Throwable $err){
            $data["error"] = $err->getMessage();
            $data["line"] = $err->getLine();
        } finally{

            if(!isset($data["error"])){
                $data["result"]  = $res;
            }

            $data["operation"] = $operator->getSign();
            $data["op1"] = $this->operands[0];
            $data["op2"] = $this->operands[1];
        }
        return $data;
    }

}