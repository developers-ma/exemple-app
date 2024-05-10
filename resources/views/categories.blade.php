<table class="table">
    <thead>
        <tr>
            <th>genre id</th>
            <th>genre name</th>
      
        </tr>
    </thead>
    <tbody>
        @foreach ($genres as $genre)
        <tr>
            <td>{{ $genre->genre_id }}</td>
            <td>{{ $genre->name }}</td>

        </tr>
        @endforeach
    </tbody>
</table>