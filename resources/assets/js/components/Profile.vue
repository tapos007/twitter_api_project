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
                        <div class="card-wrapper">

                            <div class="card text-center" v-for="(profile, key) in profiles">
                                <div class="card-cover"
                                     v-bind:style='{ backgroundImage: "url(" + profile.profile_banner_url + ")", }'
                                    >

                                </div>

                                <div class="thumb">
                                    <img v-bind:src="profile.profile_image_url" alt="user">
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
                                <div class="card-tbl d-table">
                                    <div class="card-col text-left">
                                        <span><i class="fa fa-user-o" aria-hidden="true"></i> {{ profile.followers_count }}</span>
                                        <span>Followers</span>
                                    </div>
                                    <div class="card-col text-right">
                                        <span><i class="fa fa-user-o" aria-hidden="true"></i> {{ profile.friends_count }}</span>
                                        <span>Friends</span>
                                    </div>
                                </div>
                                <a href="#" class="btn btn-light">Buy Now</a>
                            </div> <!-- card-1 -->

                        </div><!-- CARD WRAPPER -->

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

    const api = '/api/test/';
    let counter = 1;

    export default {
        name: "Profile",

        data() {
            return {
                profiles: [],
            }
        },
        methods: {
            infiniteHandler($state) {
                axios.get(api+counter, {

                }).then(({data}) => {

                    const temp = [];
                    var info = data;
                    for (let i = 0; i < info.length; i++) {
                        temp.push(info[i]);
                    }
                    this.profiles = this.profiles.concat(temp);
                    counter++;
                    $state.loaded();
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