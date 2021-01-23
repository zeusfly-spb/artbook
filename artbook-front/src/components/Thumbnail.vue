<template>
    <v-row>
        {{ article.slug }}
    </v-row>
</template>

<script>
export default {
    name: 'Thumbnail',
    props: {
        article: {
            type: Object,
            required: true
        }
    }

}
</script>

<style scoped>

</style>
