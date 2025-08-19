<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard </title>

    {{-- <title>All Users</title> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        nav .w-5{
            display: none;
        }
        body {
            background: radial-gradient(circle at top left, #e0eafc, #cfdef3);
            min-height: 100vh;
            font-family: 'Segoe UI', sans-serif;
        }
        .card-custom {
            background: #ffffff;
            border-radius: 20px;
            border: none;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card-custom:hover {
            transform: translateY(-5px);
            box-shadow: 0px 12px 35px rgba(0, 0, 0, 0.2);
        }
        .card-header {
            background: linear-gradient(90deg, #667eea, #764ba2);
            color: white;
            font-weight: bold;
            font-size: 1.4rem;
            padding: 1rem 1.5rem;
            border-bottom: none;
        }
        .table-custom thead {
            background: linear-gradient(90deg, #43cea2, #185a9d);
            color: white;
        }
        .table-custom tbody tr:nth-child(even) {
            background-color: #f8faff;
        }
        .table-custom tbody tr:nth-child(odd) {
            background-color: #eef3ff;
        }
        .table-custom tbody tr:hover {
            background-color: #e3f2fd;
            transition: background-color 0.3s ease;
        }
        .btn-view {
            background: linear-gradient(90deg, #43cea2, #185a9d);
            color: white;
            border: none;
        }
        .btn-view:hover {
            background: linear-gradient(90deg, #185a9d, #43cea2);
        }
        .btn-delete {
            background: linear-gradient(90deg, #ff4b5c, #ff6a88);
            color: white;
            border: none;
        }
        .btn-delete:hover {
            background: linear-gradient(90deg, #ff6a88, #ff4b5c);
        }
        .btn-update {
            background: linear-gradient(90deg, #f9d423, #ff4e50);
            color: white;
            border: none;
        }
        .btn-update:hover {
            background: linear-gradient(90deg, #ff4e50, #f9d423);
        }
        .btn-add {
            background: linear-gradient(90deg, #43cea2, #185a9d);
            color: white;
            border: none;
        }
        .btn-add:hover {
            background: linear-gradient(90deg, #185a9d, #43cea2);
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="card card-custom">

        <div class="card-header d-flex justify-content-between align-items-center">
            {{-- <span>All Users List</span> --}}
           
                <span>All Users List</span>

    <div class="d-flex align-items-center gap-3">
        <!-- Logged in username -->
        <span class="fw-bold text-white">
            👤 {{ session('username') }}
        </span>

        <!-- Logout button -->
        <form action="{{ route('logout.action') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-sm btn-danger">Logout</button>
        </form>

         <div class="d-flex gap-0">
                <input type="text" id="search" class="form-control form-control-sm" placeholder="Search users...">
                <a href="/newuser" class="btn btn-add btn-sm">➕ Add New</a>
            </div>
    </div>
        </div>

        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-custom table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Email</th>
                            <th>Mobile No</th>
                            <th>City</th>
                            <th>View</th>
                            <th>Delete</th>
                            <th>Update</th>
                            <th>PDF</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->age }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->city }}</td>
                                <td>
                                    <a href="{{ route('view.user', $user->id) }}" class="btn btn-view btn-sm">View</a>
                                </td>
                                <td>
                                    <a href="{{ route('delete.user', $user->id) }}" class="btn btn-delete btn-sm">Delete</a>
                                </td>
                                <td>
                                    <a href="{{ route('update.page', $user->id) }}" class="btn btn-update btn-sm">Update</a>
                                </td>
                                <td>
                                    @if($user->pdf)
                                        <a href="{{ asset('storage/' . $user->pdf) }}" target="_blank" class="btn btn-sm btn-secondary">View PDF</a>
                                    @else
                                        <span class="text-muted">No PDF</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
<!-- Pagination -->
<div class="d-flex justify-content-center mt-4">
    {{ $data->links('pagination::bootstrap-5') }}
</div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- 🔎 Search Script -->
<script>
$(document).ready(function() {
    $('#search').on('keyup', function() {
        let query = $(this).val();

        $.ajax({
            url: "{{ route('search.users') }}",
            type: "GET",
            data: { search: query },
            success: function(data) {
                $('tbody').html(data);
            }
        });
    });
});
</script>

</body>
</html>
