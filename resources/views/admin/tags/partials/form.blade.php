<div class="form-group col-sm-12">
    {{ Form::label('name', 'Nombre:') }} <code>*</code>
    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre']) }}
</div>

<div class="form-group col-sm-12">
  {{ Form::label('slug', 'URL amigable') }} <code>*</code>
  {{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug']) }}
</div>

@section('script')
<script src="{{ asset('vendor/stringToSlug/jquery.stringToSlug.min.js') }}"></script>
<script>
$(document).ready(function(){
    $("#name, #slug").stringToSlug({
        callback: function(text){
            $('#slug').val(text);
        }
    });
});
</script>
@endsection