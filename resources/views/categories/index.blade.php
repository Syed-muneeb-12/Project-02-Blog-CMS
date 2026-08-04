<x-layout title="Categories">
    <div class="space-y-4">
        <h1 class="text-2xl font-bold">Categories</h1>

        <div class="mt-4">
            <a href="{{ route('categories.create') }}" class="btn btn-primary">
                Create Category
            </a>
        </div>

        <ul class="divide-y divide-gray-200">
            @forelse ($categories as $category)
                <li class="py-2">
                    <span class="font-semibold">{{ $category->name }}</span>
                    <span class="text-sm text-gray-500">({{ $category->slug }})</span>
                </li>
            @empty
                <li class="py-2 text-gray-500">No categories found!</li>
            @endforelse
        </ul>


    </div>
</x-layout>