<template>
    <div>
        <h3 class="text-center">Create Product</h3>
        <div class="row">
            <div class="flex justify-center">
                <form @submit.prevent="addProduct" enctype="multipart/form-data">
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            v-model="name">
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <input type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            v-model="description">
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                        <input type="number"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            v-model="price">
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                        <input id="image" type="file"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            @change="onChange">
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                        <select
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            v-model="categories" multiple>
                            <option v-for="category in categories_data" :key="category.id" :value="category.id">{{
                                category.name
                            }}</option>
                        </select>
                    </div>
                    <div v-if="errors" class="mb-6">
                        <div v-for="(value, key) in errors" :key="key" class="text-red-500 text-sm">
                            {{ value[0] }}
                        </div>
                    </div>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create</button>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
export default {
    data() {
        return {
            name: '',
            description: '',
            price: '',
            image: '',
            categories: [],
            categories_data: [],
            errors: []
        }
    },
    methods: {
        onChange(e) {
            this.image = e.target.files[0];
            console.log(this.image)
        },
        addProduct() {
            let data = new FormData();
            data.append("name", this.name);
            data.append("description", this.description);
            data.append("price", this.price);
            data.append("image", this.image);
            this.categories.forEach(category => {
                data.append("categories[]", category);
            });
            console.log(this.image)
            axios.post('products', data, { Headers: { 'Content-Type': 'multipart/form-data' } })
                .then(response => (
                    this.$router.push({ name: 'Products' })
                ))
                .catch(err => {
                    this.errors = err.response.data.errors
                    console.log(err.response.data.errors)
                })
        },
        getCategory() {
            axios.get('categories')
                .then(response => { this.categories_data = response.data.data })
                .catch(err => console.log(err))
        }
    },
    mounted() {
        this.getCategory()
    }
}
</script>