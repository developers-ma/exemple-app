@extends('layouts.app')

@section('title', $film->title . ' | Movies App')
@section('description', $film->description)

@section('content')
<div class="films-content" >

<!-- Message d'erreur-->
@if ($errors->any())
<div style="position: relative;display:flex;justify-content:center">

<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li> <!-- Affiche les erreurs -->
        @endforeach
    </ul>
</div>
</div>

@endif
<!-- Message de succès-->
@if(session('success'))
    <div style="position: relative;display:flex;justify-content:center">
    <div class="alert alert-success" style="display: flex; justify-content: center; max-width: 500px;">
        {{ session('success') }} <!-- Affiche le message de succès -->
    </div>
    </div>

@endif

        
<form action="{{ route('film.update', $film) }}" method="POST" id="films-table" class="table-films" style="position: relative; display: inline-grid; justify-content: center;">
    @csrf <!-- Protection contre les attaques de type CSRF -->
    @method('PUT') <!-- Méthode HTTP pour mettre à jour -->

<h1 class="films-page-title" style="font-size:30px">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="position: relative;width:50px;margin-right:12px"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#475569" d="M0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zM188.3 147.1c-7.6 4.2-12.3 12.3-12.3 20.9V344c0 8.7 4.7 16.7 12.3 20.9s16.8 4.1 24.3-.5l144-88c7.1-4.4 11.5-12.1 11.5-20.5s-4.4-16.1-11.5-20.5l-144-88c-7.4-4.5-16.7-4.7-24.3-.5z"/></svg>

    <input style="width: 100%; max-width: 600px;border: 1px solid #4CAF50;border-radius: 12px;" type="text" class="form-control" id="title" name="title" value="{{ $film->title }}" placeholder="Le Nom du film *" required> <!-- Champ de saisie pour le titre du film -->

</h1>

    <div>
        <div>
            <div class="film-frame" style="max-width: 700px!important;">

                <div style="position: relative;display: flex;margin:20px;width;100%;flex-wrap: wrap;justify-content: center;align-items: center;">
                <div class="square-crop">
                <img src="{{ $film->image_url }}" alt="{{ $film->title }}"> <!-- Affichage de l'image -->

                </div>
                <!-- Boutons -->
                <div style="position: relative; margin: 14px;">
                    <!-- URL de l'image -->
                    <input type="text" class="form-control" style="width: 100%; max-width: 600px;border: 1px solid #4CAF50;margin-bottom: 12px;border-radius: 6px;" id="image_url" name="image_url" value="{{ $film->image_url }}" placeholder="L'URL de l'image *" required>

                    <!-- Description -->
                    <p style="position: relative; max-width: 300px;">
                        <textarea class="form-control" style="width: 100%; max-width: 600px;border: 1px solid #4CAF50;border-radius: 6px;" id="description" name="description" rows="10" cols="50" placeholder="Description*" required>{{ $film->description }}</textarea>
                    
                    </p>

                </div>
                </div>

                
            </div>

        </div>
    </div>
    <button type="submit" class="btn btn-primary" style="background: #4CAF50; color: #fff; width: 100%; max-width: 200px; margin-top: 20px; margin-left: 20px;">Mettre à jour</button> <!-- Bouton de mise à jour -->

</form>

<a href="{{route("films.index")}}"><button class="btn btn-primary" style="background: #fff; color: #000; width: 100%; max-width: 200px; margin: 20px">Annuler</button></a> <!-- Bouton d'annulation -->

</div>
@endsection
