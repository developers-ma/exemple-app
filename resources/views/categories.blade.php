<table class="table">
    <thead>
        <tr>
            <th>genre id</th>
            <th>genre name</th>
      
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $categorie)
        <tr>
            <td>{{ $categorie->genre_id }}</td>
            <td>{{ $categorie->name }}</td>

        </tr>
        @endforeach
    </tbody>
</table>