<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add User Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Background gradient same as login */
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Card styling */
        .card-hover {
            background: #ffffff;
            border-radius: 15px;
            border: none;
            overflow: hidden;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-6px);
            box-shadow: 0px 12px 30px rgba(0, 0, 0, 0.25);
        }

        /* Card header with purple gradient */
        .card-header {
            background: linear-gradient(90deg, #667eea, #764ba2);
            color: white;
            text-align: center;
            font-weight: bold;
            padding: 1.2rem;
            font-size: 1.2rem;
            letter-spacing: 1px;
        }

        /* Input fields */
        .form-control {
            border-radius: 10px;
            border: 1px solid #ddd;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 8px rgba(102, 126, 234, 0.5);
        }

        /* Labels */
        label {
            font-weight: 600;
            color: #444;
            margin-bottom: 0.3rem;
        }

        /* Submit button same as login btn */
        .btn-custom {
            background: linear-gradient(90deg, #667eea, #764ba2);
            color: white;
            border: none;
            padding: 0.7rem;
            font-weight: bold;
            border-radius: 10px;
            transition: background 0.3s ease;
        }
        .btn-custom:hover {
            background: linear-gradient(90deg, #764ba2, #667eea);
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card card-hover shadow-lg">
                <div class="card-header">
                    <h4 class="mb-0">Add New User</h4>
                </div>
                <div class="card-body p-4">

                    <form action="{{ route('add.user') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Name</label>
                            <input type="text" id="username" class="form-control" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="userage" class="form-label">Age</label>
                            <input type="number" id="userage" class="form-control" name="userage" required>
                        </div>
                        <div class="mb-3">
                            <label for="useremail" class="form-label">Email</label>
                            <input type="email" id="useremail" class="form-control" name="useremail" required>
                        </div>
                        <div class="mb-3">
                            <label for="useraddress" class="form-label">Address</label>
                            <input type="text" id="useraddress" class="form-control" name="useraddress">
                        </div>
                        <div class="mb-3">
                            <label for="usercity" class="form-label">City</label>
                            <input type="text" id="usercity" class="form-control" name="usercity">
                        </div>
                        <div class="mb-3">
                            <label for="userphone" class="form-label">Mobile No</label>
                            <input type="text" id="userphone" class="form-control" name="userphone">
                        </div>
                        {{-- password filed --}}
                        <div class="mb-3">
                            <label for="userpassword" class="form-label">Password</label>
                            <input type="password" id="userpassword" class="form-control" name="userpassword" required>
                        </div>
                        <div class="mb-3">
                            <label for="userpdf" class="form-label">Upload PDF</label>
                            <input type="file" id="userpdf" name="userpdf" class="form-control" accept="application/pdf">
                        </div>

                        <button type="submit" class="btn btn-custom w-100">Submit</button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
