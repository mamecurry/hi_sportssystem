<x-app-layout>
    @slot('header')
        {{ __('予約内容確認') }}
    @endslot

    <div class="max-w-4xl mx-auto py-10 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <h2 class="text-lg font-medium">{{ $facility->facility_name }}</h2>
            <p>住所: {{ $facility->address }}</p>
            <p>利用可能時間: {{ $facility->available_hours }}</p>

            <form action="{{ route('reservations.store') }}" method="POST">
                @csrf
                <input type="hidden" name="facility_id" value="{{ $facility->id }}">

                <!-- 予約可能な時間帯を表示 -->
                <div class="mt-10">
                    <h3>{{ __('予約可能な時間帯') }}</h3>
                    @foreach ($availableTimes as $time)
                        <div>
                            <label>
                                <input type="checkbox" name="time_slots[]" value="{{ $time }}">
                                {{ $time }}
                            </label>
                        </div>
                    @endforeach
                </div>

                <!-- 確認ボタン -->
                <div class="mt-10">
                    <input type="submit" value="{{ __('予約を確定') }}" class="border border-black px-3 py-1">
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
