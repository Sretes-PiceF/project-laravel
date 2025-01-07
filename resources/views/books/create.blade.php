<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Book</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 20px 40px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        form div {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;
        }

        input[type="text"]:focus {
            border-color: #007BFF;
            outline: none;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Buat Data Buku Baru</h1>
    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <div>
            <label for="code">Kode Buku:</label>
            <input type="text" id="code" name="code" value="{{ old('code') }}">
            @error('code')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="name">Nama Buku:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}">
            @error('name')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="publisher">Penerbit Buku:</label>
            <input type="text" id="publisher" name="publisher" value="{{ old('publisher') }}">
            @error('publisher')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="year">Tahun Terbit:</label>
            <input type="text" id="year" name="year" value="{{ old('year') }}">
            @error('year')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="author">Penulis Buku:</label>
            <input type="text" id="author" name="author" value="{{ old('author') }}">
            @error('author')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Kirim</button>
    </form>
</body>
</html>
