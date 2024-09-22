<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data User</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('build/assets/app-7KWvDcDT.css') }}">
</head>
<body>

    @php
        use App\Models\Penduduk;
        use App\Models\Kelurahan;
        use App\Models\Kecamatan;
        use App\Models\Desa;
    @endphp
    
    <x-nav_side>

    </x-nav_side>

    <div class="flex flex-col p-4 pt-20 lg:ml-64">
        <div class="flex flex-col mt-4 rounded-lg dark:border-gray-700">
            <div class="flex w-full justify-between px-4 pb-5 gap-4">
                <h2 class="font-bold text-3xl text-gray-700">Data User</h2>

                <!-- Modal toggle -->
                <div class="flex flex-row gap-4 ">
                    <button data-modal-target="default-modal" data-modal-toggle="default-modal" class=" text-white px-4 py-2 bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                    Tambah User
                    </button>
                    
                </div>
            </div>


            <div class="flex flex-col border p-4 rounded-lg  min-h-[25rem] mb-4 rounde dark:bg-gray-800">
                <div class="w-full mb-1">
                    @error('name')
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
                </div>
                <h3 class="text-base ml-3 mb-3 dark:text-white">
                    Total User : <span id="banyak" class="font-semibold text-gray-600 dark:text-white">{{ count($user) }}</span>
                </h3>
                <div class="w-full rounded-lg overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-blue-300 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    No
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Username
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Wilayah
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $user as $item )
                                <tr class="bg-blue-100 border-b dark:bg-gray-800 dark:border-gray-700 font-semibold hover:bg-blue-200 dark:hover:bg-gray-600">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $loop->iteration }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $item->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->status == 'admin' ? 'ADMIN' : ($item->status == 'editor' ? 'Korcam' : 'Kordes') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @php
                                            if ($item->status == 'admin') {
                                                $wilayah = 'Semua Wilayah';
                                            } elseif ($item->status == 'editor') {
                                                $wl = Kecamatan::find($item->id_tugas);
                                                $wilayah = $wl->name;
                                            } else {
                                                $wl = Kelurahan::find($item->id_tugas);
                                                $wilayah = $wl->kecamatan->name . '-' . $wl->name;
                                            }
                                        @endphp
                                        {{ $wilayah }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <button data-modal-target="editModal-{{ $item->id }}" data-modal-id="{{ $item->id }}" data-modal-toggle="editModal-{{ $item->id }}" class="button-edit font-medium mr-1 p-2 bg-blue-500 rounded-lg hover:bg-blue-600 text-white">Edit</button>
                                        @if ($item->status == 'admin')

                                        @else
                                            <form action="{{ route('user.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="font-medium p-2 bg-red-500 rounded-lg hover:bg-red-600 text-white" onclick="return confirm('Are you sure you want to delete this item?')">Hapus</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @foreach ($user as $item)

        @php
            $id_tugas = $item->id_tugas;
            if ($item->status == 'viewer') {
                $id_baru = Kelurahan::find($item->id_tugas);
                $id_camat = $id_baru->id_kecamatan;
            } 
        @endphp

        
        <div id="editModal-{{ $item->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Edit User
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="editModal-{{ $item->id }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <form action="{{ route('user.update', $item->id) }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="relative z-0 w-full mb-3 group">
                                <input type="text" name="name" value="{{ $item->name }}" id="nameupdate-{{ $item->id }}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                <label id="label-name-{{ $item->id }}" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama User</label>
                                <select id="status-edit-{{ $item->id }}" data-status-id="{{ $item->id }}" name="status" required class="status-data bg-gray-50 border mt-3 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" {{ $item->status == 'admin' ? 'disabled' : '' }}>
                                    @if ( $item->status == 'admin')
                                        <option value="admin" {{ $item->status == 'admin' ? 'selected' : '' }}>ADMIN</option>
                                    @else
                                        <option value="editor" {{ $item->status == 'editor' ? 'selected' : '' }}>Korcam</option>
                                        <option value="viewer" {{ $item->status == 'viewer' ? 'selected' : '' }}>Kordes</option>
                                    @endif
                                </select>
                                <select id="kecamatan-select-edit-{{ $item->id }}" name="kec" required class="bg-gray-50 w-full mt-3 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" {{ $item->status == 'admin' ? 'disabled' : '' }}>
                                    <option selected value="{{ $item->id_tugas }}">Pilih Kecamatan</option>
                                </select>
                                @if ($item->status == 'viewer')
                                    <input type="hidden" id="id_kelcat" value="{{ $id_camat }}">
                                    <input type="hidden" id="id_kelkel" value="{{ $item->id_tugas }}">
                                @endif
                                <select id="kelurahan-select-edit-{{ $item->id }}" name="kel" required class="hidden bg-gray-50 w-full mt-3 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected value="{{ $item->id_tugas }}">Pilih Kelurahan</option>
                                </select>
                                <div class="mt-3">
                                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                    <input type="password" name="pw" id="password-{{ $item->id }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" />
                                    <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400">Kosongi Jika Tidak Ingin Merubah Password.</p>
                                </div> 
                            </div>
                            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
                                <button data-modal-hide="editModal-{{ $item->id }}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancel</button>
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
                        Tambah User
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf
                        <div class="relative z-0 w-full mb-3 group">
                            <input type="text" name="name" id="nameinsert" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="floating_first_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama User</label>
                        </div>
                        <select id="status-tambah" name="status" required class="bg-gray-50 border mt-3 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected value="">Pilih Status</option>
                            <option value="editor" >Korcam</option>
                            <option value="viewer">Kordes</option>
                        </select>
                        <select id="kecamatan-select" name="kec" required class="bg-gray-50 w-full mt-3 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected value="">Pilih Kecamatan</option>
                        </select>
                        <select id="kelurahan-select" name="kel" required class="hidden bg-gray-50 w-full mt-3 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected value="kosong">Pilih Kelurahan</option>
                        </select>
                        <div class="mt-3">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="pw" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required />
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
            $('#kecamatan-select').prop('disabled', true);

            $('#status-tambah').on('change', function() {
                var status = $(this).val();
                if (status) {
                    $('#kecamatan-select').prop('disabled', false);
                    if (status == 'editor') {
                        $('#kelurahan-select').hide().empty().append('<option selected value="kosong">Pilih Kelurahan</option>');
                    } 

                    $('#kecamatan-select').empty().append('<option selected value="">Pilih Kecamatan</option>');
                    $.ajax({
                        url: '/user/kecamatan',
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $.each(data, function(key, kecamatan) {
                                $('#kecamatan-select').append('<option value="' + kecamatan.id + '">' + kecamatan.name + '</option>');
                            });
                        }
                    });

                } else {
                    $('#kelurahan-select').hide();
                    $('#kecamatan-select').prop('disabled', true).empty().append('<option selected value="">Pilih Kecamatan</option>');
                }
            });

            $('#kecamatan-select').on('change', function() {
                var kecamatanID = $(this).val();
                var status = $('#status-tambah').val();

                if(status == 'editor') {
                    $('#kelurahan-select').hide().empty().append('<option selected value="kosong">Pilih Kelurahan</option>');
                } else {
                    if (kecamatanID) {
                        // Aktifkan select kelurahan di modal
                        $('#kelurahan-select').show();
                        $('#kelurahan-select').empty().append('<option selected value="kosong">Pilih Kelurahan</option>');

                        // Ambil data kelurahan berdasarkan kecamatan yang dipilih
                        $.ajax({
                            url: '/kelurahan/kecamatan/' + kecamatanID,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                $.each(data, function(key, kelurahan) {
                                    $('#kelurahan-select').append('<option value="' + kelurahan.id + '">' + kelurahan.name + '</option>');
                                });
                            }
                        });
                    } else {
                        // Jika tidak ada kecamatan yang dipilih
                        $('#kelurahan-select').hide().empty().append('<option selected value="kosong">Pilih Kelurahan</option>');
                    }
                }
            });
        });

        $(document).ready(function() {
            // Tangkap event perubahan pada status-data
            $(document).on('change', '.status-data', function() {
                var statusId = $(this).data('status-id');
                console.log(statusId);
                $('#status-edit-' + statusId).off('change').on('change', function() {
                    var status = $(this).val();
                    console.log(status);
                    if (status) {
                        $('#kecamatan-select-edit-' + statusId).prop('disabled', true);
                        if (status == 'editor') {
                            $('#kelurahan-select-edit-' + statusId).hide().empty().append('<option selected value="kosong">Pilih Kelurahan</option>');
                        } 

                        $('#kecamatan-select-edit-' + statusId).empty().append('<option selected value="">Pilih Kecamatan</option>');
                        $.ajax({
                            url: '/user/kecamatan',
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                $.each(data, function(key, kecamatan) {
                                    $('#kecamatan-select-edit-' + statusId).append('<option value="' + kecamatan.id + '">' + kecamatan.name + '</option>');
                                });
                                $('#kecamatan-select-edit-' + statusId).prop('disabled', false);
                            }
                        });
                    } else {
                        $('#kelurahan-select-edit-' + statusId).hide();
                        $('#kecamatan-select-edit-' + statusId).prop('disabled', true).empty().append('<option selected value="">Pilih Kecamatan</option>');
                    }
                });

                $('#kecamatan-select-edit-' + statusId).off('change').on('change', function() {
                    var kecamatanID = $(this).val();
                    var status = $('#status-edit-' + statusId).val();

                    if(status == 'editor') {
                        $('#kelurahan-select-edit-' + statusId).hide().empty().append('<option selected value="kosong">Pilih Kelurahan</option>');
                    } else {
                        if (kecamatanID) {
                            // Aktifkan select kelurahan di modal
                            $('#kelurahan-select-edit-' + statusId).show();
                            $('#kelurahan-select-edit-' + statusId).empty().append('<option selected value="kosong">Pilih Kelurahan</option>');

                            // Ambil data kelurahan berdasarkan kecamatan yang dipilih
                            $.ajax({
                                url: '/kelurahan/kecamatan/' + kecamatanID,
                                type: "GET",
                                dataType: "json",
                                success: function(data) {
                                    $.each(data, function(key, kelurahan) {
                                        $('#kelurahan-select-edit-' + statusId).append('<option value="' + kelurahan.id + '">' + kelurahan.name + '</option>');
                                    });
                                    $('#kelurahan-select-edit-' + statusId).prop('disabled', false);
                                }
                            });
                        } else {
                            // Jika tidak ada kecamatan yang dipilih
                            $('#kelurahan-select-edit-' + statusId).hide().empty().append('<option selected value="kosong">Pilih Kelurahan</option>');
                        }
                    }
                });
            });

            // Event handler untuk button edit
            $(document).on('click', '.button-edit', function() {
                var modalId = $(this).data('modal-id');
                var data_kec = $('#editModal-' + modalId + ' #kecamatan-select-edit-' + modalId).val();
                var status_data = $('#editModal-' + modalId + ' #status-edit-' + modalId).val();

                $('#status-edit-' + modalId).trigger('change');
                // Disable kecamatan dan kelurahan saat loading data
                $('#kecamatan-select-edit-' + modalId).prop('disabled', true);
                $('#kelurahan-select-edit-' + modalId).prop('disabled', true);
                
                if (status_data == 'admin') {
                    $('#kecamatan-select-edit-' + modalId).hide();
                    return;
                } else if (status_data == 'editor') {
                    $('#kecamatan-select-edit-' + modalId).empty().append('<option value="">Pilih Kecamatan</option>');
                    // Load kecamatan data for 'editor'
                    $.ajax({
                        url: '/user/kecamatan',
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#kecamatan-select-edit-' + modalId).empty().append('<option value="">Pilih Kecamatan</option>');
                            $.each(data, function(key, kecamatan) {
                                if (kecamatan.id == data_kec) {
                                    $('#kecamatan-select-edit-' + modalId).append('<option selected value="' + kecamatan.id + '">' + kecamatan.name + '</option>');
                                } else {
                                    $('#kecamatan-select-edit-' + modalId).append('<option value="' + kecamatan.id + '">' + kecamatan.name + '</option>');
                                }
                            });
                            $('#kecamatan-select-edit-' + modalId).prop('disabled', false);
                        }
                    });
                } else {
                    var kecamatanID = $('#editModal-' + modalId + ' #id_kelcat').val();
                    var kelurahanID = $('#editModal-' + modalId + ' #id_kelkel').val();
                    
                    $('#kecamatan-select-edit-' + modalId).empty().append('<option value="">Pilih Kecamatan</option>');
                    // Load kecamatan data
                    $.ajax({
                        url: '/user/kecamatan',
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#kecamatan-select-edit-' + modalId).empty().append('<option value="">Pilih Kecamatan</option>');
                            $('#kecamatan-select-edit-' + modalId).prop('disabled', true);
                            $.each(data, function(key, kecamatan) {
                                if (kecamatan.id == kecamatanID) {
                                    $('#kecamatan-select-edit-' + modalId).append('<option selected value="' + kecamatan.id + '">' + kecamatan.name + '</option>');
                                } else {
                                    $('#kecamatan-select-edit-' + modalId).append('<option value="' + kecamatan.id + '">' + kecamatan.name + '</option>');
                                }
                            });
                            $('#kecamatan-select-edit-' + modalId).prop('disabled', false);
                        }
                    });

                    // Load kelurahan data
                    $('#kelurahan-select-edit-' + modalId).show();
                    $('#kelurahan-select-edit-' + modalId).prop('disabled', true);
                    $('#kelurahan-select-edit-' + modalId).empty().append('<option value="">Pilih Kelurahan</option>');
                    $.ajax({
                        url: '/kelurahan/kecamatan/' + kecamatanID,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $.each(data, function(key, kelurahan) {
                                if (kelurahan.id == kelurahanID) {
                                    $('#kelurahan-select-edit-' + modalId).append('<option selected value="' + kelurahan.id + '">' + kelurahan.name + '</option>');
                                } else {
                                    $('#kelurahan-select-edit-' + modalId).append('<option value="' + kelurahan.id + '">' + kelurahan.name + '</option>');
                                }
                            });
                            $('#kelurahan-select-edit-' + modalId).prop('disabled', false);
                        }
                    });
                }
            });
        });

        // $(document).ready(function() {
        //     $('#status-edit').on('change', function() {
        //         var status = $(this).val();
        //         if (status) {
        //             $('#kecamatan-select-edit').prop('disabled', false);
                    
        //             if (status == 'editor') {
        //                 $('#kelurahan-select-edit').hide().empty().append('<option selected value="kosong">Pilih Kelurahan</option>');
        //             } else {
        //                 $('#kelurahan-select-edit').show();
        //             }

        //             $('#kecamatan-select-edit').empty().append('<option selected value="">Pilih Kecamatan</option>');
        //             $.ajax({
        //                 url: '/user/kecamatan',
        //                 type: "GET",
        //                 dataType: "json",
        //                 success: function(data) {
        //                     $.each(data, function(key, kecamatan) {
        //                         $('#kecamatan-select-edit').append('<option value="' + kecamatan.id + '">' + kecamatan.name + '</option>');
        //                     });
        //                 }
        //             });
        //         } else {
        //             $('#kelurahan-select-edit').hide();
        //             $('#kecamatan-select-edit').prop('disabled', true).empty().append('<option selected value="">Pilih Kecamatan</option>');
        //         }
        //     });

        //     $('#kecamatan-select-edit').on('change', function() {
        //         var kecamatanID = $(this).val();
        //         var status = $('#status-edit').val();

        //         if(status == 'editor') {
        //             $('#kelurahan-select-edit').hide().empty().append('<option selected value="kosong">Pilih Kelurahan</option>');
        //         } else {
        //             if (kecamatanID) {
        //                 // Aktifkan select kelurahan di modal
        //                 $('#kelurahan-select-edit').show();
        //                 $('#kelurahan-select-edit').empty().append('<option selected value="kosong">Pilih Kelurahan</option>');

        //                 // Ambil data kelurahan berdasarkan kecamatan yang dipilih
        //                 $.ajax({
        //                     url: '/kelurahan/kecamatan/' + kecamatanID,
        //                     type: "GET",
        //                     dataType: "json",
        //                     success: function(data) {
        //                         $.each(data, function(key, kelurahan) {
        //                             $('#kelurahan-select-edit').append('<option value="' + kelurahan.id + '">' + kelurahan.name + '</option>');
        //                         });
        //                     }
        //                 });
        //             } else {
        //                 // Jika tidak ada kecamatan yang dipilih
        //                 $('#kelurahan-select-edit').hide().empty().append('<option selected value="kosong">Pilih Kelurahan</option>');
        //             }
        //         }
        //     });
        // });

        
</script>

<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</html>