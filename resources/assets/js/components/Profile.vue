<template>
    <div>
        <div class="panel-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel-header">
                            <div class="search-box">
                                <form action="#" class="form-search">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Search">
                                    </div>
                                </form>
                            </div>

                            <div class="sort-box">
                                <div class="select-wrapper">
                                    <select name="sort">
                                        <option>Sort By</option>
                                        <option value="popularity">Popularity</option>
                                        <option value="price low to high">Price Low to High</option>
                                        <option value="price high to low">Price High to Low</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div v-for="(profile, key) in profiles" class="card-wrapper">
                            <div class="card text-center">
                                <div class="card-cover"></div>
                                <div class="thumb">
                                    <!--<img src="{{ asset('images/thumb.jpg') }}" alt="user">-->
                                </div>
                                <h3>{{ profile.name }}</h3>
                                <p>Interaction Designer</p>
                                <span class="amount">$ 570</span>
                                <div class="divider"></div>
                                <div class="card-tbl d-table">
                                    <div class="card-col text-left">
                                        <span>$1,798,336</span>
                                        <span>Market Cap</span>
                                    </div>
                                    <div class="card-col text-right">
                                        <span>138%</span>
                                        <span>Funded</span>
                                    </div>
                                </div>
                                <a href="#" class="btn btn-light">Buy Now</a>
                            </div> <!-- card -->
                        </div>

                        <infinite-loading @infinite="infiniteHandler">
                            <span slot="no-more">
                              There is no more Hacker News :(
                            </span>
                        </infinite-loading>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import InfiniteLoading from 'vue-infinite-loading';
    // import axios from 'axios';

    const api = 'http://twitter-api-project.test/api/test/';

    export default {
        name: "Profile",
        // mounted() {
        //     console.log(api);
        // },
        // mounted() {
        //     this.fetchData()
        // },
        data() {
            return {
                profiles: [],
            }
        },
        methods: {
            infiniteHandler($state) {
                axios.get(api, {
                    params: {
                        page: this.profiles.length / 10 + 1,
                    },
                }).then(({ data }) => {
                    if (data.hits.length) {
                        this.profiles = this.profiles.concat(data.hits);
                        $state.loaded();
                        if (this.profiles.length / 10 === 10) {
                            $state.complete();
                        }
                    } else {
                        $state.complete();
                    }
                });
            },
        },
        components: {
            InfiniteLoading,
        },
    }
</script>

<style scoped>

</style>