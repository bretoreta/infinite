<template>
  <div>
      <div class="chat mb-3 outgoing flex">
        <div class="details bg-blue-500 shadow text-white py-4 px-8 rounded-tl-2xl rounded-tr-2xl rounded-bl-2xl break-all text-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores, perspiciatis.</div>
    </div>
    <div class="chat mb-3 incoming flex items-end">
        <div class="flex-shrink-0">
            <img class="h-10 w-10 rounded-full object-cover mr-4 mb-2" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />
        </div>
        <div class="details bg-blue-100 shadow text-blue-500 py-4 px-8 rounded-tl-2xl rounded-tr-2xl rounded-br-2xl break-all text-sm">wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww</div>
    </div>
  </div>
</template>

<script>
export default {

}
</script>

<style scoped>
    .outgoing .details {
        max-width: calc(100% - 130px);
        margin-left: auto;
    }
    .incoming .details {
        max-width: calc(100% - 130px);
        margin-right: auto;
    }
    .chat-box::-webkit-scrollbar{
        width: 0px;
    }
</style>