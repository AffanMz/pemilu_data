<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log Aktivitas</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('build/assets/app-7KWvDcDT.css') }}">
    <script src="{{ asset('build/assets/app-CEsE5a7F.js') }}" defer></script>
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
                <h2 class="font-bold text-3xl text-gray-700">Log Aktivitas</h2>
            </div>


            <div class="flex flex-col border p-4 rounded-lg  min-h-[25rem] mb-4 rounde dark:bg-gray-800">
                <div class="w-full rounded-lg overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-blue-300 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    No
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    User
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Wilayah
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Aktivitas
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tanggal
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $log as $item )
                                @if (!is_null($item->user))
                                    <tr class="bg-blue-100 border-b dark:bg-gray-800 dark:border-gray-700 font-semibold hover:bg-blue-200 dark:hover:bg-gray-600">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $loop->iteration }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $item->user->name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->user->status }}
                                        </td>
                                        <td class="px-6 py-4">
                                            @php
                                                if ($item->user->status == 'admin') {
                                                    $wilayah = 'Semua Wilayah';
                                                } elseif ($item->user->status == 'editor') {
                                                    $wl = Kecamatan::find($item->user->id_tugas);
                                                    $wilayah = $wl->name;
                                                } else {
                                                    $wl = Kelurahan::find($item->user->id_tugas);
                                                    $wilayah = $wl->kecamatan->name . '-' . $wl->name;
                                                }
                                            @endphp
                                            {{ $wilayah }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->aktivitas }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->created_at }}
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</html>