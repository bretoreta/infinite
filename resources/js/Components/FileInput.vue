<template>
  <div>
      <input @change="change" type="file" name="file" id="file" class="hidden" accept="image/*" multiple ref="picker">
      <button 
        type="button" 
        @click="browse"
        class="inline-flex items-center rounded-full p-2 hover:bg-blue-100 text-blue-500 focus:outline-none">
          OO
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