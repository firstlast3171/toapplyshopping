<template>
     <div class="bg-white">
       <Header />
       <div class="relative isolate px-6 pt-14 lg:px-8">
         <!-- whole div color -->
         <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
           <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#4caf50] to-[#2196f3] opacity-20 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)" />
         </div>
          <!-- whole div color -->
           <div class="mt-5">
               <Search />
          </div>
 <!-- main -->
          <div class="my-3">
           
               <div class="flex gap-2 justify-center my-2">
                <div class="flex">
    <button ref="dialogButton" type="button" class="" @click="mobileMenuOpen = !mobileMenuOpen">
      <span :class="{ 'opacity-0 translate-y-2': mobileMenuOpen }" class="border bg-blue-200 px-3 py-2 rounded h-6 w-6 transition-opacity duration-300 ease-in-out transition-transform duration-300 ease-in-out" aria-hidden="true">Category</span>
      <!-- <ArrowRightIcon :class="{ 'transform rotate-180': mobileMenuOpen }" class="h-6 w-6 transition-transform duration-300 ease-in-out" aria-hidden="true" /> -->
    </button>
  </div>
  <Dialog as="div" class="" @close="mobileMenuOpen = false" :open="mobileMenuOpen">
  <div class="fixed inset-0 z-50 flex items-center justify-center">
    <DialogPanel class="relative overflow-y-auto bg-white shadow-lg px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
      <div class="flex flex-row items-center justify-between">
        <a href="#" class="-m-1.5 p-1.5 text-gray-800 hover:text-blue-500">
          <span class="text-2xl font-semibold">Category</span>
        </a>
        <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring focus:border-blue-300" @click="mobileMenuOpen = false">
          <span class="sr-only">Close menu</span>
          <XMarkIcon class="h-6 w-6" aria-hidden="true" />
        </button>
      </div>
      <div class="mt-6 flex flex-row items-center justify-start">
        <div class="flex-grow">
          <div class="-my-6 divide-y divide-gray-500/10">
            <div class="space-x-4 py-6 flex flex-wrap items-center">
              <a
                v-for="item in navigation"
                :key="item.name"
                :href="item.href"
                class="flex items-center px-4 py-2 text-base font-semibold text-gray-800 hover:bg-gray-100 hover:text-blue-500 focus:outline-none focus:bg-gray-100 focus:text-blue-500 rounded-md transition-all duration-300 ease-in-out border border-transparent"
              >
                {{ item.name }}
              </a>
            </div>
          </div>
        </div>
      </div>
    </DialogPanel>
  </div>
</Dialog>

        

              </div>

       <!-- Product cards or other e-commerce content -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-5">
          <div v-for="product in paginatedProducts" :key="product.id" class="bg-white p-4 shadow-md rounded-md">
            <img :src="product.image" alt="Product Image" class="w-full h-48 object-cover mb-4 rounded-md">
            <h3 class="text-lg font-semibold text-gray-800">{{ product.name }}</h3>
            <p class="text-sm text-gray-500">{{ product.price }}</p>
            <button @click="purchaseProduct(product)" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:bg-blue-700 transition-all duration-300 ease-in-out">
                 Purchase
            </button>
          </div>
        </div>

        <!-- Pagination -->
        <div class="mt-6 flex justify-center">
          <button
            v-for="pageNumber in totalPages"
            :key="pageNumber"
            @click="setCurrentPage(pageNumber)"
            :class="{ 'bg-blue-500 text-white': currentPage === pageNumber }"
            class="px-4 py-2 mx-1 text-gray-800 border border-gray-300 rounded-md hover:bg-gray-100 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 transition-all duration-300 ease-in-out"
          >
            {{ pageNumber }}
          </button>
        </div>
  

          </div>
 <!-- main -->
       </div>
   <Footer />
     </div>
   </template>
   <script setup>
    import Header from '../components/Header.vue'
    import Footer from '../components/Footer.vue'
    import Search from '../components/Search.vue';

    import { ref, computed, onMounted  } from 'vue'
    import { Dialog, DialogPanel } from '@headlessui/vue'
    import { XMarkIcon, ArrowRightIcon } from '@heroicons/vue/24/outline'
    const mobileMenuOpen = ref(false);
    const productsPerPage = 6;
const currentPage = ref(1);
const dialogButton = ref(null);

onMounted(() => {
  dialogButton.value.focus();
});
      const navigation = [
  { name: 'Clothes', href: '/product/clothes' },
  { name: 'Cosmetics', href: '/product/cosmetics' },
  { name: 'Glasses', href: '/product/glasses' },
  { name: 'Bags', href: '/product/bags' },
]
const products = [
  { id: 1, name: 'Product 1', price: '$19.99', image: 'https://via.placeholder.com/150' },
  { id: 2, name: 'Product 2', price: '$29.99', image: 'https://via.placeholder.com/150' },
  { id: 3, name: 'Product 3', price: '$14.99', image: 'https://via.placeholder.com/150' },
  { id: 4, name: 'Product 4', price: '$24.99', image: 'https://via.placeholder.com/150' },
  { id: 5, name: 'Product 5', price: '$39.99', image: 'https://via.placeholder.com/150' },
  { id: 6, name: 'Product 6', price: '$49.99', image: 'https://via.placeholder.com/150' },
  { id: 7, name: 'Product 7', price: '$9.99', image: 'https://via.placeholder.com/150' },
  { id: 8, name: 'Product 8', price: '$59.99', image: 'https://via.placeholder.com/150' },
  { id: 9, name: 'Product 9', price: '$34.99', image: 'https://via.placeholder.com/150' },
  { id: 10, name: 'Product 10', price: '$44.99', image: 'https://via.placeholder.com/150' },
];
const totalProducts = ref(products.length);

const totalPages = computed(() => Math.ceil(totalProducts.value / productsPerPage));

const paginatedProducts = computed(() => {
  const startIndex = (currentPage.value - 1) * productsPerPage;
  const endIndex = startIndex + productsPerPage;
  return products.slice(startIndex, endIndex);
});

const setCurrentPage = (pageNumber) => {
  if (pageNumber >= 1 && pageNumber <= totalPages.value) {
    currentPage.value = pageNumber;
  }
};
const purchaseProduct = (product) => {
  // Add your logic for handling the purchase action here
  console.log(`Product purchased: ${product.name}`);
};

 
   
    
   </script>
   <style scoped>
   
   </style>
   
   