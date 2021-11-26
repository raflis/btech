<div class="form-group col-sm-12">
    {{ Form::label('name', 'Nombre:') }} <code>*</code>
    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre']) }}
</div>

<div class="form-group col-sm-12">
  {{ Form::label('description', 'Descripción:') }} <code>*</code>
  {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Descripción']) }}
</div>

<div class="form-group col-sm-4">
  {!! Form::label('image','Selecciona una imagen verde:',['class'=>'mt-3']) !!} <strong>(60px de alto)</strong><code>*</code>
  <div class="input-group">
      <span class="input-group-btn">
          <a id="lfm_green" data-input="thumbnail_green" data-preview="holder_green" class="btn btn-primary text-white">
          <i class="far fa-image"></i> Elegir
          </a>
      </span>
      {!! Form::text('image_green',null,['class'=>'form-control','id'=>'thumbnail_green']) !!}
  </div>
<div id="holder_green" style="margin-top:15px;max-height:100px;">
  @if (Route::currentRouteName()=="solutions.edit")
        <img src="{{ $solution->image_green }}" alt="" style="height:5rem">
    @endif
</div>
</div>

<div class="form-group col-sm-4">
  {!! Form::label('image','Selecciona una imagen blanca:',['class'=>'mt-3']) !!} <strong>(60px de alto)</strong><code>*</code>
  <div class="input-group">
      <span class="input-group-btn">
          <a id="lfm_white" data-input="thumbnail_white" data-preview="holder_white" class="btn btn-primary text-white">
          <i class="far fa-image"></i> Elegir
          </a>
      </span>
      {!! Form::text('image_white',null,['class'=>'form-control','id'=>'thumbnail_white']) !!}
  </div>
<div id="holder_white" style="margin-top:15px;max-height:100px;background:#999">
  @if (Route::currentRouteName()=="solutions.edit")
        <img src="{{ $solution->image_white }}" alt="" style="height:5rem">
    @endif
</div>
</div>

<div class="form-group col-sm-4">
  {!! Form::label('image','Selecciona una imagen a mostrar:',['class'=>'mt-3']) !!} <strong>(60px de alto)</strong><code>*</code>
  <div class="input-group">
      <span class="input-group-btn">
          <a id="lfm_show" data-input="thumbnail_show" data-preview="holder_show" class="btn btn-primary text-white">
          <i class="far fa-image"></i> Elegir
          </a>
      </span>
      {!! Form::text('image_show',null,['class'=>'form-control','id'=>'thumbnail_show']) !!}
  </div>
<div id="holder_show" style="margin-top:15px;max-height:100px;">
  @if (Route::currentRouteName()=="solutions.edit")
        <img src="{{ $solution->image_show }}" alt="" style="height:5rem">
    @endif
</div>
</div>

<div class="form-group col-sm-12">
  {{ Form::label('order', 'Orden:') }} <code>*</code>
  {{ Form::number('order', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el orden']) }}
</div>


@section('script')

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
    $('#lfm_green').filemanager('image', {prefix: route_prefix});
    $('#lfm_white').filemanager('image', {prefix: route_prefix});
    $('#lfm_show').filemanager('image', {prefix: route_prefix});
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