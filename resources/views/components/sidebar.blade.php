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

            <li class="mb-4">
                <a href="{{ route('things.index') }}"
                   class="flex items-center px-4 py-2 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white transition-colors duration-300
                   {{ request()->routeIs('things.index') ? 'bg-gray-200 dark:bg-gray-700' : '' }}">
                    <svg width="1em" height="1em" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" class="text-medium"><path d="M26 19H24.5V10.5C24.5 8.24566 23.6045 6.08365 22.0104 4.48959C20.4163 2.89553 18.2543 2 16 2C13.7457 2 11.5837 2.89553 9.98959 4.48959C8.39553 6.08365 7.5 8.24566 7.5 10.5V19H6C5.73478 19 5.48043 19.1054 5.29289 19.2929C5.10536 19.4804 5 19.7348 5 20C5 20.2652 5.10536 20.5196 5.29289 20.7071C5.48043 20.8946 5.73478 21 6 21H11.94V29C11.94 29.2652 12.0454 29.5196 12.2329 29.7071C12.4204 29.8946 12.6748 30 12.94 30C13.2052 30 13.4596 29.8946 13.6471 29.7071C13.8346 29.5196 13.94 29.2652 13.94 29V21H18.06V26C18.06 26.2652 18.1654 26.5196 18.3529 26.7071C18.5404 26.8946 18.7948 27 19.06 27C19.3252 27 19.5796 26.8946 19.7671 26.7071C19.9546 26.5196 20.06 26.2652 20.06 26V21H26C26.2652 21 26.5196 20.8946 26.7071 20.7071C26.8946 20.5196 27 20.2652 27 20C27 19.7348 26.8946 19.4804 26.7071 19.2929C26.5196 19.1054 26.2652 19 26 19ZM9.5 19V10.5C9.5 8.77609 10.1848 7.12279 11.4038 5.90381C12.6228 4.68482 14.2761 4 16 4C17.7239 4 19.3772 4.68482 20.5962 5.90381C21.8152 7.12279 22.5 8.77609 22.5 10.5V19H9.5Z" fill="currentColor"></path><path d="M13 17C12.7348 17 12.4804 16.8946 12.2929 16.7071C12.1054 16.5196 12 16.2652 12 16V10C12 9.73478 12.1054 9.48043 12.2929 9.29289C12.4804 9.10536 12.7348 9 13 9C13.2652 9 13.5196 9.10536 13.7071 9.29289C13.8946 9.48043 14 9.73478 14 10V16C14 16.2652 13.8946 16.5196 13.7071 16.7071C13.5196 16.8946 13.2652 17 13 17Z" fill="currentColor">
                        </path></svg>
                    Things
                </a>
            </li>


            <li class="mb-4">
                <a href="{{ route('cv.index') }}"
                   class="flex items-center px-4 py-2 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white transition-colors duration-300
                   {{ request()->routeIs('cv.index') ? 'bg-gray-200 dark:bg-gray-700' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.745 3A23.933 23.933 0 0 0 3 12c0 3.183.62 6.22 1.745 9M19.5 3c.967 2.78 1.5 5.817 1.5 9s-.533 6.22-1.5 9M8.25 8.885l1.444-.89a.75.75 0 0 1 1.105.402l2.402 7.206a.75.75 0 0 0 1.104.401l1.445-.889m-8.25.75.213.09a1.687 1.687 0 0 0 2.062-.617l4.45-6.676a1.688 1.688 0 0 1 2.062-.618l.213.09" />
                    </svg>
                    Cloud Variables
                </a>
            </li>
        </ul>
    </nav>
</aside>
