<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
</head>
<body>
<table>
    <tr>
        <th>#</th>
        <th>Movie Name</th>
        <th>Users Ids</th>
        <th>Count Users</th>
    </tr>
    @foreach($movies as $movie)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $movie['name'] }}</td>
        <td>{{ $movie['users'][0]->implode('id', ', ') }}</td>
        <td>{{ $movie['users'][0]->count() }}</td>
    </tr>
    @endforeach
</table>
<style>
    table td {
        text-align: center;
        vertical-align: middle;
    }
</style>
</body>
</html>
