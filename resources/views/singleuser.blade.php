<!DOCTYPE html>
<html lang="en">
<head>
    {{--  --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Card</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: radial-gradient(circle at top left, #e0eafc, #cfdef3);
            min-height: 100vh;
            font-family: 'Segoe UI', sans-serif;
        }
        .profile-card {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            padding: 2rem 1.5rem;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .profile-card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 12px 35px rgba(0, 0, 0, 0.2);
        }
        .profile-img {
            width: 110px;
            height: 110px;
            border-radius: 50%;
            background: #e0eafc;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            font-weight: bold;
            color: #667eea;
            margin: 0 auto 1rem auto;
        }
        .role {
            font-weight: 600;
            font-size: 1.1rem;
        }
        .rate {
            color: #777;
            font-size: 0.9rem;
        }
        .user-name {
            font-weight: bold;
            font-size: 1.2rem;
            margin-top: 1rem;
        }
        .user-info {
            color: #666;
            font-size: 0.9rem;
        }
        .btn-view, .btn-offer {
            display: block;
            width: 100%;
            margin-top: 0.5rem;
            border-radius: 8px;
            font-weight: 600;
        }
        .btn-view {
            border: 2px solid #185a9d;
            color: #185a9d;
            background: #fff;
        }
        .btn-view:hover {
            background: #185a9d;
            color: #fff;
        }
        .btn-offer {
            background: linear-gradient(90deg, #43cea2, #185a9d);
            color: #fff;
            border: none;
        }
        .btn-offer:hover {
            background: linear-gradient(90deg, #185a9d, #43cea2);
        }
        .status {
            color: green;
            font-size: 0.9rem;
            margin-top: 0.8rem;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row g-4">
        @foreach($data as $user)
            <div class="col-md-4">
                <div class="profile-card">
                    <!-- Ignore image placeholder -->
                    <div class="profile-img">
                        {{ strtoupper(substr($user->name ,0 , 1)) }}
                    </div>

                    <div class="role">User Profile</div>
                    <div class="rate">Free</div>

                    <div class="user-name">{{ $user->name }}, {{ $user->age }}</div>
                    <div class="user-info">
                        📍 {{ $user->city }} <br>
                        {{ $user->email }} | {{ $user->phone }}
                    </div>

                    <a href="{{ asset('storage/' . $user->pdf)}}" class="btn btn-view">VIEW CV</a>
                    {{-- <a href="#" class="btn btn-offer">MAKE OFFER</a> --}}

                    <div class="status">● Online</div>
                </div>
            </div>
        @endforeach
    </div>
</div>

</body>
</html>
