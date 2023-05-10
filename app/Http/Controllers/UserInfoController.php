<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use PhpParser\JsonDecoder;
use Spatie\FlareClient\View;

class UserInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // Get All User Data From Database Using Model
        $allUsers = UserInfo::all();

        // View And Send Data from View
        return View('userInfos', compact('allUsers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

        // Insert Page View
        return view('insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Form Data Validations
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|max:255',
        //     'country' => 'required',
        //     'city' => 'required|string|max:255',
        //     'state' => 'required|string|max:255',
        //     'address' => 'required',
        //     'phone' => 'required|max:15'
        // ]);


        // Make Json For Other_information Field
        $userArray = [
            "country" => $request->country,
            "city" => $request->city,
            "state" => $request->state,
            "address" => $request->address,
            "phone" => $request->phone
        ];
       
        // Make Object For UserInfo Model
        $user = new UserInfo();

        // Bind Data with object
        $user->name = $request->name;
        $user->email = $request->email;

        // Encode json data for send database
        $user->other_info = json_encode($userArray) ;

        // Save Data In Database
        $user->save();

        // Redirect Data Page WIth success message
        return redirect(route('userInfos'))->with("message", "Successfully Inserted");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Get User Data For update
        $userData = UserInfo::find($id);
        // $jsonData = json_encode($userData,true);
        // return $userData;

        // Send Data from update page with view
        return view('update', compact('userData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // Get From Data 
        $userData = UserInfo::find($id);

        // Make json Data for Send Database
        $userArray = [
            "country" => $request->country,
            "city" => $request->city,
            "state" => $request->state,
            "address" => $request->address,
            "phone" => $request->phone
        ];
        
        // Bind Data
        $userData->name = $request->name;
        $userData->email = $request->email;

        // Encode json data for send database
        $userData->other_info = json_encode($userArray);

        // Updated Data
        $userData->update();

        // Redirect to All Data Show pages With success Message
        return redirect(route('userInfos'))->with("message", "Record Update Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find Data From Database using Modal and Delete This Data
        UserInfo::where('id', $id)->delete();

        // Redirect From All Data Page With Success Message
        return redirect(route('userInfos'))->with("message", "Record Successfully Deleted");
    }
}
