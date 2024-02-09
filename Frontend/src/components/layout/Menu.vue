<template>
      <div >
      <!-- header section strats -->
      <header class="header_section">
        <div class="container">
          <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
            <a class="navbar-brand" href="index.html">
              <img src="" alt="" /><span>
                Sound
              </span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
  
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
                <ul class="navbar-nav  ">
                  <li class="nav-item">
                    <router-link to="/" class="nav-link" :class="{ active: isActive('/') }">Home</router-link>
                  </li>
                  <li class="nav-item">
                    <router-link to="/shop" class="nav-link" :class="{ active: isActive('/shop') }">Shop</router-link>
                  </li>
                  <li class="nav-item">
                    <router-link to="/promotion" class="nav-link" :class="{ active: isActive('/promotion') }">Promotion</router-link>
                  </li>
                  <li class="nav-item">
                    <router-link to="/contact" class="nav-link" :class="{ active: isActive('/contact') }">Contact us</router-link>
                  </li>
                </ul>
              </div>
              <div><RiUserLine style="width:20px" /></div>
              <div class="quote_btn-container ml-0 ml-lg-4 d-flex justify-content-center">
                <router-link to="/cart">
                  Cart
                </router-link>
              </div>
            </div>
          </nav>
        </div>
      </header>
      <!-- end header section -->
      <!-- slider section -->
      
      <slot></slot>
  
    <!-- end map section -->
  
    <section class="info_section layout_padding">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <h5>
              Top Brands
            </h5>
            <ul>
              <li>
                Anker
              </li>
              <li>
                Apple
              </li>
              <li>
                Beats
              </li>
              <li>
                Bose
              </li>
              <li>
                JBL
              </li>
              <li>
                Sennheiser
              </li>
              <li>
                Skullcandy
              </li>
              <li>
                Sony
              </li>
            </ul>
          </div>
          <div class="col-md-3">
            <h5>
              Our Company
            </h5>
            <ul>
              <li>
                About us
              </li>
              <li>
                The headphone community
              </li>
              <li>
                Term of service
              </li>
              <li>
                Privacy policy
              </li>
              <li>
                Accessibility Statement
              </li>
            </ul>
          </div>
          <div class="col-md-3">
            <h5>
              Support
            </h5>
            <ul>
              <li>
                365-day returns
              </li>
              <li>
                Track your order
              </li>
              <li>
                Shopping policy
              </li>
              <li>
                Refund policy
              </li>
              <li>
                FAQ
              </li>
              <li>
                Contact us
              </li>
            </ul>
          </div>
          <div class="col-md-3">
            <div class="social_container">
              <h5>
                Follow Us
              </h5>
              <div class="social-box">
                <a href="">
                  <img src="" alt="">
                </a>
  
                <a href="">
                  <img src="" alt="">
                </a>
                <a href="">
                  <img src="" alt="">
                </a>
                <a href="">
                  <img src="" alt="">
                </a>
              </div>
            </div>
            <div class="subscribe_container">
              <h5>
                Subscribe Now
              </h5>
              <div class="form_container">
                <form action="">
                  <input type="email">
                  <button type="submit">
                    Subscribe
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  
  
  
    <!-- footer section -->
    <section class="container-fluid footer_section">
      <p>
        Copyright &copy; 2024 All Rights Reserved By SOUND
      </p>
    </section>
    <!-- footer section -->
    </div>
  </template>


<script>
import {RiUserLine} from 'vue-remix-icons'

export default{
  methods: {
    isActive(path) {
      return this.$route.path === path;
    },
  },
  components:{
    RiUserLine,
  }
}
</script>

<style scoped>
.active{
  text-decoration: underline !important;
}
</style>