<div class="films-content">

    <!-- Message d'erreur-->
    @if ($errors->any())
    <div style="position: relative;display:flex;justify-content:center">

    <div class="alert alert-danger">
    <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    </ul>
    </div>
    </div>

    @endif
    <!-- Message de succès-->
    @if(session('success'))
    <div style="position: relative;display:flex;justify-content:center">
    <div class="alert alert-success" style="display: flex; justify-content: center; max-width: 500px;font-size:16px">
    <span> {{ session('success') }}</span>
    </div>
    </div>

    @endif

    <h1 class="films-page-title" style="text-wrap: nowrap;">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" style="position: relative;width:50px;margin-right:12px"><path fill="#475565" d="M384 160c-17.7 0-32-14.3-32-32s14.3-32 32-32H544c17.7 0 32 14.3 32 32V288c0 17.7-14.3 32-32 32s-32-14.3-32-32V205.3L342.6 374.6c-12.5 12.5-32.8 12.5-45.3 0L192 269.3 54.6 406.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l160-160c12.5-12.5 32.8-12.5 45.3 0L320 306.7 466.7 160H384z"/></svg>            
    Tendance du jour
    </h1>

<div>
    <div class="p-4" style="position: relative; display: flex; justify-content: center; flex-wrap: wrap; align-items: start; margin: 12px;">
       <!-- Formulaire de recherche -->
        <form style="margin-top: 12px; margin-left: 13px;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 20px; position: absolute; margin-top: 10px; margin-left: 10px;"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>
            <input wire:model.live="searchTitle" style="padding-left: 50px;background: #fff;border: 1px solid #1E293B;width: 100%; min-width: 300px;" type="text" class="bg-gray-100 border-2 border-gray-200 rounded-lg p-2 " placeholder="Rechercher un film...">
        </form>
      
        <!-- Formulaire de tri -->
        <form wire:submit.prevent="sortBy" style="margin-left: 12px; margin-top: 12px; position: relative; display: flex; align-items: center;">
            <select wire:model="selectedGenre" class="bg-gray-100 border-2 border-gray-200 rounded-lg p-2" style="width: 200px;border: 1px solid #1E293B;">
                <option value="">Tous les genres</option>
                @foreach($genres as $genre)
                    <option value="{{ $genre->genre_id }}">{{ $genre->name }}</option>
                @endforeach
            </select>
            
            <button type="submit" class="btn btn-primary" style="border: 1px solid #1E293B; background: #1E293B; color: #fff; margin-left: 12px; height: 40px; border-radius: 6px;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" style="position: relative; width: 20px; margin-right: 12px;"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M151.6 469.6C145.5 476.2 137 480 128 480s-17.5-3.8-23.6-10.4l-88-96c-11.9-13-11.1-33.3 2-45.2s33.3-11.1 45.2 2L96 365.7V64c0-17.7 14.3-32 32-32s32 14.3 32 32V365.7l32.4-35.4c11.9-13 32.2-13.9 45.2-2s13.9 32.2 2 45.2l-88 96zM320 480c-17.7 0-32-14.3-32-32s14.3-32 32-32h32c17.7 0 32 14.3 32 32s-14.3 32-32 32H320zm0-128c-17.7 0-32-14.3-32-32s14.3-32 32-32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H320zm0-128c-17.7 0-32-14.3-32-32s14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H320zm0-128c-17.7 0-32-14.3-32-32s14.3-32 32-32H544c17.7 0 32 14.3 32 32s-14.3 32-32 32H320z"/></svg> Trier</button>
        </form>
        
    
    </div>
    <div id="films-table" class="table-films" style="position: relative; display: inline-grid; justify-content: center;">
        <table>
            <!-- En-tête du tableau -->
            <thead style="display: none;">
                <tr>
                    <th>Film</th>
                </tr>
            </thead>
            <!-- Corps du tableau -->
            <tbody>
                @forelse($films as $film)
                 
                    
                    <tr wire:key="film-{{ $film->id }}">
                        <td class="film-frame">
							<span style="display:none"> {{$film->id}}</span>
                            <div class="film-section">
                                <div class="square-crop">
                                <img src="{{ $film->image_url }}" alt="{{ $film->title }}">
                                </div>
                                <!-- Boutons -->
                                <div style="position: relative; margin: 14px;">
                                    <h1 class="films-title">{{ $film->title }}</h1>
                                    <!-- Bouton Supprimer-->

                                    <form action="{{ route('film.destroy', $film) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button  type="submit" class="simple-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="position: relative;width:18px"><path d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"/></svg>                                        <span style="position: relative;margin-left:5px;margin-right:5px">{{__("Supprimer")}}</span>
                                        </button>
                                    </form>
                                    
                                    <!-- Bouton Modifier-->
                                    <a href="{{route("film.edit", $film->id)}}"><button class="simple-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="position: relative; width: 20px;"><path d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/></svg>
                                    <span style="position: relative;margin-left:5px;margin-right:5px">{{__("Modifier")}}</span>
                                    </button>
                                    </a>
                                    <!-- Bouton Détails-->
                                    <a href="{{route("film.details", $film->id)}}">
                                    <button class="simple-btn" style="background: #1E293B; color: #fff;">
                                    <span style="position: relative;margin-left:5px;margin-right:5px">{{__("Visualiser")}}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="position: relative; width: 20px;"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l370.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128z"/></svg>                                    </button>
                                    </a>
                                </div>
                            </div>

                            
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td class="px-6 py-4 text-sm" colspan="3">
                            Aucun film n'a été trouvé.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <!-- Liens de pagination -->
    {{ $films->links() }}
</div>
</div>
