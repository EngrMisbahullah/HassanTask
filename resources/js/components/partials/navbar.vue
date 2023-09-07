<template>
      <nav
        class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700"
    >
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start">
                    <button
                        data-drawer-target="logo-sidebar"
                        data-drawer-toggle="logo-sidebar"
                        aria-controls="logo-sidebar"
                        type="button"
                        class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    >
                        <span class="sr-only">Open sidebar</span>
                        <svg
                            class="w-6 h-6"
                            aria-hidden="true"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                clip-rule="evenodd"
                                fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"
                            ></path>
                        </svg>
                    </button>
                    <a href="https://flowbite.com" class="flex ml-2 md:mr-24">
                        <span
                            class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white"
                            >Eccomerce</span
                        >
                    </a>
                </div>
                <div class="flex items-center">
                    <div x-data="{ open: false }" class="relative">
                        <!-- Profile Image -->
                        <button
                            type="button"
                            @click="open = !open"
                            class="flex items-center focus:outline-none"
                        >
                            <img
                                class="w-10 h-10 rounded-full"
                                src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
                                alt="user photo"
                            />
                        </button>

                        <!-- Dropdown Menu -->
                        <div
                            v-show="open"
                            @click.away="open = false"
                            class="absolute right-0 z-10 mt-2 py-2 bg-white rounded-md shadow-xl w-40"
                        >
                            <div class="px-4 py-2">
                                <!-- Username -->
                                <p
                                    class="text-sm font-medium text-gray-900 truncate"
                                >
                                    {{ username }}
                                </p>
                                <!-- Email -->
                                <p class="text-xs text-gray-500">{{ email }}</p>
                            </div>
                            <hr />
                            <button
                                @click="logout"
                                class="block text-sm text-red-600 hover:text-red-700"
                            >
                                Sign Out
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</template>
