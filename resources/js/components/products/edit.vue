<template>
    <div class="p-4 sm:ml-64">
      <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
          <div class="p-4">
              <h1 class="text-2xl font-bold mb-4">Add Product</h1>

              <form @submit.prevent="submitForm">
                  <div class="grid grid-cols-12 gap-4">
                      <div class="col-span-6 mb-4">
                          <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                          <input v-model="name" type="text" id="name"
                              class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-200"
                              required>
                      </div>

                      <div class="col-span-6 mb-4">
                          <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Price:</label>
                          <input v-model="price" type="number" id="price"
                              class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-200"
                              required>
                      </div>
                      <div class="col-span-12 mb-4">
                          <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                          <textarea v-model="description" id="description"
                              class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-200"
                              rows="4"></textarea>
                      </div>


                      <div class="col-span-6 mb-4">
                          <label for="stock_quantity" class="block text-gray-700 text-sm font-bold mb-2">Stock Quantity:</label>
                          <input v-model="stock_quantity" type="number" id="stock_quantity"
                              class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-200"
                              required>
                      </div>

                      <div class="col-span-6 mb-4">
                          <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image:</label>
                          <input type="file" id="image" accept="image/*" @change="handleImageUpload">
                      </div>

                      <div class="col-span-12 mb-4">
                          <label for="is_published" class="block text-gray-700 text-sm font-bold mb-2">Published:</label>
                          <input v-model="is_published" type="checkbox" id="is_published">
                      </div>
                  </div>

                  <button type="submit"
                      class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Update</button>
              </form>
          </div>
      </div>
  </div>

  </template>
  <script scoped>
  import axios from "axios";

  export default {
    data() {
    return {
        name: "",
        description: "",
        price: "",
        stock_quantity: "",
        is_published: "",
    };
  },
  computed: {
    isPublished: {
      get() {
        return this.is_published === '1';
      },
      set(value) {
        this.is_published = value ? '1' : '0';
      },
    },
  },
  mounted() {
    // Fetch product data based on the ID from the API
    const productId = this.$route.params.id; // Assuming you pass the product ID via the route parameter
    axios.get(`/api/products/${productId}`)
      .then((response) => {
        this.name = response.data.name; // Update data with fetched data
        this.description = response.data.description; // Update data with fetched data
        this.price = response.data.price; // Update data with fetched data
        this.stock_quantity = response.data.stock_quantity; // Update data with fetched data
        this.is_published = response.data.is_published; // Update product data with fetched data
      })
      .catch((error) => {
        // Handle error
      });
  },
   methods: {
        handleImageUpload(e){
                console.log(e.target.files[0]);
                this.url = e.target.files[0];
            },
            submitForm(e) {
                e.preventDefault();
                let currentObj = this;

                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }
                const productId = this.$route.params.id;
                let formData = new FormData();
                formData.append('url', this.url);
                formData.append('name', this.name);
                formData.append('description', this.description);
                formData.append('price', this.price);
                formData.append('stock_quantity', this.stock_quantity);
                formData.append('is_published', this.is_published);

                axios.post(`/api/products/${productId}`, formData,config)
                .then((response) => {
                    // Handle success
                    this.$router.push('/products'); // Redirect to product list
                })
                .catch(error => {
                    // Handle error
                });
        }
    }
};
  </script>
