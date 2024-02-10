<template>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Image</th>
      <th scope="col">Model</th>
      <th scope="col">Price</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="(item, index) in data">
      <th scope="row">{{ index+1 }}</th>
      <td><img :src="`http://127.0.0.1:8000/${item.image}`" alt="" class="" width="50px" /></td>
      <td>{{ item.model }}</td>
      <td>{{ item.price }} $</td>
      <td><button class="btn btn-outline-danger" @click="removeCart(item.cart_id)">Remove</button></td>
    </tr>
  </tbody>
</table>
</template>

<script>
import { RiArrowRightSLine, RiDeleteBinFill } from "vue-remix-icons";
import fetchData from "../services/fetchData.js";
export default {
  components: {
    RiArrowRightSLine,
    RiDeleteBinFill,
  },
  data() {
    return {
      data: [],
    };
  },
  computed: {
    totalPrice() {
      const totalPrice = this.data.reduce(
        (total, item) => total + parseFloat(item.price),
        0
      );
      return totalPrice.toFixed(2);
    },
  },
  mounted() {
    this.getCart();
  },
  methods: {
    async getCart() {
      try {
        // Access $route.params.id using this.$route
        this.data = await fetchData(
          "GET",
          "http://127.0.0.1:8000/api/v1/cart/cart",
          null
        );
      } catch (error) {
        console.error("Error fetching data:", error);
      }
    },
    async removeCart(id) {
      try {
        // Access $route.params.id using this.$route
        await fetchData(
          "DELETE",
          `http://127.0.0.1:8000/api/v1/cart/${id}`,
          null
        );
        this.getCart();
      } catch (error) {
        console.error("Error fetching data:", error);
      }
    },
  },
};
</script>