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
            <f-flex
                class="ml-1 flex-column"
            >
                <h2>{{ article.header }}</h2>
                <span
                    class="caption"
                >
                    {{ article.text }}
                </span>
            </f-flex>
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
