<template>
  <div>
      <input @change="change" type="file" name="file" id="file" class="hidden" accept="image/*" multiple ref="picker">
      <button 
        type="button" 
        @click="browse"
        class="inline-flex items-center rounded-full p-2 hover:bg-blue-100 text-blue-500 focus:outline-none">
        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/>
        </svg>
      </button>
  </div>
</template>

<script>
export default {
    methods: {
        browse() {
            this.$refs.picker.click();
        },
        change(e) {
            this.$emit('input', e.target.files)
        }
    }
}
</script>

<style>

</style>