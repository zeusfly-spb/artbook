<template>
  <div
      class="flex-row ml-3 mt-1"
  >
      <span
          class="mr-5 text-uppercase"
          v-for="(item, index) in items"
          :key="index"
      >
          <router-link
              :to="item.href"
              style="text-decoration: none"
              :class="{'grey--text': item.name !== $route.name}"
          >
              <strong>{{ item.title }}</strong>
          </router-link>
      </span>
  </div>
</template>

<script>
export default {
    name: 'AppMenu',
    data: () => ({
        selectedTab: null,
        baseItems:[
            {title: 'Главная', name: 'Home', href: '/'},
            {title: 'Каталог статей', name: 'Articles', href: '/articles'}
        ]
    }),
    computed: {
        items () {
            return this.$route.name === 'Article' ?
                [
                    ...this.baseItems,
                    {title: 'Просмотр статьи', name: 'Article', href: `/articles/${this.$store.state.currentArticle && this.$store.state.currentArticle.slug || ''}`}
                ] : this.baseItems
        }
    }
}
</script>

<style scoped>

</style>
