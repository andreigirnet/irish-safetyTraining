@if(request()->is('product/*'))
<div class="subNavContainer">
    <div class="subInnerNav">
        <div class="langPicker">
            <div class="langText">Please choose your language:</div>
            <img x-on:click="chooseLanguage('en')" src="{{asset('images/flags/en.png')}}" alt="">
            <img x-on:click="chooseLanguage('ro')" src="{{asset('images/flags/ro.png')}}" alt="">
            <img x-on:click="chooseLanguage('ru')" src="{{asset('images/flags/ru.png')}}" alt="">
            <img x-on:click="chooseLanguage('pl')" src="{{asset('images/flags/pl.png')}}" alt="">
            <img x-on:click="chooseLanguage('sp')" src="{{asset('images/flags/sp.png')}}" alt="">
        </div>
    </div>
</div>
    @endif

