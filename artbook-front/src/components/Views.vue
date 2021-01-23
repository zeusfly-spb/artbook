<template>
    <span
        class="ml-2"
    >
        <v-icon>
            mdi-eye
        </v-icon>
        <span
            class="ml-1"
        >
            {{ views }}
        </span>
    </span>
</template>

<script>
export default {
    name: 'Views',
    props: {article: Object},
    data: () => ({
        views: 0
    }),
    methods: {
        addView () {
            this.axios.post('/api/add_view', {article_id: this.article.id})
                .then(res => this.views = +res.data.views)
        }
    },
    mounted () {
    },
    watch: {
        article (val, oldVal) {
            if (val && !oldVal) {
                this.views = +val.views
                setTimeout(() => this.addView(), 5000)
            }
        }
    }
}
</script>

<style scoped>

</style>
