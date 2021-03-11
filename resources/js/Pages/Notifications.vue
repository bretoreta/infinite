<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Notifications
            </h2>
        </template>

        <div>
            <div class="bg-white shadow" v-if="userNotifications.data.length > 1">
                <div v-for="notification in userNotifications.data" :key="notification.id" class="p-4 border-b">
                    <img :src="notification.data.user.profile_photo_url" class="flex-shrink-0 w-8 h-8 rounded-full mb-2">
                    <div class="mb-2">
                        <inertia-link :href="`/${ notification.data.user.username }`" class="font-semibold">{{ notification.data.user.name }}</inertia-link>
                        {{ notification.data.action }}
                    </div>
                    <div class="text-gray-500">{{ notification.data.tweet.content }}</div>
                </div>
                <div v-if="loading" class="p-5 text-gray-500 text-center animate-pulse">
                    Loading More Notifications...
                </div>
            </div>
            <div v-else class="bg-blue-500 flex text-white px-10 py-5">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    You have no notifications.
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import axios from 'axios'
    import {debounce} from 'lodash/function'

    export default {
        components: {
            AppLayout,
        },
        props: {
            person: Object,
            notifications: Object,
        },
        data() {
            return {
                userNotifications : this.notifications
            }
        },
        mounted() {
            window.addEventListener('scroll',debounce(
                (e) => {
                let pixelsFromBottom = document.documentElement.offsetHeight - document.documentElement.scrollTop - window.innerHeight;
    
                if(pixelsFromBottom < 200 && !this.loading)
                {
                    if(this.userNotifications.next_page_url)
                    {
                        this.loading = true;
                        axios.get(this.userNotifications.next_page_url).then(response => {
                            this.userNotifications = {
                                ...response.data,
                                data: [...this.userNotifications.data, ...response.data.data]
                            }

                            this.loading = false;
                        })   
                    }
                }
            }, 50
            ));
        }
    }
</script>
