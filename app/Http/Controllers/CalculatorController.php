<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Month;
use App\Services\EmiCalculatorService;

class CalculatorController extends Controller
{
    protected $emiCalculator;

    public function __construct(EmiCalculatorService $emiCalculator)
    {
        $this->emiCalculator = $emiCalculator;
    }

    public function showForm()
    {
        $months = Month::orderBy('value')->get();
        return view('calculator.form', compact('months'));
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1000',
            'month_id' => 'required|exists:months,id',
        ]);

        $result = $this->emiCalculator->calculate($request->amount, $request->month_id);

        if (!$result) {
            return back()->withErrors(['amount' => 'No EMI rule found for this amount and tenure.'])->withInput();
        }

        return view('calculator.result', [
            'amount' => $request->amount,
            'months' => $result['months'],
            'emi' => $result['emi'],
            'total' => $result['total'],
            'totalInterest' => $result['totalInterest'],
        ]);
    }
}
