@extends('admin.layout')

@section('content')
    <div class="card-header">
        Section
    </div>
    <div class="card-body">
        {{Form::open([
            'route'	=> 'department.store',
            'files'	=>	true
        ])}}
            @include('admin.errors')
            <div class="col-md-12">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="name" value="{{old('name')}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Описание</label>
                    <textarea name="description" cols="30" rows="10" class="form-control" >{{old('description')}}</textarea>
                </div>
                <p>Logo:</p>
                <div class="custom-file mb-3">
                    <input type="file" class="custom-file-input" id="customFile" name="logo">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
                <div class="form-group">
                    <label>Пользователи</label>
                    @foreach($users as $id => $name)
                        <div>
                            {{Form::checkbox('users[]', $id)}} {{ $name }}
                        </div>
                    @endforeach
                </div>
                <div class="box-footer">
                    <button class="btn btn-success pull-right">Send</button>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
    <script>
      // Add the following code if you want the name of the file appear on select
      $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
      });
    </script>
@endsection