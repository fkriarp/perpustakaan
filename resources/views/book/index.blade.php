@extends('layouts.template')

@section('content')
<h2 class="text-2xl font-semibold mb-4">Buku</h2>
<h2 class="text-xl font-semibold mb-4 text-[#6477DB] bg-[#E3E9FF] w-fit p-3 rounded-xl">Data Buku</h2>

<div class="bg-white p-6 rounded-lg shadow-lg">
    @if (Session::has('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <span class="font-medium">{{ Session::get('success') }}</span>
        </div>
    @endif
    @if (Session::has('deleted'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <span class="font-medium">{{ Session::get('deleted') }}</span>
        </div>
    @endif

    <div class="flex items-center justify-between mb-4">
        <div class="flex space-x-4">
            <button data-modal-toggle="bookModal" class="block text-white bg-[#6477DB] hover:bg-indigo-600 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5">New Report</button>
            <button class="bg-[#6477DB] text-white px-4 py-2 rounded-lg">Export</button>
            <button class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg">All Reports</button>
        </div>
        <div class="relative">
            <input class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg" placeholder="Search for reports" type="text" />
            <i class="fas fa-search absolute right-3 top-3 text-gray-500"></i>
        </div>
    </div>

    <table class="w-full text-left">
        <thead>
            <tr class="text-gray-700">
                <th class="py-2">No</th>
                <th class="py-2">Nama Buku</th>
                <th class="py-2">Stok Tersedia</th>
                <th class="py-2">Stok Kebutuhan</th>
                <th class="py-2">Kekurangan</th>
                <th class="py-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $book)
                <tr class="border-t">
                    <td class="py-2">{{ $loop->iteration }}</td>
                    <td class="py-2">{{ $book->book_name }}</td>
                    <td class="py-2">{{ $book->stock_available }}</td>
                    <td class="py-2">{{ $book->stock_needs }}</td>
                    <td class="py-2">{{ $book->shortage }}</td>
                    <td class="py-2">
                        <a href="#"><i class="fas fa-pencil-alt text-gray-500 me-4"></i></a> 
                        <button type="button" onclick="showModalDelete('{{ $book->id }}', '{{ $book->book_name }}')">
                            <i class="fas fa-trash-alt text-red-500"></i>
                        </button>        
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center py-2">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Modal Create -->
<div id="bookModal" class="hidden fixed inset-0 z-50 flex justify-center items-center bg-black bg-opacity-50">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-md">
        <form class="p-4" action="{{ route('book.store') }}" method="post">
            @csrf
            <div class="grid gap-4 mb-4 grid-cols-2">
                <div class="col-span-2">
                    <label for="name" class="block mb-2 text-sm font-medium">Nama Buku</label>
                    <input type="text" name="name" id="name" class="bg-gray-50 border text-sm rounded-lg w-full p-2.5" placeholder="Type book name" required>
                </div>
                <div class="col-span-1">
                    <label for="stock_available" class="block mb-2 text-sm font-medium">Stok Tersedia</label>
                    <input type="number" name="stock_available" id="stock_available" class="bg-gray-50 border text-sm rounded-lg w-full p-2.5" required>
                </div>
                <div class="col-span-1">
                    <label for="stock_needs" class="block mb-2 text-sm font-medium">Kebutuhan Stok</label>
                    <input type="number" name="stock_needs" id="stock_needs" class="bg-gray-50 border text-sm rounded-lg w-full p-2.5" required>
                </div>
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5">Add new data</button>
        </form>
    </div>
</div>

<!-- Modal Delete -->
<div id="deleteModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-md">
        <form id="deleteForm" method="POST" class="modal-content">
            @csrf
            @method('DELETE')
            <div class="flex justify-between items-center p-4 border-b">
                <h1 class="text-lg font-semibold">Hapus Data Buku</h1>
                <button type="button" class="text-gray-400 hover:text-gray-900" onclick="hideModalDelete()">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <div class="p-4">
                Apakah anda yakin ingin menghapus buku <b id="name_book"></b>?
            </div>
            <div class="flex justify-end p-4 space-x-2 border-t">
                <button type="button" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded-md" onclick="hideModalDelete()">Batal</button>
                <button type="submit" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-md">Hapus</button>
            </div>
        </form>
    </div>
</div>

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.0/flowbite.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    function showModalDelete(bookId, bookName) {
        $('#deleteModal').removeClass('hidden');
        const actionUrl = "{{ route('book.delete', ':id') }}".replace(':id', bookId);
        $('#deleteForm').attr('action', actionUrl);
        $('#name_book').text(bookName);
    }

    function hideModalDelete() {
        $('#deleteModal').addClass('hidden');
    }
</script>
@endpush
@endsection
