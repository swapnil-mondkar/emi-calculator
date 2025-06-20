<x-layout>
    <style>
        .header-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .header-actions a {
            text-decoration: none;
            background-color: #2563eb;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            font-weight: bold;
            font-size: 0.95rem;
        }

        .header-actions a:hover {
            background-color: #1e40af;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
            background: #ffffff;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 0.75rem 1rem;
            border-bottom: 1px solid #e5e7eb;
            text-align: left;
        }

        th {
            background-color: #f3f4f6;
            font-weight: bold;
            color: #374151;
        }

        td {
            color: #333;
        }

        td:last-child {
            white-space: nowrap;
        }

        .action-icons a,
        .action-icons button {
            font-size: 1.1rem;
            margin-left: 6px;
            background: none;
            border: none;
            cursor: pointer;
        }

        .action-icons button:hover {
            color: red;
        }

        .action-icons form {
            display: inline;
        }
    </style>

    <div class="header-actions">
        <a href="{{ route('admin.dashboard') }}">← Back to Dashboard</a>
        <a href="{{ route('emi.create') }}">➕ Add EMI Rule</a>
    </div>

    <h2>📊 EMI Combinations</h2>

    <table>
        <thead>
            <tr>
                <th>Tenure (Months)</th>
                <th>Amount Range</th>
                <th>Interest Rate (%)</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($combinations as $c)
                <tr>
                    <td>{{ $c->month->value }} months</td>
                    <td>₹{{ number_format($c->min_amount) }} - ₹{{ number_format($c->max_amount) }}</td>
                    <td>{{ $c->interest_rate }}%</td>
                    <td class="action-icons">
                        <a href="{{ route('emi.edit', $c) }}" title="Edit">✏️</a>
                        <form action="{{ route('emi.destroy', $c) }}" method="POST" onsubmit="return confirm('Delete this rule?')">
                            @csrf @method('DELETE')
                            <button type="submit" title="Delete">🗑️</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No EMI rules defined yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</x-layout>
