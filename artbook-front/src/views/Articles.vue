<template>
    <div>
        <v-data-table
            :items="articles"
            hide-default-header
            :server-items-length="$store.state.paginator.total"
            :footer-props="{'items-per-page-text': 'Статей на странице'}"
            @update:pagination="updatePagination"
            @update:page="updatePage"
            @update:options="updateOptions"
        >
            <template v-slot:item="{item}">
                <thumbnail :article="item"/>
            </template>
        </v-data-table>
    </div>
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
        updateOptions (data) {
            this.$store.commit('SET_PAGINATOR_PER_PAGE', data.itemsPerPage)
            this.$store.dispatch('setArticles')
        },
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
