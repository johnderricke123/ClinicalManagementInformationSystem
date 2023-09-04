<?php

namespace App\Http\Controllers;

use App\Models\CompanyAccount;
use App\Models\PatientCheckUpDetails;
use App\Models\PatientFile;
use App\Models\PatientPersonalInfo;
use App\Models\PatientProfile;
use App\Models\PrescriptionHistory;
use App\Models\ScheduledList;
use App\Models\User;
use App\Models\WaitingList;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;


class ManagerController extends Controller
{
    //

    public function to_manager_sales_report()
    {

        $data = WaitingList::all();
        return view('managerPages.ManagerSalesReport', compact('data'));
    }

    public function to_manager_dashboard()
    {

        $total_patients = PatientPersonalInfo::all()->count();
        $total_company_accounts = CompanyAccount::all()->count();
        $scheduled_list = ScheduledList::all();

        return view('managerPages.ManagerDashboard', compact('total_patients', 'total_company_accounts', 'scheduled_list'));
    }

    public function to_manager_transaction_history()
    {

        $waiting_list = PatientPersonalInfo::all();
        return view('managerPages.ManagerTransactionHistory', compact('waiting_list'));
    }

    public function to_manager_create_account_form()
    {

        return view('managerPages.ManagerCreateAccount');
    }

    public function manager_register_account_submit(Request $request)
    {

        // return $request;
        // return redirect()->back()->with('success', 'Account registered successfully!');

        $validator = Validator::make($request->all(), [

            'username' => 'required|unique:company_accounts',
            'fname' => 'required',
            'lname' => 'required',
            'phone' => 'required|numeric',
            'userRole' => 'required',
            'pword' => 'required|min:6',
        ]);


        if ($validator->fails()) {
            // Validation failed
            return redirect()->back()->withErrors($validator)->withInput();
            // return redirect()->back()->with('error', 'Account registration failed.');
        }


        $database = new CompanyAccount();

        $database->username = $request->username;
        $database->fname = $request->fname;
        $database->lname = $request->lname;
        $database->phone = $request->phone;
        $database->userRole = $request->userRole;
        $database->pword = $request->pword;
        $database->DateAdded = Carbon::now()->format('Y-m-d H:i:s');
        $save = $database->save();

        return redirect()->back()->with('success', 'Account registered successfully!');

        // return redirect()->back();

    }







    // public function getUsers()
    // {
    //     $users = User::select(['id', 'name', 'email']);

    //     return DataTables::of($users)->make(true);

    //     return "goods ra";
    // }

    public function getUsers()
    {
        $users = User::select(['id', 'name', 'email']);

        $waiting_list = WaitingList::where('Status', '=', 'Checking up')->get();

        // $waiting_list = WaitingList::orderBy('Added_at')->get();


        return view('managerPages.ManagerWaitinglist', compact('users', 'waiting_list'));
    }

    public function manager_add_waiting_list_submit(Request $request)
    {

        // return $request;





        $validator = Validator::make($request->all(), [

            'ClientName' => 'required',
        ]);


        if ($validator->fails()) {
            // Validation failed
            // return redirect()->back()->withErrors($validator)->withInput();
            Alert::error('Failed', 'Failed to add a client in waiting list.')->persistent(true, false);
            return redirect()->back()->with('success', 'Account registered successfully!');
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


    public function manager_remove_waiting_list_client($id)
    {

        WaitingList::find($id)->delete();
        Alert::success('Success', 'Client successfully removed!')->persistent(true, false);
        return redirect()->back();
    }

    public function manager_edit_client_waiting_list(Request $request, $id)
    {

        // return $request;

        WaitingList::where('id', '=', $id)->update(['ClientName' => $request->ClientName, 'AppointmentReason' => $request->AppointmentReason]);

        Alert::success('Success', 'Client successfully updated!')->persistent(true, false);
        return redirect()->back();
    }

    public function manager_manage_employee_accounts()
    {

        $waiting_list = CompanyAccount::all();

        return view('managerPages.ManagerManageAccount', compact('waiting_list'));
    }

    public function manager_marked_checked_up_client($id)
    {

        // return $id;
        WaitingList::where('id', '=', $id)->update(['Status' => 'Checked up']);

        Alert::success('Success', 'Client successfully marked as checked up!')->persistent(true, false);
        return redirect()->back();
    }

    public function manager_scheduled_list_view()
    {

        // $scheduled_list = ScheduledList::all();
        // return now();


        // $scheduled_list = ScheduledList::where('StartDateAndTime', '=', Carbon::now()->format('Y-m-d'))->get();

        // $mytime = $scheduled_list[0]->StartDateAndTime;
        // $date = Carbon::parse($mytime);
        // $month = $date->month;
        // $year = $date->year;
        // $day = $date->day;
        // return $year."/".$month."/".$day;

        // Get the current date from your PC
        // $currentDate = Carbon::now()->toDateString();

        // Retrieve data where the StartDateAndTime matches the current date
        // $scheduled_list = ScheduledList::whereRaw("DATE(StartDateAndTime) = ?", [$currentDate])->get();

        // $scheduled_past = ScheduledList::where('StartDateAndTime', '<', now())->get();

        $scheduled_past = ScheduledList::where('StartDateAndTime', '<', now())
            ->orderBy('StartDateAndTime', 'asc') // Sort the results in ascending order (oldest to newest)
            ->get();


        $scheduled_upcoming = ScheduledList::where('StartDateAndTime', '>=', now())
            ->orderBy('StartDateAndTime', 'asc') // Sort the results in ascending order (oldest to newest)
            ->get();


        // $scheduled_upcoming = ScheduledList::where('StartDateAndTime', '>=', now())->get();

        $scheduled_list = ScheduledList::all();
        // return $scheduled_list;

        // $mytime = $scheduled_list->StartDateAndTime;
        // $date = Carbon::parse($mytime);
        // $month = $date->month;

        // return $month;




        // $mytime = now();
        // $date = Carbon::parse($mytime);
        // $year = $date->year;


        return view('managerPages.ManagerScheduledList', compact('scheduled_list', 'scheduled_past', 'scheduled_upcoming'));
    }

    public function manager_input_check_up_details(Request $request)
    {



        return view('managerPages.ManagerInputCheckUpDetails');
    }

    public function manager_client_image_upload(Request $request)
    {

        dd($request);
    }

    public function manager_add_waiting_list(Request $request)
    {

        // return $request;

        $validator = Validator::make($request->all(), [

            'ClientName' => 'required',
            'StartDateAndTime' => 'required',
        ]);


        if ($validator->fails()) {
            // Validation failed
            // return redirect()->back()->withErrors($validator)->withInput();
            Alert::error('Failed', 'Failed to add a client in scheduled list.')->persistent(true, false);
            return redirect()->back();
        }





        $database = new ScheduledList();
        $database->ClientName = $request->ClientName;
        $database->AppointmentReason = $request->AppointmentReason;
        $database->StartDateAndTime = $request->StartDateAndTime;
        $database->EndDateAndTime = $request->EndDateAndTime;

        // Format and store the StartDateAndTime
        // $startDate = Carbon::createFromFormat('Y-m-d\TH:i', $request->StartDateAndTime);
        // $database->StartDateAndTime = $startDate->format('Y-m-d H:i:s');

        // Format and store the EndDateAndTime
        // $endDate = Carbon::createFromFormat('Y-m-d\TH:i', $request->EndDateAndTime);
        // $database->EndDateAndTime = $endDate->format('Y-m-d H:i:s');


        $database->Added_at = Carbon::now()->format('Y-m-d H:i:s');
        $save = $database->save();

        Alert::success('Success', 'Successfully scheduled!')->persistent(true, false);
        return redirect()->back();
    }

    public function manager_input_check_up_details_submit(Request $request)
    {

        // return redirect()->back();
        // return $request;

        // return  Carbon::now()->format('Y-m-d H:i:s');
        // $date_today = Carbon::now()->format('Y').Carbon::now()->format('m').Carbon::now()->format('d');

        // generete a unique reference number
        $uniqueNumber = Str::random(8);

        $uniqueNumber = null;
        $foundUnique = false;

        while (!$foundUnique) {
            $randomNumber = Carbon::now()->format('Y') . mt_rand(100000, 999999); // Generate a random number between 100000 and 999999

            // Check if the generated number already exists in the database or any other storage
            if (!PatientPersonalInfo::where('id', $randomNumber)->exists()) {
                $uniqueNumber = $randomNumber;
                $foundUnique = true;
            }
        }

        // return $uniqueNumber;






        $patient_personal_infos_db = new PatientPersonalInfo();
        $patient_personal_infos_db->id = $uniqueNumber;
        $patient_personal_infos_db->FirstName = $request->PatientName;
        $patient_personal_infos_db->LastName = $request->PatientLastName;
        $patient_personal_infos_db->Address = $request->PatientAddress;
        $patient_personal_infos_db->Age = $request->Age;
        $patient_personal_infos_db->Gender = $request->Gender;

        $patient_personal_infos_db->DateOfBirth = $request->PatientDateOfBirth;
        $patient_personal_infos_db->PlaceOfBirth = $request->PatientPlaceOfBirth;
        $patient_personal_infos_db->Occupation = $request->PatientOccupation;
        $patient_personal_infos_db->Contact = $request->PatientContact;
        $patient_personal_infos_db->Added_at = Carbon::now()->format('Y-m-d H:i:s');
        $save = $patient_personal_infos_db->save();





        $check_up_details_db = new PatientCheckUpDetails();
        $check_up_details_db->id = $uniqueNumber;
        $check_up_details_db->PatientName = $request->PatientName . " " . $request->PatientLastName;
        $check_up_details_db->DoctorName = $request->DoctorName;
        $check_up_details_db->Diagnosis = $request->Diagnosis;
        $check_up_details_db->LabFindings = $request->LaboratoryFindings;
        $check_up_details_db->DateAndTimeOfCheckUp = $request->DateAndTimeOfCheckUp;
        $check_up_details_db->Added_at = Carbon::now()->format('Y-m-d H:i:s');
        $save = $check_up_details_db->save();






        // return $uniqueNumber.$randomText;


        // Multiple image upload
        // return $request->files->getClientOriginalExtension();

        if ($request->hasFile('files')) {
            $files = $request->file('files');

            foreach ($files as $file) {


                // this code generates a unique random text 
                $length = 10;
                $randomText = Str::random($length);

                // Check if the generated text already exists in the database
                while (PatientFile::where('FileName', $randomText)->exists()) {
                    $randomText = Str::random($length);
                }
                // End

                // This code move the file that you uploaded to the public/PatientFiles Directory
                $file_extension = $file->getClientOriginalExtension();
                // $filename = $file->getClientOriginalName();
                $filename = $uniqueNumber . $randomText;
                $file->move(public_path('PatientFiles'), $filename . "." . $file_extension);
                // End

                // Stores the informations into the database PatientFile
                $patient_file = new PatientFile();
                $patient_file->patient_personal_info_id = $uniqueNumber;
                $patient_file->FileName = $filename . '.' . $file_extension;
                $patient_file->Path = 'PatientFiles/' . $filename . '.' . $file_extension;
                $patient_file->Added_at = Carbon::now()->format('Y-m-d H:i:s');
                $save = $patient_file->save();
                // End  
            }

            // return 'Files uploaded successfully!';
        }
        // Multiple image upload


        Alert::success('Success', 'Successfully added!')->persistent(true, false);
        // return redirect()->back();

        $patient_personal_info = PatientPersonalInfo::where('id', '=', $uniqueNumber)->first();
        $patient_check_up_details = PatientCheckUpDetails::where('id', '=', $uniqueNumber)->first();
        $patient_files = PatientFile::where('patient_personal_info_id', '=', $uniqueNumber)->get();

        // return redirect('ManagerViewCheckUpDetails/{{$uniqueNumber}}', compact('patient_personal_info', 'patient_check_up_details', 'patient_files'));

        // return redirect()->route('ManagerInitialViewCheckUpDetails', $uniqueNumber)
        //          ->with('patient_personal_info', $patient_personal_info)
        //          ->with('patient_check_up_details', $patient_check_up_details)
        //          ->with('patient_files', $patient_files);

        return redirect()->route('ManagerViewCheckUpDetails', $uniqueNumber)
            ->with('patient_personal_info', $patient_personal_info)
            ->with('patient_check_up_details', $patient_check_up_details)
            ->with('patient_files', $patient_files);
    }


    public function manager_view_check_up_details(Request $request, $id)
    {

        // return $id;
        $patient_personal_info = PatientPersonalInfo::where('id', '=', $id)->first();
        $patient_check_up_details = PatientCheckUpDetails::where('id', '=', $id)->first();
        $patient_files = PatientFile::where('patient_personal_info_id', '=', $id)->get();
        $patient_profiles = PatientProfile::where('patient_personal_info_id', '=', $id)->get();
        $patient_prescription_histories = PrescriptionHistory::where('patient_personal_info_id', '=', $id)->get();

        // return $patient_prescription_histories;
        // if(!$patient_profiles){

        //     $patient_profiles->Path = "null"; 

        // }
        // return $patient_profiles;
        return view('managerPages.ManagerViewCheckUpDetails', compact('patient_personal_info', 'patient_check_up_details', 'patient_files', 'patient_profiles','patient_prescription_histories'));
    }

    public function manager_initial_view_check_up_details(Request $request, $id)
    {

        $patient_personal_info = PatientPersonalInfo::where('id', '=', $id)->first();
        $patient_check_up_details = PatientCheckUpDetails::where('id', '=', $id)->first();
        $patient_files = PatientFile::where('patient_personal_info_id', '=', $id)->get();

        Alert::success('Success', 'Successfully added!')->persistent(true, false);
        return view('managerPages.ManagerInitialViewCheckUpDetails', compact('patient_personal_info', 'patient_check_up_details', 'patient_files'));
    }

    public function manager_remove_check_up_records(Request $request, $id)
    {

        // return $id;


        // Assuming you have a column named 'image_filename' in the 'your_table' table
        // $patient_file_db = new PatientFile();
        $patient_file = PatientFile::where('patient_personal_info_id', '=', $id)->get();
        // $imageFilename = $patient_file->FileName;

        foreach ($patient_file as $pf) {


            if ($pf) {
                // Delete the image file from the public directory
                $imagePath = public_path($pf->Path);

                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            } else {
                return "Error deleting image";
            }
        }



        PatientPersonalInfo::find($id)->delete();

        Alert::success('Success', 'Record successfully deleted!')->persistent(true, false);
        return redirect()->back();
    }


    public function manager_scheduled_event_delete(Request $request)
    {

        return $request;
    }

    public function manager_prescription_print_form(Request $request)
    {

        return "goods";
        return view('managerPages.ManagerPrescriptionPrint');
    }


    public function popup(Request $request)
    {
        // return $request;

        $database = new PrescriptionHistory();
        $database->patient_personal_info_id = $request->PatientID;
        $database->PatientName = $request->PatientName;
        $database->Gender = $request->Gender;
        $database->Prescription = $request->Prescription;
        $database->DateAndTime = $request->DateAndTime;
        $database->Age = $request->Age;
        $database->Address = $request->Address;
        $database->NextCheckUp = $request->NextCheckUp;
        $save = $database->save();


        $pop = "qwerty";
        return view('managerPages.printables.ManagerPrescriptionPrint', compact('pop', 'request'));
    }

    public function manager_delete_image(Request $request)
    {

        // return $request;

        $imageID = $request->ImageID;

        PatientFile::find($imageID)->delete();

        $imagePath = $request->ImagePath;

        if ($imagePath) {
            // Delete the image file from the public directory
            // $imagePath = public_path($pf->Path);

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        } else {
            return "Error deleting image";
        }

        Alert::success('Success', 'Image Successfully Deleted!')->persistent(true, false);
        return redirect()->back();
    }

    public function manager_upload_image(Request $request)
    {

        // dd($request);

        if ($request->hasFile('files')) {

            // return "Success"; 
            // var_dump($request);
            $uniqueNumber = $request->PatientID;
            $files = $request->file('files');
            foreach ($files as $file) {


                // this code generates a unique random text 
                $length = 10;
                $randomText = Str::random($length);

                // Check if the generated text already exists in the database
                while (PatientFile::where('FileName', $randomText)->exists()) {
                    $randomText = Str::random($length);
                }
                // End

                // This code move the file that you uploaded to the public/PatientFiles Directory
                $file_extension = $file->getClientOriginalExtension();
                // $filename = $file->getClientOriginalName();
                $filename = $uniqueNumber . $randomText;
                $file->move(public_path('PatientFiles'), $filename . "." . $file_extension);
                // End

                // Stores the informations into the database PatientFile
                $patient_file = new PatientFile();
                $patient_file->patient_personal_info_id = $uniqueNumber;
                $patient_file->FileName = $filename . '.' . $file_extension;
                $patient_file->Path = 'PatientFiles/' . $filename . '.' . $file_extension;
                $patient_file->Added_at = Carbon::now()->format('Y-m-d H:i:s');
                $save = $patient_file->save();
                // End  
            }


            Alert::success('Success', 'Successfully added!')->persistent(true, false);
            return redirect()->back();

            // $patient_personal_info = PatientPersonalInfo::where('id','=', $uniqueNumber)->first();
            // $patient_check_up_details = PatientCheckUpDetails::where('id', '=', $uniqueNumber)->first();
            // $patient_files = PatientFile::where('patient_personal_info_id','=',$uniqueNumber)->get();

            // return redirect()->route('ManagerInitialViewCheckUpDetails', $uniqueNumber)
            //          ->with('patient_personal_info', $patient_personal_info)
            //          ->with('patient_check_up_details', $patient_check_up_details)
            //          ->with('patient_files', $patient_files);

        } else {

            Alert::error('Failed', 'Failed to add a client in scheduled list.')->persistent(true, false);
            return redirect()->back();

            //   return "Please input a file";  
        }
    }

    public function manager_delete_all_selected_data(Request $request)
    {
        // return "goods";
        // $request->imageID[];
        // return $request;

        if ($request->imageID == null) {
            Alert::error('Failed', 'Please select one or more images to delete.')->persistent(true, false);
            return redirect()->back();
        } 



        $images_selected = $request->imageID;


        $imagePath = array();

        foreach ($images_selected as $imageId) {
            $image = PatientFile::find($imageId);

            if ($image) {
                $imagePath[] = $image->Path;
            }
        }


        // return $imagePath;



        foreach ($images_selected as $is) {

            PatientFile::find($is)->delete();
        }

        // $imagePath = $request->ImagePath;

        foreach ($imagePath as $ip) {

            if ($ip) {
                // Delete the image file from the public directory
                // $imagePath = public_path($pf->Path);

                if (file_exists($ip)) {
                    unlink($ip);
                }
            } else {
                return "Error deleting image";
            }
        }


        Alert::success('Success', 'Successfully deleted!')->persistent(true, false);
        return redirect()->back();
    }

    public function manager_edit_patient_informations(Request $request)
    {

        // return $request;
        // ScheduledList::where('id', '=', $request->ScheduledID)->update(['Status' => 'Checked up']);



        // $user = PatientCheckUpDetails::find($request->PatientID)->get();

        // return $user;
        // return $request->PatientID;
        // return $request;

        PatientPersonalInfo::where('id', '=', $request->patientID)->update([
            'FirstName' => $request->PatientName,
            'LastName' => $request->PatientLastName,
            'Address' => $request->PatientAddress,
            'Age' => $request->Age,
            'Gender' => $request->Gender,
            'DateOfBirth' => $request->PatientDateOfBirth,
            'PlaceOfBirth' => $request->PatientPlaceOfBirth,
            'Occupation' => $request->PatientOccupation,
            'Contact' => $request->PatientContact,
        ]);

        PatientCheckUpDetails::where('id', '=', $request->patientID)->update([
            'PatientName' => $request->PatientName,
            'DoctorName' => $request->DoctorName,
            'Diagnosis' => $request->Diagnosis,
            'LabFindings' => $request->LaboratoryFindings,
            'DateAndTimeOfCheckUp' => $request->DateAndTimeOfCheckUp,
        ]);



        // $patient_personal_infos_db = new PatientPersonalInfo();
        // $patient_personal_infos_db->id = $uniqueNumber;
        // $patient_personal_infos_db->FirstName = $request->PatientName;
        // $patient_personal_infos_db->LastName = $request->PatientLastName;
        // $patient_personal_infos_db->Address = $request->PatientAddress;
        // $patient_personal_infos_db->Age = $request->Age;
        // $patient_personal_infos_db->Gender = $request->Gender;

        // $patient_personal_infos_db->DateOfBirth = $request->PatientDateOfBirth;
        // $patient_personal_infos_db->PlaceOfBirth = $request->PatientPlaceOfBirth;
        // $patient_personal_infos_db->Occupation = $request->PatientOccupation;
        // $patient_personal_infos_db->Contact = $request->PatientContact;
        // $patient_personal_infos_db->Added_at = Carbon::now()->format('Y-m-d H:i:s');
        // $save = $patient_personal_infos_db->save();





        // $check_up_details_db = new PatientCheckUpDetails();
        // $check_up_details_db->id = $uniqueNumber;
        // $check_up_details_db->PatientName = $request->PatientName." ".$request->PatientLastName;
        // $check_up_details_db->DoctorName = $request->DoctorName;
        // $check_up_details_db->Diagnosis = $request->Diagnosis;
        // $check_up_details_db->LabFindings = $request->LaboratoryFindings;
        // $check_up_details_db->DateAndTimeOfCheckUp = $request->DateAndTimeOfCheckUp;
        // $check_up_details_db->Added_at = Carbon::now()->format('Y-m-d H:i:s');
        // $save = $check_up_details_db->save();



        Alert::success('Success', 'Successfully Updated!')->persistent(true, false);
        return redirect()->back();
    }

    public function manager_upload_patient_profile_picture(Request $request)
    {
        // dd($request);




        if ($request->hasFile('file')) {

            // return "Success"; 
            // var_dump($request);
            $file = $request->file;
            $uniqueNumber = $request->PatientID;
            $files = $request->file('file');
            // foreach ($files as $file) {


            // this code generates a unique random text 
            // $length = 10;
            // $randomText = Str::random($length);

            // Check if the generated text already exists in the database
            // while (PatientFile::where('FileName', $randomText)->exists()) {
            //     $randomText = Str::random($length);
            // }
            // End

            // This code move the file that you uploaded to the public/PatientFiles Directory
            $file_extension = $file->getClientOriginalExtension();
            // return $file_extension;
            // $filename = $file->getClientOriginalName();
            $filename = $request->patientID;
            $file->move(public_path('PatientProfiles'), $filename . "." . $file_extension);
            // End

            // Stores the informations into the database PatientFile
            $patient_file = new PatientProfile();
            $patient_file->patient_personal_info_id = $request->patientID;
            $patient_file->FileName = $filename . '.' . $file_extension;
            $patient_file->Path = 'PatientProfiles/' . $filename . '.' . $file_extension;
            $patient_file->Added_at = Carbon::now()->format('Y-m-d H:i:s');
            $save = $patient_file->save();
            // End  
            // }


            Alert::success('Success', 'Successfully Uploaded!')->persistent(true, false);
            return redirect()->back();

            // $patient_personal_info = PatientPersonalInfo::where('id','=', $uniqueNumber)->first();
            // $patient_check_up_details = PatientCheckUpDetails::where('id', '=', $uniqueNumber)->first();
            // $patient_files = PatientFile::where('patient_personal_info_id','=',$uniqueNumber)->get();

            // return redirect()->route('ManagerInitialViewCheckUpDetails', $uniqueNumber)
            //          ->with('patient_personal_info', $patient_personal_info)
            //          ->with('patient_check_up_details', $patient_check_up_details)
            //          ->with('patient_files', $patient_files);

        } else {

            return "failed";
            Alert::error('Failed', 'Failed to add a client in scheduled list.')->persistent(true, false);
            return redirect()->back();

            //   return "Please input a file";  
        }
    }


    public function manager_mark_as_checked_up(Request $request)
    {

        // return $request;
        // return "Goods";

        ScheduledList::where('id', '=', $request->ScheduledID)->update(['Status' => 'Checked up']);

        Alert::success('Success', 'Successfully Updated!')->persistent(true, false);
        return redirect()->back();
    }

    public function manager_delete_scheduled_record(Request $request)
    {

        // return $request;
        ScheduledList::find($request->ScheduledID)->delete();

        Alert::success('Success', 'Successfully Deleted!')->persistent(true, false);
        return redirect()->back();
    }
}
