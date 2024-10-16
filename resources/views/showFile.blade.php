<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="flex justify-center items-center min-h-screen">
        <div class="container mx-auto mt-8">
            <table class="min-w-full bg-white mx-auto">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">ID</th>
                        <th class="py-2 px-4 border-b">Create at</th>
                        <th class="py-2 px-4 border-b">Image</th>
                        <th class="py-2 px-4 border-b">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($images as $file)
                    <tr>
                        <td class="py-2 px-4 border-b text-center">{{ $file->id }}</td>
                        <td class="py-2 px-4 border-b text-center">{{ $file->created_at }}</td>
                        <td class="py-2 px-4 border-b">
                            <div class="flex justify-center items-center">
                                <img src="{{ asset('img/' . $file->file_name) }}" alt="" class="h-16 w-16 object-cover">
                            </div>
                        </td>
                        <td class="py-2 px-4 border-b text-center">
                            <form action="{{ route('files.destroy', $file->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
