<?php

namespace calc\app;


class Display
{
    protected $errorClass='border:2px solid red;padding:10px;font:13px Arial;margin:15px;';
    protected $succesClass='border:1px solid green;padding:10px;font:13px Arial;margin:15px;';
    protected $infoClass='border:2px solid silver;padding:15px;font:bold 17px Arial;margin:15px;background:orange';

    public function showResult($data){
        $errorClass='border:3px solid red;padding:5px;font:13px Arial;margin:15px;';
        $succesClass='border:2px solid green;padding:5px;font:13px Arial;margin:15px;';
        
        if (isset($data["error"])) {
            print("<div style=\"{$this->errorClass}\">
                        Operation: <b>{$data["operation"]} </b> 
                        on operands <b>{$data["op1"]} </b> and <b>{$data["op2"]} </b> 
                        failed because of: <b>{$data["error"]} </b>
                    </div>");
        }else{
            print("<div style=\"{$this->succesClass}\">
                        Operation: <b>{$data["operation"]} </b> on operands <b>{$data["op1"]} </b> and <b>{$data["op2"]} </b> 
                        result: <b>{$data["result"]} </b> 
                    </div>");
        }
    }

    public function showError($mes){
        print("<div style=\"{$this->errorClass}\"><b>Catched  System Error: </b><br> <br> <i>{$mes}</i> </div>");
    }

    public function showInfo($mes){
        print("<div style=\"{$this->infoClass}\">{$mes}</div>");
    }
}