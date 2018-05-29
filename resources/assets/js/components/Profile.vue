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
                            <div class="card text-center">
                                <div class="card-cover"></div>
                                <div class="thumb">
                                    <!--<img src="{{ asset('images/thumb.jpg') }}" alt="user">-->
                                </div>
                                <h3>Lonut John</h3>
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

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Profile"
    }
</script>

<style scoped>

</style>