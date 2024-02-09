<template>
    <form @submit.prevent="login()">
        <div class="container-login">
            <h1 class="Login">Login</h1>
            <div class="wrap-login">
                <div class="Email">
                    <div>Email</div>
                    <input v-model="email" type="email" placeholder="Enter your email"
                        style="width: 100%; height: 60%; border-radius: 10px; border: 0.5px solid ABA2A2; font-size: 15px;">
                </div>
                <div class="Password">
                    <div>Password</div>
                    <input v-model="password" type="password" placeholder="Enter your password"
                        style="width: 100%; height: 60%; border-radius: 10px; border: 0.5px solid ABA2A2; font-size: 15px;">
                </div>


            </div>
            <button type="submit">Log in</button>
        </div>
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
<style>
input {

    padding: 15px;
    border: 1px solid #ccc;

}

.Email {
    font-size: 20px;

}

.Password {
    font-size: 20px;
}


button {
    background-color: rgb(255, 94, 0);
    color: white;
    padding: 10px;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    margin-top: 40px;
    width: 120px;
}

.Login {
    font-size: 50px;

}

.container-login {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    font-family: 'Poppins', sans-serif;
    margin-top: 60px;
}

.wrap-login {
    display: flex;
    flex-direction: column;
    gap: 20px;
    width: 600px;
    height: 190px;
    margin-top: 20px;
}</style>