<template>
  <div class="home">
      <last-articles/>
  </div>
</template>

<script>
import LastArticles from "@/components/LastArticles"
export default {
  name: 'Home',
  components: {
      LastArticles
  }
}
</script>
