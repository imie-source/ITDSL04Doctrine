<?php
// .src/View/View.php

namespace Imie\View;

use Imie\Service\FlashBag;

class View
{
    private $file;

    public function __construct($nameFolder, $nameFile)
    {
        $this->file = "./src/View/".$nameFolder."/".$nameFile."View.php";
    }

    public function renderView($datas){ 
        $content = $this->generateFile($this->file,$datas);
        $html = $this->generateFile('./src/View/layout.php', ['content'=>$content]);

        var_dump(FlashBag::getInstance()->getMessages());
        FlashBag::getInstance()->clear();
        return $html;
    }

    private function generateFile($view, $datas){
        
        if(file_exists($view)){
            if(isset($datas)){       
                $flashbag = FlashBag::getInstance();
                extract($datas);
                ob_start();
                require_once ($view);
                return ob_get_clean();
            }
        }else{
            throw new \Exception("le fichier $view est introuvable...");
        }
        
    }
}