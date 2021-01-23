<template>
    <v-card
        class="flex-column"
    >
        <v-img
            max-height="300"
            max-width="300"
            min-height="300"
            min-width="300"
            src="https://via.placeholder.com/50"
            class="mb-2"
        />
        <span>{{ article && article.text || 'Пусто'}}</span>
        <tags :article="article"/>
    </v-card>
</template>

<script>
import Tags from "@/components/Tags";
export default {
    name: 'Article',
    computed: {
        article () {
            return this.$store.state.currentArticle
        }
    },
    mounted () {
        this.$store.dispatch('setCurrentArticle', this.$route.params.slug)
    },
    components: {
        Tags
    }
}
</script>

<style scoped>

</style>
