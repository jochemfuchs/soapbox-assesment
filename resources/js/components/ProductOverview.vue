<template>
    <div class="row">
        <div class="left-column">
            <product-form @productAdded="addProduct"></product-form>
            <hr class="my-5">
            <product-table :products="products"></product-table>
        </div>
    </div>
</template>

<script>
    import ProductTable from "./ProductTable";
    import ProductForm from "./ProductForm";
    import axios from "axios";

    export default {
        components: {
            ProductTable,
            ProductForm
        },
        data() {
            return {
                products: []
            }
        },
        methods: {
            addProduct(product) {
                this.products.push(product);

                this.saveProduct(product)
                    .then(() => this.getProducts());
            },
            async saveProduct(product) {
                return await axios.post('/api/save-product', product)
            },
            async getProducts() {
                await axios
                    .get('/api/get-products')
                    .then(response => this.products = response.data.data)
            }
        },
        mounted() {
            this.getProducts();
        }
    }
</script>
