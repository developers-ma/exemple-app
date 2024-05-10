<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto" style="position: relative; display: inline-grid; width: 100%; max-width: 900px;">
        


 
                <h1>Films</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Categories id </th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($films as $film)
                        <tr>
                            <td>{{ $film->title }}</td>
                            <td>{{ $film->description }}</td>
                            <td>{{ $film->genre_ids }}</td>
                            <td><img src="{{ $film->image_url }}" alt="{{ $film->title }}" style="max-width: 100px;"></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
   
            
             {{ $films->links() }}



    </div>

    
</x-app-layout>