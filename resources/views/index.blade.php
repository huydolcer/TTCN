<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- Thêm CSRF token -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <nav class="bg-gray-800 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-white font-bold text-xl">
                MyWebsite
            </div>
            <ul class="flex space-x-4">
               @foreach ($menus as $item)
               <li><a href="#" class="text-gray-300 hover:text-white">{{ $item->Name }}</a></li>    
               @endforeach
            </ul>
        </div>
    </nav>

    <main class="container mx-auto mt-8">
        <div class="flex justify-end mb-4">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Add New Item
            </button>
        </div>
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-sm leading-4 font-medium text-gray-600 uppercase tracking-wider">
                        ID
                    </th>
                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-sm leading-4 font-medium text-gray-600 uppercase tracking-wider">
                        Name
                    </th>
                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-sm leading-4 font-medium text-gray-600 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menus as $item)
                <tr class="hover:bg-gray-100 transition duration-150 ease-in-out">
                    <td class="py-2 px-4 border-b border-gray-200">{{ $item->MenuID }}</td>
                    <td class="py-2 px-4 border-b border-gray-200">{{ $item->Name }}</td>
                    <td class="py-2 px-4 border-b border-gray-200 flex space-x-2">
                        <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">
                            Edit
                        </button>
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                            Delete
                        </button>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </main>

    <div class="add_menu" style="display: none">
        <div class="bg-white p-4 w-1/3 mx-auto mt-8 rounded-lg shadow-md">
            <form action="/add" method="get">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="Name" id="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="mb-4">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="update" style="display: none">
        <div class="bg-white p-4 w-1/3 mx-auto mt-8 rounded-lg shadow-md">
            <form action="" method="POST">
                @csrf
                @method('PUT') <!-- Đặt phương thức là PUT -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="Name" id="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="mb-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
    

    <footer class="bg-gray-800 p-4 mt-8 text-center text-white">
        &copy; 2021 MyWebsite
    </footer>
    
</body>
<script>

    document.querySelector('.bg-blue-500').addEventListener('click', function() {
        document.querySelector('.add_menu').style.display = 'block';
        document.querySelector('.update').style.display = 'none';
    });

    const editButtons = document.querySelectorAll('.bg-yellow-500');
    editButtons.forEach((button, index) => {
        button.addEventListener('click', function() {
            const menu = @json($menus);
            const currentItem = menu[index];
            document.querySelector('#name').value = currentItem.Name;
            document.querySelector('.update form').action = `/update/${currentItem.MenuID}`;
            document.querySelector('.update').style.display = 'block';
            document.querySelector('.add_menu').style.display = 'none';
        });
    });
    const deleteButtons = document.querySelectorAll('.bg-red-500');
deleteButtons.forEach((button, index) => {
    button.addEventListener('click', function() {
        const menu = @json($menus);
        const currentItem = menu[index];
        const deleteUrl = `/delete/${currentItem.MenuID}`;

        if (confirm('Bạn có chắc chắn muốn xóa mục này không?')) {
            fetch(deleteUrl, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json'
                }
            })
            .then(response => {
                if (response.ok) {
                    alert('Xóa thành công!');
                    window.location.reload();
                } else {
                    alert('Xóa thất bại, vui lòng thử lại.');
                }
            })
            .catch(error => {
                console.error('Có lỗi xảy ra:', error);
            });
        }
    });
});

</script>

</html>
