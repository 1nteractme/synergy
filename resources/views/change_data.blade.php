<div class="popup">
    <form class="form" id="change" action="changedata" method="post">
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