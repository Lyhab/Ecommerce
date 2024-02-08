<template>
    <form @submit.prevent="login()">
        <input v-model="email" type="email" placeholder="email">
        <input v-model="password" type="password" placeholder="password">
        <button type="submit">Log in</button>
    </form>
</template>

<script>
    import { RouterLink } from "vue-router";
    import { RiGoogleFill } from "vue-remix-icons";
    import fetchData from "../services/fetchData.js";

    export default {
    data() {
        return {
        email: "",
        password: "",
        };
    },
    methods: {
        async login() {
        try {
            const response = await fetchData(
            "POST",
            "http://127.0.0.1:8000/api/v1/auth/login",
            {
                email: this.email,
                password: this.password,
            }
            );
            const token = response.authorisation.token;
            localStorage.setItem("token", token);
            this.$router.push({ name: "homepage" });
        } catch (error) {
            console.error("Error logging in:", error);
        }
        },
    },
    components: { RouterLink, RiGoogleFill },
    };
</script>