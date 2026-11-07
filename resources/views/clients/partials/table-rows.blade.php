@forelse ($clients as $client)
    <tr>
        <td>{{ $client->id }}</td>
        <td>
            <a href="/clients/{{ $client->id }}">
                {{ $client->name }}
            </a>
        </td>
        <td>{{ $client->address }}</td>
        <td>{{ $client->contact_information }}</td>
        <td>
            <form action="/clients/{{ $client->id }}" method="POST"
                onsubmit="return confirm('Are you sure you want to permanently delete this client and all associated records?');">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="5">No clients found.</td>
    </tr>
@endforelse