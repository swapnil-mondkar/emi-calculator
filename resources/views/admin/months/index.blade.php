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

        .month-list {
            list-style: none;
            padding: 0;
        }

        .month-list li {
            padding: 0.75rem 1rem;
            background: #f1f5f9;
            margin-bottom: 0.75rem;
            border-radius: 6px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .month-list .actions a,
        .month-list .actions button {
            margin-left: 8px;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 1.1rem;
        }

        .month-list .actions form {
            display: inline;
        }

        .month-list .actions button:hover {
            color: red;
        }
    </style>

    <div class="header-actions">
        <a href="{{ route('admin.dashboard') }}">← Back to Dashboard</a>
        <a href="{{ route('months.create') }}">➕ Add Month</a>
    </div>

    <h2>📅 Tenure Options (Months)</h2>

    <ul class="month-list">
        @forelse ($months as $month)
            <li>
                {{ $month->value }} months
                <div class="actions">
                    <a href="{{ route('months.edit', $month) }}" title="Edit">✏️</a>
                    <form action="{{ route('months.destroy', $month) }}" method="POST" onsubmit="return confirm('Delete this month?')">
                        @csrf @method('DELETE')
                        <button type="submit" title="Delete">🗑️</button>
                    </form>
                </div>
            </li>
        @empty
            <li>No tenures defined yet.</li>
        @endforelse
    </ul>
</x-layout>
