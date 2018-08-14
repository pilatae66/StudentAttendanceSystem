<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Students;
use App\Contribution;
use Illuminate\Http\Request;
use App\SchoolStatus;
use Auth;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = SchoolStatus::first();
        $payments = Payment::where('school_year', $status->school_year)->where('semester', $status->semester)->orderBy('created_at', 'DEC')->get();
    
        return view('payment.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $status = SchoolStatus::first();
        // return $id;
        $contributions = Contribution::where('cont_title','!=', 'Uniform')->where('semester', $status->semester)->where('school_year', $status->school_year)->get();
        $contributes = Contribution::where('cont_title','!=', 'Uniform')->where('semester', $status->semester)->where('school_year', $status->school_year)->get();
        // return $contributions;
        $payments = Payment::where('stud_id', $id)->where('semester', $status->semester)->where('school_year', $status->school_year)->get();
        // return $payments;
        $pay = [];
        foreach ($contributions as $key => $contribution) {
            $pay[$key] = $contribution->cont_amount - $payments->where('pay_type', $contribution->cont_title)->sum('pay_amount');
            // print($contribution->cont_amount - $payments->where('pay_type', $contribution->cont_title)->sum('pay_amount'). " ");
            if($pay[$key] == 0){
                // print($key);
                // print($contribution->cont_title);
                $contributions->forget($key);
            }

        }
        // dd($pay);
        // return $contributes;
        $student = Students::where('stud_id', $id)->first();
        return view('payment.create', compact('student', 'contributions', 'pay', 'contributes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'pay_type' => 'required',
            'pay_amount' => 'required',
        ]);

        $status = SchoolStatus::first();

        $payment = new Payment;
        $payment->stud_id = $request->stud_id;
        $payment->pay_type = $request->pay_type;
        $payment->pay_amount = $request->pay_amount;
        $payment->pay_to = Auth::user()->id;
        $payment->semester = $status->semester;
        $payment->school_year = $status->school_year;

        $payment->save();

        alert()->success('Paid', 'Successfully')->toToast('top');
        return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
