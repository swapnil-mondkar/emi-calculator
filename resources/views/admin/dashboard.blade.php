<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9fafb;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #1f2937;
            color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            margin: 0;
            font-size: 1.5rem;
        }

        .logout-btn {
            background-color: #ef4444;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .logout-btn:hover {
            background-color: #dc2626;
        }

        .content {
            padding: 2rem;
            max-width: 900px;
            margin: auto;
        }

        .content h2 {
            font-size: 1.25rem;
            margin-bottom: 1.5rem;
            color: #111827;
        }

        .nav-links {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .nav-links a {
            display: inline-block;
            padding: 0.75rem 1.25rem;
            background-color: #2563eb;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .nav-links a:hover {
            background-color: #1e40af;
        }

        @media (min-width: 600px) {
            .nav-links {
                flex-direction: row;
            }
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>Admin Dashboard</h1>
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>

    <div class="content">
        <h2>Welcome, Admin</h2>
        <div class="nav-links">
            <a href="{{ route('months.index') }}">📅 Manage Tenures</a>
            <a href="{{ route('emi.index') }}">📈 Manage EMI Rules</a>
            <a href="{{ route('calculator.form') }}">🧮 Public EMI Calculator</a>
        </div>
    </div>

</body>
</html>
