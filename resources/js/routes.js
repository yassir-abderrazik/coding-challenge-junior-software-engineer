import Products from './components/Products.vue';
import AddProduct from './components/AddProduct.vue';

export const routes = [
    {
        name: 'Products',
        path: '/products',
        component: Products
    },
    {
        name: 'AddProduct',
        path: '/add-product',
        component: AddProduct
    }
];
