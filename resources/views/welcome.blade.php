<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>File Explorer</title>

    <link rel="icon" href="/img/logo.png" type="image/icon type">

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-gray-100 w-full h-full px-2 sm:px-6">
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

        <div class="text-xl font-semibold tracking-wide mt-4">Documents</div>
        <div class="border-b border-b-gray-300 mt-4 mb-4"></div>

        {{-- Warning Alert --}}
        @if (session('warning'))
        <div class="flex p-4 mb-4 text-sm text-yellow-700 bg-yellow-100 rounded-lg" role="alert">
            <svg class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <div>
                <span class="font-medium">Warning:</span> {{ session('warning') }}
            </div>
        </div>
        @endif
        {{-- Warning Alert --}}

        {{-- Success Alert --}}
        @if (session('success'))
        <div class="flex p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg shadow-md" role="alert">
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
            <button type="button" data-modal-target="modal-add-folder" data-modal-toggle="modal-add-folder"
                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 border-2 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4 text-white mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 10.5v6m3-3H9m4.06-7.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                </svg>
                New Document
            </button>

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

        <div class="text-base font-medium tracking-wide mt-2">Folders</div>

        <div class="grid grid-cols-12 gap-4 mt-2">

            @forelse ($documents as $document)
            <button data-modal-target="modal-login" data-modal-toggle="modal-login"
                onclick="toggleModal('{{ $document->document }}')"
                class="col-span-2 rounded-lg bg-gray-200 p-2 flex flex-col">
                <img class="h-20 w-20" src="/img/folder-icon.png" alt="Folder Icon">

                <p class="text-xs font-semibold p-2 -mt-2">{{ $document->document }}</p>
                <p class="text-xs font-light p-2 -mt-3">{{ $document->total_folders }} Folder &nbsp;&#8226;&nbsp; {{
                    $document->total_files }} Files</p>
            </button>
            @empty
            <div class="flex p-4 mb-4 text-sm text-blue-800 rounded-lg bg-gray-300 col-span-12" role="alert">
                <svg class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd"></path>
                </svg>
                <div>
                    <span class="font-medium">No documents: Start creating your documents</span>
                </div>
            </div>
            @endforelse

        </div>

        <!-- Main modal -->
        <div id="modal-login" tabindex="-1" aria-hidden="true" data-modal-backdrop="static"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                    <button type="button" onclick="closeModal('modal-login')"
                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
                        data-modal-hide="modal-login">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <form class="px-6 py-6 lg:px-8" action="{{ route('auth') }}" method="POST">
                        @csrf
                        <h3 class="mb-4 text-xl font-medium text-gray-900">Open Document</h3>
                        <div class="space-y-6">
                            <div>
                                <label for="inputdocument"
                                    class="block mb-2 text-sm font-medium text-gray-900">Document</label>
                                <input type="text" name="inputdocument" id="inputdocument" readonly
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            </div>
                            <div>
                                <label for="password"
                                    class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                                <input type="password" name="password" id="password" placeholder="••••••••"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    required>
                            </div>
                            <button type="submit" onclick="formSubmit()"
                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Main modal -->
        <div id="modal-add-folder" tabindex="-1" aria-hidden="true"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button"
                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="modal-add-folder">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="px-6 py-6 lg:px-8">
                        <h3 class="mb-4 text-xl font-medium text-gray-900">Add New Document</h3>
                        <form class="space-y-6" action="{{ route('store') }}" method="POST">
                            @csrf
                            <div>
                                <label for="document"
                                    class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                                <input type="text" name="document" id="document" style="text-transform:uppercase"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Document name" required>
                            </div>
                            <div>
                                <label for="document_password"
                                    class="block mb-2 text-sm font-medium text-gray-900">Document Password</label>
                                <input type="password" name="document_password" id="document_password" placeholder="••••••••"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    required>
                            </div>
                            <div>
                                <label for="confirmation_document_password"
                                    class="block mb-2 text-sm font-medium text-gray-900">Confirmation Document Password</label>
                                <input type="password" name="confirmation_document_password" id="confirmation_document_password" placeholder="••••••••"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    required>
                            </div>
                            <div>
                                <label for="password"
                                    class="block mb-2 text-sm font-medium text-gray-900">Admin Password</label>
                                <input type="password" name="password" id="password" placeholder="••••••••"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    required>
                            </div>
                            <button type="submit"
                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Create New Document</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-login-backdrop"></div>
    <script>
        const modalLogin = document.getElementById("modal-login");
        const modalBackdrop = document.getElementById("modal-login-backdrop");
        const inputdocument = document.getElementById("inputdocument");

        let folder = '';

        function toggleModal(value){
            modalLogin.classList.toggle("hidden");
            modalBackdrop.classList.toggle("hidden");
            modalLogin.classList.toggle("flex");
            modalBackdrop.classList.toggle("flex");

            folder = value;
            inputdocument.value = (value);
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