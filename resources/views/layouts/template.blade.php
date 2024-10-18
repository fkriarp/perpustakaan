<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>Library Information System</title>
  @vite('resources/css/app.css')
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
</head>
<body class="bg-gray-100">
  <div class="flex h-screen">
    <!-- Sidebar -->
    <div class="w-1/4 bg-white shadow-lg">
      <div class="p-6">
        <div class="flex items-center space-x-4">
          <img 
            alt="Profile "
            class="w-16 h-16 rounded-full"
            src=""
          />
          <div>
            <h2 class="text-lg font-semibold">Name</h2>
            <span class="text-sm text-green-500">Role</span>
          </div>
        </div>
      </div>
      <nav class="mt-10">
        <a class="flex items-center p-4 text-gray-700 hover:bg-[#E3E9FF] rounded-lg" href="{{ route('dashboard') }}">
          <i class="fas fa-home mr-3"></i>
          <span>Dashboard</span>
        </a>
        <a class="flex items-center p-4 text-gray-700 hover:bg-[#E3E9FF] rounded-lg" href="{{ route('book.index') }}">
          <i class="fas fa-book mr-3"></i>
          <span>Data Buku</span>
        </a>
        <a class="flex items-center p-4 text-gray-700 hover:bg-[#E3E9FF] rounded-lg" href="{{ route('student.index') }}">
          <i class="fas fa-users mr-3"></i>
          <span>Data Anggota</span>
        </a>
        <a class="flex items-center p-4 text-gray-700 hover:bg-[#E3E9FF] rounded-lg" href="{{ route('transaction.index') }}">
          <i class="fas fa-exchange-alt mr-3"></i>
          <span>Transaksi</span>
        </a>
        <a class="flex items-center p-4 text-gray-700 hover:bg-[#E3E9FF] rounded-lg" href="{{ route('report.index') }}">
          <i class="fas fa-file-alt mr-3"></i>
          <span>Laporan</span>
        </a>
      </nav>
    </div>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
      <!-- Header -->
      <header class="bg-[#6477DB] text-white p-4 flex justify-between items-center w-full ">
        <h1 class="text-xl font-semibold">ERAUTAMA - Sistem Informasi Perpustakaan</h1>
        <div class="flex items-center space-x-4">
          <img id="avatarButton" type="button" data-dropdown-toggle="userDropdown" data-dropdown-placement="bottom-start" class="w-10 h-10 rounded-full cursor-pointer" src="/docs/images/people/profile-picture-5.jpg" alt="User dropdown">     
          <!-- Dropdown menu -->
          <div id="userDropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
              <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                <div>Bonnie Green</div>
                <div class="font-medium truncate">name@flowbite.com</div>
              </div>
              <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="avatarButton">
                <li>
                  <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                </li>
              </ul>
              <div class="py-1">
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
              </div>
          </div>
        </div>
      </header>

      <!-- Content -->
      <div class="p-6">
        @yield('content')
      </div>
    </div>
  </div>
  @stack('script')
</body>
</html>
