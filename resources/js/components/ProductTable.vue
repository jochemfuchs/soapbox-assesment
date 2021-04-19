<template>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="thead-light">
                <tr>
                    <th>Product name</th>
                    <th>Quantity in stock</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="product in products" :class="product.id ? '' : 'fst-italic text-muted'">
                    <td>
                        <span class="spinner-border spinner-border-sm me-2" v-if="!product.id"> </span>
                        {{ product.name }}
                    </td>
                    <td>{{ product.stock }}</td>
                    <td>{{ product.price }}</td>
                    <td>{{ product.total_price }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props: {
            products: Array
        },
    }
</script>
