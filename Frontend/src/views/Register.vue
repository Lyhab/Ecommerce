<template>

    <form @submit.prevent="register()">
      <div class="register-container">
      <h1 class="register">Register</h1>
      <div class="wrap-register">
        <div class="name-name">
          <div>Name</div>
          <input v-model="name" type="name" placeholder="Enter your name"
            style="width: 100%; height: 60%; border-radius: 10px; border: 0.5px solid ABA2A2; font-size: 15px;">
        </div>

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
      <button type="submit">Register</button>
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
      name: "",
      password: "",
    };
  },
  methods: {
    async register() {
      try {
        const response = await fetchData("POST", "http://127.0.0.1:8000/api/v1/auth/register", {
          email: this.email,
          name: this.name,
          password: this.password,
        });
        this.$router.push({ name: "loginpage" });
      } catch (error) {
        console.error("Error Registering:", error);
      }
    },
  },
  components: { RouterLink, RiGoogleFill },
};
</script>
  
<style scoped>
.register-container{
  display: flex;
  flex-direction: column;

}
.wrap-register {
  display: flex;
  flex-direction: column;
  gap: 20px;
  width: 600px;
  height: 300px;

  margin-top: 20px;
}

.register {
  display: flex;
  justify-content: center;
  margin-top: 70px;
}
.register-container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 70vh;

}



.form-group {
  margin-bottom: 20px;
}

label {
  font-weight: bold;
  display: block;
  margin-bottom: 8px;
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

button:hover {
  background-color: #000000;
}
</style>
  