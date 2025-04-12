<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Editar Departamento</title>
</head>

<body>
    <div class="container">
        <h1>Editar Departamento</h1>
    </div>

    <form method="POST" action="{{ route('departamentos.update', ['departamento' => $departamento->depa_codi]) }}">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="departamentoId" class="form-label">Id</label>
            <input type="text" class="form-control" id="departamentoId" aria-describedby="departamentoIdHelp" name="departamentoId"
                disabled="disabled" value=" {{ $departamento->depa_codi }}">
            <div id="departamentoIdHelp" class="form-text">Id de departamento</div>
        </div>


        <div class="mb-3">
            <label for="departamento" class="form-label">Departamento</label>
            <input type="text" required class="form-control" id="departamento" placeholder="Nombre de departamento." 
                name="departamento" value="{{ $departamento->depa_nomb }}">
        </div>

        <label for="pais">Pais</label>
        <select class="form-select" id="pais" name="pais" required>

            <option selected disabled value="">Elegir uno ...</option>

            @foreach ($paises as $pais)
                @if ($pais->pais_codi == $departamento->depa_codi)
                    <option select value="{{ $pais->pais_codi }}">{{ $pais->pais_nomb }}</option>
                @else
                    <option value="{{ $pais->pais_codi }}">{{ $pais->pais_nomb }}</option>
                @endif
            @endforeach

        </select>

        <div class="mt-3">

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('departamentos.index') }}" class="btn btn-warning">Cancelar</a>

        </div>
        </div>


    </form>


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
