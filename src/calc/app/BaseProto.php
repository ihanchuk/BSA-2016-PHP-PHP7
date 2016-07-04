<?php

namespace calc\app;

class BaseProto
{
    public function __construct(\calc\app\Calculator $calc, \calc\app\Display $display, $loger)
    {
        $this->calc = $calc;
        $this->display = $display;
        $this->log = $loger;
    }

    public function testCalcWithNumbers(float $n1,float $n2){
        try {
            $this->calc->setOperands([$n1,$n2]);
        } catch (\LogicException $exc){
            $this->display->showError($exc->getMessage());

          } finally{

            /* Testing Add*/
            $res = $this->calc->getResult(new \calc\operands\AddOperator());

            $this->display->showResult($res);
             $this->log->logMessage($res);

            /* Testing subtract*/
            $res = $this->calc->getResult(new \calc\operands\SubtractOperator());

            $this->display->showResult($res);
            $this->log->logMessage($res);

            /* Testing multiply */

            $res = $this->calc->getResult(new \calc\operands\MultiplyOperator());

            $this->display->showResult($res);
            $this->log->logMessage($res);

            /*Testing Integer Division */

            $res = $this->calc->getResult(new \calc\operands\IntegerDivisionOperator());

            $this->display->showResult($res);
            $this->log->logMessage($res);

            /*Testing Integer Division */

            $res = $this->calc->getResult(new \calc\operands\PowerOperator());

            $this->display->showResult($res);
            $this->log->logMessage($res);
        }
    }

    public function showLog(){
        $this->log->dumpLog();
    }

}