<link rel="stylesheet" href="{{ asset('css/principal.css') }}">

<div class="box {{$tipo}}">
    <div class="title">
      {{$titulo}}
    </div>
    <div class="msg">
        {{$slot}}
    </div>
    <button type="button" class="btn btn-primary">Click me</button>
</div>