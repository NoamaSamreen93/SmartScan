<?php
/**
 * Created by PhpStorm.
 * User: noama
 * Date: 7/9/2020
 * Time: 11:54 PM
 */

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use App\SmartContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;


class SmartContractsController extends Controller
{

    public function show($scutID)
    {
        return view('smartcontract'/*, [
            'scutID' => SmartContract::where('scutID', $scutID)->firstOrFail()

        ]*/);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('smartcontract');
    }

    public function scan()
    {
        return view('scancontract');
    }

    public function store(Request $request)
    {
        $filename = $request->get('filename');
        $sourcecode = $request->get('sourcecode');
        Storage::disk('txl')->put('SCUT.sol', $sourcecode);

        $currentuserid = Auth::user()->getAuthIdentifier();
        /*$txl =  Storage::disk('txl')->get('DOSTXL2.exe');
        $scut = Storage::disk('txl')->get('SCUT.sol');*/
        $process = new Process(['/app/txlexec.exe', '-v' , 'SCUT.sol']);
            $process->run();

        if (!$process->isSuccessful()) {
            $processError = $process->getIncrementalErrorOutput();
            return view('scancontract', ['processError' => $processError, 'filename' => $filename, 'sourcecode' =>$sourcecode]);
        }
        /*echo $process->getOutput();
        $process->stop();*/
        DB::table('smartcontracts')->insert(array(
            'userid' => $currentuserid,
            'filename' => $filename,
            'code' => $request->get('sourcecode'),
            'txloutput' => Storage::disk('txl')->get('FinalResult.txt')
        ));
        return redirect('/report');
    }
    public function report()
    {
        $sourcecode = Storage::disk('txl')->get('SCUT.sol');
        $currentuserid = Auth::user()->getAuthIdentifier();
        $smartcontract = DB::table('smartcontracts')->where('userid', $currentuserid)->orderBy('id', 'DESC')->first();
        $count = DB::table('smartcontracts')->count();
        $previoussmartcontracts = DB::table('smartcontracts')->where('userid', $currentuserid)->orderBy('id', 'DESC')->latest()->take($count)->skip(1)->get();
        return view ('report', ['smartcontract' => $smartcontract, 'previoussmartcontracts' => $previoussmartcontracts, 'sourcecode' =>$sourcecode]);
    }

}

        /* $validator = Validator::make($request->all(), [
             'sourcecode' => 'required|string|min:15|max:7500'
         ]);

         if ($validator->fails()) {

             return back()
                 ->withErrors($validator)
                 ->withInput();
         } else {*/

       /* $destinationPath='public/txl';
        $fileName = 'SCUT.sol';


        $request->get('sourcecode')->storeAs(
            $destinationPath, $fileName
        );*/

/**
 * Get a validator for an incoming registration request.
 *
 * @param  array  $data
 * @return \Illuminate\Contracts\Validation\Validator
 */
/* protected function validator(array $data)
 {
     return Validator::make($data, [
         'sourcecode' => ['required', 'string', 'max:1500'],
     ]);
 }*/

/**
 * Create a new user instance after a valid registration.
 *
 * @param  array  $data
 * @return \App\User
 */
/*protected function create(array $data)
{
    return SmartContract::create([
        'sourcecode' => $data['sourcecode'],
    ]);
}*/
/*if ($validator->fails()) {

    return back()
        ->withErrors($validator)
        ->withInput();
}else{*/

/*DB::table('smartcontracts')->insert(array(
    'code' => $request->get('sourcecode')
));

return back()->with('success', 'Thank you for your hard work!');*/

/*}*/