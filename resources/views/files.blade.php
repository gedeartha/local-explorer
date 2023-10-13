<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>File Explorer</title>

    <link rel="icon" href="/img/logo.png" type="image/icon type">

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-gray-100 w-full h-full">
    <header class="bg-gray-100 w-full shadow-md">
        <div class="container mx-auto">
            <div class="flex justify-between items-center h-16">
                <a href="/" class="left flex space-x-3 items-center">
                    <img class="h-10 w-10" src="/img/logo.png" alt="File Explorer Logo">
                    <p class="text-lg font-semibold tracking-wide">File Explorer</p>
                </a>
                {{-- <div class="right">Right</div> --}}
            </div>
        </div>
    </header>

    <div class="content container mx-auto py-6">

        <div class="text-xl font-semibold tracking-wide mt-4">Files {{ $folder->folder_name }}</div>


        <nav class="flex mt-2" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-2">
                <li class="inline-flex items-center">
                    <a href="/" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-blue-600">
                        <svg class="w-3 h-3 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg>
                        Documents
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-3 h-3 text-gray-500 mx-1 mr-2" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="/folders" class="text-sm font-medium text-gray-500 hover:text-blue-600">{{
                            $document->document }}</a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-3 h-3 text-gray-500 mx-1 mr-2" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="{{ route('files', $folder->id) }}"
                            class="text-sm font-medium text-gray-500 hover:text-blue-600">{{ $folder->folder_name }}</a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-3 h-3 text-gray-500 mx-1 mr-2" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="#" class="text-sm font-medium text-gray-500 hover:text-blue-600">Files</a>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="border-b border-b-gray-300 mt-2"></div>

        {{-- Success Alert --}}
        @if (session('success'))
        <div class="flex p-4 my-4 text-sm text-green-700 bg-green-100 rounded-lg shadow-md" role="alert">
            <svg class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <div>
                <span class="font-medium">Success: </span> {{ session('success') }}
            </div>
        </div>
        @endif
        {{-- Success Alert --}}

        <div class="flex space-x-2 mt-4">
            <button type="button" data-modal-target="modal-upload" data-modal-toggle="modal-upload"
                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 border-2 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4 text-white mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m6.75 12l-3-3m0 0l-3 3m3-3v6m-1.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                </svg>
                Upload File
            </button>

            <!-- Main modal -->
            <div id="modal-upload" tabindex="-1" aria-hidden="true"
                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="modal-upload">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="px-6 py-6 lg:px-8">
                            <h3 class="mb-4 text-xl font-medium text-gray-900">Upload files
                            </h3>
                            <form class="space-y-4" action="{{ route('upload', $folder->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none"
                                    aria-describedby="file_input_help" id="file_input" name="file_input" type="file"
                                    required>
                                <p class="text-sm text-gray-500" id="file_input_help">File type: PDF, Word, Excel,
                                    Image, Video</p>

                                <button type="submit"
                                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <button type="button"
                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-black bg-white border-2 rounded-lg hover:text-white hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4 text-fill mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 01-.659 1.591l-5.432 5.432a2.25 2.25 0 00-.659 1.591v2.927a2.25 2.25 0 01-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 00-.659-1.591L3.659 7.409A2.25 2.25 0 013 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0112 3z" />
                </svg>
                Filter
            </button> --}}
        </div>

        <div class="text-base font-medium tracking-wide mt-2 mb-2">All Files</div>


        <div class="relative overflow-x-auto shadow-md rounded-lg border-t-2">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Created At
                        </th>
                        <th scope="col" class="px-6 py-3">
                            File Type
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($files as $file)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $file->files_name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $file->created_at }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $file->files_type }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            <a href="{{ route('download', $file->id) }}" type="button"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-3 h-3 text-fill mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                </svg>
                                Download
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr class="bg-white border-b">
                        <th colspan="12" scope="row"
                            class="px-6 py-4 font-medium text-gray-600 italic whitespace-nowrap">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6 inline-flex mr-1 items-center">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                            </svg>
                            No files! Start uploading files
                        </th>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

    <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-login-backdrop"></div>
    <script>
        const modalLogin = document.getElementById("modal-login");
        const modalBackdrop = document.getElementById("modal-login-backdrop");

        let folder = '';

        function toggleModal(value){
            modalLogin.classList.toggle("hidden");
            modalBackdrop.classList.toggle("hidden");
            modalLogin.classList.toggle("flex");
            modalBackdrop.classList.toggle("flex");

            folder = value;
            
        }

        function closeModal(modalID){
            modalBackdrop.classList.toggle("hidden");
        }

        function formSubmit(){

            inputPassword = document.getElementById("password").value;
            
            console.log(folder);
            console.log(inputPassword);
        }
    </script>
</body>

</html>