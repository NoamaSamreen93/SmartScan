@extends('layouts.app')
        <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SmartScan</title>

</head>
<body>
<!-- One -->
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Smart Contracts Scanned</h3>
        </div>
    </div>
            <div>
                <div class="report inner">
                    <div class="panel1">
                    <a class="btn" href="#result" style="margin-left: 2%; font-size: 22px; font-weight: bold;">{{$smartcontract->filename}}</a>
                    <div id="result" style="margin-left: 5%; color: red; font-size: 20px; font-weight: bold;"> {!! nl2br($smartcontract->txloutput)  !!}</div>
                        </div>
                    <div class="panel2">
                    <textarea readonly class="form-control"  rows="30"  id="contractCode" name="sourcecode" title="SmartContract" required autofocus> {{$sourcecode ?? " "}} </textarea>
                    </div>
                </div>
                </div>
                <h3 class="panel-title"> Previously Scanned Smart Contracts </h3>
                @foreach($previoussmartcontracts as $contract)
                <div class="inner">
                    <a class="btn" href="#result" style="margin-left: 2%; font-size: 22px; font-weight: bold;">{{$contract->filename}}</a>
                    <div id="result" style="margin-left: 5%; color: red; font-size: 20px; font-weight: bold;"> {!! nl2br($contract->txloutput)  !!}</div>
                </div>
                @endforeach
    @endsection
</body>
</html>