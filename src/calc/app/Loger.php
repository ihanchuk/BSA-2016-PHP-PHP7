<?php

namespace calc\app;

class Loger{

    private $logs=[];

    public function logMessage(array $mes){
        array_push($this->logs, $mes);
    }

    public function dumpLog(){
        print("<pre>");
        var_dump($this->logs);
    }
}