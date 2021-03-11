<template>
  <div>
      <inertia-link 
        v-if="! user.following" 
        as="button" method="POST" 
        :href="`/${ $page.props.user.username }/follow/${ user.id }`"
        preserve-scroll
        class="px-4 w-32 text-blue-500 border border-blue-500 rounded-full hover:bg-blue-100 h-9 focus:outline-none"
        >Follow
    </inertia-link>
    <inertia-link 
        v-if="user.following" 
        as="button" method="DELETE" 
        :href="`/${ $page.props.user.username }/unfollow/${ user.id }`"
        preserve-scroll
        @mouseover="showUnfollow = true"
        @mouseleave="showUnfollow = false"
        class="px-4 w-32 text-white bg-blue-500 rounded-full hover:bg-red-600 transition duration-300 h-9 focus:outline-none"
        >{{ showUnfollow ? 'Unfollow' : 'Following' }}
    </inertia-link>
  </div>
</template>

<script>
export default {
    props: {
        user: Object,
    },
    data() {
        return {
            showUnfollow : false,
        }
    }
}
</script>

<style>

</style>