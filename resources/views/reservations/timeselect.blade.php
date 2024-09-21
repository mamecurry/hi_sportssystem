<x-app-layout>
    @slot('header')
        {{ __('予約時間選択') }}
    @endslot

    <form action="{{ route('reservations.store') }}" method="POST">
        @csrf
        <input type="hidden" name="facility_id" value="{{ $facility->id }}">
        <input type="hidden" name="reservation_datetime" value="{{ $reservation_datetime }}">

        <div class="mt-10">
            <h3>{{ __('施設') }}: {{ $facility->facility_name }}</h3>
            <h3>{{ __('予約日') }}: {{ $reservation_datetime }}</h3>
        </div>

            <!-- 時間帯リスト -->
            <div class="mt-10">
                <h3>{{ __('予約可能な時間帯') }}</h3>
                <div>
                    <label>
                        <input type="checkbox" name="time_slots[]" value="9:00~10:00">
                        9:00~10:00
                    </label>
                </div>
                <div>
                    <label>
                        <input type="checkbox" name="time_slots[]" value="10:00~11:00">
                        10:00~11:00
                    </label>
                </div>
                <div>
                    <label>
                        <input type="checkbox" name="time_slots[]" value="11:00~12:00">
                        12:00~13:00
                    </label>
                </div>
                <div>
                    <label>
                        <input type="checkbox" name="time_slots[]" value="13:00~14:00">
                        13:00~14:00
                    </label>
                </div>
                <div>
                    <label>
                        <input type="checkbox" name="time_slots[]" value="14:00~15:00">
                        14:00~15:00
                    </label>
                </div>
                <div>
                    <label>
                        <input type="checkbox" name="time_slots[]" value="15:00~16:00">
                        15:00~16:00
                    </label>
                </div>
                <div>
                    <label>
                        <input type="checkbox" name="time_slots[]" value="17:00~18:00">
                        17:00~18:00
                    </label>
                </div>
                <div>
                    <label>
                        <input type="checkbox" name="time_slots[]" value="18:00~19:00">
                        18:00~19:00
                    </label>
                </div>
                <div>
                    <label>
                        <input type="checkbox" name="time_slots[]" value="19:00~20:00">
                        19:00~20:00
                    </label>
                </div>
                <div>
                    <label>
                        <input type="checkbox" name="time_slots[]" value="20:00~21:00">
                        20:00~21:00
                    </label>
                </div>
            </div>

            <!-- 確認ボタン -->
            <div class="mt-10">
            <form action="{{ route('reservations.complete') }}" method="POST">
                @csrf 
                <button class="border border-black px-3 py-1">
                    {{ __('確認') }}
                </button>
            </div>
        </div>
    </div>
</x-app-layout>
