<?php
declare(strict_types=1);

$loader = require __DIR__ . '/vendor/autoload.php';

use calc\app\BaseProto as App;

$calc = new calc\app\Calculator();
$display =new \calc\app\Display();
$loger = new \calc\app\Loger();

$app = new App($calc,$display,new class{

    private $logs=[];

    public function logMessage(array $data){
        $opTime = date("D M j G:i:s T Y");
        $str= "Date:{$opTime} Operator: {$data["operation"]} Operands:{$data["op1"]} and {$data["op2"]} 
        Result: {$data["result"]}";

        array_push($this->logs, $str);
    }

    public function dumpLog(){
        print("<pre>");
        var_dump($this->logs);
    }
});

/* Legal nums for testing*/
$app->display->showInfo("Testing with some nice numbers");
$app->testCalcWithNumbers(34,6.4);



/*  Testing with some bullshit */
try{
    $app->display->showInfo("MakingError or testing");
    $app->testCalcWithNumbers("===032+-+/*","234");
}catch(Throwable $th){
    $app->display->showError($th->getMessage());
}

/*  Testing with illegal numbers */
try{
    $app->display->showInfo("Testing wth som wrong numbers");
    $app->testCalcWithNumbers(0,0);
}catch(Throwable $th){
    $app->display->showError($th->getMessage());
}


/* Displaying  log*/
$app->display->showInfo("Diplaying raw lo data");
$app->showLog();
