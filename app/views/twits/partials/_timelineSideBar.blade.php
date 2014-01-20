<h2>Compose Twit</h2>
{{ Form::open() }}
    <div class="form-group">
        {{ Form::textarea('body', null, ['class' => 'form-control', 'cols' => '50', 'rows' => '10']) }}
    </div>
    <div class="form-group">
        {{ Form::submit('Twit', ['class' => 'btn btn-primary']) }}
    </div>
    
{{ Form::close() }}

