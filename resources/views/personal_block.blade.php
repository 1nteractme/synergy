<div class="main"> 
    <div class="container">
        <div class="switcher">
            <div id="object1" class="userInfo">
                <div class="userData">
                    <p class="title"> {{ $userData }} </p>
                    <p class="subTitle">{{ $second_name }} {{ $first_name }} {{ $last_name }}</p>      
                </div>
                <div class="passportData">
                    <p class="title"> {{ $passportData }} </p>
                    <p class="subTitle">Серия: {{ $passport_series }}<br>Номер: {{ $passport_number }}</p> 
                </div>
                <div class="emailData">
                    <p class="title"> {{ $emailData }} </p>
                    <p class="subTitle">{{ $email }}</p> 
                </div>
            </div>

            <div id="object2" class="ChangeData inactive">
                @include('change_data')
            </div>
        </div>

        <button class="btnCircle" onclick="toggleObjects()"><p>Изменить</p></button>

        <script>
            function toggleObjects() {
              var obj1 = document.getElementById("object1");
              var obj2 = document.getElementById("object2");

              if (obj1.classList.contains("active")) {
                obj1.classList.remove("active");
                obj1.classList.add("inactive");
                obj2.classList.remove("inactive");
                obj2.classList.add("active");
              } else {
                obj1.classList.remove("inactive");
                obj1.classList.add("active");
                obj2.classList.remove("active");
                obj2.classList.add("inactive");
              }
            }
        </script>
    </div>
</div>