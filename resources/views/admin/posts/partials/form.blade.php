<div class="form-group col-sm-12">
    {{ Form::label('category_id', 'Categorías:') }} <code>*</code>
    {{ Form::select('category_id', $categories, null,['class' => 'form-control']) }}
</div>

<div class="form-group col-sm-12">
    {{ Form::label('name', 'Nombre:') }} <code>*</code>
    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre']) }}
</div>

<div class="form-group col-sm-12">
  {{ Form::label('slug', 'URL amigable') }} <code>*</code>
  {{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug']) }}
</div>

<div class="form-group col-sm-12">
  {!! Form::label('image_index','Selecciona una imagen para inicio:',['class'=>'mt-3']) !!} <strong>(783 x 439 px)</strong><code>*</code>
  <div class="input-group">
      <span class="input-group-btn">
          <a id="lfm_index" data-input="thumbnail_index" data-preview="holder_index" class="btn btn-primary text-white">
          <i class="far fa-image"></i> Elegir
          </a>
      </span> 
      {!! Form::text('image_index',null,['class'=>'form-control','id'=>'thumbnail_index']) !!}
  </div>
  <div id="holder_index" style="margin-top:15px;max-height:100px;">
  @if (Route::currentRouteName()=="posts.edit")
      <img src="{{ $post->image_index }}" alt="" style="height:5rem">
  @endif
  </div>
</div>

<div class="form-group col-sm-12">
  {!! Form::label('image_carrousel','Selecciona una imagen para carrusel:',['class'=>'mt-3']) !!} <strong>(703 x 507 px)</strong><code>*</code>
  <div class="input-group">
      <span class="input-group-btn">
          <a id="lfm_carrusel" data-input="thumbnail_carrusel" data-preview="holder_carrusel" class="btn btn-primary text-white">
          <i class="far fa-image"></i> Elegir
          </a>
      </span>
      {!! Form::text('image_carrousel',null,['class'=>'form-control','id'=>'thumbnail_carrusel']) !!}
  </div>
  <div id="holder_carrusel" style="margin-top:15px;max-height:100px;">
  @if (Route::currentRouteName()=="posts.edit")
      <img src="{{ $post->image_carrousel }}" alt="" style="height:5rem">
  @endif
  </div>
</div>

<div class="form-group col-sm-12">
  {!! Form::label('image_post','Selecciona una imagen para el post:',['class'=>'mt-3']) !!} <strong>(1435 x 810 px)</strong><code>*</code>
  <div class="input-group">
    <span class="input-group-btn">
        <a id="lfm_post" data-input="thumbnail_post" data-preview="holder_post" class="btn btn-primary text-white">
        <i class="far fa-image"></i> Elegir
        </a>
    </span>
    {!! Form::text('image_post',null,['class'=>'form-control','id'=>'thumbnail_post']) !!}
    </div>
    <div id="holder_post" style="margin-top:15px;max-height:100px;">
    @if (Route::currentRouteName()=="posts.edit")
        <img src="{{ $post->image_post }}" alt="" style="height:5rem">
    @endif
  </div>
</div>

<div class="form-group col-sm-12">
    {{ Form::label('body', 'Descripción:') }} <code>*</code>
    {{ Form::textarea('body', null, ['class' => 'form-control']) }}
</div>

<div class="form-group col-sm-12">
	{{ Form::label('tags', 'Etiquetas:') }}
	<div>
	@foreach($tags as $tag)
		<label>
			{{ Form::checkbox('tags[]', $tag->id) }} {{ $tag->name }} <strong style="font-size: 1.1rem;font-weight:bold;color:black"> &nbsp;@if(!$loop->last)|@endif&nbsp; </strong>
		</label>
	@endforeach
	</div>
</div>

<div class="form-group col-sm-12">
  {{ Form::label('author', 'Nombre del autor:') }} <code>*</code>
  {{ Form::text('author', null, ['class' => 'form-control', 'placeholder' => 'Nombre de autor']) }}
</div>

<div class="form-group col-sm-12">
    {{ Form::label('order', 'Orden:') }} <code>*</code>
    {{ Form::number('order', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el orden']) }}
</div>

<div class="form-group col-sm-12">
	{{ Form::label('status', 'Estado:') }} <code>*</code>
	<label>
		{{ Form::radio('status', 'PUBLISHED') }} Publicado
	</label>
	<label>
		{{ Form::radio('status', 'DRAFT') }} Borrador
	</label>
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
<script>
    (function( $ ){
  
  $.fn.filemanager = function(type, options) {
    type = type || 'file';
  
    this.on('click', function(e) {
      var route_prefix = (options && options.prefix) ? options.prefix : '/filemanager';
      var target_input = $('#' + $(this).data('input'));
      var target_preview = $('#' + $(this).data('preview'));
      window.open(route_prefix + '?type=' + type, 'FileManager', 'width=1100,height=600');
      window.SetUrl = function (items) {
        var file_path = items.map(function (item) {
          return item.url;
        }).join(',');
  
        // set the value of the desired input to image url
        target_input.val('').val(file_path).trigger('change');
  
        // clear previous preview
        target_preview.html('');
  
        // set or change the preview image src
        items.forEach(function (item) {
          target_preview.append(
            $('<img>').css('height', '5rem').attr('src', item.thumb_url)
          );
        });
  
        // trigger change event
        target_preview.trigger('change');
      };
      return false;
    });
  }
  
  })(jQuery);
  
  </script>
  <script>
    $('#lfm_index').filemanager('image', {prefix: route_prefix});
    $('#lfm_carrusel').filemanager('image', {prefix: route_prefix});
    $('#lfm_post').filemanager('image', {prefix: route_prefix});
  </script>
  
  <script>
    var lfm = function(id, type, options) {
      let button = document.getElementById(id);
  
      button.addEventListener('click', function () {
        var route_prefix = (options && options.prefix) ? options.prefix : '/filemanager';
        var target_input = document.getElementById(button.getAttribute('data-input'));
        var target_preview = document.getElementById(button.getAttribute('data-preview'));
  
        window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
        window.SetUrl = function (items) {
          var file_path = items.map(function (item) {
            return item.url;
          }).join(',');
  
          // set the value of the desired input to image url
          target_input.value = file_path;
          target_input.dispatchEvent(new Event('change'));
  
          // clear previous preview
          target_preview.innerHtml = '';
  
          // set or change the preview image src
          items.forEach(function (item) {
            let img = document.createElement('img')
            img.setAttribute('style', 'height: 5rem')
            img.setAttribute('src', item.thumb_url)
            target_preview.appendChild(img);
          });
  
          // trigger change event
          target_preview.dispatchEvent(new Event('change'));
        };
      });
    };
  
    //lfm('lfm2', 'file', {prefix: route_prefix});
  </script>
  @endsection