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
            <li class="mb-4">
                <a href="{{ route('devices.index') }}"
                   class="flex items-center px-4 py-2 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white transition-colors duration-300
                   {{ request()->routeIs('devices.index') ? 'bg-gray-200 dark:bg-gray-700' : '' }}">
                    <svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-500 dark:text-gray-400">
                        <path d="M25 21C25 21.2652 24.8946 21.5196 24.7071 21.7071C24.5196 21.8946 24.2652 22 24 22H14C13.7348 22 13.4804 21.8946 13.2929 21.7071C13.1054 21.5196 13 21.2652 13 21C13 20.7348 13.1054 20.4804 13.2929 20.2929C13.4804 20.1054 13.7348 20 14 20H24C24.2652 20 24.5196 20.1054 24.7071 20.2929C24.8946 20.4804 25 20.7348 25 21Z" fill="currentColor"></path><path d="M29.71 12.29L28 10.59V6C28 5.73478 27.8946 5.48043 27.7071 5.29289C27.5196 5.10536 27.2652 5 27 5H6C5.73478 5 5.48043 5.10536 5.29289 5.29289C5.10536 5.48043 5 5.73478 5 6V9H3C2.73478 9 2.48043 9.10536 2.29289 9.29289C2.10536 9.48043 2 9.73478 2 10V15C2 15.2652 2.10536 15.5196 2.29289 15.7071C2.48043 15.8946 2.73478 16 3 16H5V26C5 26.2652 5.10536 26.5196 5.29289 26.7071C5.48043 26.8946 5.73478 27 6 27H27C27.1316 27.0008 27.2621 26.9755 27.3839 26.9258C27.5057 26.876 27.6166 26.8027 27.71 26.71L29.71 24.71C29.8027 24.6166 29.876 24.5057 29.9258 24.3839C29.9755 24.2621 30.0008 24.1316 30 24V13C30.0008 12.8684 29.9755 12.7379 29.9258 12.6161C29.876 12.4943 29.8027 12.3834 29.71 12.29ZM4 14V11H9V14H4ZM28 23.59L26.59 25H7V16H10C10.2652 16 10.5196 15.8946 10.7071 15.7071C10.8946 15.5196 11 15.2652 11 15V10C11 9.73478 10.8946 9.48043 10.7071 9.29289C10.5196 9.10536 10.2652 9 10 9H7V7H26V11C25.9992 11.1316 26.0245 11.2621 26.0742 11.3839C26.124 11.5057 26.1973 11.6166 26.29 11.71L28 13.41V23.59Z" fill="currentColor">
                        </path></svg>
                    Devices
                </a>
            </li>
        </ul>
    </nav>
</aside>
