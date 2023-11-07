<template>
    <div>
        <h2 class="mt-4 text-center">All Products</h2>
        <a v-if="this.auth_user != null && this.auth_user.type == 'seller'" href="products/create" class="btn btn-primary m-4 text-center" style="width: 200px;">+ Add Product</a>
        <br>
        <div class="mx-3">
            <label for="seller">Filter By Seller: </label>
            <input class="mx-2 form-control" style="width: 400px;" type="text" name="seller-name" id="seller" placeholder="Write Seller name and press Enter" @change="getProducts()">
        </div>
        <div class="mt-2 mx-3">
            <label for="seller">Filter By Product Name: </label>
            <input class="mx-2 form-control" style="width: 400px;" type="text" name="product-name" id="product" placeholder="Write Product name and press Enter" @change="getProducts()">
        </div>
        <br>
        <div class="container-fluid mt-4">
            <p v-if="products.length == 0">No Products Found!</p>
            <div class="row">
                <div v-for="product in products" :key="product.id" class="card col-md-4 mb-4">
                    <img :src="product.image" class="card-img-top" style="max-height: 160px;" alt="">
                    <div class="card-body">
                        <h5 class="card-title">{{ product.name }}</h5>
                        <p class="card-text">
                            {{ product.description }}
                        </p>
                    </div>
                    <button v-if="this.auth_user != null" @click="sendPriceOffer(product.id)"
                        class="btn btn-success post-price">
                        Post Price
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: [
        'auth_user'
    ],
    data() {
        return {
            products: [],
        };
    },
    mounted() {
        this.getProducts()
    },
    methods: {
        getProducts() {
            var seller_name_filter = $('#seller').val();
            var product_name_filter = $('#product').val();
            var products_url = '/api/products?' + 'seller_filter=' + seller_name_filter + '&product_filter=' + product_name_filter;
            axios.get(products_url)
            .then((response) => {
                this.products = response.data;
            })
            .catch((error) => {
                console.error(error);
            });
        },
        sendPriceOffer(product_id) {
            var price = prompt("Please enter your price");
            if(/^[0-9.,]+$/.test(price)) {
                if(price != null && price != '' && price != 0) {
                    axios.post('/api/submit-price', {
                        product_id: product_id,
                        user_id: this.auth_user.id,
                        price : price,
                    })
                    .then(response => {
                        alert(response.data.message);
                    })
                    .catch((error) => {
                        console.error(error);
                    });
                } else {
                    alert('Please insert valid price!');
                }
            } else {
                alert('Please insert valid price!');
            }
        },
    }
};
</script>
