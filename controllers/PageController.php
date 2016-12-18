<?php

namespace Controllers;

class PageController
{

    public function home()
    {
        $title = 'Главная';
        $pageTitle = 'Главная';

        include "views/index.view.php";
    }

    public function table()
    {
        $rows = 10;
        $cols = 10;
        $color = '#369';

        $title = 'Таблица умножения';
        $pageTitle = 'Таблица умножения';

        include "views/table.view.php";
    }

    public function about()
    {
        require "views/about.view.php";
    }
}