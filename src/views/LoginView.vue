<template>
  <div>
    <FormLogin />
    

  </div>
</template>

<script>
import FormLogin from '@/components/FormLogin.vue'
export default {
    components: {
        FormLogin
    },
    created () {
        // this.$store.commit('checkLoginOrUser');

    }

}
</script>

<style>

</style>