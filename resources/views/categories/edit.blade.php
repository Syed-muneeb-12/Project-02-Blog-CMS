<x-layout title="Edit Page">
    {{-- <form action="{{ route('update') }}" method="post"> --}}
        <input type="text" name="name" value="{{ old('$category->name') }}>
    {{-- </form> --}}
    
</x-layout>