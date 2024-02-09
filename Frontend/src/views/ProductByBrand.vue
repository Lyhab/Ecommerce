<template>
    <section class="product_section layout_padding-top">
      <div class="container" v-for="product in fetchedData.data">
        <div class="row layout_padding2">
          <div class="col-md-8">
            <div class="product_detail-box">
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
              class="product_img-box d-flex justify-content-center align-items-center"
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
  import { RiHeart3Line, RiShoppingCartLine, RiArrowRightSLine, RiStarSFill, } from "vue-remix-icons";
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
          console.log("fetchedData:", this.fetchedData);
          this.isLoading = false;
        } catch (error) {
          console.error("Error fetching data:", error);
          this.isLoading = false;
        }
      },
      async changePage(url) {
        // Extract the brand_id from the current route
        const brandId = this.$route.params.brand_id;

        // Check if the URL already contains a query parameter
        const separator = url.includes("?") ? "&" : "?";

        // Manually construct the pagination URL with brand_id
        const paginationUrl = `${url}${separator}brand_id=${brandId}`;

        try {
          // Fetch products for the manually constructed URL
          this.fetchedData = await fetchData("GET", paginationUrl, null);
        } catch (error) {
          console.error("Error fetching data:", error);
        }
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
  