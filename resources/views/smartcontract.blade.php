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
<article class="post style1">
    <div class="image">
        <img src="images/pic14.jpg" alt="" data-position="5% center" />
    </div>
    <div class="content">
        <div class="inner">
            <header>
                <h2><a href="#one">Denial of Service Vulnerability</a></h2>
                <p class="info">Due to Unexpected Revert</p>
            </header>
            <p>When the flow of control is transferred to an external contract, the execution of the caller contract can fail accidentally or deliberately, which can cause a DoS state in the caller contract. The caller contract can be in a DoS state when a transaction is reverted due to a failure in an external call, or the callee contract deliberately causes the transaction to be reverted to disrupt the execution of the caller contract.</p>
            <ul class="actions">
                <li><a href="{{ url('/scanSCUT') }}" class="button">Scan Your Contract</a></li>
            </ul>
        </div>
    </div>
</article>
</body>
</html>