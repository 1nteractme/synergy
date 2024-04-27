<div class="main"> 
    <div class="container">
        <p id="typing-text"><span id="span_auth">{{ $span_auth }}</span> или <span id="span_reg">{{ $span_reg }}</span></p>
        
        <div class="buttons-layer">
            <a href="/log" id="log_button" class="button">{{ $auth_button }}</a>
            <a href="/reg" id="reg_button" class="button">{{ $reg_button }}</a>
        </div>
        @vite(['resources/js/app.js'])
    </div>        
</div>