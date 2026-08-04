<x-layout>
    @props($title = 'Categories')
    @forelse ($categories as $category)
    {{ $category->name }}
    {{ $category->slug }}
    @empty
    {{ 'There are no Category!' }}       
    @endforelse
    <a href="/create">Create Category </a>
</x-layout>
