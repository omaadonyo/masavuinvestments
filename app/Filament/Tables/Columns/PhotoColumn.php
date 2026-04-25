<?php

namespace App\Filament\Tables\Columns;

use Filament\Support\Components\Contracts\HasEmbeddedView;
use Filament\Tables\Columns\Column;

class PhotoColumn extends Column implements HasEmbeddedView
{
    public function toEmbeddedHtml(): string
    {
        ob_start(); ?>

        <div>
            <?= e($this->getState()) ?>
        </div>

        <?php return ob_get_clean();
    }
}
