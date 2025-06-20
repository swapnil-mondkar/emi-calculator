<?php

namespace App\Http\Controllers;

use App\Models\Month;
use Illuminate\Http\Request;

class MonthController extends Controller
{
    public function index()
    {
        $months = Month::orderBy('value')->get();
        return view('admin.months.index', compact('months'));
    }

    public function create()
    {
        return view('admin.months.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'value' => 'required|integer|unique:months,value',
        ]);

        Month::create($request->only('value'));

        return redirect()->route('months.index')->with('success', 'Month added!');
    }

    public function edit(Month $month)
    {
        return view('admin.months.edit', compact('month'));
    }

    public function update(Request $request, Month $month)
    {
        $request->validate([
            'value' => 'required|integer|unique:months,value,' . $month->id,
        ]);

        $month->update($request->only('value'));

        return redirect()->route('months.index')->with('success', 'Month updated!');
    }

    public function destroy(Month $month)
    {
        $month->delete();
        return redirect()->route('months.index')->with('success', 'Month deleted!');
    }
}

