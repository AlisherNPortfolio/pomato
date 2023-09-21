<template>
    <h1>Login page</h1>
    <button @click="login">Login</button>
</template>
<script lang="ts">
import { defineComponent } from "@vue/runtime-core";
import TokenService from '../../../services/TokenService'

export default defineComponent({
    name: 'AppLogin',
    methods: {
        login() {
            TokenService.saveToken('test_token');
            this.$router.push({name: 'dashboard'})
        }
    }
})
</script>
