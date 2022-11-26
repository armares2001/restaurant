<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2-p-2">
                <a href="{{route('admin.categories.create')}}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg">Create Category</a>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-2">
                <table class="min-w-full">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                Image
                            </th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                Description
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-white">
                            <td scope="row" class="py-4 px-6 text-sm font-medium whitespace-nowrap">
                                {{$category->name}}
                            </td>
                            <td scope="row" class="px-6 py-4 text-sm font-medium whitespace-nowrap">
                                <img src="{{Storage::url($category->image)}}" class="w-16 h-16 rounded" alt="">
                            </td>
                            <td scope="row" class="px-6 text-sm py-4 font-medium whitespace-nowrap">
                                {{$category->description}}
                            </td>
                            <td scope="row" class="px-6 text-sm py-4 font-medium whitespace-nowrap">
                                <div class="flex space-x-2">
                                    <a href="{{route('admin.categories.edit', $category->id)}}" class="px-4 py-2 bg-green-500 hover:bg-green-700 text-white rounded">Edit</a>
                                    <form class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white"
                                    method="POST"
                                    action="{{route('admin.categories.destroy', $category->id)}}"
                                    onsubmit="return confirm('Are your sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>
