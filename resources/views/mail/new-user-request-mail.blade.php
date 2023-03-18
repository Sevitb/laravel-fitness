<h1>Заявка на звонок от пользователя:</h1>
<div style="
     display: flex;
     flex-direction: column;
     align-items: center;
     ">
    <div
        style="
        border: 0.1em solid lightgray;
        border-radius: 1em;
        padding: 1em;
        width: max-content;
        display: grid;
        gap: 0.3em;
        margin-bottom: 0.2em;
">
        <h2>ФИО пользователя:{{ $data['name'] }}</h2>
        <h2>Телефон пользователя:{{ $data['tel'] }}</h2>
        @isset($data['email'])
            <h2>Email: {{ $data['email'] }}</h2>
        @endisset
        @isset($data['coach'])
            <h2>К тренеру: {{ $data['coach'] }}</h2>
        @endisset
    </div>
</div>
