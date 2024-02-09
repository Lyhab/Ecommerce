<template>
  <section class="fruit_section layout_padding-top">
    <div class="container">
      <h2 class="custom_heading">Partnered Brands</h2>
      <p class="custom_heading-text">
        Elevate your lifestyle with our partner brand—innovative, stylish, and committed to excellence.
      </p>
      <div v-for="brand in fetchedData.data" class="row layout_padding2">
        <div class="col-md-8">
          <div class="fruit_detail-box">
            <h3>
              {{ brand.name }}
            </h3>
            <p class="mt-4 mb-5">
              {{ brand.description }}
            </p>
            <div>
              <router-link :to="`/product/${brand.id}`" class="custom_dark-btn"> Explore </router-link>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex justify-content-center align-items-center">
          <div
            class="fruit_img-box d-flex justify-content-center align-items-center"
          >
            <img
              :src="`http://127.0.0.1:8000/${brand.image}`"
              alt=""
              class=""
              width="123px"
            />
          </div>
        </div>
      </div>
    </div>

    <!-- Pagination -->
    <div class="mt-4 d-flex justify-content-center">
      <ul class="pagination pagination-rounded mb-0 justify-content-end">
        <li class="page-item">
          <button
            class="page-link text-dark"
            @click="changePage(fetchedData.first_page_url)"
          >
            Previous
          </button>
        </li>
        <li
          v-for="(item, index) in fetchedData.links"
          :key="index"
          :class="{ 'page-item': true, active: item.active }"
        >
          <button
            v-if="index !== 0 && index !== fetchedData.links.length - 1"
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
            @click="changePage(fetchedData.next_page_url)"
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
        brands: [],
        brandEndPoint: "http://127.0.0.1:8000/api/v1/brand",
      };
    },
    mounted() {
      this.getAllBrands();
    },
    methods: {
      async getAllBrands() {
        this.isLoading = true;
        try {
          this.fetchedData = await fetchData(
            "GET",
            `${this.brandEndPoint}`,
            null
          );
          this.isLoading = false;
        } catch (error) {
          console.error("Error fetching data:", error);
          this.isLoading = false;
        }
      },
      async changePage(url) {
        this.brandEndPoint = url;
        await this.getAllBrands();
      },
    },
  };
  </script>

<style scoped>
.page-item:active {
  background-color: black;
  color: white;
}
</style>