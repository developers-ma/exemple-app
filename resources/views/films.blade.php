<div class="container">
    <h1>Films</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($films as $film)
            <tr>
                <td>{{ $film->title }}</td>
                <td>{{ $film->description }}</td>
                <td><img src="{{ $film->image_url }}" alt="{{ $film->title }}" style="max-width: 100px;"></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>