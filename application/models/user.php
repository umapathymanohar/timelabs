<?php
class User extends Eloquent
{
    public static $timestamps = true;
   
    
    public function timesheet()
    {
        return $this->has_many('Timesheet');
    }
    
 
    
}