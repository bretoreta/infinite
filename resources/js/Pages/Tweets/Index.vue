<template>
    <app-layout>
        <template #header>
            <div class="header -my-4 flex items-center">
                <div class="mr-6">
                    <inertia-link href="/home">
                        <svg class="h-6 w-6 text-gray-500 hover:text-blue-500 duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                    </inertia-link>
                </div>
                <div>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ `${person.name}` }}
                    </h2>
                    <p class="text-gray-500">271 Posts</p>
                </div>
            </div>
        </template>

        <div>
            <div class="bg-white shadow">
                <div class="top">
                    <div class="relative mb-5">
                        <img :src="person.profile_photo_url" class="w-full h-48 object-cover">
                        <div class="absolute -bottom-3 left-5 bg-white p-1 rounded-full">
                            <img :src="person.profile_photo_url" class="rounded-full h-36 w-36 object-cover">
                        </div>
                        <div class="flex w-full justify-end px-10 py-4">
                            <button class="border border-blue-500 text-blue-500 px-4 py-1 hover:bg-blue-500 hover:text-white rounded-full hover:shadow">Edit Profile</button>
                        </div>
                    </div>
                    <div class="info px-8">
                        <div class="name">
                            <div class="font-bold text-gray-800 text-2xl">{{ person.name }}</div>
                            <div class="text-gray-500 text-lg -mt-2">@ {{ person.username }}</div>
                        </div>
                        <div class="desc pt-2">
                            <div class="text-gray-700 text-sm">Passionate web developer with valuable skills in both Frontend and Backend Development</div>
                        </div>
                        <div class="dates flex items-between space-x-10 items-center py-2 text-gray-500">
                            <div class="place flex items-center text-sm">
                                <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                Maseno, Kenya
                            </div>
                            <div class="place flex items-center text-sm">
                                <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.701 2.701 0 00-1.5-.454M9 6v2m3-2v2m3-2v2M9 3h.01M12 3h.01M15 3h.01M21 21v-7a2 2 0 00-2-2H5a2 2 0 00-2 2v7h18zm-3-9v-2a2 2 0 00-2-2H8a2 2 0 00-2 2v2h12z"/>
                                </svg>
                                Born November 1, 1998
                            </div>
                            <div class="place flex items-center text-sm">
                                <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                Joined 4 Months Ago
                            </div>
                        </div>
                    </div>
                    <div class="followings px-8">
                        <div class="flex items-center space-x-10">
                            <inertia-link :href="`/${person.username}/followers`">
                                <div class="flex items-center">
                                    <div class="font-bold mr-2 font-gray-800">505</div>
                                    <div class="text-gray-500 text-sm">Followers</div>
                                </div>
                            </inertia-link>
                            <inertia-link :href="`/${person.username}/followings`">
                                <div class="flex items-center">
                                    <div class="font-bold mr-2 font-gray-800">813</div>
                                    <div class="text-gray-500 text-sm">Following</div>
                                </div>
                            </inertia-link>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="w-1/4 text-blue-500 border-b-2 border-blue-600 text-center font-bold py-5">Posts</div>
                        <div class="w-1/4 text-gray-500 border-b-2 border-transparent text-center font-bold py-5">Posts & Replies</div>
                        <div class="w-1/4 text-gray-500 border-b-2 border-transparent text-center font-bold py-5">Media</div>
                        <div class="w-1/4 text-gray-500 border-b-2 border-transparent text-center font-bold py-5">Likes</div>
                    </div>
                </div>
                <div v-for="tweet in userTweets.data" :key="tweet.id" class="flex p-4 border-b">
                    <img :src="tweet.user.profile_photo_url" :alt="tweet.user.name" class="w-12 h-12 rounded-full flex-shrink-0 object-cover">
                    <div class="ml-4">
                        <div class="flex items-center">
                            <inertia-link :href="`/${ tweet.user.username }`" class="font-semibold mr-2">{{ tweet.user.name }}</inertia-link> - <inertia-link :href="`/${ tweet.user.username }`" class="text-gray-500 text-sm mx-2">{{ `@${tweet.user.username}` }}</inertia-link> &middot; <div class="text-gray-400 text-xs ml-2">{{ `${tweet.created}` }}</div>
                        </div>
                        <div class="mb-4">{{ tweet.content }}</div>
                        <div v-if="tweet.media.length" class="grid gap-2 my-2" :class="{ 'grid-cols-2' : tweet.media.length > 1 }">
                            <div v-for="(item, index) in tweet.media" :key="index">
                                <img :src="item.full_url" class="rounded-xl object-cover w-full h-48">
                            </div>
                        </div>
                        <div>
                            <button @click="toggleLike(tweet.id)" preserve-scroll :class="tweet.liked ? 'text-red-500 bg-red-100' : ''" class="outline-none text-gray-500 focus:outline-none hover:bg-red-500 hover:bg-opacity-30 focus:bg-red-500 focus:bg-opacity-20 focus:text-red-500 hover:text-red-500 rounded-full py-1 px-2">
                                <div class="flex items-center">
                                    <Icon :name="tweet.liked ? 'heart' : 'heart-outline'" />
                                    <p class="ml-2">{{ tweet.likes }}</p>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import axios from 'axios'
    import {debounce} from 'lodash/function'
    import Icon from '../../Components/Icon'

    export default {
        components: {
            AppLayout,
            Icon
        },
        props: {
            person: Object,
            tweets: Object,
        },
        data() {
            return {
                userTweets : this.tweets
            }
        },
        mounted() {
            window.addEventListener('scroll',debounce(
                (e) => {
                let pixelsFromBottom = document.documentElement.offsetHeight - document.documentElement.scrollTop - window.innerHeight;
                // console.log(pixelsFromBottom);
                if(pixelsFromBottom < 500)
                {
                    axios.get(this.userTweets.next_page_url).then(response => {
                        // console.log(response);
                        this.userTweets = {
                            ...response.data,
                            data: [...this.userTweets.data, ...response.data.data]
                        }
                    })
                    // console.log(pixelsFromBottom);
                }
            }, 50
            ));
        },
        methods: {
            toggleLike(tweetId) {
                this.$inertia.post(`/tweets/${tweetId}/like`,{},{ preserveScroll: true })
            }
        },
        watch: {
            tweets(newTweets){
                this.userTweets = newTweets;
            }
        }
    }
</script>
