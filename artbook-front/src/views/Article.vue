<template>
    <div>
        {{ article && article.text || 'Пусто'}}

    </div>
</template>

<script>
export default {
    name: 'Article',
    data: () => ({
        slug: ''
    }),
    computed: {
        article () {
            return this.$store.state.currentArticle
        }
    },
    mounted () {
        this.slug = this.$route.params.slug
        this.$store.dispatch('setCurrentArticle', this.slug)
    }
}
</script>

<style scoped>

</style>
