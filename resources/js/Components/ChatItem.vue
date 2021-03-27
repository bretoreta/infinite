<template>
    <div>
        <div v-if="msgId == loggedId" class="chat mb-2 outgoing flex">
            <div class="details bg-blue-500 shadow text-white py-3 px-6 rounded-tl-2xl rounded-tr-2xl rounded-bl-2xl break-all text-sm">{{ message.content }}
                <div class="text-right text-xs italic text-white font-light">{{ message.created }}</div>
            </div>
        </div>
        <div v-if="!(msgId == loggedId)" class="chat mb-2 incoming flex items-end">
            <div class="flex-shrink-0">
                <img class="h-10 w-10 rounded-full object-cover mr-4 mb-2" :src="message.sender.profile_photo_url" :alt="message.sender.name" />
            </div>
            <div class="details bg-blue-100 shadow text-blue-500 py-3 px-6 rounded-tl-2xl rounded-tr-2xl rounded-br-2xl break-all text-sm">{{ message.content }}
                <div class="text-right text-xs italic text-gray-400 font-light">{{ message.created }}</div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        message: Object,
    },
    data() {
        return {
            msgId : this.message.sender.id,
            loggedId: this.$page.props.user.id,
        }
    },
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