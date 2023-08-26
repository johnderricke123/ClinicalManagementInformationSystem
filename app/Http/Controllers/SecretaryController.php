<?php

namespace App\Http\Controllers;

use App\Models\ScheduledList;
use App\Models\WaitingList;
use Illuminate\Http\Request;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class SecretaryController extends Controller
{
    //

    public function secretary_dashboard_content(){

        return view('secretaryPages.SecretaryDashboard');

    }

    public function secretary_sales_report_content(){

        return view('secretaryPages.SecretarySalesReport');

    }

    public function secretary_waiting_list_content(){

        // $users = User::select(['id', 'name', 'email']);

        $waiting_list = WaitingList::all();
        // $waiting_list = WaitingList::where('Status', '=', 'Waiting')->get();

// $waiting_list = WaitingList::orderBy('Added_at')->get();

    
        return view('secretaryPages.SecretaryWaitinglist', compact('waiting_list'));



    }


    public function secretary_add_waiting_list_submit(Request $request){

        // return $request;

        $validator = Validator::make($request->all(), [
            
            'ClientName' => 'required',
        ]);


        if ($validator->fails()) {
            // Validation failed
            // return redirect()->back()->withErrors($validator)->withInput();
            Alert::error('Failed', 'Failed to add a client in waiting list.')->persistent(true, false);
            return redirect()->back();


        }








        $database = new WaitingList();
        $database->ClientName = $request->ClientName;
        $database->AppointmentReason = $request->AppointmentReason;
        $database->Status = "Waiting";
        // $database->Added_at = Carbon::now()->format('Y-m-d');
        $database->Added_at = Carbon::now()->format('Y-m-d H:i:s');

        $save = $database->save();


        // Swal.fire('Success', 'Account registered successfully!', 'success');

        Alert::success('Success', 'Client successfully added!')->persistent(true, false);

        return redirect()->back()->with('success', 'Account registered successfully!');

        
        // $activity->Date = Carbon::now()->format('Y-m-d');



    }


    public function secretary_proceed_waiting_list_client($id){

        // return $id;
        WaitingList::where('id', '=', $id)->update(['Status' => 'Checking up']);

        Alert::success('Success', 'Client successfully proceeded to check up!')->persistent(true, false);

        return redirect()->back();


    }

    public function secretary_scheduled_list_client(){

        // $scheduled_list = ScheduledList::all();

        // $mytime = $scheduled_list->StartDateAndTime;
        // $date = Carbon::parse($mytime);
        // $month = $date->month;

        // return $month;


        // $month = 6;

        // $mytime = now();
        // $date = Carbon::parse($mytime);
        // $year = $date->year;



        $scheduled_past = ScheduledList::where('StartDateAndTime', '<', now())
        ->orderBy('StartDateAndTime', 'asc') // Sort the results in ascending order (oldest to newest)
        ->get();


        $scheduled_upcoming = ScheduledList::where('StartDateAndTime', '>=', now())
        ->orderBy('StartDateAndTime', 'asc') // Sort the results in ascending order (oldest to newest)
        ->get();


        // $scheduled_upcoming = ScheduledList::where('StartDateAndTime', '>=', now())->get();

        $scheduled_list = ScheduledList::all();


        return view('secretaryPages.SecretaryScheduledList', compact('scheduled_list', 'scheduled_past', 'scheduled_upcoming'));

    }

    public function secretary_mark_as_waiting_client(Request $request, $id){

        // return $id;

        WaitingList::where('id', '=', $id)->update(['Status' => 'Waiting']);

        Alert::success('Success', 'Successfully updated!')->persistent(true, false);

        return redirect()->back();

    }




}
