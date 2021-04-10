<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ `${ profile.user.name }` }}
            </h2>
        </template>

        <div>
            <div class="bg-white border-b">
                <div class="flex">
                    <inertia-link :href="`/${ profile.user.username }/followers`" class="w-1/2 py-5 text-center text-gray-700 hover:bg-blue-100 hover:text-blue-500 font-semibold">Followers</inertia-link>
                    <inertia-link :href="`/${ profile.user.username }/followings`" class="w-1/2 py-5 text-center border-b-2 border-blue-500 hover:bg-blue-100 text-blue-500 font-semibold">Following</inertia-link>
                </div>
                <div v-for="user in userFollowings.data" :key="user.id" class="border-b flex justify-between p-4">
                    <div class="flex">
                        <img :src="user.profile_photo_url" class="flex-shrink-0 w-12 h-12 rounded-full object-cover">
                        <div class="flex flex-col ml-3">
                            <a :href="`/${user.username}`" class="font-semibold">{{ user.name }}</a>
                            <a :href="`/${user.username}`" class="text-sm text-gray-500">{{ `@${ user.username }` }}</a>
                        </div>
                    </div>
                    <div>
                        <followbutton :user="user" />
                    </div>
                </div>
                <div v-if="loading" class="p-5 text-gray-500 text-center animate-pulse">
                    Loading More Followings...
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
    import Followbutton from '../../Components/Followbutton.vue'

    export default {
        components: {
            AppLayout,
            Icon,
            Followbutton
        },
        props: {
            profile: Object,
            followings: Object,
        },
        data() {
            return {
                userFollowings : this.followings,
            }
        },
        mounted() {
            window.addEventListener('scroll',debounce(
                (e) => {
                let pixelsFromBottom = document.documentElement.offsetHeight - document.documentElement.scrollTop - window.innerHeight;
                // console.log(pixelsFromBottom);
                if(pixelsFromBottom < 200 && !this.loading)
                {
                    if(this.userFollowings.next_page_url)
                    {
                        this.loading = true;
                        axios.get(this.userFollowings.next_page_url).then(response => {
                            // console.log(response);
                            this.userFollowings = {
                                ...response.data,
                                data: [...this.userFollowings.data, ...response.data.data]
                            }

                            this.loading = false;
                        })   
                    }
                }
            }, 50
            ));
        },
    }
</script>
