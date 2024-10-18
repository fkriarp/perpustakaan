@extends('layouts.template')

@section('content')
<h2 class="text-2xl font-semibold mb-4">Laporan</h2>
<h2 class="text-xl font-semibold mb-4 text-[#6477DB] bg-[#E3E9FF] w-fit p-3 rounded-xl">Data Laporan</h2>
<div class="bg-white p-6 rounded-lg shadow-lg">
  <div class="flex items-center justify-between mb-4">
    <div class="flex space-x-4">
      <button class="bg-[#6477DB] text-white px-4 py-2 rounded-lg">New Report</button>
      <button class="bg-[#6477DB] text-white px-4 py-2 rounded-lg">Export</button>
      <button class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg">All Reports</button>
    </div>
    <div class="relative">
      <input 
        class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg"
        placeholder="Search for reports"
        type="text"
      />
      <i class="fas fa-search absolute right-3 top-3 text-gray-500"></i>
    </div>
    <div class="relative">
      <h2 class="text-lg font-semibold">Total Denda: Rp. 1000</h2>
    </div>
  </div>
  <table class="w-full text-left">
    <thead>
      <tr class="text-gray-700">
        <th class="py-2">No</th>
        <th class="py-2">ID Anggota</th>
        <th class="py-2">Nama Anggota</th>
        <th class="py-2">Tanggal Pinjam</th>
        <th class="py-2">Tanggal Kembali</th>
        <th class="py-2">Total Pinjam</th>
        <th class="py-2">Denda</th>
        <th class="py-2">Status</th>
        <th class="py-2">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr class="border-t">
        <td class="py-2">1</td>
        <td class="py-2">2914440384</td>
        <td class="py-2">Fikri Akbar Pratama</td>
        <td class="py-2">10/10/2024</td>
        <td class="py-2">10/19/2024</td>
        <td class="py-2">1</td>
        <td class="py-2">Rp. 1000</td>
        <td class="py-2"><span class="text-red-600 bg-red-200 rounded-md p-1">Terlambat</span></td>
        <td class="py-2">
          <a href=""><i class="fas fa-pencil-alt text-gray-500 me-4"></i></a>
          <a href=""><i class="fas fa-trash-alt text-gray-500"></i></a>
        </td>
      </tr>
    </tbody>
  </table>
</div>
@endsection