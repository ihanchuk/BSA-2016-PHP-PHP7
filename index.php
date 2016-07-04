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

try {
    $calc->setOperands([12,10]);
} catch (\LogicException $exc){
    print ("<h1>{$exc->getMessage()}</h1>");
} finally{

    /* Valid values for calc */

    $res = $calc->getResult(new \calc\operands\AddOperator());
    /*$res = $calc->getResult(new \calc\operands\SubtractOperator());
    $res = $calc->getResult(new \calc\operands\MultiplyOperator());
    $res = $calc->getResult(new \calc\operands\IntegerDivisionOperator());
    $res = $calc->getResult(new \calc\operands\PowerOperator());
*/

    /* Setting wrong values for calc*/

    $calc->setOperands([0,0]);

    /* */

    /*$res = $calc->getResult(new \calc\operands\AddOperator());
    $res = $calc->getResult(new \calc\operands\SubtractOperator());
    $res = $calc->getResult(new \calc\operands\MultiplyOperator());
    */
    $res = $calc->getResult(new \calc\operands\IntegerDivisionOperator());
    $res = $calc->getResult(new \calc\operands\PowerOperator());

    /* Dumping data to check logs */

    $calc->logger->dumpLog();
}


print("<h1>R - ".pow(0,0)."</h1>");