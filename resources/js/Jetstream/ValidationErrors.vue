<template>
    <div v-if="hasErrors" class="bg-red-500 shadow-xl text-white rounded-lg px-6 py-4">
        <div class="font-medium">Whoops! Something went wrong.</div>

        <ul class="mt-3 list-disc list-inside text-sm">
            <li v-for="(error, key) in errors" :key="key">{{ error }}</li>
        </ul>
    </div>
</template>

<script>
    export default {
        computed: {
            errors() {
                return this.$page.props.errors
            },

            hasErrors() {
                return Object.keys(this.errors).length > 0;
            },
        }
    }
</script>
