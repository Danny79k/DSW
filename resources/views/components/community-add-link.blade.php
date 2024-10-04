<div class="md:col-span-1 bg-gray-800 p-6 rounded-lg shadow-md border border-gray-600 self-start">
    <h3 class="text-xl font-semibold mb-4 text-white">Contribute a link</h3>
    <form method="POST" action="/dashboard">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-white font-medium">Title:</label>
            <input type="text" id="title" name="title"
                class="@error('title') is-invalid @enderror mt-1 block w-full rounded-md mal border-gray-600 bg-gray-700 text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                placeholder="What is the title of your resource?" />
            @error('title')
            <style>
                .mal {
                    background-color: red
                }
            </style>
                <div class="text-red-500 mt-2">{{ "el titulo tiene que ser valido" }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="link" class="block text-white font-medium">Link:</label>
            <input type="text" id="link" name="link"
                class="@error('link') is-invalid @enderror mal mt-1 block w-full rounded-md border-gray-600 bg-gray-700 text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                placeholder="What is the URL?" />
            @error('link')
            <style>
                .mal {
                    background-color: red
                }
            </style>
                <div class="text-red-500 mt-2">{{ "el enlace tiene que ser valido" }}</div>
            @enderror
        </div>

        <div class="pt-3">
            <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Contribute!</button>
        </div>
    </form>
</div>