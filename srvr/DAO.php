<?php

/**
 * 
 */
include('Connection.php');
include('Task.php');

class dao
{
    function __construct()
    {
        connection::connect();
    }

    function addTask($task)
    {
        $sql = "insert into tasks (task,state) values('" . $task . "',0)";
        $result = connection::Maj($sql);
    }

    function ListTasks()
    {
        $Tasks = array();
        $result = connection::Select('select * from Tasks order by state asc');
        foreach ($result as $ligne) {
            $task = new Task();
            $task->task_id = $ligne['idTasks'];
            $task->task_label = $ligne['Task'];
            $task->state = $ligne['state'];
            array_push($Tasks, $task);
        }
        return $Tasks;
    }

    function editTask($task, $task_id)
    {

        $sql = "update tasks set task='" . $task . "' where idTasks='" . $task_id . "'";
        $result = connection::Maj($sql);
    }

    function deleteTask($task_id)
    {

        $sql = "delete  from  tasks where idTasks='" . $task_id . "'";


        $result = connection::Maj($sql);
    }
    function SetTaskDone($task_id)
    {

        $sql = "update tasks set state=1 where idTasks='" . $task_id . "'";
        $result = connection::Maj($sql);
    }
    function SetTaskUnDone($task_id)
    {

        $sql = "update tasks set state='false' where idTasks='" . $task_id . "'";
        $result = connection::Maj($sql);
    }
}
