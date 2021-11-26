<div class="form-group col-sm-12">
    {{ Form::label('name', 'Nombre:') }} <code>*</code>
    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre']) }}
</div>

<div class="form-group col-sm-12">
  {{ Form::label('title', 'Nombre:') }} <code>*</code>
  {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Título']) }}
</div>

<div class="form-group col-sm-12">
  {{ Form::label('description', 'Descripción:') }} <code>*</code>
  {{ Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'Descripcipon']) }}
</div>

<div class="form-group col-sm-12">
  {{ Form::label('order', 'Orden:') }} <code>*</code>
  {{ Form::number('order', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el orden']) }}
</div>

<div class="px-3 col-sm-12 mb-3">
  <div class="card shadow col-sm-12 px-0">
      <div class="card-header d-flex align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary float-left">Items:</h6>
      <button href="" class="btn btn-success btn-icon-split float-right añadir">
          <span class="icon text-white-50">
          <i class="fas fa-plus"></i>
          </span>
          <span class="text text-white">Añadir</span>
      </button>
      </div>
      <div class="texto pt-4">
          @if (Route::currentRouteName()=="aboutus.create")
          <div class="card-body">
          {!! Form::label('items','Nombre:',['class'=>'']) !!} <code>*</code>
          {!! Form::text('items[0][name]',null,['class'=>'form-control','required']) !!}

          {!! Form::label('items','Selecciona una imagen',['class'=>'']) !!} <small><strong>(Subir imágen con un alto de 52px / ancho de 60px aprox)</strong></small> <code>*</code>
          <div class="input-group">
              <span class="input-group-btn">
                  <a id="lfm0" data-input="thumbnail0" data-preview="holder0" class="btn btn-primary text-white">
                  <i class="far fa-image"></i> Elegir
                  </a>
              </span>
              {!! Form::text('items[0][image]',null,['class'=>'form-control','id'=>'thumbnail0','required']) !!}
          </div>
          <div id="holder0" style="margin-top:15px;max-height:100px;">
          </div>
          {!! Form::label('items','Orden:',['class'=>'mt-3']) !!} <code>*</code>
          {!! Form::number('items[0][order]',null,['class'=>'form-control','required']) !!}

          <hr class="mx-0 mt-4 border-bottom-dark" style="border:1px solid;background:#000">
          </div>
          @endif
          @if (Route::currentRouteName()=="aboutus.edit")
          @foreach ($aboutus->items as $item)
          <div class="card-body">
              @if ($loop->index >= 1)
              <a href="#" class="btn btn-danger btn-circle btn-sm float-right mb-2 eliminar">
                  <i class="fas fa-trash"></i>
              </a>
              @endif
              {!! Form::label('items','Nombre:',['class'=>'']) !!} <code>*</code>
              {!! Form::text('items['.$loop->index.'][name]',$item['name'],['class'=>'form-control','required']) !!}
  
              {!! Form::label('items','Selecciona una imagen',['class'=>'mt-3']) !!} <small><strong>(Subir imágen con un alto de 52px / ancho de 60px aprox)</strong></small> <code>*</code>
              <div class="input-group">
                  <span class="input-group-btn">
                      <a id="lfm{{ $loop->iteration }}" data-input="thumbnail{{ $loop->iteration }}" data-preview="holder{{ $loop->iteration }}" class="btn btn-primary text-white">
                      <i class="far fa-image"></i> Elegir
                      </a>
                  </span>
                  {!! Form::text('items['.$loop->index.'][image]',$item['image'],['class'=>'form-control','id'=>'thumbnail'.$loop->iteration,'required']) !!}
              </div>
              <div id="holder{{ $loop->iteration }}" style="margin-top:15px;max-height:100px;">
                  <img src="{{ $item['image'] }}" alt="" style="height:5rem">
              </div>
              {!! Form::label('items','Orden:',['class'=>'mt-3']) !!} <code>*</code>
              {!! Form::number('items['.$loop->index.'][order]',$item['order'],['class'=>'form-control','required']) !!}
  
              <hr class="mx-0 mt-4 border-bottom-dark" style="border:1px solid;background:#000">
          </div>
          @endforeach
          @endif
      </div>
      
  </div>
</div>

@section('script')
<script>
	$(document).ready(function(){
		 
		@if (Route::currentRouteName()=="aboutus.edit")
      var i={{ count($aboutus->items)+1 }};
      @else
      var i=1;
      @endif
		$('.añadir').on('click',function(e){
			e.preventDefault();
			var template='<div class=""><div class="card-body pt-0">' +
							'<a href="#" class="btn btn-danger btn-circle btn-sm float-right mb-2 eliminar">' +
								'<i class="fas fa-trash"></i>' +
							'</a>' +
                '<label for="items" class="">Nombre:</label> <code>*</code>' +
								'<input class="form-control" name="items['+i+'][name]" type="text" required>' +
                '<label for="items" class="mt-3">Selecciona una imagen:</label> <small><strong>(Subir imágen con un alto de 52px / ancho de 60px aprox)</strong></small> <code>*</code>' +
                '<div class="input-group">' +
                  '<span class="input-group-btn">' +
                      '<a id="lfm'+i+'" data-input="thumbnail'+i+'" data-preview="holder'+i+'" class="btn btn-primary text-white">' +
                      '<i class="far fa-image"></i> Elegir' +
                      '</a>' +
                  '</span>' +
                  '<input class="form-control" id="thumbnail'+i+'" name="items['+i+'][image]" type="text" required>' +
                '</div>' +
                '<div id="holder'+i+'" style="margin-top:15px;max-height:100px;"></div>' +
                '<label for="items" class="mt-3">Orden:</label> <code>*</code>' +
								'<input class="form-control" name="items['+i+'][order]" type="number" required>' +
							'<hr class="mx-0 mt-4 border-bottom-dark" style="border:1px solid;background:#000">' + 
						'</div></div>' +
            '<\script>$(\'#lfm'+i+'\').filemanager(\'image\', {prefix: route_prefix});<\/script>';
      
			$('.texto').append(template);
			i++;
		});
	
		$(document).on('click','.eliminar',function(e){
			e.preventDefault();
			
			$(this).parent('.card-body').remove();
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
    $('#lfm0').filemanager('image', {prefix: route_prefix});
    @if (Route::currentRouteName()=="aboutus.edit")
    @foreach ($aboutus->items as $item)
    $('#lfm{{ $loop->iteration }}').filemanager('image', {prefix: route_prefix});
    @endforeach
    @endif
    // $('#lfm').filemanager('file', {prefix: route_prefix});
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