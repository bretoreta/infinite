<template>
    <messenger-layout>
        <template #header>
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Messages
                </h2>
                <svg class="w-6 h-6 mr-3 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
            </div>
        </template>

        <div>
            <div class="wrapper overflow-y-auto border-r min-h-full">
                <div class="border-b py-4 px-2 bg-white">
                    <input type="text" class="px-4 py-2 bg-gray-100 rounded-full w-full border border-gray-300" placeholder="Search for people and groups">
                </div>
                <div class="messages">
                    <div v-for="room in rooms.data" :key="room.id">
                        <message-item :room="room"/>
                    </div>
                </div>
            </div>
        </div>
    </messenger-layout>
</template>

<script>
import MessageItem from '../../Components/MessageItem.vue'
import MessengerLayout from '../../Layouts/MessengerLayout.vue'

    export default {
        components: { 
            MessengerLayout,
            MessageItem 
        },
        props: {
            rooms: Object,
        },
        // mounted() {
        //     console.log(this.rooms);
        // }
    }
</script>

<style>

</style>