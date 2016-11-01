<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //---------------------------------------------------------------------------//
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('user.create');
    }

    //---------------------------------------------------------------------------//
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        # Validate the request data
        $this->validate($request, [
            'userCount' => 'required|numeric|min:1|max:9',
        ]);

        $numberUsers = $request->userCount;

        # Read the names list from an external file into an array
        $firstnameList = file("firstnames.txt");
        $lastnameList = file("lastnames.txt");

        # Although the array was already shuffled when read in, use array_rand to get random names
        $firstnameKeys = array_rand($firstnameList, $numberUsers);
        $lastnameKeys = array_rand($lastnameList, $numberUsers);

        $initialcon = new \Initialcon();

        $output = '';

        for ($i=0; $i<$numberUsers; $i++) {
            # Get the name at key
            $firstname = trim($firstnameList[$firstnameKeys[$i]]);
            $lastname = trim($lastnameList[$lastnameKeys[$i]]);
            $email = strtolower($firstname).'.'.strtolower($lastname).'@yourdomain.com';
            $initials = $firstname[0].$lastname[0];
            $imageDataUri = $initialcon->getImageDataUri($initials, $email);
            $profile = \Lipsum::medium()->text(1);
            $output .= '<p> <img src="'.$imageDataUri.'" style="float:left;margin-right:2em;"><b>Name:</b> '.$firstname.' '.$lastname.'<br><b>Email Address:</b> '.$email.'<br><b>Profile:</b> '.$profile.'</p><br><br>';

        }


        /* Return a view and pass back output here */
        return view('user.create')->with('output', $output);
    }
}
