<?php

class ValidateInputHandlerDecorator implements CommandHandler{
    private $decorated;
    
    public function __construct(CommandHandler $CommandHandler) {
        $this->decorated = $CommandHandler;
    }

    public function Handle($Command) {
        if ($Command->name == "Wide"){
            echo 'ok';
            echo '<br>';
            $this->decorated->Handle($Command);
        }
        else{
            echo 'not ok';
        }
    }

}

?>