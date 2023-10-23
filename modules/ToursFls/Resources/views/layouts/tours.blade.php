<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de tours</title>
</head>
<body>
    <h1>Listado de tours</h1>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Ruta</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tours as $tour)
                <tr>
                    <td>{{ $tour->nombre }}</td>
                    <td>{{ $tour->descripcion }}</td>
                    <td>{{ $tour->ruta }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('tours.create') }}" class="btn btn-primary">Crear tour</a>
</body>
</html>
