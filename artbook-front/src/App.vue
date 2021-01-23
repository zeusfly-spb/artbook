<template>
  <v-app>
    <v-app-bar
      app
      color="primary"
      dark
    >
      <div class="d-flex align-center">
          <h3>ArtBook Service</h3>
      </div>
    </v-app-bar>

    <v-main>
        <app-menu/>
        <router-view/>
    </v-main>
  </v-app>
</template>

<script>
import AppMenu from '@/components/AppMenu'

export default {
  name: 'App',

  data: () => ({
    //
  }),
    components: {
      AppMenu
    }
};
</script>

<style>
.clickable {
    opacity: .8;
    cursor: pointer;
}
.clickable:HOVER {
    opacity: 1;
}
</style>
