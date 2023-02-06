<template>
    <div style="margin: 40px;">

        <div class="relative overflow-x-auto mx-10 shadow-md sm:rounded-lg">
            <div class="flex justify-end my-4">
                <div class="flex ">
                    <label for="sort-by" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sort
                        By</label>
                    <select v-on:change="sortBy()" v-model="options.sortBy" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500
                            block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                            dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="name">Name</option>
                        <option value="price">Price</option>
                    </select>
                </div>
                <div v-if="options.sortBy" class="flex">
                    <label for="sortingType"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sorting Type</label>
                    <select v-on:change="sortBy()" v-model="options.sortingType" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500
                            block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                            dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="asc">Ascending</option>
                        <option value="desc">Descending</option>
                    </select>
                </div>
                <div class="flex">
                    <label for="categories"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categories</label>
                    <select @change="filterByCategory" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500
                            block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                            dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="all">All</option>
                        <option v-for="category in categories" :key="category.id" :value="category.id">{{
                            category.name
                        }}</option>
                    </select>
                </div>
            </div>
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 mx">
                            <span class="sr-only">Image</span>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Product
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            categories
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="product in products" :key="product.id"
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="w-32 p-4">
                            <img :src="'storage/' + product.image" alt="Apple Watch">
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            {{ product.name }}
                        </td>
                        <td class="px-6 py-4">
                            <div>
                                <p class="text-sm font-medium text-gray-900 dark:text-gray-200">
                                    {{ product.description }}
                                </p>
                            </div>
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            {{ product.price }}
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            <div v-for="category in product.categories" :key="category.id">
                                {{ category.name }}
                            </div>
                        </td>
                        <td class="px-6 py-4">

                            <a href="#" class="text-sm font-medium text-red-600 dark:text-red-400 hover:underline"
                                @click.prevent="deleteProduct(product.id)">Delete</a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            options: {
                sortBy: 'name',
                sortingType: 'asc',
            },
            categories: '',
            products: [],


        }
    },
    created() {
        this.sortBy()
        this.getCategory()
    },
    methods: {
        sortBy() {
            axios.get('products', { params: this.options })
                .then(response => {
                    this.products = response.data.data
                    console.log(response.data)
                })
                .catch(e => {
                    this.errors.push(e)
                })
        },
        getCategory() {
            axios.get('categories')
                .then(response => { this.categories = response.data.data })
                .catch(err => console.log(err))
        },
        filterByCategory() {
            this.products = this.products.filter(product => product.categories.some(category => category.id == event.target.value))
            if (event.target.value == 'all') {
                this.sortBy()
            }
        },
        deleteProduct(id) {
            axios.delete('products/' + id)
                .then(response => {
                    this.products = this.products.filter(product => product.id !== id)
                })
                .catch(e => {
                    this.errors.push(e)
                })
        }
    }
}
</script>
