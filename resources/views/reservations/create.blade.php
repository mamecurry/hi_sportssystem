<x-app-layout>
    @slot('header')
        {{ _('施設選択と日付入力') }}
    @endslot

    <div class="max-w-4xl mx-auto py-10 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <form action="{{ route('reservations.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mt-10 grid grid-cols-3 gap-6">
                    <h2 class="text-lg font-medium content-center">{{ __('施設選択') }}</h2>
                    <div class="mt-0 col-span-2">
                        @foreach ($facilities as $facility)
                            <label>
                                <input type="radio" name="facility_id" value="{{ $facility->id }}">
                                {{ $facility->facility_name }}<!-- facility_name を正しく表示 -->
                                </label>
                        @endforeach
                    </div>
                </div>

                <div class="mt-2 grid grid-cols-3 gap-6">
                    <h2 class="text-lg font-medium content-center">{{ __('予約日') }}</h2>
                    <div class="mt-0 col-span-2">
                        <div class="grid grid-cols-5">
                            <div class="col-span-2">
                                <input type="datetime-local" name="reservation_datetime" class="w-full">
                            </div>
                        </div>
                    </div>
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

                <div class="mt-10">
                    <input type="submit" value="{{ __('確認') }}" class="border border-black px-3 py-1">
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
