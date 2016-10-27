@extends('layouts.subpage')

@section('content')
    <section>
        <h2>Random Password Generator</h2>
        <p>Create a random password for your applications. Like Lorem Ipsum, but for passwords.</p>
        <form method='GET' action='passwords/create'>
            <fieldset>
                <legend>Password Generator Options:</legend>
                <span>
                    <label>Number of Words:</label>
                    <input type="number"
                           name="wordCount"
                           min="1"
                           max="5"
                           value="4"
                    />
                </span>
                <br>
                <span>
                    <!-- Note, label intentionally placed after checkbox per standard UXD guidelines -->
                    <input type="checkbox"
                           name="includeNumber"
                    />
                    <label>Include a Number</label>
                </span>
                <br>
                <span>
                    <!-- Note, label intentionally placed after checkbox per standard UXD guidelines -->
                    <input type="checkbox"
                           name="includeSymbol"
                    />
                    <label>Include a Symbol</label>
                </span>
                <br>
                <br>
                <span>
                    <label><em>Click submit to generate a random password with the parameters above.</em></label>
                    <input type="submit" value="Submit">
                </span>
          </fieldset>
        </form>
    </section>
@stop
