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
    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden" style="border-radius: 12px;width: 100%; min-width: 300px;">
        <div class="p-4">
            <!-- Formulaire de recherche de genre -->
            <form>
                <input wire:model.live="genreTitle" type="text" class="bg-gray-100 border-2 border-gray-200 rounded-lg p-2 w-full" placeholder="Rechercher un genre...">
            </form>
        </div>
        <div class="overflow-x-auto">
            <!-- Tableau des genres -->
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <!-- En-tête du tableau -->
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-4 py-3">{{__("Catégories")}}</th>
                        <th scope="col" class="px-4 py-3">{{__("Identifiant")}}</th>
                    </tr>
                </thead>
                <!-- Corps du tableau -->
                <tbody>
                    @forelse($genres as $genre)
                        <tr class="border-b dark:border-gray-700" wire:key="genre-{{ $genre->id }}">
                            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $genre->name }}</td>
                            <td class="px-4 py-3">{{ $genre->genre_id }}</td>
                        </tr>
                    @empty
                        <!-- Aucun catégorie trouvé -->
                        <tr>
                            <td class="px-6 py-4 text-sm" colspan="3">
                                {{__("Aucune catégorie n'a été trouvée.")}}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <!-- Pagination -->
    <div style="position: relative; margin-top: 20px;display: flex; justify-content: center;">
        {{ $genres->links() }}
    </div>
</div>
