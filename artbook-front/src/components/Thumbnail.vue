<template>
    <v-card>
        <v-card-text
            class="d-inline-flex pa-2"
            outlined
            tile
        >
            <v-img
                max-height="150"
                max-width="150"
                min-height="150"
                min-width="150"
                src="https://via.placeholder.com/50"
            />
            <div
                class="ml-1 flex-column"
            >
                <router-link
                    :to="`/articles/${article.slug}`"
                    style="text-decoration: none"
                >
                    <h2>{{ article.header }}</h2>
                </router-link>
                <span
                    class="caption"
                >
                    {{ article.text }}
                </span>
            </div>
        </v-card-text>
    </v-card>
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
