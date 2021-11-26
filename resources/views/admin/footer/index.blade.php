@extends('admin.master')

@section('content')

<div class="layoutContent">
    <div class="container-fluid profile">
        <div class="row show-header">
            <div class="col-sm-12">
                <h1>
                    <i class="fas fa-home fa-xs"></i> <span>Footer</span>
                </h1>
            </div>
        </div>
        <div class="row show-content mt-3">
            <div class="col-sm-12 col-md-12">
                <div class="card shadow">
                    <div class="card-header">
                        <span>
                            Footer
                        </span>
                    </div>
                    {!! Form::model($home, ['route' => ['footer.update', 1], 'method' => 'PUT']) !!}
                    <div class="card-body row">
                        <div class="col-sm-12">
                            @include('admin.includes.alert')
                        </div>
                        <div class="form-group col-sm-4">
                            {{ Form::label('facebook', 'Facebook:') }} <code>*</code>
                            {{ Form::text('facebook', null, ['class' => 'form-control', 'placeholder' => 'Facebook', 'required' => true]) }}
                        </div>
                        <div class="form-group col-sm-4">
                            {{ Form::label('linkedin', 'Linkedin:') }} <code>*</code>
                            {{ Form::text('linkedin', null, ['class' => 'form-control', 'placeholder' => 'Linkedin', 'required' => true]) }}
                        </div>
                        <div class="form-group col-sm-4">
                            {{ Form::label('youtube', 'Youtube:') }} <code>*</code>
                            {{ Form::text('youtube', null, ['class' => 'form-control', 'placeholder' => 'Youtube', 'required' => true]) }}
                        </div>
                        <div class="form-group col-sm-12">
                            {{ Form::label('footer_description', 'Descripción:') }} <code>*</code>
                            {{ Form::textarea('footer_description', null, ['class' => 'form-control', 'placeholder' => 'Descripción', 'rows' => 3, 'required' => true]) }}
                        </div>

                        <div class="px-3 col-sm-12 mb-3">
                          <div class="card shadow col-sm-12 px-0">
                            <div class="card-header py-3 card-into">
                              <h6 class="m-0 font-weight-bold text-primary float-left">Items:</h6>
                              <button href="" class="btn btn-success btn-icon-split float-right añadir">
                                <span class="icon text-white-50">
                                  <i class="fas fa-plus"></i>
                                </span>
                                <span class="text text-white">Añadir</span>
                              </button>
                            </div>
                            <div class="texto">
                              @foreach ($home->footer_info as $item)
                              <div class="card-body">
                                @if ($loop->index >= 1)
                                <a href="#" class="btn btn-danger btn-circle btn-sm float-right mb-2 eliminar">
                                  <i class="fas fa-trash"></i>
                                </a>
                                @endif
                                {!! Form::label('footer_info','Selecciona una imagen:',['class'=>'']) !!} <small><strong>(70 x 70px)</strong></small> <code>*</code>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a id="lfm{{ $loop->iteration }}" data-input="thumbnail{{ $loop->iteration }}" data-preview="holder{{ $loop->iteration }}" class="btn btn-primary text-white">
                                        <i class="far fa-image"></i> Elegir
                                        </a>
                                    </span>
                                    {!! Form::text('footer_info['.$loop->index.'][image]',$item['image'],['class'=>'form-control','id'=>'thumbnail'.$loop->iteration,'required']) !!}
                                </div>
                                <div id="holder{{ $loop->iteration }}" style="margin-top:15px;max-height:100px;">
                                    <img src="{{ $item['image'] }}" alt="" style="height:5rem">
                                </div>
                                {!! Form::label('footer_info','Nombre:',['class'=>'mt-3']) !!} <code>*</code>
                                {!! Form::text('footer_info['.$loop->index.'][name]',$item["name"],['class'=>'form-control','required']) !!}
                                {!! Form::label('footer_info','Detalle:',['class'=>'mt-3']) !!} <code>*</code>
                                {!! Form::text('footer_info['.$loop->index.'][detail]',$item["detail"],['class'=>'form-control','required']) !!}
                                {!! Form::label('footer_info','Orden:',['class'=>'mt-3']) !!} <code>*</code>
                                {!! Form::number('footer_info['.$loop->index.'][order]',$item["order"],['class'=>'form-control','required']) !!}
                                
                                <hr class="mx-0 mt-4 border-bottom-dark" style="border:1px solid">
                              </div>
                              @endforeach
                            </div>
                          </div>
                        </div>

                    </div>
                </div>
                <div class="col-sm-12 my-4 px-0">
                    {!! Form::submit('Actualizar cambios',['class'=>'btn btn-success btn-sm py-2 px-3']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
	$(document).ready(function(){
		 
		var i={{ count(($home->footer_info))+1 }};

		$('.añadir').on('click',function(e){
			e.preventDefault();
			var template='<div class=""><div class="card-body pt-0">' +
							'<a href="#" class="btn btn-danger btn-circle btn-sm float-right mb-2 eliminar">' +
								'<i class="fas fa-trash"></i>' +
							'</a>' +

                '<label for="footer_info" class="">Selecciona una imagen:</label> <small><strong>(70 x 70px)</strong></small> <code>*</code>' +
                '<div class="input-group">' +
                  '<span class="input-group-btn">' +
                      '<a id="lfm'+i+'" data-input="thumbnail'+i+'" data-preview="holder'+i+'" class="btn btn-primary text-white">' +
                      '<i class="far fa-image"></i> Elegir' +
                      '</a>' +
                  '</span>' +
                  '<input class="form-control" id="thumbnail'+i+'" name="footer_info['+i+'][image]" type="text" required>' +
                '</div>' +
                '<div id="holder'+i+'" style="margin-top:15px;max-height:100px;"></div>' +
                
                '<label for="footer_info" class="mt-3">Nombre:</label> <code>*</code>' +
                '<input class="form-control" name="footer_info['+i+'][name]" type="text" required>' +

                '<label for="footer_info" class="mt-3">Detalle:</label> <code>*</code>' +
				'<input class="form-control" name="footer_info['+i+'][detail]" type="text" required>' +
                
                '<label for="footer_info" class="mt-3">Orden:</label> <code>*</code>' +
                '<input class="form-control" name="footer_info['+i+'][order]" type="number" required>' +
    
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
    @foreach ($home->footer_info as $item)
    $('#lfm{{ $loop->iteration }}').filemanager('image', {prefix: route_prefix});
    @endforeach
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