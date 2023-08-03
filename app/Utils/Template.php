<?php
namespace App\Utils;

use Exception;

class Template
{
    private $content;
    public function __construct($path, $data = [])
    {
        if(isset($data[0])){
            extract($data[0]);
        }else{
            extract($data);
        }
        ob_start();
        try {
           if(file_exists($path)){
                include($path);
           }else{
             
           }
          
        } catch (Exception $th) {
            echo $th->getMessage();
        }
        $this->content = ob_get_clean();
        
    }

    public function __toString()
    {
        return $this->content;
    }
}
