@extends('layouts.app')
        <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SmartScan</title>

</head>
<body>

<form id="uploadForm" method="POST" action="{{ url('/storeSCUT') }}" enctype="multipart/form-data">
    @csrf
    <article id="one" class="one">
        <div class="content">
            <div class="inner">
                <header>
                    <h2 style="margin-left: 5%">Scan Smart Contract for DOS Vulnerability</h2>
                </header>
                <div style="margin-left: 5%; color: red; font-size: 22px; font-weight: bold;"> {{$processError ?? " "}} </div>
                <label class="control-label" style="margin-left: 5%" >Enter a name for your Smart Contract</label>
                <textarea class="form-control"  rows="1"  id="contractName" name="filename" title="SmartContractName" required autofocus> {{$filename ?? " "}} </textarea>
                <label class="control-label" style="margin-left: 5%" >Enter the source code of your Smart Contract</label>
                <textarea class="form-control"  rows="10"  id="contractCode" name="sourcecode" title="SmartContract" required autofocus> {{$sourcecode ?? " "}} </textarea>
                <p>                        </p>
                <div class="form-group">
                    <button style="margin-left: 5%" type="submit" name="button" class="button">Scan</button>
                </div>
            </div>
        </div>
    </article>

</form>
</body>
</html>