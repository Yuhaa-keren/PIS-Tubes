@extends('layouts.app')

@section('title', 'Profile - Skill Exchange')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-1">
            <div class="bg-white shadow rounded-lg p-6">
                <div class="text-center">
                    <div class="h-24 w-24 rounded-full bg-blue-500 flex items-center justify-center mx-auto mb-4 text-white text-2xl font-bold">
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
                        {{ substr($targetUser->name, 0, 1) }}
                    </div>
                    <h2 class="text-xl font-semibold text-gray-900">{{ $targetUser->name }}</h2>
                    <p class="text-gray-600">{{ $targetUser->department }} • {{ $targetUser->batch }}</p>
                    @if($targetUser->description)
                    <p class="mt-4 text-sm text-gray-700">{{ $targetUser->description }}</p>
                    @endif
                </div>
                
                @if($targetUser->id == auth()->id())
=======
                        {{ substr($displayUser->name, 0, 1) }}
                    </div>
                    <h2 class="text-xl font-semibold text-gray-900">{{ $displayUser->name }}</h2>
                    <p class="text-gray-600">{{ $displayUser->department }} • {{ $displayUser->batch }}</p>
                    @if($displayUser->description)
                    <p class="mt-4 text-sm text-gray-700">{{ $displayUser->description }}</p>
                    @endif
                </div>
                
                @if($displayUser->id == auth()->id())
>>>>>>> Stashed changes
=======
                        {{ substr($displayUser->name, 0, 1) }}
                    </div>
                    <h2 class="text-xl font-semibold text-gray-900">{{ $displayUser->name }}</h2>
                    <p class="text-gray-600">{{ $displayUser->department }} • {{ $displayUser->batch }}</p>
                    @if($displayUser->description)
                    <p class="mt-4 text-sm text-gray-700">{{ $displayUser->description }}</p>
                    @endif
                </div>
                
                @if($displayUser->id == auth()->id())
>>>>>>> Stashed changes
=======
                        {{ substr($displayUser->name, 0, 1) }}
                    </div>
                    <h2 class="text-xl font-semibold text-gray-900">{{ $displayUser->name }}</h2>
                    <p class="text-gray-600">{{ $displayUser->department }} • {{ $displayUser->batch }}</p>
                    @if($displayUser->description)
                    <p class="mt-4 text-sm text-gray-700">{{ $displayUser->description }}</p>
                    @endif
                </div>
                
                @if($displayUser->id == auth()->id())
>>>>>>> Stashed changes
=======
                        {{ substr($displayUser->name, 0, 1) }}
                    </div>
                    <h2 class="text-xl font-semibold text-gray-900">{{ $displayUser->name }}</h2>
                    <p class="text-gray-600">{{ $displayUser->department }} • {{ $displayUser->batch }}</p>
                    @if($displayUser->description)
                    <p class="mt-4 text-sm text-gray-700">{{ $displayUser->description }}</p>
                    @endif
                </div>
                
                @if($displayUser->id == auth()->id())
>>>>>>> Stashed changes
=======
                        {{ substr($displayUser->name, 0, 1) }}
                    </div>
                    <h2 class="text-xl font-semibold text-gray-900">{{ $displayUser->name }}</h2>
                    <p class="text-gray-600">{{ $displayUser->department }} • {{ $displayUser->batch }}</p>
                    @if($displayUser->description)
                    <p class="mt-4 text-sm text-gray-700">{{ $displayUser->description }}</p>
                    @endif
                </div>
                
                @if($displayUser->id == auth()->id())
>>>>>>> Stashed changes
                <div class="mt-6">
                    <button onclick="openEditProfileModal()" class="w-full bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                        <i class="fas fa-edit mr-2"></i>
                        Edit Profile
                    </button>
                </div>
                @endif
            </div>
        </div>
        
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
        <!-- Warnings Section -->
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
        <div class="mt-8">
            <h3 class="text-xl font-semibold mb-4">Your Warnings</h3>
            @forelse($warnings as $warning)
                <div class="bg-pink-100 border-l-4 border-pink-500 text-pink-700 p-4 mb-2 rounded">
                    <p class="font-bold">{{ $warning->title }} ({{ $warning->level }})</p>
                    <p class="text-sm">{{ $warning->description }}</p>
                    @if($warning->admin)
                        <p class="text-xs text-gray-600">Oleh Admin: {{ $warning->admin->name }}</p>
                    @endif
                    @if($warning->expires_at)
                        <p class="text-xs text-gray-600">Kadaluarsa: {{ $warning->expires_at->format('d M Y') }}</p>
                    @endif
                    <p class="text-xs text-gray-600">Status: {{ ucfirst($warning->status) }}</p>
                </div>
            @empty
                <div class="bg-gray-100 border-l-4 border-gray-500 text-gray-700 p-4 mb-2 rounded">
                    <p class="text-gray-500">Tidak ada peringatan untuk Anda.</p>
                </div>
            @endforelse
        </div>

<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
        <!-- Portfolio Section -->
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
        <div class="lg:col-span-2">
            <div class="bg-white shadow rounded-lg p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-semibold text-gray-900">Portfolio</h3>
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
                    @if($targetUser->id == auth()->id())
=======
                    @if($displayUser->id == auth()->id())
>>>>>>> Stashed changes
=======
                    @if($displayUser->id == auth()->id())
>>>>>>> Stashed changes
=======
                    @if($displayUser->id == auth()->id())
>>>>>>> Stashed changes
=======
                    @if($displayUser->id == auth()->id())
>>>>>>> Stashed changes
=======
                    @if($displayUser->id == auth()->id())
>>>>>>> Stashed changes
                    <button onclick="openCreatePortfolioModal()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center">
                        <i class="fas fa-plus mr-2"></i>
                        Add Portfolio
                    </button>
                    @endif
                </div>
                
                @if($portfolios->count() > 0)
                <div class="grid gap-6 md:grid-cols-2">
                    @foreach($portfolios as $portfolio)
                    <div class="border border-gray-200 rounded-lg p-4">
                        <div class="flex justify-between items-start mb-3">
                            <h4 class="text-lg font-medium text-gray-900">{{ $portfolio->title }}</h4>
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
                            @if($targetUser->id == auth()->id())
=======
                            @if($displayUser->id == auth()->id())
>>>>>>> Stashed changes
=======
                            @if($displayUser->id == auth()->id())
>>>>>>> Stashed changes
=======
                            @if($displayUser->id == auth()->id())
>>>>>>> Stashed changes
=======
                            @if($displayUser->id == auth()->id())
>>>>>>> Stashed changes
=======
                            @if($displayUser->id == auth()->id())
>>>>>>> Stashed changes
                            <div class="flex space-x-2">
                                <button onclick="editPortfolio({{ $portfolio->id }})" class="text-blue-600 hover:text-blue-900">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button onclick="deletePortfolio({{ $portfolio->id }})" class="text-red-600 hover:text-red-900">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                            @endif
                        </div>
                        
                        <p class="text-gray-700 text-sm mb-3">{{ $portfolio->description }}</p>
                        
                        <div class="flex flex-wrap gap-2 mb-3">
                            @foreach($portfolio->skills as $skill)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                {{ $skill->name }}
                            </span>
                            @endforeach
                        </div>
                        
                        <div class="flex space-x-3">
                            @if($portfolio->link)
                            <a href="{{ $portfolio->link }}" target="_blank" class="text-blue-600 hover:text-blue-900 text-sm">
                                <i class="fas fa-external-link-alt mr-1"></i>
                                View Link
                            </a>
                            @endif
                            @if($portfolio->file_path)
                            <a href="{{ Storage::url($portfolio->file_path) }}" target="_blank" class="text-green-600 hover:text-green-900 text-sm">
                                <i class="fas fa-file mr-1"></i>
                                View File
                            </a>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="text-center py-12">
                    <i class="fas fa-briefcase text-6xl text-gray-300 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">No portfolio items yet</h3>
                    <p class="text-gray-600 mb-6">
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
                        @if($targetUser->id == auth()->id())
                            Add your first portfolio item to showcase your work!
                        @else
                            {{ $targetUser->name }} hasn't added any portfolio items yet.
                        @endif
                    </p>
                    @if($targetUser->id == auth()->id())
=======
                        @if($displayUser->id == auth()->id())
                            Add your first portfolio item to showcase your work!
                        @else
                            {{ $displayUser->name }} hasn't added any portfolio items yet.
                        @endif
                    </p>
                    @if($displayUser->id == auth()->id())
>>>>>>> Stashed changes
=======
                        @if($displayUser->id == auth()->id())
                            Add your first portfolio item to showcase your work!
                        @else
                            {{ $displayUser->name }} hasn't added any portfolio items yet.
                        @endif
                    </p>
                    @if($displayUser->id == auth()->id())
>>>>>>> Stashed changes
=======
                        @if($displayUser->id == auth()->id())
                            Add your first portfolio item to showcase your work!
                        @else
                            {{ $displayUser->name }} hasn't added any portfolio items yet.
                        @endif
                    </p>
                    @if($displayUser->id == auth()->id())
>>>>>>> Stashed changes
=======
                        @if($displayUser->id == auth()->id())
                            Add your first portfolio item to showcase your work!
                        @else
                            {{ $displayUser->name }} hasn't added any portfolio items yet.
                        @endif
                    </p>
                    @if($displayUser->id == auth()->id())
>>>>>>> Stashed changes
=======
                        @if($displayUser->id == auth()->id())
                            Add your first portfolio item to showcase your work!
                        @else
                            {{ $displayUser->name }} hasn't added any portfolio items yet.
                        @endif
                    </p>
                    @if($displayUser->id == auth()->id())
>>>>>>> Stashed changes
                    <button onclick="openCreatePortfolioModal()" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg">
                        <i class="fas fa-plus mr-2"></i>
                        Add Portfolio
                    </button>
                    @endif
                </div>
                @endif
            </div>
        </div>
    </div>

<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
    <!-- Edit Profile Modal -->
    @if($targetUser->id == auth()->id())
    <div id="editProfileModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-1/2 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-medium text-gray-900">Edit Profile</h3>
                    <button onclick="closeEditProfileModal()" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                
                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="space-y-4">
                        <div>
                            <label for="profileName" class="block text-sm font-medium text-gray-700">Full Name</label>
                            <input type="text" name="name" id="profileName" value="{{ $targetUser->name }}" required 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        
                        <div>
                            <label for="profileEmail" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="profileEmail" value="{{ $targetUser->email }}" required 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="profileDepartment" class="block text-sm font-medium text-gray-700">Department</label>
                                <select name="department" id="profileDepartment" required 
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                    <option value="Computer Science" {{ $targetUser->department == 'Computer Science' ? 'selected' : '' }}>Computer Science</option>
                                    <option value="Information Systems" {{ $targetUser->department == 'Information Systems' ? 'selected' : '' }}>Information Systems</option>
                                    <option value="Design" {{ $targetUser->department == 'Design' ? 'selected' : '' }}>Design</option>
                                    <option value="Business" {{ $targetUser->department == 'Business' ? 'selected' : '' }}>Business</option>
                                    <option value="Engineering" {{ $targetUser->department == 'Engineering' ? 'selected' : '' }}>Engineering</option>
                                </select>
                            </div>
                            
                            <div>
                                <label for="profileBatch" class="block text-sm font-medium text-gray-700">Batch Year</label>
                                <select name="batch" id="profileBatch" required 
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                    <option value="2020" {{ $targetUser->batch == '2020' ? 'selected' : '' }}>2020</option>
                                    <option value="2021" {{ $targetUser->batch == '2021' ? 'selected' : '' }}>2021</option>
                                    <option value="2022" {{ $targetUser->batch == '2022' ? 'selected' : '' }}>2022</option>
                                    <option value="2023" {{ $targetUser->batch == '2023' ? 'selected' : '' }}>2023</option>
                                    <option value="2024" {{ $targetUser->batch == '2024' ? 'selected' : '' }}>2024</option>
                                </select>
                            </div>
                        </div>
                        
                        <div>
                            <label for="profileDescription" class="block text-sm font-medium text-gray-700">About You</label>
                            <textarea name="description" id="profileDescription" rows="3" 
                                      class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ $targetUser->description }}</textarea>
                        </div>
                        
                        <div>
                            <label for="profilePassword" class="block text-sm font-medium text-gray-700">New Password (leave blank to keep current)</label>
                            <input type="password" name="password" id="profilePassword" 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        
                        <div>
                            <label for="profilePasswordConfirmation" class="block text-sm font-medium text-gray-700">Confirm New Password</label>
                            <input type="password" name="password_confirmation" id="profilePasswordConfirmation" 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>
                    
                    <div class="flex justify-end space-x-3 mt-6">
                        <button type="button" onclick="closeEditProfileModal()" 
                                class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                            Cancel
                        </button>
                        <button type="submit" 
                                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                            Update Profile
                        </button>
                    </div>
=======
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
@if($displayUser->id == auth()->id())
<div id="editProfileModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-1/2 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-medium text-gray-900">Edit Profile</h3>
                <button onclick="closeEditProfileModal()" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            
            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="space-y-4">
                    <div>
                        <label for="profileName" class="block text-sm font-medium text-gray-700">Full Name</label>
                        <input type="text" name="name" id="profileName" value="{{ $displayUser->name }}" required 
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    
                    <div>
                        <label for="profileEmail" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="profileEmail" value="{{ $displayUser->email }}" required 
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="profileDepartment" class="block text-sm font-medium text-gray-700">Department</label>
                            <select name="department" id="profileDepartment" required 
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="Computer Science" {{ $displayUser->department == 'Computer Science' ? 'selected' : '' }}>Computer Science</option>
                                <option value="Information Systems" {{ $displayUser->department == 'Information Systems' ? 'selected' : '' }}>Information Systems</option>
                                <option value="Design" {{ $displayUser->department == 'Design' ? 'selected' : '' }}>Design</option>
                                <option value="Business" {{ $displayUser->department == 'Business' ? 'selected' : '' }}>Business</option>
                                <option value="Engineering" {{ $displayUser->department == 'Engineering' ? 'selected' : '' }}>Engineering</option>
                            </select>
                        </div>
                        
                        <div>
                            <label for="profileBatch" class="block text-sm font-medium text-gray-700">Batch Year</label>
                            <select name="batch" id="profileBatch" required 
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="2020" {{ $displayUser->batch == '2020' ? 'selected' : '' }}>2020</option>
                                <option value="2021" {{ $displayUser->batch == '2021' ? 'selected' : '' }}>2021</option>
                                <option value="2022" {{ $displayUser->batch == '2022' ? 'selected' : '' }}>2022</option>
                                <option value="2023" {{ $displayUser->batch == '2023' ? 'selected' : '' }}>2023</option>
                                <option value="2024" {{ $displayUser->batch == '2024' ? 'selected' : '' }}>2024</option>
                            </select>
                        </div>
                    </div>
                    
                    <div>
                        <label for="profileDescription" class="block text-sm font-medium text-gray-700">About You</label>
                        <textarea name="description" id="profileDescription" rows="3" 
                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ $displayUser->description }}</textarea>
                    </div>
                    
                    <div>
                        <label for="profilePassword" class="block text-sm font-medium text-gray-700">New Password (leave blank to keep current)</label>
                        <input type="password" name="password" id="profilePassword" 
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    
                    <div>
                        <label for="profilePasswordConfirmation" class="block text-sm font-medium text-gray-700">Confirm New Password</label>
                        <input type="password" name="password_confirmation" id="profilePasswordConfirmation" 
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>
                
                <div class="flex justify-end space-x-3 mt-6">
                    <button type="button" onclick="closeEditProfileModal()" 
                            class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                        Cancel
                    </button>
                    <button type="submit" 
                            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                        Update Profile
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="createPortfolioModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-1/2 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-medium text-gray-900">Add Portfolio Item</h3>
                <button onclick="closeCreatePortfolioModal()" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            
            <form action="{{ route('portfolio.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label for="portfolioTitle" class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" name="title" id="portfolioTitle" required 
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    
                    <div>
                        <label for="portfolioDescription" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" id="portfolioDescription" rows="3" required 
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
                    
                    <div>
                        <label for="portfolioLink" class="block text-sm font-medium text-gray-700">Link (optional)</label>
                        <input type="url" name="link" id="portfolioLink" 
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                               placeholder="https://example.com">
                    </div>
                    
                    <div>
                        <label for="portfolioFile" class="block text-sm font-medium text-gray-700">File (optional)</label>
                        <input type="file" name="file" id="portfolioFile" 
                               accept=".pdf,.doc,.docx,.jpg,.jpeg,.png"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <p class="mt-1 text-sm text-gray-500">Accepted formats: PDF, DOC, DOCX, JPG, JPEG, PNG (max 2MB)</p>
                    </div>
                </div>
                
                <div class="flex justify-end space-x-3 mt-6">
                    <button type="button" onclick="closeCreatePortfolioModal()" 
                            class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                        Cancel
                    </button>
                    <button type="submit" 
                            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                        Add Portfolio
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="editPortfolioModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-1/2 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-medium text-gray-900">Edit Portfolio Item</h3>
                <button onclick="closeEditPortfolioModal()" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            
            <form id="editPortfolioForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="space-y-4">
                    <div>
                        <label for="editPortfolioTitle" class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" name="title" id="editPortfolioTitle" required 
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    
                    <div>
                        <label for="editPortfolioDescription" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" id="editPortfolioDescription" rows="3" required 
                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Skills</label>
                        <div id="editPortfolioSkills" class="grid grid-cols-2 md:grid-cols-3 gap-2 max-h-40 overflow-y-auto border border-gray-300 rounded-md p-3">
                            @foreach($skills as $skill)
                            <label class="flex items-center">
                                <input type="checkbox" name="skills[]" value="{{ $skill->id }}" class="mr-2">
                                <span class="text-sm">{{ $skill->name }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>
                    
                    <div>
                        <label for="editPortfolioLink" class="block text-sm font-medium text-gray-700">Link (optional)</label>
                        <input type="url" name="link" id="editPortfolioLink" 
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    
                    <div>
                        <label for="editPortfolioFile" class="block text-sm font-medium text-gray-700">File (optional)</label>
                        <input type="file" name="file" id="editPortfolioFile" 
                               accept=".pdf,.doc,.docx,.jpg,.jpeg,.png"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <p class="mt-1 text-sm text-gray-500">Leave empty to keep current file</p>
                    </div>
                </div>
                
                <div class="flex justify-end space-x-3 mt-6">
                    <button type="button" onclick="closeEditPortfolioModal()" 
                            class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                        Cancel
                    </button>
                    <button type="submit" 
                            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                        Update Portfolio
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="deletePortfolioModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3 text-center">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                <i class="fas fa-exclamation-triangle text-red-600"></i>
            </div>
            <h3 class="text-lg font-medium text-gray-900 mt-4">Delete Portfolio Item</h3>
            <div class="mt-2 px-7 py-3">
                <p class="text-sm text-gray-500">
                    Are you sure you want to delete this portfolio item? This action cannot be undone.
                </p>
            </div>
            <div class="flex justify-center space-x-3 mt-4">
                <button onclick="closeDeletePortfolioModal()" 
                        class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                    Cancel
                </button>
                <form id="deletePortfolioForm" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                        Delete
                    </button>
>>>>>>> Stashed changes
                </form>
            </div>
        </div>
    </div>

    <!-- Create Portfolio Modal -->
    <div id="createPortfolioModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-1/2 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-medium text-gray-900">Add Portfolio Item</h3>
                    <button onclick="closeCreatePortfolioModal()" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                
                <form action="{{ route('portfolio.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label for="portfolioTitle" class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" name="title" id="portfolioTitle" required 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        
                        <div>
                            <label for="portfolioDescription" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" id="portfolioDescription" rows="3" required 
                                      class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Skills</label>
                            <div id="editPortfolioSkills" class="grid grid-cols-2 md:grid-cols-3 gap-2 max-h-40 overflow-y-auto border border-gray-300 rounded-md p-3">
                                @foreach($skills as $skill)
                                <label class="flex items-center">
                                    <input type="checkbox" name="skills[]" value="{{ $skill->id }}" class="mr-2">
                                    <span class="text-sm">{{ $skill->name }}</span>
                                </label>
                                @endforeach
                            </div>
                        </div>
                        
                        <div>
                            <label for="portfolioLink" class="block text-sm font-medium text-gray-700">Link (optional)</label>
                            <input type="url" name="link" id="portfolioLink" 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                   placeholder="https://example.com">
                        </div>
                        
                        <div>
                            <label for="portfolioFile" class="block text-sm font-medium text-gray-700">File (optional)</label>
                            <input type="file" name="file" id="portfolioFile" 
                                   accept=".pdf,.doc,.docx,.jpg,.jpeg,.png"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            <p class="mt-1 text-sm text-gray-500">Accepted formats: PDF, DOC, DOCX, JPG, JPEG, PNG (max 2MB)</p>
                        </div>
                    </div>
                    
                    <div class="flex justify-end space-x-3 mt-6">
                        <button type="button" onclick="closeCreatePortfolioModal()" 
                                class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                            Cancel
                        </button>
                        <button type="submit" 
                                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                            Add Portfolio
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Portfolio Modal -->
    <div id="editPortfolioModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-1/2 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-medium text-gray-900">Edit Portfolio Item</h3>
                    <button onclick="closeEditPortfolioModal()" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                
                <form id="editPortfolioForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="space-y-4">
                        <div>
                            <label for="editPortfolioTitle" class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" name="title" id="editPortfolioTitle" required 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        
                        <div>
                            <label for="editPortfolioDescription" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" id="editPortfolioDescription" rows="3" required 
                                      class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Skills</label>
                            <div id="editPortfolioSkills" class="grid grid-cols-2 md:grid-cols-3 gap-2 max-h-40 overflow-y-auto border border-gray-300 rounded-md p-3">
                                @foreach($skills as $skill)
                                <label class="flex items-center">
                                    <input type="checkbox" name="skills[]" value="{{ $skill->id }}" class="mr-2">
                                    <span class="text-sm">{{ $skill->name }}</span>
                                </label>
                                @endforeach
                            </div>
                        </div>
                        
                        <div>
                            <label for="editPortfolioLink" class="block text-sm font-medium text-gray-700">Link (optional)</label>
                            <input type="url" name="link" id="editPortfolioLink" 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        
                        <div>
                            <label for="editPortfolioFile" class="block text-sm font-medium text-gray-700">File (optional)</label>
                            <input type="file" name="file" id="editPortfolioFile" 
                                   accept=".pdf,.doc,.docx,.jpg,.jpeg,.png"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            <p class="mt-1 text-sm text-gray-500">Leave empty to keep current file</p>
                        </div>
                    </div>
                    
                    <div class="flex justify-end space-x-3 mt-6">
                        <button type="button" onclick="closeEditPortfolioModal()" 
                                class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                            Cancel
                        </button>
                        <button type="submit" 
                                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                            Update Portfolio
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Portfolio Modal -->
    <div id="deletePortfolioModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                    <i class="fas fa-exclamation-triangle text-red-600"></i>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mt-4">Delete Portfolio Item</h3>
                <div class="mt-2 px-7 py-3">
                    <p class="text-sm text-gray-500">
                        Are you sure you want to delete this portfolio item? This action cannot be undone.
                    </p>
                </div>
                <div class="flex justify-center space-x-3 mt-4">
                    <button onclick="closeDeletePortfolioModal()" 
                            class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                        Cancel
                    </button>
                    <form id="deletePortfolioForm" method="POST" class="inline">
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
@endif

<script>
    function openEditProfileModal() {
        document.getElementById('editProfileModal').classList.remove('hidden');
    }
    
    function closeEditProfileModal() {
        document.getElementById('editProfileModal').classList.add('hidden');
    }
    
    function openCreatePortfolioModal() {
        document.getElementById('createPortfolioModal').classList.remove('hidden');
        // Saat membuka modal create, pastikan field kosong
        document.getElementById('portfolioTitle').value = '';
        document.getElementById('portfolioDescription').value = '';
        document.getElementById('portfolioLink').value = '';
        document.getElementById('portfolioFile').value = ''; // Clear file input
        document.querySelectorAll('#createPortfolioModal input[name="skills[]"]').forEach(checkbox => {
            checkbox.checked = false; // Clear all skill checkboxes
        });
    }
    
    function closeCreatePortfolioModal() {
        document.getElementById('createPortfolioModal').classList.add('hidden');
    }
    
    function closeEditPortfolioModal() {
        document.getElementById('editPortfolioModal').classList.add('hidden');
    }
    
    function closeDeletePortfolioModal() {
        document.getElementById('deletePortfolioModal').classList.add('hidden');
    }
    
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
    // Edit portfolio - MODIFIKASI INI UNTUK MENGISI DATA LAMA
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
    function editPortfolio(portfolioId) {
        // Ambil token CSRF dari meta tag (pastikan meta tag ada di <head> layout app)
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Fetch data portfolio dari API
        fetch(`/api/portfolios/${portfolioId}`, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                // 'X-CSRF-TOKEN': csrfToken // CSRF token tidak selalu diperlukan untuk GET request API, tapi aman ditambahkan
            }
        })
        .then(response => {
            if (!response.ok) {
                // Tangani error HTTP (misal 404 Not Found)
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            // Isi field-field di modal edit portfolio
            document.getElementById('editPortfolioTitle').value = data.title;
            document.getElementById('editPortfolioDescription').value = data.description;
            document.getElementById('editPortfolioLink').value = data.link || ''; // Gunakan || '' untuk null
            // Input file tidak bisa diisi value-nya secara langsung untuk alasan keamanan
            // Anda bisa menampilkan info file yang sudah ada

            // Set action form untuk update
            document.getElementById('editPortfolioForm').action = `/portfolio/${portfolioId}`;

            // Reset dan tandai checkbox skills
            const skillsContainer = document.getElementById('editPortfolioSkills');
            skillsContainer.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
                checkbox.checked = false; // Uncheck semua dulu
            });

            // Tandai skill yang terkait dengan portfolio ini
            data.skills.forEach(skill => {
                const checkbox = skillsContainer.querySelector(`input[type="checkbox"][value="${skill.id}"]`);
                if (checkbox) {
                    checkbox.checked = true;
                }
            });

            // Tampilkan info file yang sudah ada (jika ada)
            let currentFileDisplay = document.getElementById('editPortfolioCurrentFileDisplay');
            if (!currentFileDisplay) {
                // Jika elemen belum ada, buat (misal di bawah input file editPortfolioFile)
                currentFileDisplay = document.createElement('p');
                currentFileDisplay.id = 'editPortfolioCurrentFileDisplay';
                currentFileDisplay.className = 'mt-1 text-sm text-gray-600';
                document.getElementById('editPortfolioFile').parentNode.appendChild(currentFileDisplay);
            }
            if (data.file_path) {
                const fileName = data.file_path.split('/').pop();
                currentFileDisplay.innerHTML = `Current file: <a href="/storage/${data.file_path}" target="_blank" class="text-blue-500 hover:underline">${fileName}</a>`;
                currentFileDisplay.classList.remove('hidden');
            } else {
                currentFileDisplay.classList.add('hidden');
                currentFileDisplay.innerHTML = '';
            }


            // Tampilkan modal edit portfolio
            document.getElementById('editPortfolioModal').classList.remove('hidden');
        })
        .catch(error => {
            console.error('Error fetching portfolio data:', error);
            alert('Gagal mengambil data portfolio. Silakan coba lagi. Cek console browser untuk detail.');
        });
    }
    
    function deletePortfolio(portfolioId) {
        document.getElementById('deletePortfolioModal').classList.remove('hidden');
        document.getElementById('deletePortfolioForm').action = `/portfolio/${portfolioId}`;
    }
</script>
@endsection