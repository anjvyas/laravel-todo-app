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
        <h1 class="mt-2 text-center">To do list</h1>
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col col-lg-6">
                    <table class="table">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">Things to accomplish</th>
                        {{-- <th class="hide" scope="col"></th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                        <tr>
                        <td class="table-warning done-{{ $task->done }}">{{ $task->name }}</td>
                        <td class="hide table-light">
                            @if($task->done)
                            <span class="pending mr-2" onclick="location='/todos/{{ $task->id }}/pending'">
                                <i class="fa-2x fa fa-times" aria-hidden="true"></i>
                            </span>
                            @else
                            <span class="done mr-2" onclick="location='/todos/{{ $task->id }}/done'">
                                <i class="fa fa-2x fa-check-circle" aria-hidden="true"></i>
                            </span>
                            @endif
                            <span class="edit" onclick="location='/todos/{{ $task->id }}/edit'">
                                <i class="fa-2x fas fa-edit"></i>
                            </span>
                            <span class="delete ml-2" onclick="location='/todos/{{ $task->id }}/delete'">
                                <i class="fa fa-2x fa-trash" aria-hidden="true"></i>
                            </span>
                        </td>                        
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>    
        </div>

        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col col-lg-6">
                    <form class="form-inline" action="/todos/create" method="post">
                        @csrf
                        <div class="form-group mx-sm-3">
                            <label for="name" class="sr-only">Add a new task</label>
                            <input class="form-control" id="name" name="name" placeholder="Add a new task!">
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