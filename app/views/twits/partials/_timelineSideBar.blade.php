<h2>Compose Twit</h2>
{{ Form::open(['url' => 'twits/' . Auth::user()->username]) }}
    <div class="form-group">
        {{ Form::textarea('twit', null, ['class' => 'form-control', 'cols' => '50', 'rows' => '5']) }}
        {{ $errors->first() }}
    </div>
    <div class="form-group">
        {{ Form::submit('Twit', ['class' => 'btn btn-primary']) }}
    </div>
    
{{ Form::close() }}

