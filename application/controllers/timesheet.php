<?php
class Timesheet_Controller extends Base_Controller {
	public function action_index()
	{
        $timesheet = Auth::user()->timesheet()->where('check_in_date', '=', date('Y-m-d'))->get();
        if ($timesheet){
            $timesheet = Auth::user()->timesheet()->order_by('check_in_date', 'desc')->get();
            return View::make('timesheet.index', array('timesheet' => $timesheet));
        }
        else
        {
            $logged_in_user = Auth::user();
            $data = array(
                array(
                    'user_id' => $logged_in_user->id,
                    'check_in_date' => date('Y-m-d'),
                    )
                );
            $logged_in_user->timesheet()->save($data);
            return Redirect::to('timesheet');
        }
    }
    public function action_checkin()
    {
        $timesheet = Auth::user()->timesheet()->where('check_in_date', '=', date('Y-m-d'))->first();
        $timesheet->check_in_time  = date('H:i:s');
        $timesheet->save();
        return Redirect::to('timesheet');
    }
    public function action_checkout()
    {
     $timesheet = Auth::user()->timesheet()->where('check_in_date', '=', date('Y-m-d'))->first();
     $timesheet->check_out_time  = date('H:i:s');
     $timesheet->save();
     return Redirect::to('timesheet');
 }
}