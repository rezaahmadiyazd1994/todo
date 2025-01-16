<!doctype html>
<html lang="ar" dir="rtl">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">



    <!-- Local CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Local JS -->
    <script href="js/jquery.js"></script>


    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <link rel="preconnect" href="//fdn.fontcdn.ir">
    <link rel="preconnect" href="//v1.fontapi.ir">
    <link href="https://v1.fontapi.ir/css/Vazir" rel="stylesheet">
    <title>فهرست وظایف</title>

    <!-- style css -->
    <style>
        * {
            font-family: Vazir, sans-serif;
            font-size: 14px;
        }

        body {
            background: #eee;
        }

        <style>@font-face {
            font-family: 'Glyphicons Halflings';
            src: url('//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/fonts/glyphicons-halflings-regular.eot');
            src: url('//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/fonts/glyphicons-halflings-regular.eot?#iefix') format('embedded-opentype'),
                url('//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/fonts/glyphicons-halflings-regular.woff2') format('woff2'),
                url('//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/fonts/glyphicons-halflings-regular.woff') format('woff'),
                url('//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/fonts/glyphicons-halflings-regular.ttf') format('truetype'),
                url('//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/fonts/glyphicons-halflings-regular.svg#glyphicons_halflingsregular') format('svg');
        }

        .glyphicon {
            position: relative;
            top: 1px;
            display: inline-block;
            font: 'Glyphicons Halflings';
            -moz-osx-font-smoothing: grayscale;
            -webkit-font-smoothing: antialiased;
        }

        /* Add icons you will be using below */
        .glyphicon-fire:before {
            content: '\e104';
        }

        .glyphicon-eye-open:before {
            content: '\e105';
        }
    </style>
    </style>
</head>

<body>
    <div class="card text-white bg-primary mb-3 mt-5 d-block mx-auto" style="max-width: 24rem;">
        <div class="card-header">فهرست وظایف</div>
        <div class="card-body">
            <div>
                <form action="save_task" method="post">
                    @csrf
                    <input type="text" class="form-control text_task border-light" required id="new-task"
                        placeholder="افزودن وظیفه" name="new-task">
                    <button class="form-control btn btn-light" id="add_task">
                        <span class="glyphicon glyphicon-plus"></span>
                    </button>
                </form>
            </div>
            <br>
            <ul class="list-group">

                @foreach ($todos as $todo)
                    <li class="list-group-item" style="height: 35px;">
                        <form action="update_task_to_1/{{ @$todo->id }}" method="post">
                            @csrf
                            <input type="hidden" name="value_id" value="{{ @$todo->id }}">
                            <input type="checkbox" name="check-{{ @$todo->id }}" id="check-{{ @$todo->id }}"
                                class="checklist">
                            <label id="check-1" class="label_select">{{ @$todo->task }}</label>
                            <button type="submit" id="submit-{{ @$todo->id }}" style="display:none"></button>

                            <script>
                                $(document).ready(function() {
                                    $("#check-{{ @$todo->id }}").click(function() {
                                        $("#submit-{{ @$todo->id }}").click();
                                    });
                                });
                            </script>

                        </form>
                        <form action="delete_task/{{ @$todo->id }}" method="post">
                            @csrf
                            <button class="form-control btn btn-danger" id="delete_task" type="submit">
                                <span class="glyphicon glyphicon-remove"></span>
                            </button>
                        </form>
                    </li>


                    </form>
                @endforeach

                <br>

                @foreach ($do_todos as $do_todo)
                    @csrf
                    <li class="list-group-item" style="height: 35px;">
                        <form action="update_task_to_0/{{ @$do_todo->id }}" method="post">
                            @csrf
                            <input type="hidden" name="value_id" value="{{ @$do_todo->id }}">
                            <input type="checkbox" name="check-{{ @$do_todo->id }}" id="check-{{ @$do_todo->id }}"
                                class="checklist" checked>
                            <label id="check-1" class="label_select">
                                <del>{{ $do_todo->task }}</del>
                            </label>
                            <button type="submit" id="submit-{{ @$do_todo->id }}" style="display:none"></button>
                            <script>
                                $(document).ready(function() {
                                    $("#check-{{ @$do_todo->id }}").click(function() {
                                        $("#submit-{{ @$do_todo->id }}").click();
                                    });
                                });
                            </script>
                        </form>
                        <form action="delete_task/{{ @$do_todo->id }}" method="post">
                            @csrf
                            <button class="form-control btn btn-danger" id="delete_task" type="submit">
                                <span class="glyphicon glyphicon-remove"></span>
                            </button>
                        </form>
                    </li>
                @endforeach
                </form>
            </ul>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
</body>

</html>
