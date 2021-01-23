<template>
    <v-flex>
        <v-data-table
            :items="articles"
            hide-default-header
            :server-items-length="$store.state.paginator.total"
            :footer-props="{'items-per-page-text': 'Статей на странице'}"
            @update:pagination="updatePagination"
            @update:page="updatePage"
        >
            <template v-slot:item="{item}">
                <thumbnail :article="item"/>
            </template>
        </v-data-table>
    </v-flex>
</template>

<script>
import Thumbnail from "@/components/Thumbnail";
export default {
    name: 'Articles',
    computed: {
        articles () {
            return this.$store.state.articles
        }
    },
    methods: {
        updatePage (page) {
            this.$store.commit('SET_PAGINATOR_PAGE', page)
            this.$store.dispatch('setArticles')
        },
        updatePagination (data) {
            this.$store.commit('UPDATE_PAGINATION', data)
        }
    },
    mounted () {
        this.$store.dispatch('setArticles')
    },
    components: {
        Thumbnail
    }
}
</script>

<style scoped>

</style>
