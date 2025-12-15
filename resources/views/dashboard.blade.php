@extends('layouts.app')

@section('title', 'Dashboard - Skill Exchange')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Dashboard</h1>
        <button onclick="openCreateModal()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center">
            <i class="fas fa-plus mr-2"></i>
            Create Post
        </button>
    </div>

    <div class="mb-6 flex flex-col sm:flex-row gap-4">
        <form method="GET" action="{{ route('dashboard') }}" class="flex-1">
            <div class="relative">
                <input type="text" name="search" value="{{ request('search') }}" 
                        placeholder="Search posts..." 
                        class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
            </div>
        </form>
        <form method="GET" action="{{ route('dashboard') }}">
            <input type="hidden" name="search" value="{{ request('search') }}">
            <select name="type" onchange="this.form.submit()" 
                    class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                <option value="all" {{ request('type') == 'all' ? 'selected' : '' }}>All Posts</option>
                <option value="open" {{ request('type') == 'open' ? 'selected' : '' }}>Open for Help</option>
                <option value="need" {{ request('type') == 'need' ? 'selected' : '' }}>Need Help</option>
            </select>
        </form>
    </div>

    @if($posts->count() > 0)
    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        @foreach($posts as $post)
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-start mb-4">
                <div class="flex-1">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $post->title }}</h3>
                    <p class="text-sm text-gray-600">
                        Posted by {{ $post->user->name }} • {{ $post->user->department }} • {{ $post->user->batch }}
                    </p>
                </div>
                <div class="flex items-center space-x-2">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $post->type == 'open' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ $post->type == 'open' ? 'Open for Help' : 'Need Help' }}
                    </span>
                    @if($post->user_id == auth()->id())
                    <div class="relative">
                        <button onclick="togglePostMenu({{ $post->id }})" class="text-gray-400 hover:text-gray-600">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <div id="postMenu{{ $post->id }}" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-10">
                            <button onclick="editPost({{ $post->id }})" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-edit mr-2"></i>Edit
                            </button>
                            <button onclick="deletePost({{ $post->id }})" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                <i class="fas fa-trash mr-2"></i>Delete
                            </button>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            
            <p class="text-gray-700 mb-4">{{ Str::limit($post->description, 100) }}</p>
            
            <div class="flex flex-wrap gap-2 mb-4">
                @foreach($post->skills as $skill)
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                    {{ $skill->name }}
                </span>
                @endforeach
            </div>
            
            <div class="flex justify-between items-center border-t pt-4">
                <span class="text-sm text-gray-500">
                    <i class="fas fa-calendar mr-1"></i>
                    Deadline: {{ $post->deadline->format('M d, Y') }}
                </span>
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
                @if($post->user_id != auth()->id()) {{-- Hanya tampilkan tombol kontak jika bukan post sendiri --}}
                    {{-- Tombol Contact/Offer Help akan jadi link Email --}}
=======
                @if($post->user_id != auth()->id()) 
>>>>>>> Stashed changes
=======
                @if($post->user_id != auth()->id()) 
>>>>>>> Stashed changes
=======
                @if($post->user_id != auth()->id()) 
>>>>>>> Stashed changes
=======
                @if($post->user_id != auth()->id()) 
>>>>>>> Stashed changes
=======
                @if($post->user_id != auth()->id()) 
>>>>>>> Stashed changes
                    <a href="mailto:{{ $post->user->email }}" 
                       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm inline-flex items-center">
                        <i class="fas fa-envelope mr-2"></i> {{ $post->type == 'open' ? 'Contact' : 'Offer Help' }}
                    </a>
                @else
                    <span class="text-sm text-gray-500">Your Post</span>
                @endif
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-8">
        {{ $posts->links() }}
    </div>
    @else
    <div class="text-center py-12">
        <i class="fas fa-search text-6xl text-gray-300 mb-4"></i>
        <h3 class="text-xl font-semibold text-gray-900 mb-2">No posts found</h3>
        <p class="text-gray-600 mb-6">
            @if(request('search'))
                Try adjusting your search or filter to find what you're looking for.
            @else
                Create your first post to get started!
            @endif
        </p>
        <button onclick="openCreateModal()" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg">
            <i class="fas fa-plus mr-2"></i>
            Create Post
        </button>
    </div>
    @endif
</div>

<div id="createModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-1/2 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-medium text-gray-900">Create New Post</h3>
                <button onclick="closeCreateModal()" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Post Type</label>
                        <div class="flex space-x-4">
                            <label class="flex items-center">
                                <input type="radio" name="type" value="open" class="mr-2" checked>
                                <span>Open for Help</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="type" value="need" class="mr-2">
                                <span>Need Help</span>
                            </label>
                        </div>
                    </div>
                    
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" name="title" id="title" required 
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" id="description" rows="4" required 
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Skills</label>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-2 max-h-40 overflow-y-auto border border-gray-300 rounded-md p-3">
                            @foreach($skills as $skill)
                            <label class="flex items-center">
                                <input type="checkbox" name="skills[]" value="{{ $skill->id }}" class="mr-2">
                                <span class="text-sm">{{ $skill->name }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="deadline" class="block text-sm font-medium text-gray-700">Deadline</label>
                            <input type="date" name="deadline" id="deadline" required 
                                    min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        
                        <div>
                            <label for="preference" class="block text-sm font-medium text-gray-700">Preference</label>
                            <select name="preference" id="preference" required 
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="online">Online</option>
                                <option value="offline">Offline</option>
                                <option value="both">Both</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="flex justify-end space-x-3 mt-6">
                    <button type="button" onclick="closeCreateModal()" 
                            class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                        Cancel
                    </button>
                    <button type="submit" 
                            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                        Create Post
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="editModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-1/2 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-medium text-gray-900">Edit Post</h3>
                <button onclick="closeEditModal()" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Post Type</label>
                        <div class="flex space-x-4">
                            <label class="flex items-center">
                                <input type="radio" name="type" value="open" class="mr-2" id="editTypeOpen">
                                <span>Open for Help</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="type" value="need" class="mr-2" id="editTypeNeed">
                                <span>Need Help</span>
                            </label>
                        </div>
                    </div>
                    
                    <div>
                        <label for="editTitle" class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" name="title" id="editTitle" required 
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    
                    <div>
                        <label for="editDescription" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" id="editDescription" rows="4" required 
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Skills</label>
                        <div id="editSkills" class="grid grid-cols-2 md:grid-cols-3 gap-2 max-h-40 overflow-y-auto border border-gray-300 rounded-md p-3">
                            @foreach($skills as $skill)
                            <label class="flex items-center">
                                <input type="checkbox" name="skills[]" value="{{ $skill->id }}" class="mr-2">
                                <span class="text-sm">{{ $skill->name }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="editDeadline" class="block text-sm font-medium text-gray-700">Deadline</label>
                            <input type="date" name="deadline" id="editDeadline" required 
                                    min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        
                        <div>
                            <label for="editPreference" class="block text-sm font-medium text-gray-700">Preference</label>
                            <select name="preference" id="editPreference" required 
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="online">Online</option>
                                <option value="offline">Offline</option>
                                <option value="both">Both</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="flex justify-end space-x-3 mt-6">
                    <button type="button" onclick="closeEditModal()" 
                            class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                        Cancel
                    </button>
                    <button type="submit" 
                            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                        Update Post
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="deleteModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3 text-center">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                <i class="fas fa-exclamation-triangle text-red-600"></i>
            </div>
            <h3 class="text-lg font-medium text-gray-900 mt-4">Delete Post</h3>
            <div class="mt-2 px-7 py-3">
                <p class="text-sm text-gray-500">
                    Are you sure you want to delete this post? This action cannot be undone.
                </p>
            </div>
            <div class="flex justify-center space-x-3 mt-4">
                <button onclick="closeDeleteModal()" 
                        class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                    Cancel
                </button>
                <form id="deleteForm" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function openCreateModal() {
        document.getElementById('createModal').classList.remove('hidden');
    }
    
    function closeCreateModal() {
        document.getElementById('createModal').classList.add('hidden');
    }
    
    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }
    
    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }
    
    function togglePostMenu(postId) {
        const menu = document.getElementById('postMenu' + postId);
        menu.classList.toggle('hidden');
    }
    
    function editPost(postId) {
        document.getElementById('editModal').classList.remove('hidden');
        document.getElementById('editForm').action = '/posts/' + postId;
    }
    
    function deletePost(postId) {
        document.getElementById('deleteModal').classList.remove('hidden');
        document.getElementById('deleteForm').action = '/posts/' + postId;
    }
    
    window.onclick = function(event) {
        if (!event.target.matches('.fa-ellipsis-v')) {
            const menus = document.querySelectorAll('[id^="postMenu"]');
            menus.forEach(menu => {
                if (!menu.classList.contains('hidden')) {
                    menu.classList.add('hidden');
                }
            });
        }
    }
</script>
@endsection