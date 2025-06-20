<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>EMI Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f4f8;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 5rem auto;
            background: white;
            padding: 2rem 2.5rem;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 1.5rem;
            color: #333;
        }

        form label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
            color: #555;
        }

        form input,
        form select {
            width: 100%;
            padding: 0.75rem;
            margin-bottom: 1.2rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }

        form button {
            width: 100%;
            padding: 0.75rem;
            background-color: #007bff;
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
        }

        form button:hover {
            background-color: #0056b3;
        }

        .back-link {
            display: block;
            margin-bottom: 1.5rem;
            text-align: center;
            text-decoration: none;
            color: #007bff;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .error-message {
            color: red;
            font-size: 0.9rem;
            margin-top: -10px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    <div class="container">
        <a href="{{ route('admin.dashboard') }}" class="back-link">← Back to Dashboard</a>

        <h2>EMI Calculator</h2>

        <form action="{{ route('calculator.calculate') }}" method="POST">
            @csrf

            <label for="amount">Loan Amount (₹):</label>
            <input type="number" id="amount" name="amount" required value="{{ old('amount') }}">
            @error('amount')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <label for="month_id">Tenure (Months):</label>
            <select name="month_id" id="month_id" required>
                <option value="">-- Select Tenure --</option>
                @foreach($months as $month)
                    <option value="{{ $month->id }}" {{ old('month_id') == $month->id ? 'selected' : '' }}>
                        {{ $month->value }} months
                    </option>
                @endforeach
            </select>

            <button type="submit">Calculate EMI</button>
        </form>
    </div>

</body>
</html>
