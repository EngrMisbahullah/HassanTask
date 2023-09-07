<template>
    <Navbar />
    <Sidebar />
    <div class="p-4 sm:ml-64">
        <div
            class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700"
        >
            <div class="p-4">
                <div
                    class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700"
                >
                    <div class="p-4">
                        <div class="p-4 flex justify-between items-center">
                            <h1 class="text-2xl font-bold">Product Management</h1>
                            <router-link to="/create"><button class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Add Product</button></router-link>
                        </div>
                        <!-- User List -->
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                    >
                                        Name
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                    >
                                        Description
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                    >
                                        Image
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                    >
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr v-for="product in products" :key="product.id">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ product.name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ product.description }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <img :src="product.url" height="100" width="100">
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <button @click="editProduct(product.id)" class="text-indigo-600 hover:text-indigo-900">
                                        Edit
                                        </button>
                                        /
                                        <button @click="deleteProduct(product.id)" class="text-red-600 hover:text-red-900">
                                        Delete
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";
import Sidebar from "../partials/sidebar.vue";
import Navbar from "../partials/navbar.vue";

export default {
    data() {
        return {
            products: [],
        };
    },
    mounted() {
        this.fetchUsers();
    },
    methods: {
        async fetchUsers() {
            try {
                const token = localStorage.getItem("token"); // Replace 'your-auth-token' with the key you used to store the token
                const response = await axios.get("/api/products");
                this.products = response.data; // Assign the user data to the "users" property
            } catch (error) {
                console.error("Error fetching users:", error);
            }
        },

        editProduct(productId) {
        this.$router.push(`/edit/${productId}`);
        },
        deleteProduct(productId) {
        axios.delete(`/api/products/${productId}`)
          .then(response => {
            this.fetchUsers()
          })
          .catch(error => {
            // Handle error
          });
        }
    },
    components: {
        Sidebar,
        Navbar
    },
};
</script>
