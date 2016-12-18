<?php

namespace Controllers;

use Core\App;
use Core\Request;

class TodoController
{

    public function index()
    {
        $taskList = App::get('query')->selectAll('todo');

        include "views/todo.view.php";
    }

    public function add()
    {
        $title = $_POST['task'];

        App::get('query')->insert('todo', [
            'title' => $title,
        ]);

        Request::goBack();
    }

    public function update()
    {
        $id = 1;
        App::get('query')->update('todo', $_POST, [
            'id' => $id
        ]);
    }
}