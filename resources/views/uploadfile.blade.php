<html>
    <body>
        {{Form::label('ss','TESTE ')}}
       {{-- {{Form::open(array('url' =>'/uploadfile','files'=>'true','method'=>'get'))}}--}}
        {!!Form::open ( ['route'=>('uploadfile.store'), 'id'=>'formulario', 'enctype' => 'multipart/form-data']) !!}
        {{Form::file('image')}}
        {{Form::submit('Aqui')}}
        {{Form::close()}}

    </body>
</html>
