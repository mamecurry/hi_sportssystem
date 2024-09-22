<x-app-layout>
    @slot('header')
        {{ '町内体育施設管理システム' }}
    @endslot

    <div class="max-w-4xl mx-auto mt-5">
        <div class="mx-auto" style="width: fit-content;">
            アカウントをお持ちでない方はアカウント作成
            <br>
            アカウントをお持ちの方はログインを行ってください
            </br>
        </div>
    </div>
</x-app-layout>
