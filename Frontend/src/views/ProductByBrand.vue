<template>
    <section class="fruit_section layout_padding-top">
      <div class="container">
        <div v-for="product in fetchedData.data" class="row layout_padding2">
          <div class="col-md-8">
            <div class="fruit_detail-box">
              <h3>
                {{ product.model }}
              </h3>
              <p class="mt-4 mb-5">
                {{ product.description }}
              </p>
              <div>
                <button @click="addToCart(product.id)" class="custom_dark-btn"> Add to cart </button>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex justify-content-center align-items-center">
            <div
              class="fruit_img-box d-flex justify-content-center align-items-center"
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
      <div class="mt-4 d-flex justify-content-center">
        <ul class="pagination pagination-rounded mb-0 justify-content-end">
          <li class="page-item">
            <button
              class="page-link"
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
              class="page-link"
            >
              {{ index }}
            </button>
          </li>
  
          <li class="page-item">
            <button
              class="page-link"
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
        search: "",
        fetchedData: [],
        brands: [],
        isLoading: false,
        confirmDelete: false,
        deleteItemId: null,
        apiUrl: "http://127.0.0.1:8000/api/v1",
        productEndPoint: "http://127.0.0.1:8000/api/v1/product",
        brandEndPoint: "/brand",
      };
    },
    mounted() {
      this.getAllProducts();
      this.getAllBrands();
    },
    methods: {
      async getAllProducts() {
        this.isLoading = true;
        try {
          this.fetchedData = await fetchData(
            "GET",
            `${this.productEndPoint}?brand_id=${this.$route.params.brand_id}`,
            null
          );
          this.isLoading = false;
        } catch (error) {
          console.error("Error fetching data:", error);
          this.isLoading = false;
        }
      },
      async handleSearch() {
        this.isLoading = true;
        try {
          this.fetchedData = await fetchData(
            "GET",
            `${this.productEndPoint}?search=${this.search}`,
            null
          );
          this.isLoading = false;
        } catch (error) {
          console.error("Error fetching data:", error);
          this.isLoading = false;
        }
      },
      async getAllBrands() {
        this.isLoading = true;
        try {
          this.brands = await fetchData(
            "GET",
            `${this.apiUrl}${this.categoryEndPoint}`,
            null
          );
          this.isLoading = false;
        } catch (error) {
          console.error("Error fetching data:", error);
          this.isLoading = false;
        }
      },
      async filterByCategory(url) {
        this.productEndPoint = "http://127.0.0.1:8000/api/v1/product";
        this.productEndPoint = this.productEndPoint + url;
        await this.getAllProducts();
      },
      async changePage(url) {
        this.productEndPoint = url;
        await this.getAllProducts();
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
  