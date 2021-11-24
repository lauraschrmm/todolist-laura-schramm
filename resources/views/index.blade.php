<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo-Liste</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@200&display=swap" rel="stylesheet">
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" rel="stylesheet" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"></script>
</head>

<body class="bg-info">
    <style>
        body{
            font-family: 'Josefin Sans';
        }
    </style>
    <div class="container w-25 mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h3>Meine Todo's</h3>
                <form action="{{ route('store') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="content" class="form-control" placeholder="Neue Aufgabe hinzufügen...">
                        <button type="submit" class="btn btn-dark btn-sm px-4"><i class="fas fa-plus"></i></button>
                    </div>
                </form>
                {{-- if tasks count --}}
                @if (count($todolists))
                <ul class="list-group list-group-flush mt-3">
                    @foreach ($todolists as $todolist)
                    <li class="list-group-item">
                        <form action="{{ route('destroy', $todolist->id) }}" method="POST">
                            {{ $todolist->content }}
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-link btn-sm float-end"><i
                                    class="fas fa-trash"></i></button>
                         </form>
                            <a href="/todos/{{$todolist->id}}/edit" class="btn btn-link btn-sm float-end"><i
                                    class="fas fa-pen"></i></a>
                    @endforeach
                </ul>
                @else
                <p class="text-center mt-3">Keine offenen Aufgaben!</p>
                @endif
            </div>
            @if (count($todolists))
            <div class="card-footer">
                Du hast noch {{ count($todolists) }} Aufgabe(n) zu erledigen.
            </div>
            @else

            @endif
        </div>
    </div>

</body>

</html>