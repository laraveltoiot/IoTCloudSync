<aside class="w-64 bg-gray-100 dark:bg-gray-900 min-h-screen p-4 fixed left-0 top-0 hidden lg:block border-r border-gray-200 dark:border-gray-700 shadow-lg">
    <nav>
        <ul>
            <li class="mb-4">
                <a href="{{ route('dashboard') }}"
                   class="flex items-center px-4 py-2 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white transition-colors duration-300
                   {{ request()->routeIs('dashboard') ? 'bg-gray-200 dark:bg-gray-700' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 mr-3 text-gray-500 dark:text-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205 3 1m1.5.5-1.5-.5M6.75 7.364V3h-3v18m3-13.636 10.5-3.819" />
                    </svg>
                    Dashboard
                </a>

            </li>
        </ul>
    </nav>
</aside>
