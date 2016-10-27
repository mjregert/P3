<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('password.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        # Validate the user data

        # Read the word list from an external file into an array
        $wordList = file("nounlist.txt");

        # Read the symbols from an external file into an array
        $symbolList = file("symbols.txt");


        # Although the array was already shuffled when read in, use array_rand to get random entries
        $keys = array_rand($wordList, $request->wordCount);

        # Convert the "Include Number" checkbox value ("on", "off") to a boolean
        $includeNumber = isset($request->includeNumber) && $request->includeNumber == "on";

        # Convert the "Include Symbol" checkbox value ("on", "off") to a boolean
        $includeSymbol = isset($request->includeSymbol) && $request->includeSymbol == "on";

        # Build the password
        $output = "";


        $iteration = 1;
        foreach ($keys as $key) {
            # Get the word at key
            $word = trim($wordList[$key]);

            # Concatinate each randomly selected word to the overall password
            # Using trim to remove spaces
            $output .= trim($word);
            if ($iteration < $request->wordCount) {
                $output .= "-";
            } #end if
            $iteration++;
        } #end foreach loop

        # If the include numbers checkbox was selected, add a random number to the end
        if ($includeNumber) {
            $output .= rand(0,9);
        } #end if

        # If the include symbols checkbox was selected, add a symbol to the end
        if ($includeSymbol) {
            $output .= $symbolList[array_rand($symbolList, 1)];
        } #end if


        /* Return a view and pass back output here, also remember old */
        return view('password.show')->with('output', $output);
//        return 'Password is '.$output;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
