<?php

namespace Controllers;

use Core\App;
use Core\Request;

class TodoController
{

    public function index()
    {
        $taskList = App::get('query')->selectAll('todo');
        $title = 'Список задач';

        include "views/todo.view.php";
    }

    public function add()
    {
        $re = '/(@(\w+))/ui';
        $rep = '<a href="https://twitter.com/$2">$1</a>';

        $title = preg_replace($re, $rep, $_POST['task']);

        App::get('query')->insert('todo', [
            'title' => $title,
        ]);

        Request::goBack();
    }

    public function update()
    {
        foreach ($_POST['complete'] as $id){
            App::get('query')->update('todo', ['complete' => 1], ['id' => $id]);
        }

        Request::goBack();
    }
}