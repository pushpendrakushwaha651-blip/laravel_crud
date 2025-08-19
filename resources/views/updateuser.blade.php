<!DOCTYPE html>
<html lang="en">
<head>
    {{--  --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update User Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <style>
        /* Background gradient */
        body {
            background: radial-gradient(circle at top left, #a1c4fd, #c2e9fb);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
        }

        /* Card styling */
        .card-hover {
            background: #ffffff;
            border-radius: 20px;
            border: none;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0px 12px 30px rgba(0, 0, 0, 0.15);
        }

        /* Card header */
        .card-header {
            background: linear-gradient(90deg, #2193b0, #6dd5ed);
            color: white;
            text-align: center;
            font-weight: bold;
            padding: 1.2rem;
            letter-spacing: 1px;
        }

        /* Input fields */
        .form-control {
            border-radius: 10px;
            border: 1px solid #ddd;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #2193b0;
            box-shadow: 0 0 8px rgba(33, 147, 176, 0.3);
        }

        /* Labels */
        label {
            font-weight: 600;
            color: #444;
            margin-bottom: 0.3rem;
        }

        /* Submit button */
        .btn-custom {
            background: linear-gradient(90deg, #43cea2, #185a9d);
            color: white;
            border: none;
            padding: 0.7rem;
            font-weight: 600;
            border-radius: 12px;
            transition: background 0.3s ease;
        }
        .btn-custom:hover {
            background: linear-gradient(90deg, #185a9d, #43cea2);
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

                    <form action="{{ route('update.user',$data->id ) }}" method="POST" >
    @csrf
    <div class="mb-3">
        <label for="username" class="form-label">Name</label>
        <input type="text"  value="{{ $data->name}}" id="username" class="form-control" name="username" required>
    </div>
    <div class="mb-3">
        <label for="userage" class="form-label">Age</label>
        <input type="number"  value="{{ $data->age}}" id="userage" class="form-control" name="userage" required>
    </div>
    <div class="mb-3">
        <label for="useremail" class="form-label">Email</label>
        <input type="email" value="{{ $data->email}}" id="useremail" class="form-control" name="useremail" required>
    </div>
    <div class="mb-3">
        <label for="useraddress" class="form-label">Address</label>
        <input type="text" value="{{ $data->address}}"  id="useraddress" class="form-control" name="useraddress">
    </div>
    <div class="mb-3">
        <label for="usercity" class="form-label">City</label>
        <input type="text" value="{{ $data->city}}" id="usercity" class="form-control" name="usercity">
    </div>
    <div class="mb-3">
        <label for="userphone" class="form-label">Mobile No</label>
        <input type="text" value="{{ $data->phone}}" id="userphone" class="form-control" name="userphone">
    </div>
   <div class="mb-3">
    <label for="userpdf" class="form-label">Upload PDF</label>
    <input type="file" id="userpdf" name="userpdf" class="form-control" accept="application/pdf">
    @if($data->pdf)
        <p class="mt-2">Current PDF: <a href="{{ asset('storage/'.$data->pdf) }}" target="_blank">View</a></p>
    @endif
</div>


    <button type="submit" class="btn btn-success w-100">Submit</button>
</form>

                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>