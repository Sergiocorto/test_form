<?php


namespace Controllers;


use Views\IndexView;

class PageController
{
    static public function getPage()
    {
        return IndexView::render();
    }
}