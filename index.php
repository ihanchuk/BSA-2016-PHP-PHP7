<?php
declare(strict_types=1);

$loader = require __DIR__ . '/vendor/autoload.php';

$t = new calc\operands\AddOperator();

$calc = new calc\app\Calculator(

    new class {
        private $logs=[];

        public function logMessage(array $mes){
            array_push($this->logs, $mes);
        }

        public function dumpLog(){
            print("<pre>");
            var_dump($this->logs);
        }
    }

);

$calc->setOperands([12,10]);

$res = $calc->getResult(new \calc\operands\AddOperator());
$res = $calc->getResult(new \calc\operands\SubtractOperator());
$res = $calc->getResult(new \calc\operands\MultiplyOperator());
$res = $calc->getResult(new \calc\operands\IntegerDivisionOperator());
$res = $calc->getResult(new \calc\operands\PowerOperator());

$calc->logger->dumpLog();

