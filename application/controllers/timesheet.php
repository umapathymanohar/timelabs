<?php

class Timesheet_Controller extends Base_Controller {

	public function action_index()
	{
		$timesheet = Auth::user()->timesheet()->order_by('id', 'desc')->get();
        return View::make('timesheet.index', array('timesheet' => $timesheet));


	}

	public function action_checkin()
    {
        $logged_in_user = Auth::user();
        
        
        $data = array(
            array(
                'user_id' => $logged_in_user->id,

                'check_in_date' => date('Y-m-d'),
                'check_in_time' => date('H:i:s'),

            )
        );
        $logged_in_user->timesheet()->save($data);
        return Redirect::to('timesheet');
    }


    public function action_checkout()
    {
    $logged_in_user = Auth::user();
   $qry=  Timesheet::where('user_id', '=', $logged_in_user->id)->where('check_in_date', '=', '2013-03-07')->get();

foreach ($qry as $data)
{
     $update_id = $data->id;
     $in_time = $data->check_in_time;
}

$post = Timesheet::find($update_id);

$post->check_out_time = date('H:i:s');




$post->save();

    
return Redirect::to('timesheet');
    }

}