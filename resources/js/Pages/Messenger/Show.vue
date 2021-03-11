<template>
    <messenger-layout>
        <div class="min-h-screen relative flex">
            <div class="chat-wrapper w-full">
                <section class="chat-area flex flex-col w-full h-full">
                    <header class="bg-white px-10 flex h-20 py-5 shadow-md border-b sticky top-0">
                        <inertia-link href="/messenger">
                            <div class="flex items-center">
                                <div class="text-gray-500 mr-3">Back</div>
                                <img class="h-12 w-12 rounded-full object-cover" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />
                            </div>
                        </inertia-link>
                        <div class="user-details ml-5">
                            <div class="text-gray-800 font-semibold">Bret Oreta</div>
                            <div class="text-gray-600 text-smm">Active now</div>
                        </div>
                    </header>
                    <div class="chat-box flex-1 px-10 py-5 overflow-y-auto">
                        <chat-item />
                        <chat-item />
                        <chat-item />
                    </div>
                    <div class="typing-area w-full sticky bottom-0 bg-white py-3 px-4">
                        <div class="flex items-center">
                            <input type="text" class="px-5 py-2 bg-gray-100 rounded-full w-full mr-4" placeholder="Type message here">
                            <button class="bg-blue-500 px-4 py-2 rounded-lg text-white shadow">Send</button>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </messenger-layout>
</template>

<script>
import ChatItem from '../../Components/ChatItem.vue'
import MessengerLayout from '../../Layouts/MessengerLayout.vue'

    export default {
        components: { 
            MessengerLayout, 
            ChatItem
        },   
    }
</script>