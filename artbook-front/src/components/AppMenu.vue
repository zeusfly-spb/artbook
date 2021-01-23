<template>
    <v-tabs>
        <v-tab
            v-for="(item, index) in items"
            :to="{path: item.href}"
            :key="index"
            router
        >
            {{ item.title }}
        </v-tab>
    </v-tabs>
</template>

<script>
export default {
    name: 'AppMenu',
    data: () => ({
        baseItems:[
            {title: 'Главная', href: '/'},
            {title: 'Каталог статей', href: '/articles'}
        ]
    }),
    computed: {
        items () {
            return this.$route.name === 'Article' ?
                [
                    ...this.baseItems,
                    {title: 'Просмотр статьи', href: `/articles/${this.$store.state.currentArticle && this.$store.state.currentArticle.slug || ''}`}
                ] : this.baseItems
        }
    }
}
</script>

<style scoped>

</style>
