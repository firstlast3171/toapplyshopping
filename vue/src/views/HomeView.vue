<template>
  <div class="bg-white">
    
    <Header />
    <div class="relative isolate px-6 pt-14 lg:px-8">
      <!-- whole div color -->
      <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
        <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#4caf50] to-[#2196f3] opacity-20 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)" />
      </div>
      <!-- <div class="mt-5">
        <Search />
      </div> -->

      
       <!-- whole div color -->
       <div class="min-h-screen flex flex-col  items-center justify-center">
        <div class="text-center">
          <h1 class="text-4xl font-semibold mb-4">Welcome to our Shopping Site!</h1>
          <p class="text-lg">Discover a world of amazing products and great deals. Shop with confidence and find everything you need.</p>
          <p class="text-lg mt-4">Start exploring our categories and enjoy a seamless shopping experience.</p>
        </div>
        <a href="/product" class="mt-8 p-4 bg-blue-500 text-white rounded hover:bg-blue-700 transition duration-300">
          Shop Now
        </a>
      </div>


    </div>
  </div>
</template>

<script setup>
 import Header from '../components/Header.vue'
//  import Search from '../components/Search.vue';
</script>


