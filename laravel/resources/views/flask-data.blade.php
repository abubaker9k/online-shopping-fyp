<!DOCTYPE html>
<html>
<head>
    <title>Flask Data</title>
</head>
<body>
    <h1>Data from Flask API:</h1>
    @if(isset($data))
        <ul>
            @foreach($data as $key => $value)
                <li>{{ $key }}: {{ $value }}</li>
            @endforeach
        </ul>
    @else
        <p>No data received.</p>
    @endif
</body>
</html>
