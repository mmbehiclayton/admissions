<!-- Desktop sidebar -->
<aside class="z-20 flex-shrink-0 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block">
    <div class="py-4 text-gray-500 dark:text-gray-400">
        <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="/">
            Admissions App
        </a>

        <!-- Dashboard -->
        <ul class="mt-6">
            <li class="relative px-6 py-3">
                @if (request()->routeIs('admin.home'))
                <span class="absolute inset-y-0 left-0 w-1 bg-green-300 rounded-tr-lg rounded-br-lg"></span>
                @endif
                <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100" href="/">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 12l2-2m0 0l7-7 7 7m-9 14v-6h4v6m5-10h2a2 2 0 012 2v7a2 2 0 01-2 2h-2"/>
                    </svg>
                    <span class="ml-4">Dashboard</span>
                </a>
            </li>
        </ul>

        <!-- Active Classes -->
        <ul>
            <li class="relative px-6 py-3">
                @if (request()->routeIs('classes.index'))
                <span class="absolute inset-y-0 left-0 w-1 bg-green-300 rounded-tr-lg rounded-br-lg"></span>
                @endif
                <a class="inline-flex items-center w-full text-sm font-semibold hover:text-gray-800 dark:hover:text-gray-200" href="{{ route('streams.all') }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M8 10h.01M12 10h.01M16 10h.01M9 16h6M4 6h16M4 6v12a2 2 0 002 2h12a2 2 0 002-2V6"/>
                    </svg>
                    <span class="ml-4">Active Classes</span>
                </a>
            </li>
        </ul>

        <!-- Learner Enrollment -->
        <ul>
            <li class="relative px-6 py-3">
                @if (request()->routeIs('learners.index'))
                <span class="absolute inset-y-0 left-0 w-1 bg-green-300 rounded-tr-lg rounded-br-lg"></span>
                @endif
                <a class="inline-flex items-center w-full text-sm font-semibold hover:text-gray-800 dark:hover:text-gray-200" href="{{ route('learners.index') }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5.121 17.804A6 6 0 0112 15h0a6 6 0 016.879 2.804M15 11a3 3 0 10-6 0 3 3 0 006 0z"/>
                    </svg>
                    <span class="ml-4">Learner Enrollment</span>
                </a>
            </li>
        </ul>

        <!-- Transport -->
        <ul>
            <li class="relative px-6 py-3">
                @if (request()->routeIs('buses.index'))
                <span class="absolute inset-y-0 left-0 w-1 bg-green-300 rounded-tr-lg rounded-br-lg"></span>
                @endif
                <a class="inline-flex items-center w-full text-sm font-semibold hover:text-gray-800 dark:hover:text-gray-200" href="{{ route('buses.index') }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 17a1 1 0 001 1h1a1 1 0 001-1M18 17a1 1 0 001 1h1a1 1 0 001-1M5 7h14l1 5H4l1-5zM6 12h12v2H6v-2z"/>
                    </svg>
                    <span class="ml-4">Transport</span>
                </a>
            </li>
        </ul>

        <!-- App Settings -->
        <ul>
            <li class="relative px-6 py-3">
                <button class="inline-flex items-center justify-between w-full text-sm font-semibold hover:text-gray-800 dark:hover:text-gray-200 focus:outline-none" @click="togglePagesMenu" aria-haspopup="true">
                    <span class="inline-flex items-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 8c1.104 0 2-.896 2-2s-.896-2-2-2-2 .896-2 2 .896 2 2 2zm0 1c-1.657 0-3 1.343-3 3v5h6v-5c0-1.657-1.343-3-3-3z"/>
                        </svg>
                        <span class="ml-4">App Settings</span>
                    </span>
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                    </svg>
                </button>
                <template x-if="isPagesMenuOpen">
                    <ul class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900">
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                            <a class="w-full" href="{{ route('users.index') }}">System Users</a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                            <a class="w-full" href="{{ route('roles.index') }}">Roles & Permissions</a>
                        </li>
                        
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                            <a class="w-full" href="{{ route('classes.index') }}">Classes</a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                            <a class="w-full" href="{{ route('streams.index') }}">Streams</a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                            <a class="w-full" href="{{ route('learners.upload') }}">Import Learners</a>
                        </li>
                        <!-- Add more subitems here -->
                    </ul>
                </template>
            </li>
        </ul>
    </div>
</aside>
