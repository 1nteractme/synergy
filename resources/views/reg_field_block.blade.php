<div class="main"> 
    <div class="container">
        <p id="typing-text"><span id="span_auth">{{ $text }}</span></p>
        <form class="form" id="choosing" action="regcheck" method="post">
            @csrf

            @if($errors -> any())
                @foreach($errors -> all() as $error)
                    <p>{{ $text = $error }}</p>
                @endforeach
            @endif

            @include('reg_input')
            <button class="button" type="submit">{{ $button_text }}</button>
        </form>
    </div>        
</div>