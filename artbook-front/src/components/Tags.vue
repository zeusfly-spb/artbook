<template>
    <div
        class="flex-row"
    >
        <span
            v-for="(tag, index) in tags"
            :key="index"
            class="body-2 blue--text"
        >
            <router-link
                :to="`/articles/${article.slug}`"
                target="_blank"
                style="text-decoration: none"
            >
                {{ tag.label }}
            </router-link>

        </span>
    </div>
</template>

<script>
export default {
    name: 'Tags',
    props: {
        article: {
            type: Object,
            require: true
        }
    },
    computed: {
        tags () {
            return this.article && this.article.tags || []
        }
    }
}
</script>

<style scoped>

</style>
