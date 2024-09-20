<x-app-layout>
    @slot('header')
        {{ '施設一覧' }}
    @endslot

    {{-- 施設一覧表示 --}}
    <div class="max-w-4xl mx-auto mt-5">
        <div class="bg-white shadow-sm sm:rounded-lg p-6">
            @foreach ($facilities as $facility)
                <a href="{{ route('reservations.create', $facility) }}">
                    <div class="border border-solid border-black py-1 px-3 rounded-md hover:bg-gray-300">
                        {{ $facility->facility_name }}
                    </div>
                    </td>
            @endforeach
        </div>
    </div>
</x-app-layout>
