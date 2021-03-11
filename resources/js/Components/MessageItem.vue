<template>
  <div>
      <div class="bg-white py-4 px-2 border-b">
          <div class="flex">
              <div class="w-16 flex-shrink-0">
                  <img class="h-12 w-12 rounded-full object-cover" :src="room.owner.profile_photo_url" :alt="room.owner.name" />
              </div>
              <div class="flex-1">
                  <div class="flex items-center justify-between">
                      <div class="top-bar flex items-center">
                        <div class="text-gray-800 font-semibold mr-2">{{ room.owner.name }}</div>
                        <div class="text-gray-500 text-sm">{{ `@${room.owner.username}` }}</div>
                    </div>
                    <div class="right text-xs text-gray-400">
                        2 Hours Ago
                    </div>
                  </div>
                  <!-- <div class="message-content text-gray-500">
                      Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nesciunt, provident.
                  </div> -->
              </div>
          </div>
      </div>
  </div>
</template>

<script>
export default {
    props: {
        room: Object,
    }

}
</script>

<style>

</style>