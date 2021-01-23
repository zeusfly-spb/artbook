<template>
    <v-card
        class="flex-column"
    >
        <v-snackbar
            v-model="snackbar"
            timeout="3000"
            color="green"
            top
        >
            Вы добавили лайк статье
        </v-snackbar>
        <v-img
            max-height="300"
            max-width="300"
            min-height="300"
            min-width="300"
            src="https://via.placeholder.com/50"
            class="mb-2"
        />
        <span>{{ article && article.text || 'Пусто'}}</span>
        <div class="flex-row">
            <tags :article="article"/>
            <likes :article="article" @like="showSnack"/>
            <views :article="article"/>
        </div>
    </v-card>
</template>

<script>
import Tags from "@/components/Tags"
import Likes from "@/components/Likes"
import Views from "@/components/Views"
export default {
    name: 'Article',
    data: () => ({
        snackbar: false
    }),
    computed: {
        article () {
            return this.$store.state.currentArticle
        }
    },
    methods: {
        showSnack () {
            this.snackbar = true
        }
    },
    mounted () {
        this.$store.dispatch('setCurrentArticle', this.$route.params.slug)
    },
    components: {
        Tags,
        Likes,
        Views
    }
}
</script>

<style scoped>

</style>
