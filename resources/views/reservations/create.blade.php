<x-app-layout>
    @slot('header')
        {{ _('予約登録') }}
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
                                <input type="datetime-local" name="reservation_date" class="w-full">
                            </div>
                        </div>
                    </div>
                </div>



                <div class="mt-10">
                    <input type="submit" value="{{ __('確認') }}" class="border border-black px-3 py-1">
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
