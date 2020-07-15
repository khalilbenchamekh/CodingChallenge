<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Laravel Coding Challenge:</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label>Select Category:</label>
                            <select class='form-control' v-model='category' @change='getProducts(category)'>
                                <option v-for='data in categories' :value='data.id'>{{ data.name }}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <ul v-for='data in products' v-model='product'>
                                <li>name :{{data.name}}</li>
                                <li>description :{{data.description}}</li>
                                <li>price : {{data.price}}</li>
                                <li>
                                    <ul
                                        v-if="data.categories"
                                        v-for='categories in data.categories'>
                                        <li> Sub category name:{{categories.name}}</li>
                                    </ul>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Api from '../api/CodingChallenge'

    export default {
        name: "AppComponent",
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {
                category: null,
                categories: [],
                product: {},
                products: []
            }
        },
        methods: {
            getCategories: function () {
                Api.getMissionsService()
                    .then(({data}) => {
                        this.categories = data.data
                    })
                    .catch(error => {
                        console.error(error);
                    });

            },
            getProducts: function (body) {
                Api.addMissionsService(body)
                    .then(({data}) => {
                        this.categories = data.data
                    })
                    .catch(error => {
                        console.error(error);
                    });


            }
        },
        created: function () {
            this.getCategories();
            this.getProducts(this.category);
        }
    }
</script>
