<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'App Pegawai')</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f5f5f5; }
        header, footer { background-color: #514040; color: white; padding: 10px; border-radius: 6px; }
        nav a { text-decoration: none; color: white; font-weight: bold; }
        nav a:hover { text-decoration: underline; }
        main { background-color: white; padding: 20px; border-radius: 6px; margin-top: 15px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 8px; border-bottom: 1px solid #ddd; }
    </style>

    <!-- opsional: CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <h1>@yield('page-title', 'App Pegawai')</h1>

       <nav>
    <ul style="list-style:none;padding:0;display:flex;gap:12px;">
        <li><a href="{{ route('employees.index') }}">Employee</a></li>
        <li><a href="{{ route('departements.index') }}">Department</a></li>
        <li><a href="{{ route('attendances.index') }}">Attendance</a></li>
        <li><a href="{{ route('positions.index') }}">Position</a></li>
        <li><a href="{{ route('trainings.index') }}">Training</a></li>
    </ul>
</nav>
    </header>

    <main>
        @if(session('success'))
            <div style="background:#d4edda;padding:8px;border-radius:4px;margin-bottom:12px;">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} App Pegawai</p>
    </footer>
</body>
</html>
