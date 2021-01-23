<template>
    <span
        class="ml-2"
    >
        <v-icon>
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
    mounted () {
        this.likes = this.article && +this.article.likes || 0
    }
}
</script>

<style scoped>

</style>
