import { createWebHistory, createRouter } from 'vue-router'


const routes = [

    {
        name: "Home",
        component: () => import('../components/dashboard.vue'),
        path: "/",

    },
    {
        name: "Product",
        component: () => import('../components/products/index.vue'),
        path: "/products",

    },
    {
        name: "Create",
        component: () => import('../components/products/create.vue'),
        path: "/create",

    },
    {
        name: "Edit",
        component: () => import('../components/products/edit.vue'), // Replace 'edit.vue' with the actual component for editing
        path: "/edit/:id", // Use a dynamic segment ':id' to capture the product ID
      },

]

const router = createRouter({
    history: createWebHistory(),
    routes,
});



export default router;
