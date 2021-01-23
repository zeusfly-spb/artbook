<template>
    <v-flex>
        <v-data-table
            :items="articles"
            hide-default-header
            :server-items-length="$store.state.paginator.total"
            :footer-props="{'items-per-page-text': 'Статей на странице'}"
            @update:pagination="updatePagination"
        >

        </v-data-table>
    </v-flex>
</template>

<script>
export default {
    name: 'Articles',
    computed: {
        articles () {
            return this.$store.state.articles
        }
    },
    methods: {
        updatePagination (data) {
            this.$store.commit('UPDATE_PAGINATION', data)
        }
    },
    mounted () {
        this.$store.dispatch('setArticles')
    }
}
</script>

<style scoped>

</style>
