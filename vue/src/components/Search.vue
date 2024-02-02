<template>
     <div class="relative">
       <input
         v-model="searchQuery"
         type="text"
         placeholder="Search..."
         class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300 transition duration-150"
       />
       <button @click="handleSearch" class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-500 bg-blue-100">
         Search
       </button>
     </div>
   </template>
   
   <script setup>
   import { ref } from 'vue';
   const searchQuery = ref('');
     
   const handleSearch = () => {
     if(searchQuery.value === ''){
          alert("Seach can't be blank. Please search something.");
          return;
     }
     console.log('Searching for:', searchQuery.value);
     searchQuery.value = '';
   };
   </script>
   
   <style scoped>
   /* Add styling for your search component if needed */
   </style>
   