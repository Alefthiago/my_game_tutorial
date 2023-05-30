<template>
    <div>
        <FormRegistration />
    </div>
</template>

<script>
import FormRegistration from '@/components/FormRegistration.vue';
export default {
     components: {
        FormRegistration
     },
     created () {
        this.$store.commit('checkLoginOrUser');
     }
}
</script>

<style>
</style>