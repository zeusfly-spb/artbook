<template>
    <div>

    </div>
</template>

<script>
export default {
    name: 'Article',
    data: () => ({
        slug: '',
        article: null
    }),
    mounted () {
        this.slug = this.$route.params.slug
    }
}
</script>

<style scoped>

</style>
