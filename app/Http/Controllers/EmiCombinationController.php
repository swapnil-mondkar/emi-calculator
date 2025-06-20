<?php

namespace App\Http\Controllers;

use App\Models\EmiCombination;
use App\Models\Month;
use Illuminate\Http\Request;

class EmiCombinationController extends Controller
{
    public function index()
    {
        $combinations = EmiCombination::with('month')->latest()->get();
        return view('admin.emi.index', compact('combinations'));
    }

    public function create()
    {
        $months = Month::orderBy('value')->get();
        return view('admin.emi.create', compact('months'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'month_id' => 'required|exists:months,id',
            'min_amount' => 'required|integer|min:0',
            'max_amount' => 'required|integer|gt:min_amount',
            'interest_rate' => 'required|numeric|min:0',
        ]);

        EmiCombination::create($request->only([
            'month_id',
            'min_amount',
            'max_amount',
            'interest_rate',
        ]));

        return redirect()->route('emi.index')->with('success', 'EMI rule created.');
    }

    public function edit(EmiCombination $emi)
    {
        $months = Month::orderBy('value')->get();
        return view('admin.emi.edit', compact('emi', 'months'));
    }

    public function update(Request $request, EmiCombination $emi)
    {
        $request->validate([
            'month_id' => 'required|exists:months,id',
            'min_amount' => 'required|integer|min:0',
            'max_amount' => 'required|integer|gt:min_amount',
            'interest_rate' => 'required|numeric|min:0',
        ]);

        $emi->update($request->all());

        return redirect()->route('emi.index')->with('success', 'EMI rule updated.');
    }

    public function destroy(EmiCombination $emi)
    {
        $emi->delete();
        return redirect()->route('emi.index')->with('success', 'EMI rule deleted.');
    }
}
