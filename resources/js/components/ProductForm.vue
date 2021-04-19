<template>
    <form>
        <div class="mb-3">
            <label for="product_name" class="form-label">Product Name*</label>
            <input type="text" class="form-control" v-model="productName" id="product_name" :class="productNameError ? 'is-invalid' : ''">
            <div class="text-danger mt-2" v-if="productNameError">Product name is required.</div>
        </div>
        <div class="mb-3">
            <label for="quantity_in_stock" class="form-label">Quantity in stock*</label>
            <input type="number" class="form-control" v-model="quantityInStock" id="quantity_in_stock" :class="quantityInStockError ? 'is-invalid' : ''">
            <div class="text-danger mt-2" v-if="quantityInStockError">Quantity in stock must be 1 or higher.</div>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price*</label>
            <input type="number" class="form-control" v-model="price" step=".01" id="price" :class="priceError ? 'is-invalid' : ''">
            <div class="text-danger mt-2" v-if="priceError">Price must be 1 or higher.</div>
        </div>
        <div class="mb-3">
            <label for="price_total" class="form-label">Total</label>
            <input type="text" disabled class="form-control" v-model="priceTotal"  step=".01" id="price_total">
        </div>
        <button type="button" class="btn btn-primary mt-4 px-5" @click="submitProduct" v-if="!saving">Add product</button>
        <button type="button" class="btn btn-primary mt-4 px-5" v-else>
            <span class="spinner-border"></span>
        </button>
    </form>
</template>

<script>
    import debounce from "debounce";
    import { required, minValue } from 'vuelidate/lib/validators'

    export default {
        data() {
            return {
                productName:     null,
                quantityInStock: null,
                price:           0,
                showErrors:      false,
                saving:          false,
            }
        },
        watch: {
            price(price) {
                this.priceFraction(price);
            }
        },
        computed: {
            priceTotal() {
                if(this.price <= 0 || this.quantityInStock <= 0) {
                    return 0;
                }

                return (this.quantityInStock * this.price).toFixed(2);
            },
            productNameError() {
                return this.showErrors && (!this.$v.productName.required);
            },
            quantityInStockError() {
                return this.showErrors && (!this.$v.quantityInStock.required || !this.$v.quantityInStock.minValue);
            },
            priceError() {
                return this.showErrors && (!this.$v.price.required || !this.$v.price.minValue);
            },
            product() {
                return {
                    name:        this.productName,
                    stock:       this.quantityInStock,
                    price:       this.price,
                    total_price: this.priceTotal,
                }
            }
        },
        methods: {
            priceFraction: debounce(function(price){
                if(price > 0) {
                    this.price = parseFloat(price).toFixed(2);
                }
            }, 2000),
            clearForm() {
                this.productName     = null
                this.quantityInStock = null
                this.price           = 0
                this.showErrors      = false
                this.saving          = false
            },
            submitProduct() {
                this.$v.$touch()
                if (this.$v.$invalid) {
                    this.showErrors = true
                } else {
                    this.saving     = true
                    this.showErrors = false

                    this.$emit('productAdded', this.product)
                    this.clearForm();
                }
            }
        },
        validations: {
            productName: {
                required
            },
            quantityInStock: {
                required,
                minValue: minValue(1)
            },
            price: {
                required,
                minValue: minValue(1)
            }
        }
    }
</script>
