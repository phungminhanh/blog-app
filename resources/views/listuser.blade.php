<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>

    <!-- Thêm CSS tùy chỉnh -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #ddd;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        select, input, button {
            margin-bottom: 10px;
            padding: 8px;
        }

        button {
            background-color: blue;
            color: white;
            border: none;
            cursor: pointer;
        }

        .not-found {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>User List</h1>
    <a class="nav-link active" aria-current="page" href="{{ route('index')}}"><i class="material-icons">home</i></a>
    <!-- Form lọc -->
    <form action="{{ route('user.filter') }}" method="GET">
        <label for="role">Role:</label>
        <select name="role">
            <option value="admin">Admin</option>
            <option value="user">User</option>
            <option value="editor">Editor</option>
        </select>

        <label for="created_at">Created At:</label>
        <input type="date" name="created_at">

        <label for="user_name">User Name:</label>
        <input type="text" name="user_name">

        <button type="submit">Filter</button>
    </form>

    <!-- Danh sách người dùng -->
    @if ($users->isEmpty())
        <p class="not-found">Không tìm thấy người dùng.</p>
    @else
        <table border="1">
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>Role</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->user_name }}</td>
                        <td>
                            <form action="{{ route('update.role', $user->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <select name="role">
                                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                                    <option value="editor" {{ $user->role == 'editor' ? 'selected' : '' }}>Editor</option>
                                </select>
                                <button type="submit">Update Role</button>
                            </form>
                        </td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                        <a onclick="return confirm('Are you sure?')" href="{{ route('users.delete', $user->id) }}" class="btn btn-danger">
                        <button >Delete</button>
                    </a>
                                
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>
