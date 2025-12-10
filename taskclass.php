<?php
class Task
{
    public $title;
    public $description;
    public $status;
    public $category;
    
    function setTaskDetails($t, $d, $s, $c)
    {
        $this->title = $t;
        $this->description = $d;
        $this->status = $s;
        $this->category = $c;
    }
    
    function getTaskInfo()
    {
        return "Task: " . $this->title . " - Status: " . $this->status;
    }
}
?>