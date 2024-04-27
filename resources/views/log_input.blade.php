<div class="fieldContainer">
       <input class="input"
              id="email" 
              type="text" 
              name="email" 
              placeholder="{{ $field_email }}"
              oninput="checkInput(this)"
              autocomplete="off"/> 

       <input class="input"
              id="password" 
              type="password" 
              name="pass" 
              placeholder="{{ $field_password }}"
              oninput="checkInput(this)"
              autocomplete="off"/>    
</div>   
<!-- @vite(['resources/js/app.js']) -->

<script>
function checkInput(input) {
    const text = input.value;
  
    if (text !== '') {
      input.style.color = '#a5a5a5';
      console.log(text);
    }
}
</script>