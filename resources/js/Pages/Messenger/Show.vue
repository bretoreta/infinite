<template>
    <messenger-layout>
        <div class="h-full relative flex flex-col justify-end">
           <section class="chat-area w-full min-h-screen flex flex-col align-items-end">
                <header class="bg-white px-10 flex h-20 py-5 shadow-md border-b sticky top-0">
                    <inertia-link href="/messenger">
                        <div class="flex items-center">
                            <div class="text-gray-500 mr-3">Back</div>
                            <img class="h-12 w-12 rounded-full object-cover" :src="(loggedId == ownerId) ? room.receiver.profile_photo_url : room.owner.profile_photo_url" :alt="(loggedId == ownerId) ? room.receiver.name : room.owner.name" />
                        </div>
                    </inertia-link>
                    <div class="user-details ml-5">
                        <div class="text-gray-800 font-semibold">{{ (loggedId == ownerId) ? room.receiver.name : room.owner.name }}</div>
                        <div class="text-gray-600 text-smm">Active now</div>
                    </div>
                </header>
                <div class="h-100 flex flex-col-reverse overflow-y-auto py-4">
                    <div v-for="message in messages.data" :key="message.id" class="chat-box px-10">
                        <chat-item :message="message" />
                    </div>
                </div>
                <div class="typing-area w-full sticky bottom-0 bg-white py-3 px-4">
                    <form @submit.prevent="sendMessage(room.id)">
                        <div class="flex items-center relative">
                            <input type="hidden" v-model="form.receiver">
                            <input id="content" v-model="form.content" type="text" class="px-5 py-2 bg-gray-100 rounded-full w-full mr-4" :class="$page.props.errors.content ? 'border border-red-500' : ''" placeholder="Type message here">
                            <button class="bg-blue-500 px-4 py-2 rounded-lg text-white shadow focus:outline-none hover:shadow-xl duration-200">Send</button>
                            <div class="absolute -top-8 left-2" v-if="$page.props.errors.content">
                                <div class="bg-red-500 rounded-tl-2xl rounded-tr-2xl rounded-br-2xl border border-red-600 text-white shadow-xl py-1 px-4">
                                    <p class="text-xs">{{ $page.props.errors.content }}</p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
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
        props: {
            messages: Object,
            room: Object,
        },
        data() {
            return {
                loggedId : this.$page.props.user.id,
                ownerId: this.room.owner.id,
                form: this.$inertia.form({
                    content: '',
                    receiver: this.ownerId,
                })
            }
        },
        methods: {
            sendMessage(id) {
                this.form.post(`/messenger/room/${id}`);
                this.content = '';
            }
        },
        computed() {
            return {
                ownerId : (loggedId == ownerId) ? room.receiver.name : room.owner.name,
            }
        }
    }
</script>