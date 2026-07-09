@extends('layouts.app')
@section('content')

    {{-- Hero --}}
    <section class="mb-14">
        <h1 class="max-w-3xl text-5xl font-bold leading-[1.02] tracking-tight sm:text-6xl">
            Dairy farms &amp; cheese artisans, neatly managed.
        </h1>
        <p class="mt-6 max-w-2xl text-lg leading-relaxed text-neutral-600">
            This is an assessment for Van Ons backend developers. Add dairy farms and cheese artisans
            below, and link them together.
        </p>
        <div class="mt-6 flex flex-wrap gap-2">
            <span class="pill">Laravel 13</span>
            <span class="pill">PHP 8.5</span>
            <span class="pill">Tailwind v4</span>
        </div>
    </section>

    @if (session('success'))
        <div class="mb-12 flex items-center gap-3 rounded-2xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-emerald-800">
            <span class="grid h-6 w-6 shrink-0 place-items-center rounded-full bg-emerald-500 text-sm text-white">&check;</span>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endif

    {{-- Dairy farms --}}
    <section class="mb-16">
        <div class="mb-6 flex items-end justify-between gap-4">
            <h2 class="text-3xl font-bold tracking-tight">Dairy farms</h2>
            <span class="pill">{{ $dairyFarms->count() }} total</span>
        </div>

        <div class="grid items-start gap-6 lg:grid-cols-2">
            {{-- Create form --}}
            <div class="rounded-3xl border border-neutral-200 bg-white p-6 shadow-sm sm:p-7">
                <h3 class="mb-5 text-lg font-semibold">Add a dairy farm</h3>
                <form method="post" action="{{ route('dairy-farms.store') }}" class="space-y-5">
                    @csrf

                    <div class="space-y-1.5">
                        <label class="field-label" for="df-name">Name</label>
                        <input id="df-name" class="field-input" type="text" name="name" placeholder="De Groene Weide" />
                    </div>

                    <div class="space-y-1.5">
                        <label class="field-label" for="df-cows">Number of cows</label>
                        <input id="df-cows" class="field-input" type="number" name="number_of_cows" placeholder="100" />
                    </div>

                    <div class="space-y-1.5">
                        <label class="field-label" for="df-quality">Milk quality</label>
                        <div class="flex items-center gap-4">
                            <input id="df-quality" class="w-full accent-brand" type="range" min="0.1" max="1" step="0.1" name="milk_quality" value="0.6" oninput="this.nextElementSibling.value = this.value" />
                            <output class="min-w-12 rounded-lg bg-neutral-100 px-2 py-1 text-center text-sm font-semibold tabular-nums">0.6</output>
                        </div>
                    </div>

                    <button class="btn-primary" type="submit">
                        Create dairy farm <span aria-hidden="true">&rarr;</span>
                    </button>
                </form>
            </div>

            {{-- List --}}
            @if ($dairyFarms->isEmpty())
                <div class="grid place-items-center rounded-3xl border border-dashed border-neutral-300 bg-white/50 p-10 text-center">
                    <p class="text-lg font-semibold">No dairy farms yet</p>
                    <p class="mt-1 text-sm text-neutral-500">Create one with the form to see it here.</p>
                </div>
            @else
                <div class="overflow-x-auto rounded-3xl border border-neutral-200 bg-white shadow-sm">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b border-neutral-200 text-left text-xs uppercase tracking-wider text-neutral-500">
                                <th class="px-5 py-3.5 font-semibold">Name</th>
                                <th class="px-5 py-3.5 font-semibold">Cows</th>
                                <th class="px-5 py-3.5 font-semibold">Milk quality</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dairyFarms as $dairyFarm)
                                <tr class="border-b border-neutral-100 transition last:border-0 hover:bg-neutral-50">
                                    <td class="px-5 py-3.5 font-medium">{{ $dairyFarm->name }}</td>
                                    <td class="px-5 py-3.5 text-neutral-600 tabular-nums">{{ $dairyFarm->number_of_cows }}</td>
                                    <td class="px-5 py-3.5 text-neutral-600 tabular-nums">{{ $dairyFarm->milk_quality }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </section>

    {{-- Cheese artisans --}}
    <section>
        <div class="mb-6 flex items-end justify-between gap-4">
            <h2 class="text-3xl font-bold tracking-tight">Cheese artisans</h2>
            <span class="pill">{{ $cheeseArtisans->count() }} total</span>
        </div>

        <div class="grid items-start gap-6 lg:grid-cols-2">
            {{-- Create form --}}
            <div class="rounded-3xl border border-neutral-200 bg-white p-6 shadow-sm sm:p-7">
                <h3 class="mb-5 text-lg font-semibold">Add a cheese artisan</h3>
                <form method="post" action="{{ route('cheese-artisans.store') }}" class="space-y-5">
                    @csrf

                    <div class="space-y-1.5">
                        <label class="field-label" for="ca-name">Name</label>
                        <input id="ca-name" class="field-input" type="text" name="name" placeholder="Kaasmakerij Amsterdam" />
                    </div>

                    <div class="space-y-1.5">
                        <label class="field-label" for="ca-capacity">Production capacity</label>
                        <input id="ca-capacity" class="field-input" type="number" name="production_capacity" placeholder="500" />
                    </div>

                    <div class="space-y-1.5">
                        <label class="field-label" for="ca-rating">Rating</label>
                        <div class="flex items-center gap-4">
                            <input id="ca-rating" class="w-full accent-brand" type="range" min="1" max="10" name="rating" value="5" oninput="this.nextElementSibling.value = this.value" />
                            <output class="min-w-12 rounded-lg bg-neutral-100 px-2 py-1 text-center text-sm font-semibold tabular-nums">5</output>
                        </div>
                    </div>

                    <button class="btn-primary" type="submit">
                        Create cheese artisan <span aria-hidden="true">&rarr;</span>
                    </button>
                </form>
            </div>

            {{-- List --}}
            @if ($cheeseArtisans->isEmpty())
                <div class="grid place-items-center rounded-3xl border border-dashed border-neutral-300 bg-white/50 p-10 text-center">
                    <p class="text-lg font-semibold">No cheese artisans yet</p>
                    <p class="mt-1 text-sm text-neutral-500">Create one with the form to see it here.</p>
                </div>
            @else
                <div class="overflow-x-auto rounded-3xl border border-neutral-200 bg-white shadow-sm">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b border-neutral-200 text-left text-xs uppercase tracking-wider text-neutral-500">
                                <th class="px-5 py-3.5 font-semibold">Name</th>
                                <th class="px-5 py-3.5 font-semibold">Rating</th>
                                <th class="px-5 py-3.5 font-semibold">Production capacity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cheeseArtisans as $cheeseArtisan)
                                <tr class="border-b border-neutral-100 transition last:border-0 hover:bg-neutral-50">
                                    <td class="px-5 py-3.5 font-medium">{{ $cheeseArtisan->name }}</td>
                                    <td class="px-5 py-3.5 text-neutral-600 tabular-nums">{{ $cheeseArtisan->rating }}</td>
                                    <td class="px-5 py-3.5 text-neutral-600 tabular-nums">{{ $cheeseArtisan->production_capacity }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </section>

@endsection
