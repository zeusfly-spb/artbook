<template>
    <span
        class="ml-1"
    >
        <v-icon
            class="clickable"
            title="Оставить лайк"
            @click="addLike"
        >
            mdi-heart-outline
        </v-icon>
        <span
            class="ml-1"
            v-if="+likes"
        >
            {{ +likes }}
        </span>
    </span>
</template>

<script>
export default {
    name: 'Likes',
    props: {
        article: {
            type: Object
        }
    },
    data: () => ({
        likes: 0
    }),
    methods: {
        addLike () {
            this.axios.post('/api/add_like', {article_id: this.article.id})
                .then(res => this.likes = +res.data.likes)
        }
    },
    watch: {
        article (val) {
            this.likes = val.likes
        }
    }
}
</script>

<style scoped>

</style>
