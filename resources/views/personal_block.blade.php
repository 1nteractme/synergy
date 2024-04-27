<div class="main"> 
    <div class="container">
        <div class="userInfo">
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
    </div>
</div>