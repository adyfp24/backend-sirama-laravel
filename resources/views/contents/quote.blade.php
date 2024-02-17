<!-- resources/views/podcast.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Podcast</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div>
        @include('templates.navbar')
        <div>
            @include('templates.sidebar')
        </div>
        <div class="flex overflow-hidden bg-white pt-16">
            <div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10"></div>
            <div class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
                <div>
                    <form id="form-quote" class='p-2'>
                        @csrf
                        <div class='px-2 mb-5'>
                            <p class='text-lg font-medium'>Judul Quote</p>
                            <input name="nama_quote" placeholder="Masukkan judul Quote..." onChange='' required
                                type="text"
                                class='border w-full rounded-md px-4 h-10 text-sm font-medium border-gray-200' />
                        </div>
                        <div class="w-full px-2 mx-auto mt-5">
                            <p class='text-lg font-medium'>Gambar Quote</p>
                            <div
                                class="mb-4 w-full bg-gray-50 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                                <div class="flex justify-between items-center py-2 px-3 border-b dark:border-gray-600">
                                    <div
                                        class="flex flex-wrap items-center divide-gray-200 sm:divide-x dark:divide-gray-600">
                                        <div class="flex items-center space-x-1 sm:pr-4">

                                            <label for="file-upload"
                                                class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </label>
                                            <input name="gambar_quote" id="file-upload" type="file" />

                                        </div>
                                    </div>
                                    <button type="button" data-tooltip-target="tooltip-fullscreen"
                                        class="p-2 text-gray-500 rounded cursor-pointer sm:ml-auto hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M3 4a1 1 0 011-1h4a1 1 0 010 2H6.414l2.293 2.293a1 1 0 11-1.414 1.414L5 6.414V8a1 1 0 01-2 0V4zm9 1a1 1 0 010-2h4a1 1 0 011 1v4a1 1 0 01-2 0V6.414l-2.293 2.293a1 1 0 11-1.414-1.414L13.586 5H12zm-9 7a1 1 0 012 0v1.586l2.293-2.293a1 1 0 111.414 1.414L6.414 15H8a1 1 0 010 2H4a1 1 0 01-1-1v-4zm13-1a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 010-2h1.586l-2.293-2.293a1 1 0 111.414-1.414L15 13.586V12a1 1 0 011-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                    <div id="tooltip-fullscreen" role="tooltip"
                                        class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                                        Show full screen
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                </div>

                            </div>
                            <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
                        </div>

                        <div class='flex justify-center px-2'>
                            <button type='submit'
                                class='bg-blue-700 h-8 w-full rounded-lg px-3 text-sm font-semibold text-white'>Simpan</button>
                        </div>
                    </form>
                </div>

                <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md mt-5 mx-2">

                    <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">No</th>
                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Judul Quote</th>
                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Gambar Quote</th>
                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Jumlah Likes</th>
                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Tanggal Upload</th>
                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="quote-list" class="divide-y divide-gray-100 border-t border-gray-100">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        var apiToken = localStorage.getItem('api_token');

        function refreshQuoteList() {
            // Menggunakan jQuery AJAX untuk mengambil data dari API
            $.ajax({
                url: 'http://127.0.0.1:8000/api/quote',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    const quoteList = $('#quote-list');
                    $.each(data.data, function(index, quote) {
                        const row = $('<tr>').addClass('hover:bg-gray-50');
                        row.append('<td class="px-2 py-4">' + (index + 1) + '</td>');
                        row.append('<td class="px-6 py-4">' + quote.nama_quote + '</td>');
                        row.append(
                            '<td class="px-6 py-4"><div class="text-sm"><div class="font-medium text-gray-700"><a href="http://127.0.0.1:8000/storage/quote/' +
                            quote.gambar_quote + '">' +
                            quote.gambar_quote + '</a></div></div></td>');
                        row.append(
                            '<td class="px-6 py-4"><div class="flex gap-2"><span class="inline-flex items-center gap-1 rounded-full bg-violet-50 px-2 py-1 text-xs font-semibold text-violet-600">' +
                            quote.total_likes + '</span></div></td>');
                        row.append(
                            '<td class="px-6 py-4"><div class="flex gap-2"><span class="inline-flex items-center gap-1 rounded-full bg-violet-50 px-2 py-1 text-xs font-semibold text-violet-600">' +
                            quote.tgl_upload + '</span></div></td>');
                        row.append(
                            '<td class="px-6 py-4"><div class="flex gap-4"><button class="deleteButton" data-id="' +
                            quote.id_quote +
                            '">Delete</button><button class="editButton" data-id="' +
                            quote.id_quote + '">Edit</button></div></td>');
                        quoteList.append(row);
                    });

                    // Event handling untuk tombol Delete
                    $('.deleteButton').on('click', function() {
                        const quoteId = $(this).data('id');
                        $.ajax({
                            url: 'http://127.0.0.1:8000/api/quote/' + quoteId,
                            method: 'DELETE',
                            headers: {
                                'Authorization': 'Bearer ' + apiToken,
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function() {
                                alert('Data quote edukasi berhasil dihapus');
                                quoteList.empty();
                                refreshQuoteList();
                            },
                            error: function(xhr, status, error) {
                                console.error('Error:', error);
                                alert('Terjadi kesalahan saat mengirim data quote.');
                            }
                        })
                        // Tambahkan logika untuk menghandle penghapusan podcast dengan ID tertentu
                    });

                    // Event handling untuk tombol Edit
                    $('.editButton').on('click', function() {
                        const quoteId = $(this).data('id');
                        // Tambahkan logika untuk menghandle pengeditan podcast dengan ID tertentu
                        console.log('Edit quote dengan ID: ' + quoteId);
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Ada kesalahan:', error);
                }
            });
        };

        $(document).ready(function() {
            refreshQuoteList();
            $('#form-quote').submit(function(e) {
                e.preventDefault();
                var form = $(this);
                var formData = new FormData(form[0]); // Membuat objek FormData dari formulir

                $.ajax({
                    url: 'http://127.0.0.1:8000/api/quote',
                    method: 'POST',
                    data: formData,
                    processData: false, // Jangan memproses data secara otomatis
                    contentType: false, // Jangan mengatur tipe konten
                    headers: {
                        'Authorization': 'Bearer ' + apiToken
                    },
                    success: function(data) {
                        alert('Data quote edukasi berhasil ditambah');
                        refreshQuoteList();
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        alert('Terjadi kesalahan saat mengirim data quote.');
                    }
                });
            });
        });
    </script>
</body>

</html>
