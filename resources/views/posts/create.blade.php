<x-layout title="Create Post"> 
    <form action="{{ route('posts.store') }}" method="post">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Post Title</label>
            <input 
                type="text" 
                name="title" 
                id="title" 
                placeholder="Enter blog post title..."
                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
        </div>

        <div class="mb-4">
        <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Post Content</label>
        <textarea 
            name="body" 
            id="body" 
            rows="5" 
            placeholder="Write your blog content here..."
            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
        ></textarea>
        </div>
        <div class="mb-4">
            <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1"> Select a category</label>
            <select name="category_id" id="category_id">
                 <option value="">Select a category...</option>
                 @foreach ($categories as $category)
                 <option value="{{ $category->id }}">{{ $category->name }}</option>                     
                 @endforeach
            </select>
        </div>
        <div>
            <button type="submit">Submit</button>
        </div>
        <select name="status" id="sttatus">
            <option value="draft">draft</option>
            <option value="published">published</option>
        </select>
    </form>
</x-layout>