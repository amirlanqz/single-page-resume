<!doctype html>
@php /** @var \App\DataObjects\Resume $resume */ @endphp
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/js/app.js'])
    <title>{{ $resume->basics->name }}</title>
</head>
<body class="text-gray-800 bg-gray-50">
    <main class="mx-auto px-4 py-10 max-w-4xl">
        <header class="mb-12">
            <h1 class="text-4xl font-bold text-gray-900">
                {{ $resume->basics->name }}
            </h1>
            <h2 class="text-xl font-medium text-blue-600 mt-1">
                {{ $resume->basics->label }}
            </h2>
            <div class="mt-4 flex gap-3 text-gray-700">
                @if($resume->basics->email)
                    <div>
                        <a href="mailto:{{ $resume->basics->email }}" class="hover:text-blue-600 mr-4">
                            {{ $resume->basics->email }}
                        </a>
                    </div>
                @endif
                @if($resume->basics->location->city && $resume->basics->location->region)
                    <div>
                        {{ $resume->basics->location->city }}, {{ $resume->basics->location->region }}
                    </div>
                @endif
            </div>
            @if($resume->basics->profiles)
                <div class="mt-4 flex flex-wrap gap-3">
                    @foreach($resume->basics->profiles as $profile)
                        <a href="{{ $profile->url }}" class="px-3 py-1.5 bg-white rounded-full shadow-sm text-sm">
                            {{ $profile->network }}
                        </a>
                    @endforeach
                </div>
            @endif
        </header>
    </main>
</body>
</html>
