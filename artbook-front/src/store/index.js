import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
      articles: [],
      paginator: {
          page: 1,
          per_page: 10,
          total: 0,
          last_page: 0,
          current_page: 0
      }
  },
  mutations: {
      SET_ARTICLES (state, articles) {
          state.articles = articles
      },
      RESET_PAGINATOR (state) {
          state.paginator = {
              page: 1,
              per_page: 10,
              total: 0,
              last_page: 0,
              current_page: 0
          }
      },
      SYNC_PAGINATION (state, sync) {
          state.paginator.total = sync.total
          state.paginator.last_page = sync.lastPage
          state.paginator.per_page = sync.perPage
          state.paginator.page = sync.currentPage
      },
      UPDATE_PAGINATION (state, data) {
          state.paginator.page = data.page || 1
          state.paginator.per_page = data.rowsPerPage || -1
      }
  },
  actions: {
      setArticles ({commit, state}) {
          Vue.axios.post('/api/articles', {
              page: state.paginator.page,
              per_page: state.paginator.per_page
          })
              .then(res => {
                  commit('SET_ARTICLES', res.data.articles)
                  commit('SYNC_PAGINATION', res.data.paginator_data)
                  Promise.resolve(res)
              })
              .catch(e => Promise.reject(e))
      }
  },
  getters: {
      paginator_page: state => state.paginator.page,
      paginator_per_page: state => state.paginator.per_page
  }
})
