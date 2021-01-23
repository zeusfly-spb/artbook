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
        items:[
            {title: 'Главная', href: '/'},
            {title: 'Статьи', href: '/articles'}
        ]
    })
}
</script>

<style scoped>

</style>
