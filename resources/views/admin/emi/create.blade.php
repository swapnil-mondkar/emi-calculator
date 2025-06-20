<x-layout>
    <h2>{{ isset($emi) ? 'Edit' : 'Add' }} EMI Rule</h2>

    <form method="POST" action="{{ isset($emi) ? route('emi.update', $emi) : route('emi.store') }}">
        @csrf
        @if(isset($emi)) @method('PUT') @endif

        <label>Tenure (Months):</label>
        <select name="month_id" required>
            <option value="">-- Select --</option>
            @foreach($months as $month)
                <option value="{{ $month->id }}" {{ old('month_id', $emi->month_id ?? '') == $month->id ? 'selected' : '' }}>
                    {{ $month->value }} months
                </option>
            @endforeach
        </select><br><br>

        <label>Min Amount:</label>
        <input type="number" name="min_amount" value="{{ old('min_amount', $emi->min_amount ?? '') }}" required /><br><br>

        <label>Max Amount:</label>
        <input type="number" name="max_amount" value="{{ old('max_amount', $emi->max_amount ?? '') }}" required /><br><br>

        <label>Interest Rate (%):</label>
        <input type="number" step="0.01" name="interest_rate" value="{{ old('interest_rate', $emi->interest_rate ?? '') }}" required /><br><br>

        <button type="submit">{{ isset($emi) ? 'Update' : 'Create' }}</button>
    </form>
</x-layout>
