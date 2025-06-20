<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>EMI Result</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f4f8;
            padding: 2rem;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .result-box {
            background: #ffffff;
            padding: 2rem 2.5rem;
            border-radius: 10px;
            max-width: 420px;
            width: 100%;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            text-align: left;
        }

        h2 {
            text-align: center;
            margin-bottom: 1.5rem;
            color: #333;
        }

        p {
            font-size: 1rem;
            color: #444;
            margin-bottom: 0.8rem;
        }

        strong {
            color: #222;
        }

        a {
            display: block;
            margin-top: 2rem;
            text-align: center;
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="result-box">
        <h2>EMI Calculation Result</h2>

        <p><strong>Loan Amount:</strong> ₹{{ number_format($amount, 2) }}</p>
        <p><strong>Tenure:</strong> {{ $months }} months</p>
        <p><strong>Monthly EMI:</strong> ₹{{ number_format($emi, 2) }}</p>
        <p><strong>Total Payable:</strong> ₹{{ number_format($total, 2) }}</p>
        <p><strong>Total Interest:</strong> ₹{{ number_format($totalInterest, 2) }}</p>

        <a href="{{ route('calculator.form') }}">← Calculate Again</a>
    </div>

</body>
</html>
