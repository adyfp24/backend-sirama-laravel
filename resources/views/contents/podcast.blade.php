<!-- resources/views/podcast.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
                    <form action="" class='p-2' onSubmit={handleSubmit}>
                        <div class='px-2 mb-5'>
                            <p class='text-lg font-medium'>Judul Podcast</p>
                            <input placeholder="Masukkan judul podcast..." onChange='' required type="text"
                                class='border w-full rounded-md px-4 h-10 text-sm font-medium border-gray-200' />
                        </div>
                        <div class="w-full px-2 mx-auto mt-5">
                            <p class='text-lg font-medium'>Tautan Podcast</p>
                            <div
                                class="mb-4 w-full bg-gray-50 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                                <div class="flex justify-between items-center py-2 px-3 border-b dark:border-gray-600">
                                    <div
                                        class="flex flex-wrap items-center divide-gray-200 sm:divide-x dark:divide-gray-600">
                                        <div class="flex items-center space-x-1 sm:pr-4">
                                            <button type="button"
                                                class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                            <button type="button"
                                                class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                            <button type="button"
                                                class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                            <button type="button"
                                                class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                            <button type="button"
                                                class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zm-.464 5.535a1 1 0 10-1.415-1.414 3 3 0 01-4.242 0 1 1 0 00-1.415 1.414 5 5 0 007.072 0z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="flex flex-wrap items-center space-x-1 sm:pl-4">
                                            <button type="button"
                                                class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                            <button type="button"
                                                class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                            <button type="button"
                                                class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                            <button type="button"
                                                class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
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
                                <div class="py-2 px-4 bg-white rounded-b-lg dark:bg-gray-800">
                                    <label for="editor" class="sr-only">Publish post</label>
                                    <textarea value={deskripsimentor} id="editor" rows="5"
                                        class="block px-0 w-full text-sm text-gray-800 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                                        placeholder="Masukkan tautan podcast..." required></textarea>
                                </div>
                            </div>
                            <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
                        </div>
                        <div class="w-full px-2 mx-auto mt-5">
                            <p class='text-lg font-medium'>Deskripsi Podcast</p>
                            <div
                                class="mb-4 w-full bg-gray-50 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                                <div class="flex justify-between items-center py-2 px-3 border-b dark:border-gray-600">
                                    <div
                                        class="flex flex-wrap items-center divide-gray-200 sm:divide-x dark:divide-gray-600">
                                        <div class="flex items-center space-x-1 sm:pr-4">
                                            <button type="button"
                                                class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                            <button type="button"
                                                class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                            <button type="button"
                                                class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                            <button type="button"
                                                class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                            <button type="button"
                                                class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zm-.464 5.535a1 1 0 10-1.415-1.414 3 3 0 01-4.242 0 1 1 0 00-1.415 1.414 5 5 0 007.072 0z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="flex flex-wrap items-center space-x-1 sm:pl-4">
                                            <button type="button"
                                                class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                            <button type="button"
                                                class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                            <button type="button"
                                                class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                            <button type="button"
                                                class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
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
                                <div class="py-2 px-4 bg-white rounded-b-lg dark:bg-gray-800">
                                    <label for="editor" class="sr-only">Publish post</label>
                                    <textarea value={hasilpenelitian} id="editor" rows="6"
                                        class="block px-0 w-full text-sm text-gray-800 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                                        placeholder="Masukkan deksipsi podcast..." required></textarea>
                                </div>
                            </div>
                            <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
                        </div>
                        <div class='flex justify-center px-2'>
                            <button onClick='' type='submit'
                                class='bg-blue-700 h-8 w-full rounded-lg px-3 text-sm font-semibold text-white'>Simpan</button>
                        </div>
                    </form>
                </div>

                <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md mt-5 mx-2">

                    <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Nama</th>
                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Sertifikasi</th>
                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Deskripsi</th>
                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Minat Penelitian</th>
                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Hasil Penelitian</th>
                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 border-t border-gray-100">

                            <tr key={id} class="hover:bg-gray-50">
                                <th class="px-6 py-4">
                                    <div class="text-sm">
                                        <div class="font-medium text-gray-700">{data.namamentor}</div>
                                        <div class="text-gray-400">{data.spesialisasi}</div>
                                        <div class="text-gray-400">{data.pendidikan}</div>
                                        <div class="text-gray-400">Rp {data.fee}</div>
                                    </div>
                                </th>
                                <td class="px-6 py-4">
                                    {data.sertifikasi}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm">
                                        <div class="font-medium text-gray-700">{data.deskripsimentor}</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex gap-2">
                                        <span
                                            class="inline-flex items-center gap-1 rounded-full bg-violet-50 px-2 py-1 text-xs font-semibold text-violet-600">
                                            {data.minatpenelitian}
                                        </span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex gap-2">
                                        <span
                                            class="inline-flex items-center gap-1 rounded-full bg-violet-50 px-2 py-1 text-xs font-semibold text-violet-600">
                                            {data.hasilpenelitian}
                                        </span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex gap-4">
                                        <button onClick="">
                                            <a x-data="{ tooltip: 'Delete' }" href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="h-6 w-6" x-tooltip="tooltip">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>
                                            </a>
                                        </button>

                                        <button>
                                            <a x-data="{ tooltip: 'Edit' }" href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="h-6 w-6" x-tooltip="tooltip">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                                </svg>
                                            </a>
                                        </button>
                                        </Link>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <ul id="podcastList">
        {{-- Data podcast akan dimasukkan di sini menggunakan JavaScript --}}
    </ul>
    <script>
        // Menggunakan jQuery AJAX untuk mengambil data dari API
        // $.ajax({
        //     url: 'http://127.0.0.1:8000/api/podcast',
        //     method: 'GET',
        //     dataType: 'json',
        //     success: function(data) {
        //         // Memasukkan data ke dalam templat Blade menggunakan jQuery
        //         const podcastList = $('#podcastList');
        //         $.each(data.data, function(index, podcast) {
        //             const listItem = $('<li><br>');
        //             listItem.append('<strong>ID:</strong> ' + podcast.id_podcast + '<br>');
        //             listItem.append('<strong>Judul:</strong> ' + podcast.judul_podcast + '<br>');
        //             listItem.append('<strong>Link:</strong> <a href="' + podcast.link_podcast +
        //             '" target="_blank">' + podcast.link_podcast + '</a><br>');
        //             listItem.append('<strong>Jumlah like:</strong> ' + podcast.total_likes + '<br>');
        //             listItem.append('<strong>Tanggal Upload:</strong> ' + podcast.tgl_upload + '<br>');
        //             podcastList.append(listItem);
        //         });
        //     },
        //     error: function(xhr, status, error) {
        //         console.error('Ada kesalahan:', error);
        //     }
        // });
    </script>
</body>

</html>
