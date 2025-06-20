<x-layout>
    <h2>{{ isset($month) ? 'Edit' : 'Add' }} Month</h2>

    <form method="POST" action="{{ isset($month) ? route('months.update', $month) : route('months.store') }}">
        @csrf
        @if(isset($month)) @method('PUT') @endif
        <input type="number" name="value" value="{{ old('value', $month->value ?? '') }}" placeholder="e.g. 6" required />
        <button type="submit">{{ isset($month) ? 'Update' : 'Add' }}</button>
    </form>
</x-layout>
