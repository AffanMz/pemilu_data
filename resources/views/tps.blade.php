<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Judul Page</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    <x-nav_side>

    </x-nav_side>

    <div class="flex flex-col p-4 pt-[4rem] sm:ml-64">
        <div class="flex flex-col mt-4 rounded-lg dark:border-gray-700">
            <div class="flex w-full justify-between px-4 pb-5 gap-4">
                <h2 class="font-bold text-3xl text-gray-700">Data Desa</h2>

                <!-- Modal toggle -->
                <div class="flex flex-row gap-4 ">
                    <button data-modal-target="default-modal" data-modal-toggle="default-modal" class=" text-white px-4 py-2 bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                    Tambah Data
                    </button>
                    
                    <form class="">   
                        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                        <div class="flex gap-2">
                            <input type="search" id="default-search" class="w-full p-2 pr-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Mockups, Logos..." required />
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-3 h-3 text-white dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>


            <div class="flex flex-col border p-4 rounded-lg  min-h-[25rem] mb-4 rounde dark:bg-gray-800">
                <form class="w-full flex gap-3 flex-row pb-4">
                    <select id="kecamatan-select" class="bg-gray-50 w-1/6 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected value="">Pilih Kecamatan</option>
                        @foreach ($kecamatan as $kec)
                            <option value="{{ $kec->id }}">{{ $kec->name }}</option>
                        @endforeach
                    </select>
                    <select id="kelurahan-select" class="bg-gray-50 w-1/6 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected value="">Pilih Kelurahan</option>
                    </select>
                    {{-- <select id="countries" class="bg-gray-50 w-1/6 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Pilih Kelurahan</option>
                        <option value="US">United States</option>
                        <option value="CA">Canada</option>
                        <option value="FR">France</option>
                        <option value="DE">Germany</option>
                    </select> --}}
                </form>
                <div class="w-full border-t mb-4"></div>
                <h3 class="text-base ml-3 mb-3">
                    Total data : <span id="total-desa" class="font-semibold text-gray-600">{{ count($desa) }} Desa</span>
                </h3>
                <div class="w-full rounded-lg overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-blue-300 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    No 
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Desa
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Dusun
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    TPS
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Penduduk
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody id="desa-tbody">
                            @foreach ( $desa as $des )
                                <tr class="bg-blue-100 border-b dark:bg-gray-800 dark:border-gray-700 font-semibold hover:bg-blue-200 dark:hover:bg-gray-600">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $loop->iteration }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $des->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        1
                                    </td>
                                    <td class="px-6 py-4">
                                        2
                                    </td>
                                    <td class="px-6 py-4">
                                        10
                                    </td>
                                    <td class="px-6 py-4">
                                        300
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

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
                    <form action="{{ route('desa.store') }}" method="POST">
                        @csrf
                        <div class="relative z-0 w-full mb-3 group">
                            <select id="modal-kecamatan-select" name="kec" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected value="">Pilih Kecamatan</option>
                                @foreach ($kecamatan as $kec)
                                    <option value="{{ $kec->id }}">{{ $kec->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="relative z-0 w-full mb-3 group">
                            <select id="modal-kelurahan-select" name="kel" disabled class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected value="">Pilih Kelurahan</option>
                            </select>
                            
                        </div>
                        <div class="relative z-0 w-full mb-3 group">
                            <input type="text" name="name" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan Nama Kelurahan" required />
                        </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="default-modal" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah</button>
                    </form>
                    <button data-modal-hide="default-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancel</button>
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

            // Ketika Kecamatan dipilih
            $('#kecamatan-select').on('change', function() {
                var kecamatanID = $(this).val();

                if (kecamatanID) {
                    // Aktifkan select kelurahan
                    $('#kelurahan-select').prop('disabled', false);

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
                    // Jika tidak ada kecamatan yang dipilih, nonaktifkan select kelurahan
                    $('#kelurahan-select').prop('disabled', true);
                    $('#kelurahan-select').empty().append('<option selected value="">Pilih Kelurahan</option>'); // Kosongkan kelurahan
                    $('#desa-tbody').empty(); // Kosongkan tabel desa
                }
            });

            // Ketika Kelurahan dipilih
            $('#kelurahan-select').on('change', function() {
                var kelurahanID = $(this).val();
                
                console.log(kelurahanID);
                
                if (kelurahanID) {
                    // Ambil data desa berdasarkan kelurahan yang dipilih
                    $.ajax({
                        url: '/desa/kelurahan/' + kelurahanID,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#desa-tbody').empty(); // Kosongkan tabel sebelum menampilkan data baru
                            
                            var totalDesa = 0; // Variabel untuk menghitung total desa
                            
                            $.each(data, function(key, desa) {
                                totalDesa++; // Tambahkan 1 setiap kali desa ditemukan
                                $('#desa-tbody').append('<tr class="bg-blue-100 border-b dark:bg-gray-800 dark:border-gray-700 font-semibold hover:bg-blue-200 dark:hover:bg-gray-600">' +
                                    '<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">' + (key + 1) + '</th>' +
                                    '<td class="px-6 py-4">' + desa.name + '</td>' +
                                    '<td class="px-6 py-4">1</td>' + // Sesuaikan data
                                    '<td class="px-6 py-4">2</td>' +
                                    '<td class="px-6 py-4">10</td>' +
                                    '<td class="px-6 py-4">300</td>' +
                                    '<td class="px-6 py-4"><a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a></td>' +
                                    '</tr>');
                            });

                            // Perbarui jumlah total desa yang tampil
                            $('#total-desa').text(totalDesa + ' Desa');
                        }
                    });
                } else {
                    // Jika opsi "Pilih Kelurahan" dipilih kembali, kosongkan tabel desa
                    $('#desa-tbody').empty();
                    $('#total-desa').text('0 Desa'); // Reset jumlah total desa
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
                $('#modal-kelurahan-select').prop('disabled', true).empty().append('<option selected value="">Pilih Kelurahan</option>');
            }
        });
    </script>


</html>