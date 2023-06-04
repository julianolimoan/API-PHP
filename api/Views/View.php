<?php

namespace Views;

abstract class View{

    protected $page;

    public function __construct(){
        $this->page ="";
    }




    public function displayPage(){
        header('Content-Type: application/json');
        echo json_encode($this->page);
        exit();
    }
}