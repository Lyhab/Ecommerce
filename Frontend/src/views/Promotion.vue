<template>
  <section class="promotion_section layout_padding-top">
    <div class="container" v-if="fetchedData && fetchedData.products && fetchedData.products.data">
      <h2 class="custom_heading">Products on sale</h2>
      <p class="custom_heading-text">
        Upgrade your sound experience with our on-sale headphones. Stylish, comfortable, and featuring premium audio, these headphones are a must-have for music lovers. Grab yours now for an unbeatable deal!
      </p>
      <div v-for="product in fetchedData.products.data" class="row layout_padding2">
        <div class="col-md-8">
          <div class="promotion_detail-box">
            <h1>
              {{ product.brand }}
            </h1>
            <h1>
              {{ product.model }}
            </h1>
            <p class="mt-4 mb-5">
              {{ product.description }}
            </p>
            <h3>
              {{ product.discount }}% off
            </h3>
            <h2 class="mt-4 mb-5">
              $ {{ product.price }}
            </h2>
            <div>
              <button @click="addToCart(product.id)" class="custom_dark-btn"> Add to cart </button>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex justify-content-center align-items-center">
          <div
            class="promotion_img-box d-flex justify-content-center align-items-center"
          >
            <img
              :src="`http://127.0.0.1:8000/${product.image}`"
              alt=""
              class=""
              width="250px"
            />
          </div>
        </div>
      </div>
    </div>

    <!-- Pagination -->
    <div class="mt-4 d-flex justify-content-center" v-if="fetchedData.products && fetchedData.products.links">
      <ul class="pagination pagination-rounded mb-0 justify-content-end">
        <li class="page-item">
          <button
            class="page-link text-dark"
            @click="changePage(fetchedData.products.first_page_url)"
          >
            Previous
          </button>
        </li>
        <li
          v-for="(item, index) in fetchedData.products.links"
          :key="index"
          :class="{ 'page-item': true, active: item.active }"
        >
          <button
            v-if="index !== 0 && index !== fetchedData.products.links.length - 1"
            @click="changePage(item.url)"
            class="page-link btn-outline-dark"
            :class="{ 'text-dark': !item.active, 'text-light': item.active, 'bg-dark': item.active, 'border-light': item.active}"
          >
            {{ index }}
          </button>
        </li>

        <li class="page-item">
          <button
            class="page-link text-dark"
            @click="changePage(fetchedData.products.next_page_url)"
          >
            Next
          </button>
        </li>
      </ul>
    </div>
  </section>
</template>

<script>
import {
  RiHeart3Line,
  RiShoppingCartLine,
  RiArrowRightSLine,
  RiStarSFill,
} from "vue-remix-icons";
import fetchData from "../services/fetchData.js";
import { RouterLink } from "vue-router";

export default {
  components: {
    RouterLink,
    RiShoppingCartLine,
    RiArrowRightSLine,
    RiHeart3Line,
    RiStarSFill,
  },
  data() {
    return {
      fetchedData: [],
      promotionEndPoint: "http://127.0.0.1:8000/api/v1/promotion",
    };
  },
  mounted() {
    this.getAllPromotions();
  },
  methods: {
    async getAllPromotions() {
      this.isLoading = true;
      try {
        this.fetchedData = await fetchData(
          "GET",
          `${this.promotionEndPoint}`,
          null
        );
        console.log(this.promotionEndPoint)
        this.isLoading = false;
      } catch (error) {
        console.error("Error fetching data:", error);
        this.isLoading = false;
      }
    },
    async changePage(url) {
      this.promotionEndPoint = url;
      await this.getAllPromotions();
    },
    async addToCart(productId) {
      try {
        // Access $route.params.id using this.$route
        await fetchData("POST", "http://127.0.0.1:8000/api/v1/cart", {
          product_id: productId,
        });
      } catch (error) {
        console.error("Error fetching data:", error);
      }
    },
  },
};
</script>