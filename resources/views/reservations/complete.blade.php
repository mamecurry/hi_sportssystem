<x-app-layout>
    @slot('header')
        {{ __('予約完了') }}
    @endslot

    <div class="max-w-4xl mx-auto py-10 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <h2 class="text-lg font-medium">{{ __('予約が完了しました！') }}</h2>
            <p>{{ __('ご利用ありがとうございます。') }}</p>
        </div>
    </div>
</x-app-layout>
