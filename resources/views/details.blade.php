@extends('layouts.app')

@section('title', $filmDetail->title . ' | Movies App')
@section('description', $filmDetail->description)

@section('content')
    <div class="films-content" >

    <!-- Message d'erreur -->
    @if ($errors->any())
    <div style="position: relative;display:flex;justify-content:center">

    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li> <!-- Affiche chaque message d'erreur -->
            @endforeach
        </ul>
    </div>
    </div>

    @endif
    <!-- Message de succès -->
    @if(session('success'))
        <div style="position: relative;display:flex;justify-content:center">
        <div class="alert alert-success" style="display: flex; justify-content: center; max-width: 500px;">
            {{ session('success') }} <!-- Affiche le message de succès -->
        </div>
        </div>

    @endif

    <h1 class="films-page-title" style="font-size:30px">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="position: relative;width:50px;margin-right:12px"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#475569" d="M0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zM188.3 147.1c-7.6 4.2-12.3 12.3-12.3 20.9V344c0 8.7 4.7 16.7 12.3 20.9s16.8 4.1 24.3-.5l144-88c7.1-4.4 11.5-12.1 11.5-20.5s-4.4-16.1-11.5-20.5l-144-88c-7.4-4.5-16.7-4.7-24.3-.5z"/></svg>
        {{ $filmDetail->title }} <!-- Affiche le titre du film -->
    </h1>

    <table id="films-table" class="table-films" style="position: relative; display: inline-grid; justify-content: center;">
        <thead style="display: none;">
            <tr>
                <th>Film</th>
                
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="film-frame" style="max-width: 700px!important;">

                    <div style="position: relative;display: flex;margin:20px;width:100%;flex-wrap: wrap;justify-content: center;align-items: flex-start;">
                    <div class="square-crop" style="height:auto!important">
                    <img src="{{ $filmDetail->image_url }}" alt="{{ $filmDetail->title }}"> <!-- Affiche l'image du film -->
                    </div>
                    <!-- Boutons -->
                    <div class="film-description">
                            <!-- Description -->
                        <h2 style="position: relative;font-size:20px;font-weight:900;margin-bottom:30px;"> {{__("Description :")}}</h2>
                        <p style="position: relative; max-width: 300px;">{{$filmDetail->description}} </p> <!-- Affiche la description du film -->

                    </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    </div>
@endsection
