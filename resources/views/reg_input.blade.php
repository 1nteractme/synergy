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

<div class="fieldContainer">
       <input class="input"
              id="first_name" 
              type="text" 
              name="first_name" 
              placeholder="{{ $filed_first_name }}"
              oninput="checkInput(this)"
              autocomplete="off"/>     

       <input class="input"
              id="second_name" 
              type="text" 
              name="second_name" 
              placeholder="{{ $filed_second_name }}"
              oninput="checkInput(this)"
              autocomplete="off"/>   
</div>
<div class="fieldContainer">
       <input class="input"
              id="last_name" 
              type="text" 
              name="last_name" 
              placeholder="{{ $filed_last_name }}"
              oninput="checkInput(this)"
              autocomplete="off"/>   

       <input class="input"
              id="passport_series" 
              type="text" 
              name="passport_series" 
              placeholder="{{ $filed_passport_series }}"
              oninput="checkInput(this)"
              autocomplete="off"/> 
</div>
<input class="input"
       id="passport_number" 
       type="text" 
       name="passport_number" 
       placeholder="{{ $filed_passport_number }}"
       oninput="checkInput(this)"
       autocomplete="off"/>
       
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