<?php

namespace App\Services;

use App\Models\EmiCombination;

class EmiCalculatorService
{
    public function calculate($amount, $monthId)
    {
        $emiRule = EmiCombination::where('month_id', $monthId)
            ->where('min_amount', '<=', $amount)
            ->where('max_amount', '>=', $amount)
            ->first();

        if (!$emiRule) {
            return null;
        }

        $interestRate = $emiRule->interest_rate;
        $months = $emiRule->month->value;

        $monthlyRate = $interestRate / (12 * 100);
        $emi = $amount * $monthlyRate * pow(1 + $monthlyRate, $months) / (pow(1 + $monthlyRate, $months) - 1);
        $emi = round($emi, 2);
        $total = round($emi * $months, 2);
        $totalInterest = round($total - $amount, 2);

        return [
            'emi' => $emi,
            'total' => $total,
            'totalInterest' => $totalInterest,
            'months' => $months,
            'rule' => $emiRule,
        ];
    }
}
