<div class="col-xs-6">
<div class="form-group">
    {{ Form::label($name, $id, ['class' => 'control-label']) }}
    {{ Form::text($name, $id,array_merge(['class' => 'form-control'], $attributes)) }}
</div>
</div>