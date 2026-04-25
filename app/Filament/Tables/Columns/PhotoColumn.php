<?php

namespace App\Filament\Tables\Columns;

use Filament\Support\Components\Contracts\HasEmbeddedView;
use Filament\Tables\Columns\Column;

class PhotoColumn extends Column implements HasEmbeddedView
{
    public function toEmbeddedHtml(): string
    {
        ob_start();  

         if($this->getState()){
           ?>
            <img style="width:45px;height:45px;border-radius: 6px;" src="https://masavuinvestments.com/storage/<?= e($this->getState()) ?>">

        <?php
         } else  {
         ?>
            <img style="width:45px;height:40px;border-radius: 6px;" src="https://masavuinvestments.com/default-user.png">
     <?php
        }

      ?>


        <?php return ob_get_clean();
    }
}
