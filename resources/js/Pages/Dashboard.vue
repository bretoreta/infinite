<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Home
            </h2>
        </template>

        <div>
            <tweet-form :person="profile" />
            <div class="bg-white shadow">
                <div v-for="tweet in userTweets.data" :key="tweet.id" class="flex p-4 border-b">
                    <img :src="tweet.user.profile_photo_url" :alt="tweet.user.name" class="w-12 h-12 rounded-full flex-shrink-0 object-cover">
                    <div class="ml-4 w-full">
                        <div class="flex items-center">
                            <inertia-link :href="`/${ tweet.user.username }`" class="font-semibold mr-2">{{ tweet.user.name }}</inertia-link> - <inertia-link :href="`/${ tweet.user.username }`" class="text-blue-500 text-sm mx-2">{{ `@${tweet.user.username}` }}</inertia-link> &middot; <div class="text-gray-400 text-xs ml-2">{{ `${tweet.created}` }}</div>
                        </div>
                        <div class="mb-4">{{ tweet.content }}</div>
                        <div v-if="tweet.media.length" class="grid my-2" :class="tweet.media.length > 1 ? 'grid-cols-2 gap-2' : 'grid-cols-1'">
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
                <div v-if="loading" class="p-5 text-gray-500 text-center animate-pulse">
                    Loading More Hydras...
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import axios from 'axios'
    import {debounce} from 'lodash/function'
    import Icon from '../Components/Icon'
    import TweetForm from '../Components/TweetForm.vue'

    export default {
        components: {
            AppLayout,
            Icon,
            TweetForm
        },
        props: {
            person: Object,
            tweets: Object,
            profile: Object,
        },
        data() {
            return {
                userTweets : this.tweets,
                loading: false,
            }
        },
        mounted() {
            window.addEventListener('scroll',debounce(
                (e) => {
                let pixelsFromBottom = document.documentElement.offsetHeight - document.documentElement.scrollTop - window.innerHeight;
    
                if(pixelsFromBottom < 200 && !this.loading)
                {
                    if(this.userTweets.next_page_url)
                    {
                        this.loading = true;
                        axios.get(this.userTweets.next_page_url).then(response => {
                            // console.log(response);
                            this.userTweets = {
                                ...response.data,
                                data: [...this.userTweets.data, ...response.data.data]
                            }

                            this.loading = false;
                        })   
                    }
                }
            }, 50
            ));
        },
        methods: {
            toggleLike(tweetId) {
                this.$inertia.post(`/tweets/${tweetId}/like`,{},{ preserveScroll: true, preserveState: true })
            }
        },
        watch: {
            tweets(newTweets){
                this.userTweets = newTweets;
            }
        }
    }
</script>
