<template>
    <div class="register-container">
      <form @submit.prevent="register()" class="register-form">
        <h2>Register</h2>
        <div class="form-group">
          <label for="name">Name:</label>
          <input v-model="name" type="text" id="name" placeholder="Enter your name" required>
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input v-model="email" type="email" id="email" placeholder="Enter your email" required>
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input v-model="password" type="password" id="password" placeholder="Enter your password" required>
        </div>
        <button type="submit">Register</button>
      </form>
    </div>
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
  .register-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }
  
  .register-form {
    width: 400px;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  }
  
  .form-group {
    margin-bottom: 20px;
  }
  
  label {
    font-weight: bold;
    display: block;
    margin-bottom: 8px;
  }
  
  input {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
  }
  
  button {
    background-color: #4caf50;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
  
  button:hover {
    background-color: #45a049;
  }
  </style>
  