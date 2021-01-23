<template>
    <div>
        <thumbnail
            v-for="(article, index) in articles"
            :key="index"
            :article="article"
        />
    </div>
</template>

<script>
import Thumbnail from "@/components/Thumbnail"
export default {
    name: 'LastArticles',
    data: () => ({
        articles: []
    }),
    methods: {
        getLastArticles () {
            this.axios.get('/api/last_articles')
                .then(res => this.articles = res.data.articles)
        }
    },
    mounted () {
        this.getLastArticles()
    },
    components: {
        Thumbnail
    }
}
</script>

<style scoped>

</style>
