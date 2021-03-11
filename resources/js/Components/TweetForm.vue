<template>
  <div class="bg-white p-4 flex">
      <img :src="person.user.profile_photo_url" :alt="person.user.name" class="w-12 h-12 flex-shrink-0 rounded-full flex-shrink-0">
      <form @submit.prevent="submit" class="flex-1 ml-4">
            <textarea :class="$page.props.errors.content ? 'border-2 border-red-500': 'border-2 border-blue-500'" 
                    class="w-full p-2 resize-none rounded-lg focus:outline-none"
                    placeholder="What's Happening ?"
                    aria-label="Hydra Content"
                    v-model="form.content"
                    @input="resizeArea()"
                    name="content"
                    ref="content"
                    id="content"
                    rows="2">
            </textarea>
            <div v-if="media.length" class="grid gap-2" :class="{'grid-cols-2' : media.length > 1 }">
                <div v-for="(item, index) in media" :key="index" class="relative flex flex-col items-center justify-center">
                    <button @click="removeMedia(index, item)" type="button" class="absolute top-0 left-0 text-white bg-black bg-opacity-40 hover:bg-opacity-100 rounded-full cursor-pointer m-2 px-3 py-1 focus:outline-none">X</button>
                    <img :src="item.url" class="rounded-xl object-cover h-48 w-full">
                    <!-- <div v-if="item.loading" class="absolute bg-black bg-opacity-50 text-sm text-white rounded px-2">Upoading image...</div> -->
                </div>
            </div>
            <span v-if="$page.props.errors.content" class="text-red-500 text-sm">{{ $page.props.errors.content }}</span>
            <div class="flex justify-between space-x-4 items-center pt-2 border-t">
                <file-input @input="uploadImage" />
                <div class="flex items-center space-x-4">
                    <div class="text-gray-400" :class="{ 'text-red-500' : remainingChars < 0} ">{{ remainingChars }}</div>
                    <button :disabled="!canSubmit" 
                            class="px-4 text-white bg-blue-500 rounded-full hover:bg-blue-600 transition duration-300 h-10 focus:outline-none font-semibold">
                            <div class="btn-spinner"></div>
                        <span>Post</span>
                    </button>
                </div>
            </div>
      </form>
  </div>
</template>

<script>
import FileInput from './FileInput.vue';
import axios from 'axios'

export default {
    props: {
        person: Object,
    },
    components: {
        FileInput
    },
    data() {
        return {
            form: {
                content: '',
            },
            loading: false,
            media: [],
            mediaIds: [],
        }
    },
    methods: {
        submit() {
            this.form.mediaIds = this.media.map(item => item.id);
            this.$inertia.post(`/hydrate`, this.form, 
            { 
                preserveState: true,
                onStart: () =>  this.loading = true,
                onFinish: () => this.loading = false,
                onSuccess: () => {
                    if(Object.keys(this.$page.props.errors).length === 0)
                    {
                        this.form = { content: '', media: []};
                        this.media = [];
                    }
                }
            }
            );
        },
        resizeArea()
        {
            const textarea = this.$refs['content'];

            textarea.style.height = 'initial'
            textarea.style.height = `${ textarea.scrollHeight }px`
            // console.log(textarea.innerHeight)
        },
        uploadImage(files)
        {
            Array.from(files).forEach((media) => {
                let reader = new FileReader();

                reader.readAsDataURL(media);
                reader.onload = (e) => {
                    //e.target.result

                    let item = {
                        url: e.target.result,
                        id: undefined,
                        loading: true
                    }

                    let formData = new FormData();

                    formData.append('file', media);
                    axios.post('media', formData)
                        .then(({data}) => {
                        item.id = data.id;
                        })
                        .finally(() => item.loading = false);

                    this.media.push(item);
                };
            });
        },
        removeMedia(index, item)
        {
            this.media.splice(index, 1);

            if(item.id)
            {
                axios.delete(`media/${item.id}`).catch((e) => {
                    console.log(e);
                    this.media.splice(index, 0, item);
                })
            }
        }
    },
    computed: {
        remainingChars() {
            return 270 - this.form.content.length;
        },
        canSubmit() {
            return this.form.content.length && this.remainingChars >= 0;
        }
    }
}
</script>

<style scoped>
    button:disabled {
        opacity: 0.7;
        cursor: not-allowed;
    }
</style>