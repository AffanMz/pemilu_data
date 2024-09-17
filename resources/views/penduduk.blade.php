<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Penduduk</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    <x-nav_side>

    </x-nav_side>

    <div class="flex flex-col p-4 pt-20 lg:ml-64">
        <div class="flex flex-col mt-4 rounded-lg dark:border-gray-700">
            <div class="flex w-full justify-between px-4 pb-5 gap-4">
                <h2 class="font-bold text-xl lg:text-3xl text-gray-700">Data Penduduk</h2>

                <!-- Modal toggle -->
                <div class="flex flex-row gap-4 ">
                    <button data-modal-target="default-modal" data-modal-toggle="default-modal" class=" text-white px-4 py-2 bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                    Tambah Data
                    </button>
                    
                    <form id="search-form" class="hidden lg:block">
                        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                        <div class="flex gap-2">
                            <input type="search" id="default-search" name="nik" class="w-full p-2 pr-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari Berdasarkan NIK" required />
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-3 h-3 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="w-full gap-4 px-3 mb-3 lg:hidden">                    
                <form id="search-form-1" class="">
                    <label for="default-search-1" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="flex gap-2">
                        <input type="search" id="default-search-1" name="nik" class="w-full p-2 pr-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari Berdasarkan NIK" required />
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="w-3 h-3 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>


            <div class="flex flex-col border p-4 rounded-lg  min-h-[25rem] mb-4 rounde dark:bg-gray-800">
                <form class="w-full flex gap-3 flex-row pb-4">
                    <select id="kecamatan-select" class="bg-gray-50 w-1/3 lg:w-1/6 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected value="">Pilih Kecamatan</option>
                        @foreach ($kecamatan as $kec)
                            <option value="{{ $kec->id }}">{{ $kec->name }}</option>
                        @endforeach
                    </select>
                    <select id="kelurahan-select" class="bg-gray-50 w-1/3 lg:w-1/6 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected value="">Pilih Kelurahan</option>
                    </select>
                    <select id="tps-select" class="bg-gray-50 w-1/3 lg:w-1/6 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected value="">Pilih TPS</option>
                    </select>
                    <a href="{{ route('export.penduduk') }}" class="hidden text-white w-1/6 lg:block text-base font-semibold text-center rounded-lg px-4 py-3 bg-green-500 hover:bg-green-600">Unduh Excel</a>
                </form>
                
                <a href="{{ route('export.penduduk') }}" class="w-1/3 block text-white lg:hidden text-base font-semibold text-center rounded-lg px-4 py-3 bg-green-500 hover:bg-green-600">Unduh Data</a>

                @error('nik')
                        <div id="alert-2" class="flex items-center p-2 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <span class="sr-only">Info</span>
                            <div class="ms-3 me-5 text-sm font-medium">
                                {{ $message }}
                            </div>
                            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-2" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            </button>
                        </div>
                    @enderror

                    @if (session('success'))
                        <div id="alert-3" class="flex items-center p-2 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <span class="sr-only">Info</span>
                        <div class="ms-3 me-5 text-sm font-medium">
                            {{ session('success') }}
                        </div>
                        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                        </button>
                        </div>
                    @endif
                <div class="w-full border-t mt-3 mb-4"></div>
                <h3 class="text-base ml-3 mb-3 dark:text-white">
                    Total data : <span id="total-desa" class="font-semibold text-gray-600 dark:text-white">{{ count($penduduk) }} Penduduk</span>
                </h3>
                <div class="w-full rounded-lg overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-blue-300 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    No 
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    NIK
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Alamat
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tanggal Lahir
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Jenis Kelamin
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody id="desa-tbody">
                            @foreach ( $penduduk as $pendu )
                                <tr class="bg-blue-100 border-b dark:bg-gray-800 dark:border-gray-700 font-semibold hover:bg-blue-200 dark:hover:bg-gray-600">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $loop->iteration }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $pendu->nik }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $pendu->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $pendu->alamat }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $pendu->tl }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $pendu->jk }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <button data-modal-target="editModal-{{ $pendu->id }}" data-modal-toggle="editModal-{{ $pendu->id }}" class="font-medium mr-1 p-2 bg-blue-500 rounded-lg hover:bg-blue-600 text-white">Edit</button>
                                        
                                        <form action="{{ route('penduduk.destroy', $pendu->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="font-medium p-2 bg-red-500 rounded-lg hover:bg-red-600 text-white" onclick="return confirm('Are you sure you want to delete this item?')">Hapus</button>
                                        </form>
                                    </td>
                                    
                                    <!-- Modal for Edit -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @foreach ($penduduk as $pendu)
        <div id="editModal-{{ $pendu->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Edit Item {{ $pendu->name }}
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="editModal-{{ $pendu->id }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <form action="{{ route('penduduk.update', $pendu->id) }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="relative z-0 w-full mb-3 group">
                                <input id="modal-tps-select" type="hidden" value="{{ $pendu->id_tps }}" name="tps" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </input>
                            </div>
                            <div class="relative z-0 w-full mb-3 group">
                                <input type="text" name="nik" value="{{ $pendu->nik }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="NIK"  required />
                            </div>
                            <div class="relative z-0 w-full mb-3 group">
                                <input type="text" name="name" value="{{ $pendu->name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nama Lengkap"  required />
                            </div>
                            <div class="relative z-0 w-full mb-3 group">
                                <input type="text" name="alamat" value="{{ $pendu->alamat }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Alamat"  required />
                            </div>
                            <div class="grid items-center gap-3 md:grid-cols-2">
                                <div class="relative z-0 w-full group">
                                    <input type="date" name="tl" value="{{ $pendu->tl }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tanggal Lahir"  required />
                                </div>
                                <ul class="items-center w-full text-sm py-2 font-medium text-gray-900 bg-gray-50 border border-gray-300 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                        <div class="flex items-center ps-3">
                                            <input type="radio" {{ $pendu->jk == 'Laki-laki' ? 'checked' : '' }} required value="Laki-laki" name="jk" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" >
                                            <label class="w-full py-1 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Laki-laki</label>
                                        </div>
                                    </li>
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                        <div class="flex items-center ps-3">
                                            <input type="radio" required value="Perempuan" {{ $pendu->jk == 'Perempuan' ? 'checked' : '' }}  name="jk" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" >
                                            <label class="w-full py-1 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Perempuan</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            </div>
                            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
                                <button data-modal-hide="editModal-{{ $pendu->id }}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Main modal -->
    <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Tambah Data
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <form action="{{ route('penduduk.store') }}" method="POST">
                        @csrf
                        <div class="relative z-0 w-full mb-3 group">
                            <select id="tambah-kecamatan-select" name="kec" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected value="">Pilih Kecamatan</option>
                                @foreach ($kecamatan as $kec)
                                    <option value="{{ $kec->id }}">{{ $kec->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="relative z-0 w-full mb-3 group">
                            <select id="tambah-kelurahan-select" name="kel" disabled class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected value="">Pilih Kelurahan</option>
                            </select>
                        </div>
                        <div class="relative z-0 w-full mb-3 group">
                            <select id="tambah-tps-select" name="tps" required disabled class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected value="">Pilih TPS</option>
                            </select>
                        </div>
                        <div class="relative z-0 w-full mb-3 group">
                            <input type="text" name="nik" class="info bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="NIK" disabled required />
                        </div>
                        <div class="relative z-0 w-full mb-3 group">
                            <input type="text" name="name" class="info bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nama Lengkap" disabled required />
                        </div>
                        <div class="relative z-0 w-full mb-3 group">
                            <input type="text" name="alamat" class="info bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Alamat" disabled required />
                        </div>
                        <div class="grid items-center gap-3 md:grid-cols-2">
                            <div class="relative z-0 w-full group">
                                <input type="date" name="tl" class="info bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tanggal Lahir" disabled required />
                            </div>
                            <ul class="items-center w-full text-sm py-2 font-medium text-gray-900 bg-gray-50 border border-gray-300 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                    <div class="flex items-center ps-3">
                                        <input type="radio" required value="Laki-laki" name="jk" class="info w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" disabled>
                                        <label class="w-full py-1 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Laki-laki</label>
                                    </div>
                                </li>
                                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                    <div class="flex items-center ps-3">
                                        <input type="radio" required value="Perempuan" name="jk" class="info w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" disabled>
                                        <label class="w-full py-1 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Perempuan</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="default-modal" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah</button>
                    <button data-modal-hide="default-modal" type="reset" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Disable select kelurahan on load
            $('#kelurahan-select').prop('disabled', true);
            $('#tps-select').prop('disabled', true);

            // Ketika Kecamatan dipilih
            $('#kecamatan-select').on('change', function() {
                var kecamatanID = $(this).val();

                if (kecamatanID) {
                    // Aktifkan select kelurahan
                    $('#kelurahan-select').prop('disabled', false);
                    $('#desa-tbody').empty()
                    $('#total-desa').text(' 0 Penduduk');

                    // Ambil data kelurahan berdasarkan kecamatan yang dipilih
                    console.log(kecamatanID);
                    
                    $.ajax({
                        url: '/kelurahan/kecamatan/' + kecamatanID,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#kelurahan-select').empty().append('<option selected value="">Pilih Kelurahan</option>'); // Kosongkan select kelurahan

                            $.each(data, function(key, kelurahan) {
                                $('#kelurahan-select').append('<option value="' + kelurahan.id + '">' + kelurahan.name + '</option>');
                            });
                        }
                    });
                } else {
                    $.ajax({
                        url: '/penduduk/all',
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#desa-tbody').empty(); // Kosongkan tabel sebelum menampilkan data baru
                            
                            var totalDesa = 0; // Variabel untuk menghitung total desa
                            console.log(data);
                            
                            
                            $.each(data, function(key, penduduk) {
                                totalDesa++; // Tambahkan 1 setiap kali desa ditemukan
                                $('#desa-tbody').append(
                                    '<tr class="bg-blue-100 border-b dark:bg-gray-800 dark:border-gray-700 font-semibold hover:bg-blue-200 dark:hover:bg-gray-600">' +
                                        '<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">' + (key + 1) + '</th>' +
                                        '<td class="px-6 py-4">' + penduduk.nik + '</td>' +
                                        '<td class="px-6 py-4">' + penduduk.name + '</td>' + // Sesuaikan data
                                        '<td class="px-6 py-4">' + penduduk.alamat + '</td>' +
                                        '<td class="px-6 py-4">' + penduduk.tl + '</td>' +
                                        '<td class="px-6 py-4">' + penduduk.jk + '</td>' +
                                        '<td class="px-6 py-4">' +
                                            '<button data-modal-target="editModal-' + penduduk.id + '" data-modal-toggle="editModal-' + penduduk.id + '" class="font-medium mr-2 p-2 bg-blue-500 rounded-lg hover:bg-blue-600 text-white">Edit</button>' +
                                            
                                            '<form action="/penduduk/destroy/' + penduduk.id + '" method="POST" style="display:inline-block;">' +
                                                '@csrf' +
                                                '@method("DELETE")' +
                                                '<button type="submit" class="font-medium p-2 bg-red-500 rounded-lg hover:bg-red-600 text-white" onclick="return confirm(\'Are you sure you want to delete this item?\')">Hapus</button>' +
                                            '</form>' +
                                        '</td>' +
                                    '</tr>'
                                );
                            });

                            document.querySelectorAll('[data-modal-toggle]').forEach(function(modalToggleEl) {
                                const modalTargetEl = document.getElementById(modalToggleEl.getAttribute('data-modal-target'));

                                if (modalTargetEl) {
                                    modalToggleEl.addEventListener('click', function() {
                                        const modal = new Modal(modalTargetEl);
                                        modal.show();

                                        // Tambahkan event listener untuk tombol "X" dan "Cancel"
                                        modalTargetEl.querySelectorAll('[data-modal-hide]').forEach(function(closeButtonEl) {
                                            closeButtonEl.addEventListener('click', function() {
                                                modal.hide();
                                            });
                                        });
                                    });
                                }
                            });

                            // Perbarui jumlah total desa yang tampil
                            $('#total-desa').text(totalDesa + ' Penduduk');
                        }
                    });
                    $('#total-desa').text('0 Penduduk');
                    $('#kelurahan-select').prop('disabled', true);
                    $('#tps-select').prop('disabled', true);
                    $('#kelurahan-select').empty().append('<option selected value="">Pilih Kelurahan</option>'); // Kosongkan kelurahan
                    $('#tps-select').empty().append('<option selected value="">Pilih TPS</option>'); // Kosongkan kelurahan
                }
            });

            $('#kelurahan-select').on('change', function() {
                var kelurahanID = $(this).val();

                if (kelurahanID) {
                    // Aktifkan select kelurahan
                    $('#tps-select').prop('disabled', false);

                    // Ambil data kelurahan berdasarkan kecamatan yang dipilih
                    console.log(kelurahanID);
                    
                    $.ajax({
                        url: '/desa/kelurahan/' + kelurahanID,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#tps-select').empty().append('<option selected value="">Pilih TPS</option>'); // Kosongkan select kelurahan

                            $.each(data, function(key, desa) {
                                $('#tps-select').append('<option value="' + desa.id + '">' + desa.name + '</option>');
                            });
                        }
                    });
                } else {
                    // Jika tidak ada kecamatan yang dipilih, nonaktifkan select kelurahan
                    $('#desa-tbody').empty();
                    $('#tps-select').prop('disabled', true);
                    $('#total-desa').text('0 Penduduk');
                    $('#tps-select').empty().append('<option selected value="">Pilih TPS</option>'); // Kosongkan kelurahan
                }
            });

            // Ketika Kelurahan dipilih
            $('#tps-select').on('change', function() {
                var tpsID = $(this).val();
                
                console.log(tpsID);
                
                if (tpsID) {
                    // Ambil data desa berdasarkan kelurahan yang dipilih
                    $.ajax({
                        url: '/penduduk/desa/' + tpsID,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#desa-tbody').empty(); // Kosongkan tabel sebelum menampilkan data baru
                            
                            var totalDesa = 0; // Variabel untuk menghitung total desa
                            console.log(data);
                            
                            
                            $.each(data, function(key, penduduk) {
                                totalDesa++; // Tambahkan 1 setiap kali desa ditemukan
                                $('#desa-tbody').append(
                                    '<tr class="bg-blue-100 border-b dark:bg-gray-800 dark:border-gray-700 font-semibold hover:bg-blue-200 dark:hover:bg-gray-600">' +
                                        '<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">' + (key + 1) + '</th>' +
                                        '<td class="px-6 py-4">' + penduduk.nik + '</td>' +
                                        '<td class="px-6 py-4">' + penduduk.name + '</td>' + // Sesuaikan data
                                        '<td class="px-6 py-4">' + penduduk.alamat + '</td>' +
                                        '<td class="px-6 py-4">' + penduduk.tl + '</td>' +
                                        '<td class="px-6 py-4">' + penduduk.jk + '</td>' +
                                        '<td class="px-6 py-4">' +
                                            '<button data-modal-target="editModal-' + penduduk.id + '" data-modal-toggle="editModal-' + penduduk.id + '" class="font-medium mr-2 p-2 bg-blue-500 rounded-lg hover:bg-blue-600 text-white">Edit</button>' +
                                            
                                            '<form action="/penduduk/destroy/' + penduduk.id + '" method="POST" style="display:inline-block;">' +
                                                '@csrf' +
                                                '@method("DELETE")' +
                                                '<button type="submit" class="font-medium p-2 bg-red-500 rounded-lg hover:bg-red-600 text-white" onclick="return confirm(\'Are you sure you want to delete this item?\')">Hapus</button>' +
                                            '</form>' +
                                        '</td>' +
                                    '</tr>'
                                );
                            });

                            document.querySelectorAll('[data-modal-toggle]').forEach(function(modalToggleEl) {
                                const modalTargetEl = document.getElementById(modalToggleEl.getAttribute('data-modal-target'));

                                if (modalTargetEl) {
                                    modalToggleEl.addEventListener('click', function() {
                                        const modal = new Modal(modalTargetEl);
                                        modal.show();

                                        // Tambahkan event listener untuk tombol "X" dan "Cancel"
                                        modalTargetEl.querySelectorAll('[data-modal-hide]').forEach(function(closeButtonEl) {
                                            closeButtonEl.addEventListener('click', function() {
                                                modal.hide();
                                            });
                                        });
                                    });
                                }
                            });

                            // Perbarui jumlah total desa yang tampil
                            $('#total-desa').text(totalDesa + ' Penduduk');
                        }
                    });
                } else {
                    // Jika opsi "Pilih Kelurahan" dipilih kembali, kosongkan tabel desa
                    $('#desa-tbody').empty();
                    $('#total-desa').text('0 Penduduk'); // Reset jumlah total desa
                }
            });
        });

        $('#modal-kecamatan-select').on('change', function() {
            var kecamatanID = $(this).val();
            
            if (kecamatanID) {
                // Aktifkan select kelurahan di modal
                $('#modal-kelurahan-select').prop('disabled', false);
                $('#modal-kelurahan-select').empty().append('<option selected value="">Pilih Kelurahan</option>');

                // Ambil data kelurahan berdasarkan kecamatan yang dipilih
                $.ajax({
                    url: '/kelurahan/kecamatan/' + kecamatanID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $.each(data, function(key, kelurahan) {
                            $('#modal-kelurahan-select').append('<option value="' + kelurahan.id + '">' + kelurahan.name + '</option>');
                        });
                    }
                });
            } else {
                // Jika tidak ada kecamatan yang dipilih
                $('#modal-tps-select').prop('disabled', true).empty().append('<option selected value="">Pilih TPS</option>');
                $('#modal-kelurahan-select').prop('disabled', true).empty().append('<option selected value="">Pilih Kelurahan</option>');
                $('.info').prop('disabled', true);
            }
        });

        $('#modal-kelurahan-select').on('change', function() {
            var kelurahanID = $(this).val();

            if (kelurahanID) {
                // Aktifkan select kelurahan di modal
                $('#modal-tps-select').prop('disabled', false);
                $('#modal-tps-select').empty().append('<option selected value="">Pilih TPS</option>');

                // Ambil data kelurahan berdasarkan kecamatan yang dipilih
                $.ajax({
                    url: '/desa/kelurahan/' + kelurahanID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $.each(data, function(key, desa) {
                            $('#modal-tps-select').append('<option value="' + desa.id + '">' + desa.name + '</option>');
                        });
                        $('.info').prop('disabled', false);
                    }
                });
            } else {
                // Jika tidak ada kecamatan yang dipilih
                $('#modal-tps-select').prop('disabled', true).empty().append('<option selected value="">Pilih TPS</option>');
                $('.info').prop('disabled', true);
                $('.info').prop('checked', true);
            }
        });

        $('#modal-tps-select').on('change', function() {
            var tpsID = $(this).val();

            if (tpsID) {
                // Aktifkan select kelurahan di modal
                $('.info').prop('disabled', false);
            } else {
                // Jika tidak ada kecamatan yang dipilih
                $('.info').prop('disabled', true);
            }
        });

        $('#tambah-kecamatan-select').on('change', function() {
            var kecamatanID = $(this).val();
            
            if (kecamatanID) {
                // Aktifkan select kelurahan di tambah
                $('#tambah-kelurahan-select').prop('disabled', false);
                $('#tambah-kelurahan-select').empty().append('<option selected value="">Pilih Kelurahan</option>');

                // Ambil data kelurahan berdasarkan kecamatan yang dipilih
                $.ajax({
                    url: '/kelurahan/kecamatan/' + kecamatanID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $.each(data, function(key, kelurahan) {
                            $('#tambah-kelurahan-select').append('<option value="' + kelurahan.id + '">' + kelurahan.name + '</option>');
                        });
                    }
                });
            } else {
                // Jika tidak ada kecamatan yang dipilih
                $('#tambah-tps-select').prop('disabled', true).empty().append('<option selected value="">Pilih TPS</option>');
                $('#tambah-kelurahan-select').prop('disabled', true).empty().append('<option selected value="">Pilih Kelurahan</option>');
                $('.info').prop('disabled', true);
            }
        });

        $('#tambah-kelurahan-select').on('change', function() {
            var kelurahanID = $(this).val();

            if (kelurahanID) {
                // Aktifkan select kelurahan di tambah
                $('#tambah-tps-select').prop('disabled', false);
                $('#tambah-tps-select').empty().append('<option selected value="">Pilih TPS</option>');

                // Ambil data kelurahan berdasarkan kecamatan yang dipilih
                $.ajax({
                    url: '/desa/kelurahan/' + kelurahanID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $.each(data, function(key, desa) {
                            $('#tambah-tps-select').append('<option value="' + desa.id + '">' + desa.name + '</option>');
                        });
                        $('.info').prop('disabled', false);
                    }
                });
            } else {
                // Jika tidak ada kecamatan yang dipilih
                $('#tambah-tps-select').prop('disabled', true).empty().append('<option selected value="">Pilih TPS</option>');
                $('.info').prop('disabled', true);
                $('.info').prop('checked', true);
            }
        });

        $('#tambah-tps-select').on('change', function() {
            var tpsID = $(this).val();

            if (tpsID) {
                // Aktifkan select kelurahan di modal
                $('.info').prop('disabled', false);
            } else {
                // Jika tidak ada kecamatan yang dipilih
                $('.info').prop('disabled', true);
            }
        });
        
        $(document).ready(function() {
            $('#search-form').on('submit', function(e) {
                e.preventDefault(); // Mencegah form dari submit biasa

                var nik = $('#default-search').val(); // Ambil nilai NIK dari input
                
                $.ajax({
                    url: '/penduduk/search/' + nik, // Sesuaikan URL untuk pencarian
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#desa-tbody').empty(); // Kosongkan tabel sebelum menampilkan data baru
                        
                        var totalPenduduk = 0; // Variabel untuk menghitung total penduduk

                        if (data.length > 0) {
                            $.each(data, function(key, penduduk) {
                                totalPenduduk++; // Tambahkan 1 setiap kali penduduk ditemukan

                                $('#desa-tbody').append(
                                    '<tr class="bg-blue-100 border-b dark:bg-gray-800 dark:border-gray-700 font-semibold hover:bg-blue-200 dark:hover:bg-gray-600">' +
                                        '<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">' + (key + 1) + '</th>' +
                                        '<td class="px-6 py-4">' + penduduk.nik + '</td>' +
                                        '<td class="px-6 py-4">' + penduduk.name + '</td>' +
                                        '<td class="px-6 py-4">' + penduduk.alamat + '</td>' +
                                        '<td class="px-6 py-4">' + penduduk.tl + '</td>' +
                                        '<td class="px-6 py-4">' + penduduk.jk + '</td>' +
                                        '<td class="px-6 py-4">' +
                                            '<button data-modal-target="editModal-' + penduduk.id + '" data-modal-toggle="editModal-' + penduduk.id + '" class="font-medium mr-2 p-2 bg-blue-500 rounded-lg hover:bg-blue-600 text-white">Edit</button>' +
                                            '<form action="/penduduk/destroy/' + penduduk.id + '" method="POST" style="display:inline-block;">' +
                                                '@csrf' +
                                                '@method("DELETE")' +
                                                '<button type="submit" class="font-medium p-2 bg-red-500 rounded-lg hover:bg-red-600 text-white" onclick="return confirm(\'Are you sure you want to delete this item?\')">Hapus</button>' +
                                            '</form>' +
                                        '</td>' +
                                    '</tr>'
                                );
                            });
                        } else {
                            $('#desa-tbody').append('<tr><td colspan="7" class="text-center py-4">Tidak ada data ditemukan</td></tr>');
                        }

                        // Perbarui jumlah total penduduk yang tampil
                        $('#total-desa').text(totalPenduduk + ' Penduduk Ditemukan');

                        // Re-initialize modal functionality for dynamic buttons
                        document.querySelectorAll('[data-modal-toggle]').forEach(function(modalToggleEl) {
                            const modalTargetEl = document.getElementById(modalToggleEl.getAttribute('data-modal-target'));
                            if (modalTargetEl) {
                                modalToggleEl.addEventListener('click', function() {
                                    const modal = new Modal(modalTargetEl);
                                    modal.show();

                                    modalTargetEl.querySelectorAll('[data-modal-hide]').forEach(function(closeButtonEl) {
                                        closeButtonEl.addEventListener('click', function() {
                                            modal.hide();
                                        });
                                    });
                                });
                            }
                        });
                    },
                    error: function(xhr, status, error) {
                        console.log("Error: " + error);
                    }
                });
            });
        });

        $(document).ready(function() {
            $('#search-form-1').on('submit', function(e) {
                e.preventDefault(); // Mencegah form dari submit biasa

                var nik = $('#default-search-1').val(); // Ambil nilai NIK dari input
                
                $.ajax({
                    url: '/penduduk/search/' + nik, // Sesuaikan URL untuk pencarian
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#desa-tbody').empty(); // Kosongkan tabel sebelum menampilkan data baru
                        
                        var totalPenduduk = 0; // Variabel untuk menghitung total penduduk

                        if (data.length > 0) {
                            $.each(data, function(key, penduduk) {
                                totalPenduduk++; // Tambahkan 1 setiap kali penduduk ditemukan

                                $('#desa-tbody').append(
                                    '<tr class="bg-blue-100 border-b dark:bg-gray-800 dark:border-gray-700 font-semibold hover:bg-blue-200 dark:hover:bg-gray-600">' +
                                        '<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">' + (key + 1) + '</th>' +
                                        '<td class="px-6 py-4">' + penduduk.nik + '</td>' +
                                        '<td class="px-6 py-4">' + penduduk.name + '</td>' +
                                        '<td class="px-6 py-4">' + penduduk.alamat + '</td>' +
                                        '<td class="px-6 py-4">' + penduduk.tl + '</td>' +
                                        '<td class="px-6 py-4">' + penduduk.jk + '</td>' +
                                        '<td class="px-6 py-4">' +
                                            '<button data-modal-target="editModal-' + penduduk.id + '" data-modal-toggle="editModal-' + penduduk.id + '" class="font-medium mr-2 p-2 bg-blue-500 rounded-lg hover:bg-blue-600 text-white">Edit</button>' +
                                            '<form action="/penduduk/destroy/' + penduduk.id + '" method="POST" style="display:inline-block;">' +
                                                '@csrf' +
                                                '@method("DELETE")' +
                                                '<button type="submit" class="font-medium p-2 bg-red-500 rounded-lg hover:bg-red-600 text-white" onclick="return confirm(\'Are you sure you want to delete this item?\')">Hapus</button>' +
                                            '</form>' +
                                        '</td>' +
                                    '</tr>'
                                );
                            });
                        } else {
                            $('#desa-tbody').append('<tr><td colspan="7" class="text-center py-4">Tidak ada data ditemukan</td></tr>');
                        }

                        // Perbarui jumlah total penduduk yang tampil
                        $('#total-desa').text(totalPenduduk + ' Penduduk Ditemukan');

                        // Re-initialize modal functionality for dynamic buttons
                        document.querySelectorAll('[data-modal-toggle]').forEach(function(modalToggleEl) {
                            const modalTargetEl = document.getElementById(modalToggleEl.getAttribute('data-modal-target'));
                            if (modalTargetEl) {
                                modalToggleEl.addEventListener('click', function() {
                                    const modal = new Modal(modalTargetEl);
                                    modal.show();

                                    modalTargetEl.querySelectorAll('[data-modal-hide]').forEach(function(closeButtonEl) {
                                        closeButtonEl.addEventListener('click', function() {
                                            modal.hide();
                                        });
                                    });
                                });
                            }
                        });
                    },
                    error: function(xhr, status, error) {
                        console.log("Error: " + error);
                    }
                });
            });
        });

    </script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>


</html>