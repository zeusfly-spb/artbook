import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'

Vue.use(VueRouter)

const routes = [
  {

    path: '/',
    name: 'Home',
    component: Home,
    meta: {title: 'Главная'}
  },
  {
    path: '/articles',
    name: 'Articles',
    component: () => import('../views/Articles.vue'),
    meta: {title: 'Статьи'}
  },
  {
    path: '/articles/:slug',
    name: 'Article',
    component: () => import('../views/Article'),
    meta: {title: 'Просмотр статьи'}
  }
]

const router = new VueRouter({
  routes
})

router.beforeEach((to, from, next) => {
    document.title = `ArtBook - ${to.meta.title}`
    next()
})

export default router
