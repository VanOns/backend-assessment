@extends('layouts.app')
@section('content')

    <h2 class="text-3xl font-bold">Van Ons Assessment</h2>
    <p class="text-gray-600 dark:text-gray-400">This is an assessment for Van Ons backend developers.</p>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 my-4">
        <div>
            <h3 class="text-2xl font-bold">Dairy farms</h3>
            <form class="grid grid-cols-2 gap-3 m-4" method="post" action="{{ route('dairy-farms.store') }}">
                @csrf

                <label>
                    Name:
                </label>
                <input type="text" name="name" />

                <label>
                    Number of cows:
                </label>
                <input type="number" name="number_of_cows" />

                <label>
                    Milk quality:
                </label>
                <div>
                    <input type="range" min="0.1" max="1" step="0.1" name="milk_quality" oninput="this.nextElementSibling.value = this.value"/>
                    <output>0.6</output>
                </div>

                <button class="bg-gray-700 p-2 rounded-md col-span-2" type="submit">
                    Create
                </button>
            </form>
        </div>
        <div class="m-4">
            @if(empty($dairyFarms))
                <p class="text-xl font-bold">
                    No dairy farms found.
                </p>
            @else
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Number of cows</th>
                            <th>Milk quality</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dairyFarms as $dairyFarm)
                            <tr>
                                <td>{{$dairyFarm->name}}</td>
                                <td>{{$dairyFarm->number_of_cows}}</td>
                                <td>{{$dairyFarm->milk_quality}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 my-4">
        <div>
            <h3 class="text-2xl font-bold">Cheese artisans</h3>
            <form method="post" class="grid grid-cols-2 gap-3 m-4" action="{{ route('cheese-artisans.store') }}">
                @csrf

                <label>
                    Name
                </label>
                <input type="text" name="name" />

                <label>
                    Production capacity
                </label>
                <input type="number" name="production_capacity" />

                <label>
                    Rating
                </label>
                <div>
                    <input type="range" min="1" max="10" name="rating" oninput="this.nextElementSibling.value = this.value"/>
                    <output>5</output>
                </div>

                <button class="bg-gray-700 p-2 rounded-md col-span-2" type="submit">
                    Create
                </button>
            </form>
        </div>
        <div class="m-4">
            @if(empty($cheeseArtisans))
                <p class="text-xl font-bold">
                    No cheese artisans found.
                </p>
            @else
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Rating</th>
                            <th>Production capacity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cheeseArtisans as $cheeseArtisan)
                            <tr>
                                <td>{{$cheeseArtisan->name}}</td>
                                <td>{{$cheeseArtisan->rating}}</td>
                                <td>{{$cheeseArtisan->production_capacity}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

@endsection
