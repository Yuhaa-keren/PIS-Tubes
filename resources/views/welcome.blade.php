<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skill Exchange - Share Your Skills, Grow Together</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-white">
    <header class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-6">
                <div class="flex items-center">
                    <i class="fas fa-exchange-alt text-2xl text-blue-600 mr-2"></i>
                    <span class="text-2xl font-bold text-gray-900">Skill Exchange</span>
                </div>
                <div class="flex space-x-4">
                    <a href="{{ route('login') }}" class="text-gray-500 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">Sign In</a>
                    <a href="{{ route('register') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium">Get Started</a>
                </div>
            </div>
        </div>
    </header>

    <section class="bg-gradient-to-r from-blue-600 to-purple-600 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
            <div class="text-center">
                <h1 class="text-4xl md:text-6xl font-bold mb-6">
                    Share Your Skills, Grow Together
                </h1>
                <p class="text-xl md:text-2xl mb-8 text-blue-100">
                    Connect with others to exchange skills and knowledge. Offer help or request assistance in a collaborative learning environment.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('register') }}" class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition duration-300">
                        Get Started
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                    <a href="{{ route('login') }}" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition duration-300">
                        Sign In
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">How It Works</h2>
                <p class="text-xl text-gray-600">Our platform makes it easy to connect with others and exchange skills</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Create Your Profile</h3>
                    <p class="text-gray-600">Sign up and showcase your skills, experience, and what you can offer to others.</p>
                </div>
                <div class="text-center">
                    <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-file-alt text-2xl text-green-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Post Help Requests</h3>
                    <p class="text-gray-600">Create posts to offer help or request assistance with specific skills.</p>
                </div>
                <div class="text-center">
                    <div class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-calendar text-2xl text-purple-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Schedule Sessions</h3>
                    <p class="text-gray-600">Connect with others and schedule skill exchange sessions at convenient times.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Featured Exchanges</h2>
                <p class="text-xl text-gray-600">Check out some of the recent skill exchanges on our platform</p>
            </div>
            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex justify-between items-start mb-4">
                        <h3 class="text-xl font-semibold">Web Development Mentoring</h3>
                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm font-medium">Open for Help</span>
                    </div>
                    <p class="text-gray-600 mb-4">I can help with HTML, CSS, JavaScript, and React. Let me know if you need assistance with your web projects!</p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-sm">HTML</span>
                        <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-sm">CSS</span>
                        <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-sm">JavaScript</span>
                        <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-sm">React</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">
                            <i class="fas fa-clock mr-1"></i>
                            Deadline: Dec 20, 2023
                        </span>
                        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Contact</button>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex justify-between items-start mb-4">
                        <h3 class="text-xl font-semibold">Help with Data Structures</h3>
                        <span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-sm font-medium">Need Help</span>
                    </div>
                    <p class="text-gray-600 mb-4">I need help understanding advanced data structures like AVL trees and graph algorithms for my upcoming exam.</p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-sm">Data Structures</span>
                        <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-sm">Algorithms</span>
                        <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-sm">C++</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">
                            <i class="fas fa-clock mr-1"></i>
                            Deadline: Dec 5, 2023
                        </span>
                        <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Offer Help</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <div class="flex items-center justify-center mb-4">
                    <i class="fas fa-exchange-alt text-2xl text-blue-400 mr-2"></i>
                    <span class="text-2xl font-bold">Skill Exchange</span>
                </div>
                <p class="text-gray-400 mb-8">Connect, Learn, and Grow Together</p>
                <div class="flex justify-center space-x-6">
                    <a href="#" class="text-gray-400 hover:text-white">Terms</a>
                    <a href="#" class="text-gray-400 hover:text-white">Privacy</a>
                    <a href="#" class="text-gray-400 hover:text-white">Contact</a>
                </div>
                <p class="text-gray-400 mt-8">&copy; 2023 Skill Exchange. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>