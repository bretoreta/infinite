<template>
    <div class="bg-gray-100 relative">
        <jet-banner />

        <div class="min-h-screen bg-gray-100 flex relative">
            <div class="flex-shrink-0 min-w-60 sticky top-0 h-screen left-0 z-10">
                <nav class="bg-white overflow-auto border-r border-gray-200 w-full py-4 px-5 md:px-8 lg:px-20 h-full flex flex-col justify-between">
                    <div>
                        <div class="flex-shrink-0 flex items-center">
                            <inertia-link :href="route('home')">
                                <jet-application-mark class="block w-auto ml-4" />
                            </inertia-link>
                        </div>
                        <div class="menu-items mt-8">
                            <inertia-link href="/home" class="flex items-center text-gray-500 mb-3 rounded-full p-2 hover:text-blue-500 hover:bg-blue-500 hover:bg-opacity-20" :class="route().current('home') ? 'bg-blue-100 text-blue-500': ''">
                                <div class="relative">
                                    <!-- <div class="absolute bg-blue-500 bg-opacity-75 p-2 text-xs text-white -top-3 -left-2 rounded-full">10</div> -->
                                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                                </div>
                                <p class="mt-1 font-semibold">Home</p>
                            </inertia-link>
                            <inertia-link href="/notifications" class="flex items-center text-gray-500 hover:text-blue-500 hover:bg-blue-500 hover:bg-opacity-20 rounded-full p-2 mb-3" :class="route().current('notifications') ? 'bg-blue-100 text-blue-500': ''">
                                <div class="relative">
                                    <div v-if="$page.props.notif" class="absolute bg-blue-500 bg-opacity-75 py-1 px-2 text-xs text-white -top-3 -left-2 rounded-full">{{ $page.props.notif }}</div>
                                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                                </div>
                                <p class="mt-1 font-semibold">Notifications</p>
                            </inertia-link>
                            <inertia-link href="#" class="flex items-center text-gray-500 hover:text-blue-500 hover:bg-blue-500 hover:bg-opacity-20 rounded-full p-2 mb-3">
                                <div class="relative">
                                    <!-- <div class="absolute bg-blue-500 bg-opacity-75 p-2 text-xs text-white -top-3 -left-2 rounded-full"></div> -->
                                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path></svg>    
                                </div>
                                <p class="mt-1 font-semibold">Explore</p>
                            </inertia-link>
                            <inertia-link href="/messenger" class="flex items-center text-gray-500 hover:text-blue-500 hover:bg-blue-500 hover:bg-opacity-20 rounded-full p-2 mb-3" :class="route().current('messenger.*') ? 'bg-blue-100 text-blue-500': ''">
                                <div class="relative">
                                    <div class="absolute bg-blue-500 bg-opacity-75 p-1 text-xs text-white -top-3 -left-2 rounded-full">33</div>
                                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>    
                                </div>
                                <p class="mt-1 font-semibold">Messages</p>
                            </inertia-link>
                            <inertia-link href="#" class="flex items-center text-gray-500 hover:text-blue-500 hover:bg-blue-500 hover:bg-opacity-20 rounded-full p-2 mb-3">
                                <div class="relative">
                                    <!-- <div class="absolute bg-blue-500 bg-opacity-75 p-2 text-xs text-white -top-3 -left-2 rounded-full">45</div> -->
                                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path></svg>    
                                </div>
                                <p class="mt-1 font-semibold">Bookmarks</p>
                            </inertia-link>
                            <inertia-link href="#" class="flex items-center text-gray-500 hover:text-blue-500 hover:bg-blue-500 hover:bg-opacity-20 rounded-full p-2 mb-3">
                                <div class="relative">
                                    <!-- <div class="absolute bg-blue-500 bg-opacity-75 p-2 text-xs text-white -top-3 -left-2 rounded-full">23</div> -->
                                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>    
                                </div>
                                <p class="mt-1 font-semibold">Lists</p>
                            </inertia-link>
                            <inertia-link href="/user/profile" class="flex items-center text-gray-500 hover:text-blue-500 hover:bg-blue-500 hover:bg-opacity-20 rounded-full p-2 mb-4" :class="route().current('profile.show') ? 'bg-blue-100 text-blue-500': ''">
                                <div class="relative">
                                    <!-- <div class="absolute bg-blue-500 bg-opacity-75 p-2 text-xs text-white -top-3 -left-2 rounded-full">23</div> -->
                                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>    
                                </div>
                                <p class="mt-1 font-semibold">Profile</p>
                            </inertia-link>
                        </div>
                    </div>
                    <div class="profile flex items-center">
                        <!-- <div class="image mr-4">
                            <button v-if="$page.props.jetstream.managesProfilePhotos" class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-200 transition duration-150 ease-in-out">
                                <img class="h-12 w-12 rounded-full object-cover" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />
                            </button>
                        </div> -->
                        <div class="names flex items-center">
                            <!-- Settings Dropdown -->
                            <div class="ml-0 md:ml-3 relative">
                                <jet-dropdown align="right" width="48">
                                    <template #trigger>
                                        <button v-if="$page.props.jetstream.managesProfilePhotos" class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-200 transition duration-150 ease-in-out">
                                            <img class="h-14 w-14 rounded-full object-cover" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />
                                        </button>

                                        <span v-else class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                                {{ $page.props.user.name }}

                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <!-- Account Management -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            Manage Account
                                        </div>

                                        <jet-dropdown-link :href="route('profile.show')">
                                            Profile
                                        </jet-dropdown-link>

                                        <jet-dropdown-link :href="route('api-tokens.index')" v-if="$page.props.jetstream.hasApiFeatures">
                                            API Tokens
                                        </jet-dropdown-link>

                                        <div class="border-t border-gray-100"></div>

                                        <!-- Authentication -->
                                        <form @submit.prevent="logout">
                                            <jet-dropdown-link as="button">
                                                Log Out
                                            </jet-dropdown-link>
                                        </form>
                                    </template>
                                </jet-dropdown>
                            </div>
                            <div class="ml-4">
                                <p class="font-semibold">{{ $page.props.user.name }}</p>
                                <p class="text-sm text-gray-500">{{ `@${$page.props.user.username}` }}</p>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>

            <div class="flex flex-col min-h-screen flex-1 border-r border-gray-200 relative">
                <!-- Page Heading -->
                <header class="bg-white border-b border-gray-200 sticky top-0 right-0 w-full" v-if="$slots.header">
                    <div class="py-5 px-10">
                        <slot name="header"></slot>
                    </div>
                </header>
                <!-- Page Content -->
                <main class="flex-1">
                    <slot></slot>
                </main>
            </div>
            <div class="hidden lg:block">
                <div class="bg-white min-h-screen px-10 py-8 sticky top-0 right-0">
                    <div class="searchbar relative">
                        <input type="text" class="py-2 px-4 bg-gray-100 rounded-full border border-gray-300" placeholder="Search Hydra">
                    </div>
                    <div class="mt-4">
                        <div class="bg-gray-100 border border-gray-300 rounded-xl px-4 py-2">
                            <div class="header flex items-center justify-between border-b border-gray-200 py-3">
                                <div class="font-semibold text-xl">Trends for you</div>
                                <div class="icon text-blue-500">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path></svg>
                                </div>
                            </div>
                            <div class="trends">
                                <div class="py-2 border-b border-gray-200">
                                    <div class="text-xs text-gray-500">Trending in Romania</div>
                                    <div class="font-semibold text-gray-700">#Crypto</div>
                                    <div class="text-sm text-gray-600">45.7k Hydras</div>
                                </div>
                                <div class="py-2 border-b border-gray-200">
                                    <div class="text-xs text-gray-500">Tech Indusrty - Trending</div>
                                    <div class="font-semibold text-gray-700">Amazon</div>
                                    <div class="text-sm text-gray-600">824k Hydras</div>
                                </div>
                                <div class="py-2 border-b border-gray-200">
                                    <div class="text-xs text-gray-500">Visual Arts - Trending</div>
                                    <div class="font-semibold text-gray-700">#digital_arts</div>
                                    <div class="text-sm text-gray-600">22.7k Hydras</div>
                                </div>
                                <div class="py-2 border-b border-gray-200">
                                    <div class="text-xs text-gray-500">Trending worldwide</div>
                                    <div class="font-semibold text-gray-700">Thanksgiving</div>
                                    <div class="text-sm text-gray-600">1.08M Hydras</div>
                                </div>
                                <div class="py-4">
                                    <inertia-link href="#" class="text-blue-500 text-sm">Show More</inertia-link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import JetApplicationMark from '@/Jetstream/ApplicationMark'
    import JetBanner from '@/Jetstream/Banner'
    import JetDropdown from '@/Jetstream/Dropdown'
    import JetDropdownLink from '@/Jetstream/DropdownLink'
    import JetNavLink from '@/Jetstream/NavLink'
    import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink'

    export default {
        components: {
            JetApplicationMark,
            JetBanner,
            JetDropdown,
            JetDropdownLink,
            JetNavLink,
            JetResponsiveNavLink,
        },

        data() {
            return {
                showingNavigationDropdown: false,
            }
        },

        methods: {
            switchToTeam(team) {
                this.$inertia.put(route('current-team.update'), {
                    'team_id': team.id
                }, {
                    preserveState: false
                })
            },

            logout() {
                this.$inertia.post(route('logout'));
            },
        }
    }
</script>
