<template>
    <div>
        <section class="hero_area slider_section position-relative">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="slider_item-box">
                <div class="slider_item-container">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="slider_item-detail">
                          <div>
                            <h1>
                              Welcome to <br />
                            SOUND 
                            </h1>
                            <!-- <div>{{ products }}</div> -->
                            <p>
                              Bluetooth Headphones Over Ear, 65 Hours Playtime Wireless Headphones with Microphone,
                              Foldable Lightweight Headset with Deep Bass,HiFi Stereo Sound for Travel Work Cellphone.
                            </p>
                            <div class="d-flex">
                              <a href="" class="text-uppercase custom_orange-btn mr-3">
                                Shop Now
                              </a>
                              <a href="" class="text-uppercase custom_dark-btn">
                                Contact Us
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="slider_img-box">
                          <div>
                            <img src="../assets/images/Headphone.png" alt="" style="width: 370px; margin-top: -40px; margin-left: 60px;" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="slider_item-box">
                <div class="slider_item-container">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="slider_item-detail">
                          <div>
                            <h1>
                              Welcome to <br />
                              SOUNDs
                            </h1>
                            <p>
                              Bluetooth Headphones Over Ear, 65 Hours Playtime Wireless Headphones with Microphone,
                              Foldable Lightweight Headset with Deep Bass,HiFi Stereo Sound for Travel Work Cellphone.
                            </p>
                            <div class="d-flex">
                              <a href="" class="text-uppercase custom_orange-btn mr-3">
                                Shop Now
                              </a>
                              <a href="" class="text-uppercase custom_dark-btn">
                                Contact Us
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="slider_img-box">
                          <div>
                            <img src="../assets/images/Headphone.png" alt="" style="width: 370px; margin-top: -40px; margin-left: 60px;" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="slider_item-box">
                <div class="slider_item-container">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="slider_item-detail">
                          <div>
                            <h1>
                              Welcome to <br />
                              SOUND
                            </h1>
                            <p>
                              Bluetooth Headphones Over Ear, 65 Hours Playtime Wireless Headphones with Microphone,
                              Foldable Lightweight Headset with Deep Bass,HiFi Stereo Sound for Travel Work Cellphone.
                            </p>
                            <div class="d-flex">
                              <a href="" class="text-uppercase custom_orange-btn mr-3">
                                Shop Now
                              </a>
                              <a href="" class="text-uppercase custom_dark-btn">
                                Contact Us
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="slider_img-box">
                          <div>
                            <img src="../assets/images/Headphone.png" alt="" style="width: 370px; margin-top: -40px; margin-left: 60px;" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="custom_carousel-control">
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </section>
  
      <!-- end slider section -->
  
    <!-- service section -->
  
    <section class="service_section layout_padding ">
      <div class="container">
        <h2 class="custom_heading">Partner Brand</h2>
        <p class="custom_heading-text">
          Elevate your lifestyle with our partner brand—innovative, stylish, and committed to excellence.
        </p>
        <div class=" layout_padding2">
        <div class="card-deck">
          <div v-for="brand in brands.data" class="card">
            <div class="card-body d-flex flex-column" style="gap: 15px;">
              <h5 class="card-title" style="font-size: 50px;">{{brand.name}}</h5>
              <p class="card-text">
                {{brand.description}}
              </p>
            </div>
          </div>
        </div>
      </div>
      </div>
    </section>
  
    <!-- end service section -->
  


    <section class="fruit_section">
      <div class="container">
        <h2 class="custom_heading">Featured Products</h2>
        <p class="custom_heading-text">
          Discover our curated collection of featured products—a showcase of excellence and innovation. Each item is meticulously selected for its quality, style, and cutting-edge features. Elevate your experience with these standout products, setting a new standard in superior performance and design.
        </p>
        <div v-for="product in products.data" class="row layout_padding2">
          <div class="col-md-8">
            <div class="fruit_detail-box">
              <h3>
                {{ product.name }}
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
            <div class="fruit_img-box d-flex justify-content-center align-items-center">
              <img :src="`http://127.0.0.1:8000/${product.image}`" alt="" class="" width="250px" />
            </div>
          </div>
        </div>
      </div>
    </section>
  
    <!-- end fruits section -->
  
  
    <!-- end tasty section -->
  
    <!-- client section -->
  
    <section class="client_section layout_padding">
      <div class="container">
        <h2 class="custom_heading">Founder</h2>
        <p class="custom_heading-text">
          Meet the brilliant minds behind our platform—passionate founders dedicated to redefining your audio experience. Driven by innovation, they curate a selection that reflects expertise and a commitment to seamless shopping. Experience audio excellence crafted by our visionary founders.
        </p>
        <div>
          <div id="carouselExampleControls-2" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="client_container layout_padding2">
                  <div class="client_img-box">
                    <img src="" alt="" />
                  </div>
                  <div class="client_detail">
                    <h3>
                      RITHYNY Lyhab
                    </h3>
                    <p class="custom_heading-text">
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo amet a sit in dolore inventore natus excepturi fugiat, impedit aliquid atque assumenda nobis voluptatem eligendi explicabo magnam? Amet, vero nemo.
                    </p>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="client_container layout_padding2">
                  <div class="client_img-box">
                    <img src="" alt="" />
                  </div>
                  <div class="client_detail">
                    <h3>
                      NENG Sopheap
                    </h3>
                    <p class="custom_heading-text">
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse eos neque qui, corrupti cupiditate quod in, ratione quasi distinctio id quidem libero earum tempora temporibus repellat error voluptas debitis voluptatem.
                    </p>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="client_container layout_padding2">
                  <div class="client_img-box">
                    <img src="" alt="" />
                  </div>
                  <div class="client_detail">
                    <h3>
                      SENG Enghav
                    </h3>
                    <p class="custom_heading-text">
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates illum aliquid maxime aperiam temporibus, tenetur animi harum ipsam doloribus sapiente eos ab, magnam autem quidem, quasi asperiores fuga fugiat voluptatem.
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="custom_carousel-control">
              <a class="carousel-control-prev" href="#carouselExampleControls-2" role="button" data-slide="prev">
                <span class="" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleControls-2" role="button" data-slide="next">
                <span class="" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
  
          </div>
        </div>
      </div>
    </section>
  
    <!-- end client section -->
  
    <!-- contact section -->
    <section class="contact_section layout_padding">
      <div class="container">
        <h2 class="font-weight-bold">
          Contact Us
        </h2>
        <div class="row">
          <div class="col-md-8 mr-auto">
            <form action="">
              <div class="contact_form-container">
                <div>
                  <div>
                    <input type="text" placeholder="Name">
                  </div>
                  <div>
                    <input type="text" placeholder="Phone Number">
                  </div>
                  <div>
                    <input type="email" placeholder="Email">
                  </div>
  
                  <div class="mt-5">
                    <input type="text" placeholder="Message">
                  </div>
                  <div class="mt-5">
                    <button type="submit">
                      send
                    </button>
                  </div>
                </div>
  
              </div>
  
            </form>
          </div>
        </div>
      </div>
    </section>

        <!-- map section -->
        <section class="map_section">
      <div id="map" class="h-100 w-100 ">
        <iframe class="w-100 h-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2948.7851341294067!2d104.89624328229655!3d11.570446534698315!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3109517388680e15%3A0x63057e6682968f5!2sInstitute%20of%20Technology%20of%20Cambodia!5e0!3m2!1sen!2skh!4v1707323925827!5m2!1sen!2skh" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </section>
    </div>
</template>

<script>
import fetchData from '../services/fetchData';

export default{
    data() {
        return{
            products:[],
            brands:[],
            apiProductUrl:'http://127.0.0.1:8000/api/v1/product',
            apiBrandUrl:'http://127.0.0.1:8000/api/v1/brand'
        }
    },
    methods:{
        async getAllProducts() {
            try {
                this.products = await fetchData("GET", `${this.apiProductUrl}`, null);
            } catch (error) {
                console.error("Error fetching data:", error);
            }
        },
        async getAllBrands() {
            try {
                this.brands = await fetchData("GET", `${this.apiBrandUrl}`, null);
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
    mounted() {
        this.getAllProducts()
        this.getAllBrands()
    }
}
</script>