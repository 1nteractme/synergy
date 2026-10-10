<div class="main"> 
    <div class="container">
        <p id="typing-text"><span id="span_auth">{{ $text }}</span></p>
        <form class="form" id="choosing" @if(!($staticExport ?? false)) action="regcheck" method="post" @else onsubmit="return false" @endif>
            @if($staticExport ?? false)
                <p role="status">Регистрация будет доступна после запуска Laravel-сервера.</p>
            @else
                @csrf
            @endif

            @if($errors -> any())
                @foreach($errors -> all() as $error)
                    <p>{{ $text = $error }}</p>
                @endforeach
            @endif

            @include('reg_input')
            <button class="button" type="submit" @disabled($staticExport ?? false)>{{ $button_text }}</button>
        </form>
    </div>        
</div>
