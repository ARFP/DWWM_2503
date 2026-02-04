<?php 


abstract class AbstractController 
{
    public function execute(string $action, int $id) {
        if(method_exists($this, $action)) {
            $this->{$action}();
            exit;
        }
    }

    abstract public function index();
}
