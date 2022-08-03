<template>
    <Master v-if="$store.state.authUser"></Master>
    <SignIn v-else></SignIn>
</template>

<script>
import Master from '@/views/Master.vue'
import SignIn from '@/views/pages/SignIn.vue'
export default {
    name: 'App',
    components: {
        Master,
        SignIn
    }
}

</script>
