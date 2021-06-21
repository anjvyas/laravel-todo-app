<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/todos.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/637390fe51.js" crossorigin="anonymous"></script>
    <title>Todo app</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Edit your task!</h1>
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col col-lg-6">
                    <form class="form-inline" action="/todos/{{ $id }}/update" method="post">
                        @csrf
                        <div class="form-group mx-sm-3">
                            <label for="name" class="sr-only">Add a new task</label>
                            <input class="form-control" id="name" name="name" value="{{ $prev_name }}">
                        </div>
                        <button id="name" type="submit" class="btn btn-primary mb-2">Submit</button>
                    </form>
                </div>
            </div>     
        </div>
    </div>

    <script src="{{asset('js/todos.js')}}"></script>
</body>
</html>